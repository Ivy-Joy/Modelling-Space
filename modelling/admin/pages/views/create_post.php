<?php
include '../../../config.php';

// get user information -> nav.php file
// get logged in user data 
$sql = "SELECT * FROM `users` WHERE `id`='" . $_SESSION['id'] . "' ";

$results = $conn->query($sql);
if ($results->num_rows != 1) {
  header('Location: ../');
} else {
  $user = mysqli_fetch_assoc($results);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_post'])){
  //get file input
    $filename = $_FILES["post_image"]["name"];
    $tempname = $_FILES["post_image"]["tmp_name"];    
    $folder = "posts/".$filename;

  $post_type = $_POST["post_type"];
	$post_description = $_POST["post_description"];

  $sql = "INSERT INTO posts (`user_id`,`post_image`, `post_type`,`post_description`) VALUES ('".$_SESSION['id']."','$filename','$post_type','$post_description')";
 

    if (move_uploaded_file($tempname, $folder) && ($conn->query($sql) === TRUE))  {
      echo "<script>alert('Post Saved.');</script>";
      $msg = '<div class="alert alert-success"> Post Saved </div>';
     }
     else{
       echo $conn->error; exit;
      echo "<script>alert('Something went wrong !!');</script>";

       $msg = "<div class='alert alert-warning'>There was an error !!</div>";
      }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | </title>
  <?php include '../includes/links.php'; ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include '../includes/nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- /.row -->
          <!-- content -->
          <div class="row m-2">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <div class="float-sm-right">
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-sm btn-info m-2"><i class="fa fa-left-arrow"></i> Back </a>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h2 class="">Create Post</h2>
                  <?php if (isset($msg)) {
                    echo $msg;
                  }$msg='';?>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="post_image">Post Image</label>
                      <input type="file" name="post_image" id="post_image" class="form-control"  required>
                    </div>
                    <div class="form-group">
                      <select name="post_type" id="post_type" class="form-control" required>
                        <option value="" selected disabled>Select Post Type</option>
                        <?php foreach (json_decode($user['type']) as $key => $type) { ?>
                          <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="post_description">Post Description</label>
                      <textarea name="post_description" id="post_description" class="form-control" required></textarea></div>
                  <button type="submit" class="btn btn-success btn-sm" name="create_post">
                    Create Post
                  </button>
                    </form>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include '../includes/footer.php';  ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <?php include '../includes/scripts.php' ?>
</body>

</html>