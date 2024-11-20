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
    $query = $pdo->prepare('SELECT id, mdp FROM membres WHERE pseudo = ?');
    $query->execute([$pseudo]);
    $membre = $query->fetch();
    return $membre && password_verify($mdp, $membre['mdp']);
}

function registerUser($pseudo, $email, $mdp) {
    $pdo = getPdoConnection();
    $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
    $query = $pdo->prepare('INSERT INTO membres (pseudo, mdp, email, date_inscription) VALUES (?, ?, ?, CURDATE())');
    return $query->execute([$pseudo, $mdp_hache, $email]);
}

function checkPseudoExists($pseudo) {
    $pdo = getPdoConnection();
    $check = $pdo->prepare('SELECT id FROM membres WHERE pseudo = ?');
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
    $mdp = $postData['mdp'] ?? '';
    $mdp_confirm = $postData['mdp_confirm'] ?? '';
    if ($mdp !== $mdp_confirm) {
        return "Les mots de passe ne correspondent pas.";
    }
    if (checkPseudoExists($pseudo)) {
        return "Pseudo déjà utilisé.";
    }
    if (registerUser($pseudo, $email, $mdp)) {
        header('Location: connexion.php');
        exit(); 
    }
    return "Une erreur s'est produite lors de l'inscription.";
}

function handleLoginForm($postData, $pdo) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null; 
    }
    $identifiant = htmlspecialchars($postData['identifiant'] ?? ''); 
    $mdp = $postData['mdp'] ?? '';
    $query = $pdo->prepare('SELECT id, mdp FROM membres WHERE pseudo = ? OR email = ?');
    $query->execute([$identifiant, $identifiant]);
    $membre = $query->fetch();
    if ($membre && password_verify($mdp, $membre['mdp'])) {
        session_start();
        $_SESSION['pseudo'] = $identifiant;
        header('Location: index.php');
        exit(); 
    }
    return "<p class='reussioupas'>Identifiant ou mot de passe incorrect.</p>";
}

/* */ 
?>