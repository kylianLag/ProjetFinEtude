<?php
function getDbConfig() {
    $config = [];
    if (($handle = fopen('db_config.csv', 'r')) !== FALSE) {
        $headers = fgetcsv($handle);
        if (($data = fgetcsv($handle)) !== FALSE) {
            $config = array_combine($headers, $data);
        }
        fclose($handle);
    }
    return $config;
}

function getPdoConnection() {
    $config = getDbConfig();
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
    $username = $config['user'];
    $password = $config['password'];
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
}

function checkLogin($pseudo, $mdp) {
    $pdo = getPdoConnection();
    $query = $pdo->prepare('SELECT id, mdp FROM utilisateur
     WHERE pseudo = ?');
    $query->execute([$pseudo]);
    $membre = $query->fetch();
    return $membre && password_verify($mdp, $membre['mdp']);
}

function registerUser($nom , $prenom ,$pseudo, $email, $mdp) {
    $pdo = getPdoConnection();
    $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
    $query = $pdo->prepare('INSERT INTO utilisateur
     (nom ,prenom ,pseudo , mdp, email, typeUtilisateur, classe, date_inscription) VALUES (?, ?, ?, ?, ?, ?, ?, CURDATE())');
    return $query->execute([$nom , $prenom , $pseudo, $mdp_hache, $email , 1 , 5]);
}

function checkPseudoExists($pseudo) {
    $pdo = getPdoConnection();
    $check = $pdo->prepare('SELECT id FROM utilisateur
     WHERE pseudo = ?');
    $check->execute([$pseudo]);
    return $check->rowCount() > 0;
}

/* */

function handleRegistrationForm($postData) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null; 
    }

    $pseudo = htmlspecialchars($postData['pseudo'] ?? '');
    $email = htmlspecialchars($postData['email'] ?? '');
    $nom = htmlspecialchars($postData['nom'] ?? '');
    $prenom = htmlspecialchars($postData['prenom'] ?? '');
    $mdp = $postData['mdp'] ?? '';
    $mdp_confirm = $postData['mdp_confirm'] ?? '';

    if ($mdp !== $mdp_confirm) {
        insertLog("Inscription Échouée : Mots de passe non correspondants pour pseudo : ".$pseudo);
        return "Les mots de passe ne correspondent pas.";
    }

    if (checkPseudoExists($pseudo)) {
        insertLog("Inscription Échouée : Pseudo déjà utilisé : ".$pseudo);
        return "Pseudo déjà utilisé.";
    }

    if (registerUser($nom , $prenom ,$pseudo, $email, $mdp)) {
        insertLog("Inscription Réussie : nom : ".$nom." , prenom : ".$prenom." , pseudo : ".$pseudo." , email : ".$email);
        header('Location: connexion.php');
        exit(); 
    } else {
        insertLog("Inscription Échouée : nom : ".$nom." , prenom : ".$prenom." , pseudo : ".$pseudo." , email : ".$email);
    }

    return "Une erreur s'est produite lors de l'inscription.";
}



function handleLoginForm($postData, $pdo) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null; 
    }
    $identifiant = htmlspecialchars($postData['identifiant'] ?? ''); 
    $mdp = $postData['mdp'] ?? '';
    $query = $pdo->prepare('SELECT id, mdp , typeUtilisateur FROM utilisateur
     WHERE pseudo = ? OR email = ?');
    $query->execute([$identifiant, $identifiant]);
    $membre = $query->fetch();
    if ($membre && password_verify($mdp, $membre['mdp'])) {
        session_start();
        $_SESSION['pseudo'] = $identifiant;
        $_SESSION['user_id'] = $membre['id'];
        insertLog("Connexion Réussie : pseudo : ".$_SESSION['pseudo']." , id : ".$membre['id']);
        if($membre['typeUtilisateur'] == 2){
            $_SESSION['enseignant'] = true;
        }else{
            $_SESSION['enseignant'] = false;
        }
        $_SESSION['connexion'] = true;
        header('Location: index.php');
        exit(); 
    }
    insertLog("Connexion Échouée : pseudo : ".$identifiant);
    return "<p class='reussioupas'>Identifiant ou mot de passe incorrect.</p>";

}

/* log */
function insertLog($message){
    $pdo = getPdoConnection();
    $query = $pdo->prepare('INSERT INTO logs (messageLog, dateLog) VALUES (?,CURDATE())');
    return $query->execute([$message]);
}


/* upload document */ 



function uploadFile($inputName) {
    // Définir le dossier de destination
    $uploadDir = __DIR__ . '/uploads/';

    // Vérifier si le dossier existe, sinon le créer
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Vérifier si un fichier a été téléversé
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES[$inputName])) {
        $file = $_FILES[$inputName];

        // Vérifier s'il n'y a pas d'erreur lors du téléversement
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Obtenir le nom du fichier et son chemin de destination
            $fileName = basename($file['name']);
            $destination = $uploadDir . $fileName;

            // Déplacer le fichier vers le dossier de destination
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                return "Fichier téléversé avec succès : " . htmlspecialchars($fileName);
            } else {
                return "Erreur lors du déplacement du fichier.";
            }
        } else {
            return "Erreur lors du téléversement : " . $file['error'];
        }
    } else {
        return "Aucun fichier téléversé.";
    }
}

/* FIN UPLOAD*/

/* TABLEAU DE BORD */

// Récupérer la progression des modules pour un utilisateur
function getUserProgress($userId) {
    try {
        $pdo = getPdoConnection();
        $query = $pdo->prepare(
            "SELECT 
                ma.id AS matiere_id, 
                ma.nom AS matiere_nom,
                SUM(COALESCE(p.points, 0)) AS total_points, 
                COUNT(DISTINCT p.quiz_reached) AS quizzes_completed, 
                m.total_quiz,
                ma.max_points,  -- On récupère max_points depuis la table matiere
                COALESCE(SUM(p.points), 0) / (ma.max_points * m.total_quiz) * 100 AS progression
            FROM matiere ma
            LEFT JOIN module m ON m.matiere_id = ma.id
            LEFT JOIN progressions p ON p.matiere_id = m.matiere_id AND p.user_id = ?
            GROUP BY ma.id, ma.nom, m.total_quiz, ma.max_points
            ORDER BY ma.nom"
        );
        $query->execute([$userId]);

        $modules = $query->fetchAll(PDO::FETCH_ASSOC);

        return $modules;
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return [];
    }
}

// Mettre à jour la progression d'un utilisateur pour un module donné
function updateUserProgress($userId, $moduleId, $quizReached, $points) {
    $pdo = getPdoConnection();
    $query = $pdo->prepare(
        'INSERT INTO progressions (user_id, module_id, quiz_reached, points)
         VALUES (?, ?, ?, ?)
         ON DUPLICATE KEY UPDATE quiz_reached = ?, points = ?'
    );
    return $query->execute([$userId, $moduleId, $quizReached, $points, $quizReached, $points]);
}

// Récupérer l'état d'un module pour continuer
function getModuleState($userId, $moduleId) {
    $pdo = getPdoConnection();
    $query = $pdo->prepare(
        'SELECT quiz_reached FROM progressions WHERE user_id = ? AND module_id = ?'
    );
    $query->execute([$userId, $moduleId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

/* FIN DASHBOARD */

?>
