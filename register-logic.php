<?php
require 'config/database.php';


//  SIGN UP

if(isset($_POST['submit'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
   
    

    if(!$name){
        $_SESSION['signup'] = "Please enter your name";
    }
    elseif(!$username){
        $_SESSION['signup'] = "Please enter a valid username";
    }
    elseif(!$email){
        $_SESSION['signup'] = "Please enter a valid email";
    }
    elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['signup'] = "Password should be 8+ characters";
    }
    elseif(!$avatar['name']){
        $_SESSION['signup'] = "Please add avatar";
    }
    else{
        if($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        }
        else{
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exists";
            }
            else{
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'upload/' . $avatar_name;

                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if(in_array($extention, $allowed_files)){
                    if($avatar['size'] < 1000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }
                    else{
                        $_SESSION['signup'] = "Flie size too large. Should be less than 1MB";
                    }
                }
                else{
                    $_SESSION['signup'] = "File should be png, jpg, jpeg";
                }
            }
        }
    }

    if(isset($_SESSION['signup'])){
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'register.php');
        die();
    }
    else{
        $insert_user_query = "INSERT INTO users (name, username, email, password, avatar, is_admin) VALUES('$name', '$username', '$email', '$hashed_password', '$avatar_name', 0)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Registration Successful. Please log in";
            header('location: ' . ROOT_URL . 'login.php');
            die();
        }
    }

}
else{
    header('location: ' . ROOT_URL . 'register.php');
    die();
}

?>