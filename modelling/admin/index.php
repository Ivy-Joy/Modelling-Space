<?php
include '../config.php';

// get user information 
$sql = "SELECT * FROM `users` WHERE `id`='" . $_SESSION['id'] . "' ";

$results = $conn->query($sql);
if ($results->num_rows != 1) {
  header('Location: ../');
} else {
  $user = mysqli_fetch_assoc($results);
}

$posts_model = new Post($conn);
$posts = $posts_model->GetUserPost($_SESSION['id']);
// print_r($posts);exit;

$jobs_model = new Job($conn);

$jobs = $jobs_model->GetCompanyJobs($_SESSION['id']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
      header("location: ../");
      exit;
    }


    ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../logout.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
           <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div> -->
        </li>


        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Modelling Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $user['profileImage']; ?> " class="img-circle elevation-3 shadow" height="50" width="100" style="opacity: .9" alt="User Image">
          </div>
          <!-- model info -->
         
            <div class="info"> 
            <?php //if ($user['user_type'] == 'model') { ?>
              <?php echo ucwords($user['user_type']); ?> 
              <?php // } elseif ($user['user_type'] == 'company') { ?>

               <?php //} ?>
              <a href="#" class="d-block"><?php echo $_SESSION['email']; ?> </a>
              <span><?php echo ucwords(strtolower($user['firstname'])); ?></span>
            </div>
         

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>

                    <?php if ($user['user_type'] == 'company') { ?>
                      <p class="">Company Jobs</p>

                    <?php } else { ?>
                      <p>
                        My Posts
                      </p>
                    <?php } ?>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Layout Options
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation + Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Boxed</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li> -->

            <!-- <li class="nav-header">EXAMPLES</li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- /.row -->
          <!-- content -->
          <div class="row m-2">
            <div class="col-md-6">
              <?php if ($user['user_type'] == 'company') { ?>
                <h2 class="">Company Jobs</h2>

              <?php } else { ?>
                <h2 class="">My Posts</h2>
              <?php } ?>
            </div>
            <div class="col-md-6">
              <div class="float-sm-right">
                <?php if ($user['user_type'] == 'company') { ?>

                  <a href="pages/views/create_job.php" class="btn btn-sm btn-info m-2"><i class="fa fa-plus"></i> Create Job </a>
                <?php } else { ?>
                  <a href="pages/views/create_post.php" class="btn btn-sm btn-info m-2"><i class="fa fa-plus"></i> Create Post </a>

                <?php } ?>

              </div>
            </div>
          </div>

          <div class="card card-success">
            <div class="card-body">
              <div class="row">
                <?php if ($user['user_type'] == 'company') { ?>
                  <?php foreach ($jobs as $key => $job) { ?>
                    <!-- <a href="pages/views/view_post.php?post_id=<?= $job['id']; ?>"> -->
                      <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card">
                        <div class="card-header">
                    
                        <h5 class="">Job Title: <a href="pages/views/view_job.php?job_id=<?= $job['id']; ?>"><?= ucwords($job['job_title']); ?> </a></h5>
                        </div>
                        <div class="card-body">
                        <p>Job Category: <?= $job['job_category'];?></p>
                        <p>Job Description:</p>
                            <p class="card-text text-white">
                              <?php if (strlen($job['job_description']) > 30) {
                                echo  ucfirst(substr($job['job_description'], 0, 30)) . '...';
                              } else {
                                echo  ucfirst($job['job_description']);
                              } ?>
                            </p>
                            <a href="#" class="text-white">Updated <?= $job['created_at']; ?></a>
                        </div>
                        <div class="card-footer">
                        <a href="pages/views/edit_job.php?job_id=<?= $job['id']; ?>" class="btn btn-outline-warning btn-sm">Edit Job</a>
                        <a href="pages/views/delete_job.php?job_id=<?= $job['id']; ?>" onclick="return confirm('Are you sure ?');" class="btn btn-outline-danger btn-sm">Delete Job</a>
                        </div>
                        </div>
                      </div>
                    <!-- </a> -->
                  <?php } ?>
                <?php } else { ?>
                  <?php foreach ($posts as $key => $post) { ?>
                    <a href="pages/views/view_post.php?post_id=<?= $post['id']; ?>">
                      <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card mb-2 bg-gradient-dark">
                          <img class="card-img-top" src="pages/views/posts/<?= $post['post_image']; ?>" alt="Dist Photo 1">
                          <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-primary text-white"><?= ucfirst($post['post_type']); ?></h5>
                            <p class="card-text text-white pb-2 pt-1">
                              <?php if (strlen($post['post_description']) > 30) {
                                echo  substr($post['post_description'], 0, 30) . '...';
                              } else {
                                echo  $post['post_description'];
                              } ?>
                            </p>
                            <a href="#" class="text-white">Updated <?= $post['created_at']; ?></a>
                          </div>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                <?php } ?>

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
    <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.1
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard2.js"></script> -->
</body>

</html>