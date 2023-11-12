<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Recipes - Cook.io</title>
    <!-- META TAGS -->
    <meta name="title" content="Cook.io">
    <meta name="description" content="lorem">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <!-- THEME -->
    <script src="./assets/js/theme.js"></script> 
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap"
    rel="stylesheet">
    <!-- MATERIAL ICON -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0..1,0" />  
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- CUSTOM JS -->
    <script src="../assets/js/global.js" type='module'></script>
    <script src="../assets/js/saved_recipes.js" type='module'></script>
    <!-- BOXICONS CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'rel='stylesheet'>

</head>
<body>
    
<!-- HEADER -->
<!-- <header class="header" data-header>
        <a href="./index.php" class="logo">
            <img src="./assets/images/recipistic.png" alt="logo-light" class="logo-light" width="156" height="32">
            <img src="./assets/images/recipistic.png" alt="logo-dark" class="logo-dark" width="156" height="32">
        </a>
        <nav class="navbar">
            <ul class="navbar-list">
                <li><a href="./index.php" class="navbar-link title-small has-state">Home</a></li>
                <li><a href="./recipes.php" class="navbar-link title-small has-state">Recipes</a></li>
                <li><a href="./login.php" class="navbar-link title-small has-state">LogIn</a></li>
            </ul>
        </nav>
        <button class="icon-btn theme-switch has-state" aria-pressed="false" aria-label="Toggle light and dark theme" data-theme-btn>
            <span class="material-symbols-outlined light-icon" aria-hidden="true">light_mode</span>
            <span class="material-symbols-outlined dark-icon" aria-hidden="true">dark_mode</span>
        </button>

        <a href="./saved-recipes.php" class="btn btn-primary has-icon">
            <span class="material-symbols-outlined" aria-hidden="true">book</span>
            <span class="span">Saved Recipes</span>
        </a>
</header> -->
   
<!-- MOBILE NAV -->
   <!-- <nav class="mobile-nav" aria-label="primary">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="./recipes.php" class="nav-link">
                    <span class="item-icon">
                        <span class="material-symbols-outlined" aria-hidden="true">lunch_dining</span>
                    </span>
                    <span class="label-medium">Recipes</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/" class="nav-link">
                    <span class="item-icon">
                        <span class="material-symbols-outlined" aria-hidden="true">home</span>
                    </span>
                    <span class="label-medium">Home</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="./saved-recipes.php" class="nav-link" aria-current="true">
                    <span class="item-icon">
                        <span class="material-symbols-outlined" aria-hidden="true">book</span>
                    </span>
                    <span class="label-medium">Saved</span>
                </a>
            </li>
        </ul>
    </nav> -->


    <main>
        <article class="article container saved-recipe-page" data-saved-recipe-container></article>
    </main>



<!-- FOOTER -->
<!-- <div class="footer-f">
    <div class="container">
        <div class="row">
            <div class="footer-f-col">
                <h4><a href="/" class="logo">
                    <img src="./assets/images/recipistic.png" alt="logo-light" class="logo-light" width="156" height="32">
                    <img src="./assets/images/recipistic.png" alt="logo-dark" class="logo-dark" width="156" height="32">
                </a></h4>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto sequi sed maxime
                </p>
            </div>
            <div class="footer-f-col">
                <h4>About</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Our Services</a></li>
                </ul>
            </div>
            <div class="footer-f-col">
                <h4>Help</h4>
                <ul>
                    <li><a href="">+91695191573</a></li>
                    <li><a href="">abc@email.com</a></li>
                    <li><a href="">Lorem ipsum dolor sit.</a></li>
                </ul>
            </div>
            <div class="footer-f-col">
                <h4 class="label-large">Connect with us :</h4>
                <div class="social-media">
                    <div class="social-icons">
                      <a href="#">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
        <h4>RECIPISTIC</h4>
        <p class="copyright body-medium">Copyright 2023</p>
        <a href="https://www.edamam.com/" target="_blank" class="edaman">
            <img src="./assets/images/edamam.svg" alt="edamam free recipe api" width="200" height="40" loading="lazy">
        </a>
</footer>

   

</body>
</html> -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
