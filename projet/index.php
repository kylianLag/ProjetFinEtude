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
        include 'navbar.html';
    ?>

    <!-- Section principale -->
    <main class="main-section">
        <div class="container-index">
            <h1>M.A.K.E</h1>
            <p class="subtitle">"Make yourself better than the teacher"</p>
            <div class="horizontal-buttons">
                <a href="#" class="button-link2">Button</a>
                <a href="#" class="button-link">Button</a>
            </div>
        </div>
    </main>

    <!-- Section image -->
    <div class="content-section">
    <!-- Carte gauche -->
    <div class="decoration">
        <img src="logo.png" alt="Icône à gauche" class="decoration-icon">
        <p class="decoration-text">Explorez les options SLAM & SISR</p>
    </div>

    <!-- Contenu central -->
    <div class="main-content">
        <div class="image-section">
            <img src="image_index.png" alt="Illustration cloud" class="background-image">
        </div>
        <div class="card">
            <div class="card-content">
                <h2 class="card-title">Bienvenue dans le monde du BTS SIO !</h2>
                <p class="card-description">
                    Cette plateforme d'apprentissage est conçue pour accompagner les étudiants de <strong>BTS SIO</strong>, 
                    qu'ils soient en première ou deuxième année. Découvrez les options <strong>SLAM</strong> et <strong>SISR</strong> grâce à nos outils interactifs et nos cours structurés.
                </p>
                <a href="#" class="card-button">En savoir plus</a>
            </div>
        </div>
    </div>

    <!-- Carte droite -->
    <div class="decoration">
        <img src="logo.png" alt="Icône à droite" class="decoration-icon">
        <p class="decoration-text">Rejoignez une communauté active</p>
    </div>
</div>
</body>
</html>
