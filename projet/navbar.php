<header class="header">
        <div class="logo">
            <img id ="logoImg" src="logo.png">
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
            <?php 
                if(isset($_SESSION['connexion']) && !$_SESSION['connexion']?? ""){
                }
            ?>
            
            <a href='inscription.php' class='button-link2'>S'inscrire</a>
            <a href='connexion.php' class='button-link'>Connexion</a>
        </div>
    </header>
