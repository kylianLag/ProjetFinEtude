<?php
session_start();
require 'functions.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = getPdoConnection();

    $errorMessage = handleLoginForm($_POST, $pdo);

    if ($errorMessage) {
        echo $errorMessage; // Affiche un message d'erreur en cas d'échec
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- -->

<div class="background-container">
<img class="lune"src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
<div class="stars"></div>
<div class="twinkling"></div>
<div class="clouds"></div>

<!-- -->
<div class="container">
    <h2>Connexion</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="identifiant">Pseudo ou Email</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>

        <div class="form-group">
            <button type="submit">Se connecter</button>
        </div>
    </form>

    <p class="center">Pas encore inscrit ? <a href="inscription.php">S'inscrire ici</a></p>
    <p class="center"><a href="index.php" class="button-link">Retour</a>
</div>

</body>
</html>
