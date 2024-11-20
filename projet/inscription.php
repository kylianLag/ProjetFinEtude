<?php
include 'functions.php';
$errorMessage = handleRegistrationForm($_POST);

if ($errorMessage) {
    echo $errorMessage; // Affiche un message d'erreur si nécessaire
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
    <script src="validation.js" defer></script>
</head>
<body>
    <div class="background-container">
    <img class="lune" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="clouds"></div>
    <div class="container">
        <h2>Inscription</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="mdp_confirm">Confirmer mot de passe</label>
                <input type="password" id="mdp_confirm" name="mdp_confirm" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>
        <p class="center"><a href="index.php" class="button-link">Retour</a>
    </div>
</body>
</html>
