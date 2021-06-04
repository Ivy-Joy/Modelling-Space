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
// get current job
$job_module = new Job($conn);
$current_job = $job_module->GetSingleJob($_GET['job_id']);
// print_r($current_job); exit;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_job'])){

  $job_title = $_POST["job_title"];
  $job_category = $_POST["job_category"];
	$job_description = $_POST["job_description"];

  $sql = "UPDATE jobs SET `job_title`='$job_title', `job_category`='$job_category',`job_description`='$job_description' WHERE `user_id`='".$_SESSION['id']."' ";

    $results = $conn->query($sql);

    if ($results) {
      echo "<script> alert('Job Updated !!'); </script>";
    ?>
    
      <script>
         window.location.href = '../../index.php';
      </script>
    
    <?php } else {
      echo "<script> alert('Something went wrong !!'); </script>";
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
                  <h2 class="">Edit Job</h2>
                  <?php if (isset($msg)) {
                    echo $msg;
                  }$msg='';?>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="job_title">Job Title</label>
                      <input type="text" name="job_title" id="job_title" class="form-control" value="<?= $current_job['job_title']; ?>"  required>
                    </div>
                    <div class="form-group">
                      <label for="job_category">Job Category</label>
                      <select name="job_category" id="job_category" class="form-control" required>
                        <option value="" selected disabled>Select Job Category</option>
                        <option value="runway" <?= ($current_job['job_category'] == 'runaway') ? 'selected' : '' ?>>Runway</option>
                        <option value="fashion" <?= ($current_job['job_category'] == 'fashion') ? 'selected' : '' ?>>Fashion</option>
                        <option value="swimsuit" <?= ($current_job['job_category'] == 'swimsuit') ? 'selected' : '' ?>>Swimsuit</option>
                        <option value="commercial" <?= ($current_job['job_category'] == 'commercial') ? 'selected' : '' ?>>Commercial</option>
                        <option value="fitness" <?= ($current_job['job_category'] == 'fitness') ? 'selected' : '' ?>>Fitness</option>
                        <option value="parts" <?= ($current_job['job_category'] == 'parts') ? 'selected' : '' ?>>Parts</option>
                        <option value="glamour" <?= ($current_job['job_category'] == 'glamour') ? 'selected' : '' ?>>Glamour</option>
                        <option value="promotional" <?= ($current_job['job_category'] == 'promotional') ? 'selected' : '' ?>>Promotional</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="job_description">job Description</label>
                      <textarea name="job_description" id="job_description" class="form-control" required><?= $current_job['job_description']; ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm" name="update_job">
                        Update job
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