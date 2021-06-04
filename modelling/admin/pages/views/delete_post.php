<?php
include '../../../config.php';


// get user information -> nav.php file
// get logged in user data 
$sql = "DELETE FROM `posts` WHERE `id`='" . $_GET['post_id'] . "' ";

$results = $conn->query($sql);


if ($results) {
  echo "<script> alert('Post Deleted !!'); </script>";
?>

  <script>
     window.location.href = '../../index.php';
  </script>

<?php } else {
  echo "<script> alert('Something went wrong !!'); </script>";
}
