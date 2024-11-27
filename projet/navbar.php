<header class="header">
    <div class="logo">
        <img src="assets/img/logo.png">
    </div>
    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#exercices">S'exercer</a></li>
            <li><a href="#resources">Ressources</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        </nav>
        <div class="auth-buttons">
            <?php
                session_start(); 
                if(isset($_SESSION['connexion']) && !$_SESSION['connexion']?? ""){
                }
            ?>
            
            <a href='inscription.php' class='button-link2'>S'inscrire</a>
                    <a href='connexion.php' class='button-link'>Connexion</a>
        </div>
    </header>
