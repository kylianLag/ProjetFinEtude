<header class="header">
        <div class="logo">
            <img id ="logoImg" src="logo.png">
        </div>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="#competences">Compétences</a></li>
                <li><a href="#cours">Cours</a></li>
                <li><a href="#exercices">S'exercer</a></li>
                <li><a href="#resources">Resources</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php
                session_start(); 
                if(isset($_SESSION['connexion']) && !$_SESSION['connexion']?? ""){

                }
                

            ?>
            <script>
                const img = document.querySelector("#logoImg")
                let count = 0
                img.addEventListener("click",function(){
                count++
                if(count == 10){
                    img.src = "easterEgg.jpg"
                }
                if(count ==15){
                    //img.style.position = "absolute"
                    img.style.maxWidth = "100em"
                    img.style.maxHeight = "100em"
                    img.style.Width = "100em"
                    img.style.height = "100em"
                    img.style.transition = "3s"
                    img.style.rotate = "360deg"
 
                }

                if(count == 20){
                    img.style.position = "none"
                    img.style.maxWidth = "70px"
                    img.style.maxHeight = "70px"
                    img.style.rotate = "0deg"
                }
                if(count == 21){
                    img.src = "logo.png"
                }
                

                })

            </script>
            <a href='inscription.php' class='button-link2'>S'inscrire</a>
                    <a href='connexion.php' class='button-link'>Connexion</a>
        </div>
    </header>