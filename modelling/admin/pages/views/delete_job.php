<?php
include '../../../config.php';


// get user information -> nav.php file
// get logged in user data 
$sql = "DELETE FROM `jobs` WHERE `id`='" . $_GET['job_id'] . "' ";

$results = $conn->query($sql);


if ($results) {
  echo "<script> alert('Job Deleted !!'); </script>";
?>

  <script>
     window.history.back()
  </script>

<?php } else {
  echo "<script> alert('Something went wrong !!'); </script>";
}
