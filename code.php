<?php

require 'config/database.php';

if(isset($_POST['update'])){
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    // $password = $_POST['update_password'];
    $avatar = $_FILES['avatar']['name'];
    
    $img_types = array('image/png','image/jpg','image/jpeg');
    $validate_img_extension = in_array($_FILES["avatar"]["type"], $img_types);

    if($validate_img_extension){

    $reg_query = "SELECT * FROM users WHERE id='$id'";
    $reg_query_run = mysqli_query($connection, $reg_query);
    foreach($reg_query_run as $reg_row){
        if($avatar == NULL){
            $image_data = $reg_row['avatar'];
        }
        else{
            if($img_path = "upload/".$reg_row['avatar']){
                unlink($img_path);
                $image_data = $avatar;

            }
        }
    }

    $query = "UPDATE users SET name='$name', username='$username', email='$email', password='$password', avatar='$image_data' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        if($avatar == NULL){
            $_SESSION['success'] =  "Your data is updated with existing image";
            header('Location: profile.php');
        }
        else{
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "upload/".$_FILES["avatar"]["name"]);
            $_SESSION['success'] =  "Your data is updated";
            header('Location: profile.php');
        }
    }
    else 
    {
        $_SESSION['status'] =  "Your data is not updated";
        header('Location: profile.php');
    }
} 
else{
    $_SESSION['status'] = "Only PNG, JGP, JPEG";
    header('Location: profile.php');
}
}

// delete

// if(isset($_POST['delete_btn'])){
//     $id = $_POST['delete_id'];

//     $query = "DELETE FROM users WHERE id='$id'";
//     $query_run = mysqli_query($connection, $query);

//     if($query_run){
        
//         $_SESSION['success'] =  "Your data is deleted";
//         header('Location: register.php');
//     }
//     else 
//     {
//         $_SESSION['status'] =  "Your data is not deleted";
//         header('Location: register.php');
//     }
// } 



// Search 

// if(isset($_POST['search_data'])){
//     $id = $_POST['id'];
//     $visible = $_POST['visible'];

//     $query = "UPDATE users SET visible='$visible' WHERE id='$id'";
//     $query_run = mysqli_query($connection, $query);
// }







?>