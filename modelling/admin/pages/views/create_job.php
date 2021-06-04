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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_job'])){
  $job_title = $_POST["job_title"];
  $job_category = $_POST["job_category"];
	$job_description = $_POST["job_description"];

  $sql = "INSERT INTO jobs (`user_id`,`job_title`, `job_category`,`job_description`) VALUES ('".$_SESSION['id']."','$job_title','$job_category','$job_description')";

    if (($conn->query($sql) === TRUE))  {
      // echo "<script>alert('hey');</script>";
      $msg = '<div class="alert alert-success"> job Saved </div>';
     }
     else{
      // echo "<script>alert('klk');</script>";

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
                  <h2 class="">Create Job</h2>
                  <?php if (isset($msg)) {
                    echo $msg;
                  }$msg='';?>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="job_title">Job Title</label>
                      <input type="text" name="job_title" id="job_title" class="form-control"  required>
                    </div>
                    <div class="form-group">
                      <label for="job_category">Job Category</label>
                      <select name="job_type" id="job_type" class="form-control" required>
                        <option value="" selected disabled>Select Job Category</option>
                        <option value="runway">Runway</option>
                        <option value="fashion">Fashion</option>
                        <option value="swimsuit">Swimsuit</option>
                        <option value="commercial">Commercial</option>
                        <option value="fitness">Fitness</option>
                        <option value="parts">Parts</option>
                        <option value="glamour">Glamour</option>
                        <option value="promotional">Promotional</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="job_description">job Description</label>
                      <textarea name="job_description" id="job_description" class="form-control" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-success btn-sm" name="create_job">
                        Create job
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