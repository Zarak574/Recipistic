<?php

require 'config/database.php';


if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}
else{
    header('location: ' . ROOT_URL . 'profile.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipistic - Cooking made easy.</title>
    <!-- META TAGS -->
    <meta name="title" content="Recipe Cookbook">
    <meta name="description" content="Recipes of all types provided">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/dashboard.css?<?php echo time(); ?>" >
   
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
    <!-- <link rel="stylesheet" href="./assets/css/style.css?<?php echo time(); ?>" /> -->
    <!-- CUSTOM JS -->
    <script src="./assets/js/global.js" type='module'></script>
    <script src="./assets/js/home.js" type='module'></script>
    <script src="./assets/js/main.js" type='module'></script>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


</head>
<body>

    <div class="container profile_info">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                <a href="./index.php" class="logo">
                    <img src="./assets/images/recipistic.png" alt="logo-light" class="logo-light" width="156" height="32">
                    <img src="./assets/images/recipistic.png" alt="logo-dark" class="logo-dark" width="156" height="32">
                </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="profile.php" class="active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Profile</h3>
                </a>
                <a href="./saved-recipes.php">
                    <span class="material-icons-sharp">
                        bookmark
                    </span>
                    <h3>Saved Recipes</h3>
                </a>
                <a href="#" >
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Message</h3>
                    <span class="message-count">27</span>
                </a>
                <!-- <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a> -->
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <!-- <a href="#" >
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a> -->
                <a href="<?= ROOT_URL ?>logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

<!-- Main Content -->
<main>
<h2>Profile Information</h2>
   
<div class="rightbox">
    <div class="profile">
        <!-- <div class="profile_img">
            <div class="profile-photo">
                <img src="<?= ROOT_URL . 'upload/' . $info['avatar'] ?>" alt="">
            </div>
            <h4>Profile Picture</h4>
        </div> -->
        <div class="profile_content">
            <form action="<?= ROOT_URL ?>code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="edit_id"  value="<?php  echo $user['id'] ?>">
                <h3>Name</h3>
                <input type="text" name="edit_name" class="input" placeholder="Enter Username">
                <h3>Username</h3>
                <input type="text" name="edit_username"  class="input" placeholder="Enter Username">
                <h3>Email</h3>
                <input type="text" name="edit_email"  class="input" placeholder="Enter Username">
                <h3>Avatar</h3>
                <input type="file"name="avatar" id="avatar"  class="input"><br><br>
                <button type="submit" name="update" class="btnedit">Update</button>
                <a href="profile.php" class="btnedit btn-danger">CANCEL</a>
            </form>
        </div>
    </div>
</div>

</main>
<!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>

                <div class="profile">
                    <div class="info">
                        <p><b><?php  echo $user['name']; ?></b></p>
                    </div>
                    <div class="profile-photo">
                        <img src="<?= ROOT_URL . 'upload/' . $user['avatar'] ?>" alt="">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

        </div>


    </div>

    <script>
        const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});




    </script>



</body>

</html>