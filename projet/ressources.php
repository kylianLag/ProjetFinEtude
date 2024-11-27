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
        include 'navbar.php';
        include 'functions.php';
    ?>
<?php

if($_SESSION['enseignant']?? ""){
    echo "
    <div class='upload-container'>
    <h1 style='text-align:center;'>Uploader un fichier</h1>
    <form id='uploadForm' action='' method='POST' enctype='multipart/form-data'>
        <div class='container'>
            <input type='file' name='fichier' required>
            <br><br>
            <button class = 'button-link' name='televersement' type='submit'>Téléverser</button>
        </div>
    </form>
</div>";
}
?>



<?php
if (isset($_POST['televersement']) && $_SESSION['enseignant']?? "") {
    // Vérification si un fichier a été téléversé correctement
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
        uploadFile('fichier'); // Appel de votre fonction existante
        echo "<p style='text-align:center;'>Votre fichier à bien etait upload</p>";
        $file = $_FILES['fichier'];
        $fileName = basename($file['name']);
        insertlog($fileName ." à bien etait upload par ". $_SESSION['pseudo']);
    } else {
        echo "<p style='text-align:center;'>Erreur : Aucun fichier téléversé ou problème lors du téléversement.</p>";
    }
}
?>
</body>
</html>
