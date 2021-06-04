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
$post_id = '';
if (isset($_GET['post_id'])) {
 $post_id =  $_GET['post_id'];
}
// get current post
$post_module = new Post($conn);
$current_post = $post_module->GetSinglePost($post_id );
// print_r($current_post['id']); exit;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_post'])) {
  //get file input
  $filename = $_FILES["post_image"]["name"];
  $tempname = $_FILES["post_image"]["tmp_name"];
  $folder = "posts/" . $filename;

  $post_type = $_POST["post_type"];
  $post_id = $_POST["post_id"];
  $post_description = $_POST["post_description"];

  
if (file_exists($_FILES['post_image']['tmp_name'])) {



  $sql = "UPDATE posts SET `post_image`='$filename', `post_type`='$post_type',`post_description`='$post_description' WHERE `id` = '".$post_id ."' ";
   
  if (move_uploaded_file($tempname, $folder) && ($conn->query($sql) === TRUE)) {
    echo "<script> alert('Post Updated wi !!'); </script>";
    ?>    
      <script>
         window.location.href = '../../index.php';
      </script>
    
    <?php } else {
      echo $conn->error; exit;
      echo "<script> alert('Something went wrong here !!'); </script>";
    }
}else{

  $sql = "UPDATE posts SET `post_type`='$post_type',`post_description`='$post_description' WHERE `id` = '".$post_id ."' ";
  if (($conn->query($sql) === TRUE)) {
    echo "<script> alert('Post Updated nt !!'); </script>";
    ?>    
      <script>
         window.location.href = '../../index.php';
      </script>
    
    <?php } else {
      echo "<script> alert('Something went wrong !!'); </script>";
    }
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
                  }
                  $msg = ''; ?>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="post_id" value="<?= $post_id; ?>"> 
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="post_image">Post Image</label>
                          <input type="file" name="post_image" id="post_image" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_image">Current Image</label><br>
                        <img src="posts/<?= $current_post['post_image']  ?>" class="img-thumbnail" alt="" height="100px" width="100px">
                      
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <select name="post_type" id="post_type" class="form-control" required>
                        <option value="" selected disabled>Select Post Type</option>
                        <?php foreach (json_decode($user['type']) as $key => $type) { ?>
                          <option value="<?php echo $type; ?>" ><?php echo $type; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="post_description">Post Description</label>
                      <textarea name="post_description" id="post_description" class="form-control" required><?= $current_post['post_description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" name="create_post">
                      Update Post
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