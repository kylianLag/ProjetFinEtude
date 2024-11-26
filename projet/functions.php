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

function insertLog($message){
    $pdo = getPdoConnection();
    $query = $pdo->prepare('INSERT INTO logs (messageLog, dateLog) VALUES (?,CURDATE())');
    return $query->execute([$message]);
}


/* */ 





?>