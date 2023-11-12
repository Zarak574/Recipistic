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
    <script src="./assets/js/recipes.js" type='module'></script>
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
                <li><a href="./recipes.php" class="navbar-link title-small has-state active">Recipes</a></li>
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
        <article class="article recipe-page">

            <!-- FILTER BAR -->
            <div class="filter-bar" data-filter-bar>

                <div class="title-wrapper">
                    <span class="material-symbols-outlined" aria-hidden="true">filter_list</span>
                    <p class="title-medium">Filters</p>
                    <button class="icon-btn close-btn has-state" aria-label="Close filter bar" data-filter-toggler>
                        <span class="material-symbols-outlined" aria-hidden="true">close</span>
                    </button>
                </div>

                <div class="filter-content">

                   <div class="search-wrapper">
                    <div class="input-outlined">
                        <label for="search" class="body-large label">Search</label>
                        <input type="search" name="search" id="search" class="input-field body-large" placeholder="Search recipes">
                    </div>
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="cook-time" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">timer</span>
                        <p class="label-large">Cooking Time</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="cook-time">
                        <div class="accordion-overflow" data-filter="time">

                            <label class="filter-chip label-large">
                                &lt; 5 minutes
                                <input type="radio" name="cook-time" value="5" aria-label="5 or less minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                5 - 10 minutes
                                <input type="radio" name="cook-time" value="5-10" aria-label="5 to 10 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                10 - 20 minutes
                                <input type="radio" name="cook-time" value="10-20" aria-label="10 to 20 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                20 - 30 minutes
                                <input type="radio" name="cook-time" value="20-30" aria-label="20 to 30 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                30 - 40 minutes
                                <input type="radio" name="cook-time" value="30-40" aria-label="30 to 40 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                40 - 50 minutes
                                <input type="radio" name="cook-time" value="40-50" aria-label="40 to 50 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                50 - 60 minutes
                                <input type="radio" name="cook-time" value="50-60" aria-label="50 to 60 minutes"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                &gt; 1 hours
                                <input type="radio" name="cook-time" value="60+" aria-label="1 or more hours"class="checkbox">
                            </label>

                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="ingr" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">nutrition</span>
                        <p class="label-large">Ingredients</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="ingr">
                        <div class="accordion-overflow" data-filter="ingr">

                            <label class="filter-chip label-large">
                                &lt; 5 ingredients
                                <input type="radio" name="ingr" value="5" aria-label="5 or less ingredients"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                5 - 10 ingredients
                                <input type="radio" name="ingr" value="5-10" aria-label="5 to 10 ingredients"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                10 - 20 ingredients
                                <input type="radio" name="ingr" value="10-20" aria-label="10 to 20 ingredients"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                20 - 30 ingredients
                                <input type="radio" name="ingr" value="20-30" aria-label="20 to 30 ingredients"class="checkbox">
                            </label>


                            <label class="filter-chip label-large">
                                &gt; 30 ingredients
                                <input type="radio" name="ingr" value="30+" aria-label="30 or more ingredients"class="checkbox">
                            </label>

                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="calories" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">ulna_radius_alt</span>
                        <p class="label-large">Calories</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="calories">
                        <div class="accordion-overflow" data-filter="calories">

                            <label class="filter-chip label-large">
                                &lt; 50 calories
                                <input type="radio" name="calories" value="50" aria-label="50 or less calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                50 - 100 calories
                                <input type="radio" name="calories" value="50-100" aria-label="50 to 100 calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                100 - 200 calories
                                <input type="radio" name="calories" value="100-200" aria-label="100 to 200 calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                200 - 300 calories
                                <input type="radio" name="calories" value="200-300" aria-label="200 to 300 calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                300 - 400 calories
                                <input type="radio" name="calories" value="300-400" aria-label="300 to 400 calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                400 - 500 calories
                                <input type="radio" name="calories" value="400-500" aria-label="400 to 500 calories"class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                &gt; 500  calories
                                <input type="radio" name="calories" value="500+" aria-label="500 or more calories"class="checkbox">
                            </label>

                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="diet" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">spa</span>
                        <p class="label-large">Diet</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="diet">
                        <div class="accordion-overflow" data-filter="diet">

                            <label class="filter-chip label-large">
                                Balanced
                                <input type="checkbox" name="Balanced" aria-label="Balanced" value="balanced" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                High Fiber
                                <input type="checkbox" name="High Fiber" aria-label="High Fiber" value="high-fiber" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                High Protein
                                <input type="checkbox" name="High Protein" aria-label="High Protein" value="high-protein" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Low Carb
                                <input type="checkbox" name="Low Carb" aria-label="Low Carb" value="low-carb" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Low Fat
                                <input type="checkbox" name="Low Fat" aria-label="Low Fat" value="low-fat" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Low Sodium
                                <input type="checkbox" name="Low Sodium" aria-label="Low Sodium" value="low-sodium" class="checkbox">
                            </label>
                            
                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="health" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">health_and_safety</span>
                        <p class="label-large">Health</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="health">
                        <div class="accordion-overflow" data-filter="health">

                            <label class="filter-chip label-large">
                                Alcohol Cocktail
                                <input type="checkbox" name="Alcohol Cocktail" aria-label="Alcohol Cocktail" value="alcohol-cocktail" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Alcohol Free
                                <input type="checkbox" name="Alcohol Free" aria-label="Alcohol Free" value="alcohol-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Celery Free
                                <input type="checkbox" name="Celery Free" aria-label="Celery Free" value="celery-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Crustcean Free
                                <input type="checkbox" name="Crustcean Free" aria-label="Crustcean Free" value="crustacean-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Dairy Free
                                <input type="checkbox" name="Dairy Free" aria-label="Dairy Free" value="dairy-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                DASH
                                <input type="checkbox" name="DASH" aria-label="DASH" value="DASH" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Egg Free
                                <input type="checkbox" name="Egg Free" aria-label="Egg Free" value="egg-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Fish Free
                                <input type="checkbox" name="Fish Free" aria-label="Fish Free" value="fish-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                FODMAP Free
                                <input type="checkbox" name="FODMAP Free" aria-label="FODMAP Free" value="fodmap-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Gluten Free
                                <input type="checkbox" name="Gluten Free" aria-label="Gluten Free" value="gluten-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Immuno Supportive
                                <input type="checkbox" name="Immuno Supportive" aria-label="Immuno Supportive" value="immuno-supportive" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Keto Friendly
                                <input type="checkbox" name="Keto Friendly" aria-label="Keto Friendly" value="keto-friendly" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Kidney Friendly
                                <input type="checkbox" name="Kidney Friendly" aria-label="Kidney Friendly" value="kidney-friendly" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Kosher
                                <input type="checkbox" name="Kosher" aria-label="Kosher" value="kosher" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Low Fat Abs
                                <input type="checkbox" name="Low Fat Abs" aria-label="Low Fat Abs" value="low-fat-abs" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Low Potassium
                                <input type="checkbox" name="Low Potassium" aria-label="Low Potassium" value="low-potassium" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Low Sugar
                                <input type="checkbox" name="Low Sugar" aria-label="Low Sugar" value="low-sugar" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Lupine Free
                                <input type="checkbox" name="Lupine Free" aria-label="Lupine Free" value="lupine-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Mediterranean
                                <input type="checkbox" name="Mediterranean" aria-label="Mediterranean" value="Mediterranean" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Mollusk Free
                                <input type="checkbox" name="Mollusk Free" aria-label="Mollusk Free" value="mollusk-free" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Mustard Free
                                <input type="checkbox" name="Mustard Free" aria-label="Mustard Free" value="mustard-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                No oil added
                                <input type="checkbox" name="No oil added" aria-label="No oil added" value="no-oil-added" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Paleo
                                <input type="checkbox" name="Paleo" aria-label="Paleo" value="paleo" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Peanut Free
                                <input type="checkbox" name="Peanut Free" aria-label="Peanut Free" value="peanut-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Pescatarian
                                <input type="checkbox" name="Pescatarian" aria-label="Pescatarian" value="pescatarian" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Pork Free
                                <input type="checkbox" name="Pork Free" aria-label="Pork Free" value="pork-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Red Meat Free
                                <input type="checkbox" name="Red Meat Free" aria-label="Red Meat Free" value="red-meat-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Sesame Free
                                <input type="checkbox" name="Sesame Free" aria-label="Sesame Free" value="sesame-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Shellfish-Free
                                <input type="checkbox" name="Shellfish-Free" aria-label="Shellfish-Free" value="shellfish-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Soy Free
                                <input type="checkbox" name="Soy Free" aria-label="Soy Free" value="soy-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Sugar Conscious
                                <input type="checkbox" name="Sugar Conscious" aria-label="Sugar Conscious" value="sugar-conscious" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Sulfite Free
                                <input type="checkbox" name="Sulfite Free" aria-label="Sulfite Free" value="sulfite-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Tree Nut Free
                                <input type="checkbox" name="Tree Nut Free" aria-label="Tree Nut Free" value="tree-nut-free" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Vegan
                                <input type="checkbox" name="Vegan" aria-label="Vegan" value="vegan" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Vegetarian
                                <input type="checkbox" name="Vegetarian" aria-label="Vegetarian" value="vegetarian" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Wheat Free
                                <input type="checkbox" name="Wheat Free" aria-label="Wheat Free" value="wheat-free" class="checkbox">
                            </label>
                            
                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="meal" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">restaurant</span>
                        <p class="label-large">Meal</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="meal">
                        <div class="accordion-overflow" data-filter="mealType">

                            <label class="filter-chip label-large">
                                Breakfast
                                <input type="checkbox" name="Breakfast" aria-label="Breakfast" value="breakfast" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Dinner
                                <input type="checkbox" name="Dinner" aria-label="Dinner" value="dinner" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                               Lunch
                                <input type="checkbox" name="Lunch" aria-label="Lunch" value="lunch" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Snack
                                <input type="checkbox" name="Snack" aria-label="Snack" value="snack" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Teatime
                                <input type="checkbox" name="Teatime" aria-label="Teatime" value="teatime" class="checkbox">
                            </label>
                            
                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="dish" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">fastfood</span>
                        <p class="label-large">Dish</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="dish">
                        <div class="accordion-overflow" data-filter="dishType">

                            <label class="filter-chip label-large">
                                Biscuits and cookies
                                <input type="checkbox" name="Biscuits and cookies" aria-label="Biscuits and cookies" value="biscuits and cookies" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Bread
                                <input type="checkbox" name="Bread" aria-label="Bread" value="bread" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                               Cereals
                                <input type="checkbox" name="Cereals" aria-label="Cereals" value="cereals" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Condiments and sauces
                                <input type="checkbox" name="Condiments and sauces" aria-label="Condiments and sauces" value="condiments and sauces" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Desserts
                                <input type="checkbox" name="Desserts" aria-label="Desserts" value="desserts" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Drinks
                                <input type="checkbox" name="Drinks" aria-label="Drinks" value="drinks" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Main course
                                <input type="checkbox" name="Main course" aria-label="Main course" value="main course" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Pancake
                                <input type="checkbox" name="Pancake" aria-label="Pancake" value="pancake" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Preps
                                <input type="checkbox" name="Preps" aria-label="Preps" value="preps" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Preserve
                                <input type="checkbox" name="Preserve" aria-label="Preserve" value="preserve" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Salad
                                <input type="checkbox" name="Salad" aria-label="Salad" value="salad" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Sandwiches
                                <input type="checkbox" name="Sandwiches" aria-label="Sandwiches" value="sandwiches" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Side dish
                                <input type="checkbox" name="Side dish" aria-label="Side dish" value="side dish" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Soup
                                <input type="checkbox" name="Soup" aria-label="Soup" value="soup" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Starter
                                <input type="checkbox" name="Starter" aria-label="Starter" value="starter" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Sweets
                                <input type="checkbox" name="Sweets" aria-label="Sweets" value="sweets" class="checkbox">
                            </label>
                            
                        </div>
                    </div>
                    
                   </div>

                   <div class="accordion-container" data-accordion>
                    <button class="accordion-btn has-state" aria-controls="cuisine" aria-expanded="false" data-accordion-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">public</span>
                        <p class="label-large">Cuisine</p>
                        <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                    </button>

                    <div class="accordion-content" id="cuisine">
                        <div class="accordion-overflow" data-filter="cuisineType">

                            <label class="filter-chip label-large">
                                American
                                <input type="checkbox" name="American" aria-label="American" value="american" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Asian
                                <input type="checkbox" name="Asian" aria-label="Asian" value="asian" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                               British
                                <input type="checkbox" name="British" aria-label="British" value="british" class="checkbox">
                            </label>

                            <label class="filter-chip label-large">
                                Caribbean
                                <input type="checkbox" name="Caribbean" aria-label="Caribbean" value="caribbean" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Central Europe
                                <input type="checkbox" name="Central Europe" aria-label="Central Europe" value="central europe" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Chinese
                                <input type="checkbox" name="Chinese" aria-label="Chinese" value="chinese" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Eastern Europe
                                <input type="checkbox" name="Eastern Europe" aria-label="Eastern Europe" value="eastern europe" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                French
                                <input type="checkbox" name="French" aria-label="French" value="french" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Indian
                                <input type="checkbox" name="Indian" aria-label="Indian" value="indian" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Italian
                                <input type="checkbox" name="Italian" aria-label="Italian" value="italian" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Japanese
                                <input type="checkbox" name="Japanese" aria-label="Japanese" value="japanese" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Kosher
                                <input type="checkbox" name="Kosher" aria-label="Kosher" value="kosher" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Mediterranean
                                <input type="checkbox" name="Mediterranean" aria-label="Mediterranean" value="mediterranean" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Mexican
                                <input type="checkbox" name="Mexican" aria-label="Mexican" value="mexican" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Middle Eastern
                                <input type="checkbox" name="Middle Eastern" aria-label="Middle Eastern" value="middle eastern" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                Nordic
                                <input type="checkbox" name="Nordic" aria-label="Nordic" value="nordic" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                South American
                                <input type="checkbox" name="South American" aria-label="South American" value="south american" class="checkbox">
                            </label>
                            
                            <label class="filter-chip label-large">
                                South East Asian
                                <input type="checkbox" name="South East Asian" aria-label="South East Asian" value="south east asian" class="checkbox">
                            </label>
                            
                        </div>
                    </div>
                    
                   </div>

                </div>

                <div class="filter-actions">
                    <button class="btn btn-secondary label-large has-state" data-filter-clear>
                        Clear
                    </button>
                    <button class="btn btn-primary label-large" data-filter-toggler data-filter-submit>
                        Apply
                    </button>
                </div>

            </div>

            <div class="overlay" data-overlay data-filter-toggler></div>

            <div class="recipe-container container">

                <div class="title-wrapper">
                    <h2 class="headline-small">All Recipes</h2>
                    <button class="btn btn-secondary btn-filter has-state has-icon" aria-label="Open filter bar" data-filter-toggler data-filter-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">filter_list</span>
                        <div class="wrapper">
                            <span class="label-large">Filters</span>
                            <div class="badge label-small" data-filter-count></div>
                        </div>
                    </button>
                </div>

                <div class="grid-list" data-grid-list></div>
                <div class="load-more grid-list" data-load-more>
                    <p class="body-medium info-text"></p>
                </div>

            </div>

        </article>
    </main>
<br><br><br><br><br><br>
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

