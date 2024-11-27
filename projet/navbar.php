<header class="header">
        <div class="logo">
            <img id ="logoImg" src="assets/img/logo.png">
        </div>
        <script type="text/javascript" src="script.js"></script>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="#exercices">S'exercer</a></li>
                <li><a href="ressources.php">Ressources</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['connexion']) && $_SESSION['connexion'] === true): ?>
                <!-- Boutons pour utilisateur connecté -->
                <a href="profil.php" class="button-link">Profil</a>
                <a href="deconnexion.php" class="button-link2">Déconnexion</a>
            <?php else: ?>
                <!-- Boutons pour utilisateur non connecté -->
                <a href="inscription.php" class="button-link2">S'inscrire</a>
                <a href="connexion.php" class="button-link">Connexion</a>
            <?php endif; ?>
        </div>
</header>
