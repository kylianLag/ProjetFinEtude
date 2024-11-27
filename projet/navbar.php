<header class="header">
        <div class="logo">
            <img id ="logoImg" src="logo.png">
        </div>
        <script type="text/javascript" src="script.js"></script>
        <nav class="navbar">
            <ul class="nav-list">
            <li><a href="index.php">Accueil</a></li>
                <li><a href="#competences">Compétences</a></li>
                <li><a href="#cours">Cours</a></li>
                <li><a href="#exercices">S'exercer</a></li>
                <li><a href="ressources.php">Resources</a></li>
                <li><a href="contact.php">Contact</a></li>
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