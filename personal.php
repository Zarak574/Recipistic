<?php
// include('./includes/header.php'); 
// include('includes/navbar.php'); 
require 'config/database.php';


if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $info = mysqli_fetch_assoc($result);
}


echo $id;

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control check_email" placeholder="Enter Email">
                <small class="error-email" style="color:red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="reg_image" id="reg_image" class="form-control">
            </div>

            <input type="hidden" name="usertype" value="admin">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profile Information
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php if(isset($_SESSION['user-id'])) : ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name </th>
            <th>Email </th>
            <th>Avatar</th>
            <th>EDIT </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php  echo $info['name']; ?></td>
            <td><?php  echo $info['email']; ?></td>
            <td><?php echo'<img src="upload/'.$info['avatar'].'" width="50px" height="50px" style="border-radius: 50%;" alt="Image">'?></td>
            <td>
                <form action="user/register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $info['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
          </tr>
          
        
        </tbody>
      </table>
      <?php else: ?>
                <div class="alert_message error"><?= "No users found" ?></div>
            <?php endif ?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


<?php
// include('includes/scripts.php');
// include('includes/footer.php');
?>

