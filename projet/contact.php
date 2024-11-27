<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.A.K.E</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header avec le menu -->
    <?php 
        session_start();
        include 'navbar.php';
    ?>
    <main class="main-section">
        <div class="container">
            <h2>Vous souhaitez nous contacter ?</h1>
            <form class = "form-group" action="" method="post">
                <label for="email">Adresse email :</label>
                <input class = "inputContact" type="email" name="email" id="email" placeholder = "XXXX@gmail.com">
                <label for="text">Entrez Votre Message :</label>
                <textarea style = "resize: none;border: 1px solid #ccc;border-radius: 5px;" name = "text"  rows ="6" cols = "40">Je vous envoie ce mail car j'ai ....</textarea>
                <br>
                <button type="button" name = "buttonMail" id = "buttonMail">Envoyer le Mail</button>
                <br>

            </form>
        </div>
    </main>
</body>
</html>