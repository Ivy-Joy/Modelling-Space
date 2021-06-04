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

  $sql = "INSERT INTO posts (`user_id`,`post_image`, `post_type`,`post_description`) VALUES ('$filename','$post_type','$post_description')";
 

    if (move_uploaded_file($tempname, $folder) && ($conn->query($sql) === TRUE))  {
      echo "<script>alert('hey');</script>";
      $msg = '<div class="alert alert-success"> Post Saved </div>';
     }
     else{
      echo "<script>alert('klk');</script>";

       $msg = "<div class='alert alert-warning'>There was an error !!</div>";
      }

}

// get post data
$post_id = '';
if (isset($_GET['post_id'])) {
 $post_id =   $_GET['post_id'];
}
$post_model = new Post($conn);
$post = $post_model->GetSinglePost($post_id);

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
            <div class="col-md-10">
              <div class="card">
                <div class="card-header">
                  <h2 class="">Viewing Post</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="posts/<?= $post['post_image']; ?>" width="100%" height="" alt="">
                        </div>
                        <div class="col-md-6">
                           Type:  <p><?= strtoupper($post['post_type']); ?></p>
                           Description:  <p><?= ucfirst($post['post_description']); ?></p>
                           <a href="edit_post.php?post_id=<?= $post['id']; ?>" class="btn btn-outline-warning btn-sm">Edit Post</a>
                          <a href="delete_post.php?post_id=<?= $post['id']; ?>" onclick="return confirm('Are you sure ?');" class="btn btn-outline-danger btn-sm">Delete Post</a>
                        </div>
                    </div>
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