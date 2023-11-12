<?php
// include 'security.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
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
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile <br><br>
        <form action="code.php" method="POST">
          <button type="submit" name="delete_multiple_data" class="btn  btn-danger">Delete Multiple Data</button>
        </form><br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

  <?php 
  
  if(isset($_SESSION['success']) && $_SESSION['success'] !='') 
  {
      echo '<h2 class="bg-danger text-white"> '.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
  }
  if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
  {
      echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);
  }

  ?>

    <div class="table-responsive">

    <?php 
    require 'config/database.php';
      $query = "SELECT * FROM users";
      $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td>Check</td>
            <th>ID </th>
            <th>Username </th>
            <th>Email </th>
            <th>UserType</th>
            <th>Image</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(mysqli_num_rows($query_run) > 0){
          while($row = mysqli_fetch_Assoc($query_run)){
           ?>
<tr>
            <td>
              <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php echo $row['id'] ?>" <?php echo $row['visible'] == 1 ? "checked" : "" ?> >
            </td>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['is_admin']; ?></td>
            <td><?php echo'<img style="border-radius:50%;" src="../upload/'.$row['avatar'].'" width="50px" height="50px" alt="Image">'?></td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
           <?php
          }
        }
        else{
          echo " no records found";
        }
        ?>
          
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<script>

function toggleCheckbox(box){
  var id = $(box).attr("value")

  if($(box).prop("checked") == true){
    var visible = 1;
  }
  else{
    var visible = 0;
  }

  var data = {
    "search_data": 1,
    "id": id,
    "visible": visible
  };

  $.ajax({
    type: "post",
    url: "code.php",
    data: data,
    success: function(response){
      // alert("Data Checked");
    }
  });
}


$(document).ready(function(){
  $('.check_email').keyup(function(e){
    alert("HElloo");
  })
})


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

