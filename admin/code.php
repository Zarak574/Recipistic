<?php

include('security.php');
require 'database/dbconfig.php';

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
    $usertype =  $_POST['usertype'];
    $images =  $_FILES['reg_image']['name'];

    $img_types = array('image/png','image/jpg','image/jpeg');
    $validate_img_extension = in_array($_FILES["reg_image"]["type"], $img_types);

    if($validate_img_extension){

        $email_query = "SELECT * FROM register WHERE email='$email'";
        $email_query_run = mysqli_query($connection, $email_query);

        if(mysqli_num_rows($email_query_run) > 0 ){
            $_SESSION['status'] =  "Email already taken";
            header('Location: register.php');
        }

        else{

            if(file_exists("upload/".$_FILES["reg_image"]["name"])){
                $store = $_FILES["reg_image"]["name"];
                $_SESSION['status'] = "Image already exists. '.$store.'";
                header('Location: register.php');
            }
            else{
                if($password === $confirm_password)
                {
                    $query = "INSERT INTO register (username,email,password,usertype,images) VALUES ('$username','$email','$password','$usertype','$images')";
                    $query_run = mysqli_query($connection, $query);
                
                    if($query_run)
                    {
                        move_uploaded_file($_FILES["reg_image"]["tmp_name"], "upload/".$_FILES["reg_image"]["name"]);
                        $_SESSION['success'] =  "Admin is Added Successfully";
                        header('Location: register.php');
                    }
                    else 
                    {
                        $_SESSION['status'] =  "Admin is Not Added";
                        header('Location: register.php');
                    }
                }
                else{
                    $_SESSION['status'] =  "Password and Confirm Password Does not Match";
                    header('Location: register.php');
                }
            }
        }

    }
    else{
        $_SESSION['status'] = "Only PNG, JGP, JPEG";
        header('Location: register.php');
    }
}



if(isset($_POST['updatebtn'])){
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];
    $images =  $_FILES['reg_image']['name'];


    
    $img_types = array('image/png','image/jpg','image/jpeg');
    $validate_img_extension = in_array($_FILES["reg_image"]["type"], $img_types);

    if($validate_img_extension){

    $reg_query = "SELECT * FROM register WHERE id='$id'";
    $reg_query_run = mysqli_query($connection, $reg_query);
    foreach($reg_query_run as $reg_row){
        if($images == NULL){
            $image_data = $reg_row['images'];
        }
        else{
            if($img_path = "upload/".$reg_row['images']){
                unlink($img_path);
                $image_data = $images;

            }
        }
    }

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate', images='$image_data' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        if($images == NULL){
            $_SESSION['success'] =  "Your data is updated with existing image";
            header('Location: register.php');
        }
        else{
            move_uploaded_file($_FILES["reg_image"]["tmp_name"], "upload/".$_FILES["reg_image"]["name"]);
            $_SESSION['success'] =  "Your data is updated";
            header('Location: register.php');
        }
    }
    else 
    {
        $_SESSION['status'] =  "Your data is not updated";
        header('Location: register.php');
    }
} 
else{
    $_SESSION['status'] = "Only PNG, JGP, JPEG";
    header('Location: register.php');
}
}



if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        
        $_SESSION['success'] =  "Your data is deleted";
        header('Location: register.php');
    }
    else 
    {
        $_SESSION['status'] =  "Your data is not deleted";
        header('Location: register.php');
    }
} 






if(isset($_POST['login_btn'])){
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run); 

    if($usertypes['usertype'] == "admin"){
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else if($usertypes['usertype'] == "user"){
        $_SESSION['username'] = $email_login;
        header('Location: ../index.php');
    }
    else 
    {
        $_SESSION['status'] =  "Email or Password is invalid";
        header('Location: login.php');
    }
} 




if(isset($_POST['search_data'])){
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE register SET visible='$visible' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
}




if(isset($_POST['delete_multiple_data'])){
    $id = "1";

    $query = "DELETE FROM register WHERE visible='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        
        $_SESSION['success'] =  "Your data is deleted";
        header('Location: register.php');
    }
    else 
    {
        $_SESSION['status'] =  "Your data is not deleted";
        header('Location: register.php');
    }
}









?>