<?php
require 'config/database.php';

if(isset($_POST['updatebtn'])){
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $email = $_POST['update_email'];
    $password = $_POST['update_password'];
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

    $query = "UPDATE users SET name='$name', email='$email', password='$password', avatar='$image_data' WHERE id='$id'";
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
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
  </div>

  <div class="card-body">
    <?php
    if(isset($_POST['btnedit'])){
        $id = $_POST['ed_id'];

        $query = "SELECT * FROM users WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);
      

    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="update_id"  value="<?php  echo $row['id'] ?>">
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="update_name" value="<?php  echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="update_email"  value="<?php  echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="update_password"  class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
                <label>Upload Image</label>
                <input type="file"name="avatar" id="avatar" value="<?php  echo $row['avatar'] ?>" class="form-control">
            </div>
        <a href="profile.php" class="btn btn-danger">CANCEL</a>
        <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
    </form>
    <?php
       }
    
    ?>


  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
// include('includes/scripts.php');
// include('includes/footer.php');
?>