<?php
require 'config/database.php';

if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipistic - Cooking made easy.</title>
    <!-- META TAGS -->
    <meta name="title" content="Recipistic - Cooking made easy">
    <meta name="description" content="A recipe website where you can find online recipes from all over the world.">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="favicon1.svg" type="image/svg+xml">
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
    <script src="./assets/js/home.js" type='module'></script>
    <script src="./assets/js/main.js" type='module'></script>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />




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
                <li><a href="./index.php" class="navbar-link title-small has-state active">Home</a></li>
                <li><a href="./recipes.php" class="navbar-link title-small has-state">Recipes</a></li>
                <li><a href="./about.php" class="navbar-link title-small has-state">About</a></li>

                <?php if(isset($_SESSION['user-id'])) : ?>
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . './upload/' . $avatar['avatar'] ?>" alt="">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>dashboard.php" class=" title-small has-state ">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>saved-recipes.php" class=" title-small has-state ">Saved Recipes</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php" class=" title-small has-state ">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?= ROOT_URL ?>./login.php" class="navbar-link title-small ">LogIn</a></li>
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
    <main>
        <article>

<!-- Swiper -->

<style>  
    .swiper {
    width: 100%;
    max-height: 80vh;
    padding: 10px 0;
    margin-bottom: 10rem;
    box-shadow: 0px 10px 10px 10px var(--alpha-20);
    }

    .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    }

    .swiper-slide video {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .swiper-button-next,
    .swiper-button-prev{
        color: var(--light-error);
        background: var(--light-alpha-20);
        border-radius: 50%;
        width: 60px; 
        height: 60px; 
        text-align: center;
    }
    .swiper-pagination{
        color: var(--light-primary-hover);
    }
</style>

  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

    <div class="swiper-slide">
      <video src="./assets/slider/the.mp4" muted autoplay loop></video>
      </div>

      <div class="swiper-slide">
      <video src="./assets/slider/video2.mp4" muted autoplay loop></video>
    </div>


    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <!-- <div class="swiper-pagination"></div> -->
  </div>


  <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> 

  <!-- Initialize Swiper -->
  <script> 
    var swiper = new Swiper(".mySwiper", {
      cssMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      mousewheel: true,
      keyboard: true,
    });
  </script> 
            <section class="hero" aria-label="banner">
                <div class="banner-card">
                    <h1 class="display-large">Your Desired Dish</h1>
                    <div class="search-wrapper" data-search-form>
                        <span class="material-symbols-outlined leading-icon" aria-hidden="true">local_dining</span>
                        
                        <input type="search" name="search" aria-label="Search recipes" placeholder="Search recipes..." class="search-field body-medium" data-search-field> 

                        <button class="search-submit" aria-label="Submit" data-search-btn>
                            <span class="material-symbols-outlined" aria-hidden="true">search</span>
                        </button>
                    </div>
                    <p class="label-medium">
                        Search any recipe e.g: burger, pizza, sandwich, toast.
                    </p>
                </div>
            </section>

            <!-- TAB -->
            <section class="section tab">
                <div class="container">
                    <div class="tab-list" data-tab-list role="tab-list" aria-label="Meal Type">
                        <button class="tab-btn title-small" role="tab" id="tab-1" tabindex="0" aria-controls="panel-1" aria-selected="true" data-tab-btn>Breakfast</button>

                        <button class="tab-btn title-small" role="tab" id="tab-2" tabindex="-1" aria-controls="panel-2" aria-selected="false" data-tab-btn>Lunch</button>

                        <button class="tab-btn title-small" role="tab" id="tab-3" tabindex="-1" aria-controls="panel-3" aria-selected="false" data-tab-btn>Dinner</button>

                        <button class="tab-btn title-small" role="tab" id="tab-4" tabindex="-1" aria-controls="panel-4" aria-selected="false" data-tab-btn>Snack</button>

                        <button class="tab-btn title-small" role="tab" id="tab-5" tabindex="-1" aria-controls="panel-5" aria-selected="false" data-tab-btn>Teatime</button>
                    </div>

                    <div class="tab-panel" role="tabpanel" id="panel-1" aria-labelledby="tab-1" tabindex="0" data-tab-panel></div>
                    <div class="tab-panel" role="tabpanel" id="panel-2" aria-labelledby="tab-2" tabindex="0" data-tab-panel hidden>Lunch</div>
                    <div class="tab-panel" role="tabpanel" id="panel-3" aria-labelledby="tab-3" tabindex="0" data-tab-panel hidden>Dinner</div>
                    <div class="tab-panel" role="tabpanel" id="panel-4" aria-labelledby="tab-4" tabindex="0" data-tab-panel hidden>Snack</div>
                    <div class="tab-panel" role="tabpanel" id="panel-5" aria-labelledby="tab-5" tabindex="0" data-tab-panel hidden>Teatime</div>
                </div>
            </section>

            <!-- RECIPE SLIDER -->
            <section class="section slider-section" aria-labelledby="slider-label-1" data-slider-section></section>

            <!-- RECIPE SLIDER -->
            <section class="section slider-section" aria-labelledby="slider-label-1" data-slider-section>
                <div class="container">
                    <h2 class="section-title headline-small" id="slider-label-1">
                        Latest French Recipes
                    </h2>

                    <div class="slider">
                        <ul class="slider-wrapper" data-slider-wrapper>

                            <li class="slider-item">
                                <div class="card">
                                    <figure class="card-media img-holder">
                                        <img src="./assets/images/recipe.jpg" alt="Recipe name" width="200" height="200" loading="lazy"  class="img-cover">
                                    </figure>
                                    <div class="card-body">
                                        <h3 class="title-small">
                                            <a href="./detail.php" class="card-link">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, inventore iste. Exercitationem, quas nihil fugit nostrum quia molestiae ullam deleniti. Sint, accusantium voluptate. Aperiam explicabo distinctio iusto. Eum, pariatur commodi?</a>
                                        </h3>
                                        <div class="meta-wrapper">
                                            <div class="meta-item">
                                                <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                                <span class="label-medium">2 minutes</span>
                                            </div>
                                            <button class="icon-btn has-state removed" aria-label="Add to saved recipes">
                                                <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                                <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="slider-item">
                                <div class="card">
                                    <figure class="card-media img-holder">
                                        <img src="./assets/images/recipe.jpg" alt="Recipe name" width="200" height="200" loading="lazy"  class="img-cover">
                                    </figure>
                                    <div class="card-body">
                                        <h3 class="title-small">
                                            <a href="./detail.php" class="card-link">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, inventore iste. Exercitationem, quas nihil fugit nostrum quia molestiae ullam deleniti. Sint, accusantium voluptate. Aperiam explicabo distinctio iusto. Eum, pariatur commodi?</a>
                                        </h3>
                                        <div class="meta-wrapper">
                                            <div class="meta-item">
                                                <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                                <span class="label-medium">2 minutes</span>
                                            </div>
                                            <button class="icon-btn has-state removed" aria-label="Add to saved recipes">
                                                <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                                <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="slider-item">
                                <div class="card">
                                    <figure class="card-media img-holder">
                                        <img src="./assets/images/recipe.jpg" alt="Recipe name" width="200" height="200" loading="lazy"  class="img-cover">
                                    </figure>
                                    <div class="card-body">
                                        <h3 class="title-small">
                                            <a href="./detail.php" class="card-link">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, inventore iste. Exercitationem, quas nihil fugit nostrum quia molestiae ullam deleniti. Sint, accusantium voluptate. Aperiam explicabo distinctio iusto. Eum, pariatur commodi?</a>
                                        </h3>
                                        <div class="meta-wrapper">
                                            <div class="meta-item">
                                                <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                                <span class="label-medium">2 minutes</span>
                                            </div>
                                            <button class="icon-btn has-state removed" aria-label="Add to saved recipes">
                                                <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                                <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="slider-item">
                                <div class="card">
                                    <figure class="card-media img-holder">
                                        <img src="./assets/images/recipe.jpg" alt="Recipe name" width="200" height="200" loading="lazy"  class="img-cover">
                                    </figure>
                                    <div class="card-body">
                                        <h3 class="title-small">
                                            <a href="./detail.php" class="card-link">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, inventore iste. Exercitationem, quas nihil fugit nostrum quia molestiae ullam deleniti. Sint, accusantium voluptate. Aperiam explicabo distinctio iusto. Eum, pariatur commodi?</a>
                                        </h3>
                                        <div class="meta-wrapper">
                                            <div class="meta-item">
                                                <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                                <span class="label-medium">2 minutes</span>
                                            </div>
                                            <button class="icon-btn has-state removed" aria-label="Add to saved recipes">
                                                <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                                <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="slider-item" data-slider-item>
                                <a href="./recipes.php " class="load-more-card has-state">
                                    <span class="label-large">Show more</span>
                                    
                                    <span class="material-symbols-outlined" aria-hidden="true">navigate_next</span>
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </section>

            <!-- TAGS -->
            <section class="section tag" aria-label="tag-label">
                <div class="container">
                    <h2 class="section-title display-small" id="tag-label">
                        Choose your health preference.
                    </h2>
                    <p class="body-medium section-text">
                        Choosing your health preference is an important step towards achieving a healthier lifestyle.
                    </p>
                    <div class="tag-list">

                        <a href="./recipes.php?health=wheat-free" class="badge-btn body-medium">Wheat-Free</a>
                        <a href="./recipes.php?health=vegetarian" class="badge-btn body-medium">Vegetarian</a>
                        <a href="./recipes.php?health=vegan" class="badge-btn body-medium">Vegan</a>
                        <a href="./recipes.php?health=tree-nut-free" class="badge-btn body-medium">Tree-nut-Free</a>
                        <a href="./recipes.php?health=sulfite-free" class="badge-btn body-medium">Sulfite-Free</a>
                        <a href="./recipes.php?health=sugar-conscious" class="badge-btn body-medium">Sugar-Conscious</a>
                        <a href="./recipes.php?health=soy-free" class="badge-btn body-medium">Soy-Free</a>
                        <a href="./recipes.php?health=shellfish-free" class="badge-btn body-medium">Shellfish-Free</a>
                        <a href="./recipes.php?health=sesame-free" class="badge-btn body-medium">Sesame-Free</a>
                        <a href="./recipes.php?health=red-meat-free" class="badge-btn body-medium">Red-Meat-Free</a>
                        <a href="./recipes.php?health=pork-free" class="badge-btn body-medium">Pork-Free</a>
                        <a href="./recipes.php?health=pecatarian" class="badge-btn body-medium">Pecatarian</a>
                        <a href="./recipes.php?health=peanut-free" class="badge-btn body-medium">Peanut-Free</a>
                        <a href="./recipes.php?health=paleo" class="badge-btn body-medium">Paleo</a>
                        <a href="./recipes.php?health=No-oil-added" class="badge-btn body-medium">No-Oil-Added</a>
                        <a href="./recipes.php?health=mustard-free" class="badge-btn body-medium">Mustard-Free</a>
                        <a href="./recipes.php?health=mollusk-free" class="badge-btn body-medium">Mollusk-Free</a>
                        <a href="./recipes.php?health=Mediterranean" class="badge-btn body-medium">Mediterranean</a>
                        <a href="./recipes.php?health=lupine-free" class="badge-btn body-medium">Lupine-Free</a>
                        <a href="./recipes.php?health=low-sugar" class="badge-btn body-medium">Low-Sugar</a>
                        <a href="./recipes.php?health=low-potassium" class="badge-btn body-medium">Low-Potassium</a>
                        <a href="./recipes.php?health=kosher" class="badge-btn body-medium">Kosher</a>
                        <a href="./recipes.php?health=kidney-friendly" class="badge-btn body-medium">Kidney-Friendly</a>
                        <a href="./recipes.php?health=keto-friendly" class="badge-btn body-medium">Keto-Friendly</a>
                        <a href="./recipes.php?health=immuno-supportive" class="badge-btn body-medium">Immuno-Supportive</a>
                        <a href="./recipes.php?health=gluten-free" class="badge-btn body-medium">Gluten-Free</a>
                        <a href="./recipes.php?health=fodmap-free" class="badge-btn body-medium">Fodmap-Free</a>
                        <a href="./recipes.php?health=fish-free" class="badge-btn body-medium">Fish-Free</a>
                        <a href="./recipes.php?health=egg-free" class="badge-btn body-medium">Egg-Free</a>
                        <a href="./recipes.php?health=DASH" class="badge-btn body-medium">DASH</a>
                        <a href="./recipes.php?health=dairy-free" class="badge-btn body-medium">Dairy-Free</a>
                        <a href="./recipes.php?health=crustacean-free" class="badge-btn body-medium">Crustacean-Free</a>
                        <a href="./recipes.php?health=celery-free" class="badge-btn body-medium">Celery-Free</a>
                        <a href="./recipes.php?health=alcohol-free" class="badge-btn body-medium">Alcohol-Free</a>
                        <a href="./recipes.php?health=alcohol-cocktail" class="badge-btn body-medium">Alcohol-Cocktail</a>

                    </div>
                </div>
            </section>

            <!-- HERO -->
              <section class="hero-f">
                    <div class="container">
                    <div class="hero__wrapper">
                        <div class="hero__left" data-aos="fade-left">
                        <div class="hero__left__wrapper">
                
                            <h1 class="hero__heading display-large">The flavor of tradition</h1>
                            <p class="hero__info body-large">
                            We are a multi-cuisine restaurant offering a wide variety of food experience in both casual and fine
                            dining
                            environment.
                            </p>
                            <div class="button__wrapper">
                            <a href="./recipes.php" class="btn btn-primary has-state">Explore Recipes</a>
                            </div>
                        </div>
                        </div>
                        <div class="hero__right" data-aos="fade-right">
                        <div class="hero__imgWrapper">
                            <img src="./assets/images/heroImg.png">
                        </div>
                        </div>
                    </div>
                    </div>
            </section>
        

            <!-- CONTACT FORM -->
            <div class="container contact" id="contact">
                <span class="big-circle"></span>
                <img src="./assets/images/shape.png" class="square" alt="" />
                <div class="form">
                  <div class="contact-info">
                    <h3 class="section-title display-small">Want to get in touch?</h3>
                    <p class="body-medium section-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                      dolorum adipisci recusandae praesentium dicta!
                    </p>
          
                    <div class="info">
                      <div class="information body-medium section-text">
                        <img src="./assets/images/email.png" class="icon" alt="" />
                        <p>lorem@ipsum.com</p>
                      </div>
                      <div class="information body-medium section-text">
                        <img src="./assets/images/phone.png" class="icon" alt="" />
                        <p>123-456-789</p>
                      </div>
                    </div>
          
                    <div class="social-media">
                      <p class="label-large">Connect with us :</p>
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
          
                  <div class="contact-form">
                    <span class="circle one"></span>
                    <span class="circle two"></span>
          
                    <form action="index.php" autocomplete="off">
                      <h3 class="section-title display-small">Contact us</h3>
                        <div class="input-outlined">
                            <label class="body-large label">Name</label>
                            <input type="text" class="input-field body-large" placeholder="Full name">
                        </div>
                        <div class="input-outlined">
                            <label class="body-large label">Email</label>
                            <input type="email" class="input-field body-large" placeholder="Email">
                        </div>
                        <div class="input-outlined textarea">
                            <label class="body-large label">Message</label>
                            <textarea class="input-field body-large" placeholder="Message"></textarea>
                        </div>
                        <input type="submit" value="Send" name="contactSubmit" class="btn btn-primary label-large has-state"/>
                    </form>
                  </div>
                </div>
              </div>
              <script
              src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"
            ></script>

        </article>
    </main>


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
                    <li><a href="#contact">Contact Us</a></li>
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
