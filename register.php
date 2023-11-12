<?php
require 'config/constants.php';


$name = $_SESSION['signup-data']['name'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

unset($_SESSION['signup-data']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipistic - Cooking made easy.</title>
    <!-- META TAGS -->
    <meta name="title" content="Cooking made easy">
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
    <link
  rel="stylesheet"
  href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- MATERIAL ICON -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0..1,0" />  
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./assets/css/style.css?<?php echo time(); ?>" />
    <!-- CUSTOM JS -->
    <script src="./assets/js/global.js" type='module'></script>
    <script src="./assets/js/login.js" type='module'></script>
    <script src="./assets/js/main.js" type='module'></script>


</head>
<body>
    
<!-- HEADER -->
    <header class="header" data-header>
        <a href="./index.php" class="logo">
            <img src="./assets/images/recipistic.png" alt="logo-light" class="logo-light" width="156" height="32">
            <img src="./assets/images/recipistic.png" alt="logo-dark" class="logo-dark" width="156" height="32">
        </a>
        <nav class="navbar">
            <ul class="navbar-list">
                <li><a href="./index.php" class="navbar-link title-small has-state ">Home</a></li>
                <li><a href="./recipes.php" class="navbar-link title-small has-state">Recipes</a></li>
                <li><a href="./about.php" class="navbar-link title-small has-state">About</a></li>

                <?php if(isset($_SESSION['user-id'])) : ?>
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'upload/' . $avatar['avatar'] ?>" alt="">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>dashboard.php" class=" title-small has-state ">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>saved-recipes.php" class=" title-small has-state ">Saved Recipes</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php" class=" title-small has-state ">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?= ROOT_URL ?>./login.php" class="navbar-link title-small active">LogIn</a></li>
            <?php endif ?>
            </ul>
            <ul class="navbar-list">
            <button class="icon-btn theme-switch has-state" aria-pressed="false" aria-label="Toggle light and dark theme" data-theme-btn>
                <span class="material-symbols-outlined light-icon" aria-hidden="true">light_mode</span>
                <span class="material-symbols-outlined dark-icon" aria-hidden="true">dark_mode</span>
            </button>

            <button class="button open_nav-btn"><i class="uil uil-bars"></i></button>
        
           <button class="button close_nav-btn"><i class="uil uil-multiply"></i></button>
           </ul>
        </nav>

       
    </header>
    
    <!-- LOGIN FORM -->
    <div class="main container">
        <div class="box">
        <div class="inner-box">

        <div class="forms-wrap">

            <!-- SIGN UP -->

            <form class="sign-up-form" action="<?= ROOT_URL ?>register-logic.php" method="POST" enctype="multipart/form-data">

              <div class="heading">
                <h2 class="display-large">Get Started</h2>
              </div>

              <div class="actual-form">

              <?php if(isset($_SESSION['signup'])) : ?>
              <div class="alert_message error">
                  <p>
                      <?= $_SESSION['signup'];
                      unset($_SESSION['signup']);
                      ?>
                  </p>
              </div>
              <?php endif ?>

                <div class="input-outlined">
                  <input
                    type="text"
                    class="input-field body-large"
                    placeholder="Name"
                    required
                    name="name"
                    value="<?= $name ?>"
                  />
                  <label class="body-large label">Name</label>
                </div>

                <div class="input-outlined">
                  <input
                    type="text"
                    class="input-field body-large"
                    placeholder="Username"
                    required
                    name="username"
                    value="<?= $username ?>"
                  />
                  <label class="body-large label">Username</label>
                </div>


                <div class="input-outlined">
                  <input
                    type="email"
                    class="input-field body-large"
                    placeholder="Email"
                    required
                    name="email"
                    value="<?= $email ?>" 
                  />
                  <label class="body-large label">Email</label>
                </div>

                <div class="input-outlined">
                  <input
                    type="password"
                    class="input-field body-large"
                    placeholder="Password"
                    required
                    name="createpassword" 
                    value="<?= $createpassword ?>"
                  />
                  <label class="body-large label">Password</label>
                </div>

                <div class="input-outlined">
                  <input 
                    type="password" 
                    class="input-field body-large confirm-password" 
                    name="confirmpassword" 
                    value="<?= $confirmpassword ?>"
                    placeholder="Confirm Password" 
                    required
                  />
                  <label class="body-large label">Confirm Password</label>
                </div>

                
                <div class="input-outlined">
                  <input 
                    type="file" 
                    class="input-field body-large" 
                    name="avatar" id="avatar"
                    required
                  />
                  <label class="body-large " for="avatar"></label>
                </div>

               

                <input type="submit"  name="submit" value="Sign Up" class="btn btn-primary has-state sign-btn" />

                <div class="heading">
                  <h4>Already have an account?</h4>
                  <a href="./login.php" class="toggle">Log In</a>
                </div>

              
              </div>
            </form>
            
        </div>

        <div class="carousel">
            <div class="images-wrapper">
              <img src="./assets/images/image1.png" class="image img-1 show" alt="" />
              <img src="./assets/images/image2.png" class="image img-2" alt="" />
              <img src="./assets/images/image3.png" class="image img-3" alt="" />
        </div>

        <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                <h2>Create your own profile</h2>
                    <h2>Customize as you like</h2>
                    <h2>Invite friends to your recipes</h2>
                </div>
        </div>

        <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
        </div>

        </div>
      </div>
    </div>

  

<!-- FOOTER -->

<div class="footer-f">
    <div class="container">
        <div class="row">
            <div class="footer-f-col">
                <h4><a href="index.php" class="logo">
                    <img src="./assets/images/recipistic.png" alt="logo-light" class="logo-light"  height="32">
                    <img src="./assets/images/recipistic.png" alt="logo-dark" class="logo-dark" height="32">
                </a></h4>
                <p>
                   Cooking made easy.
                </p>
            </div>
            <div class="footer-f-col">
                <h4>Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="recipes.php">Recipes</a></li>
                    <li><a href="index.php">Contact Us</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
            <div class="footer-f-col">
                <h4>Account</h4>
                <ul>
                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="saved-recipes.php">Saved Recipes</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <?php else: ?>
                    <li><a href="<?= ROOT_URL ?>./login.php">LogIn</a></li>
                <?php endif ?>
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
                <h5 class="label-large">Follow Us:</h5>
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

<script src="<?= ROOT_URL ?>./assets/js/main.js"></script>
<script src="./assets/js/jquery.min.js"></script>

</body>
</html>
