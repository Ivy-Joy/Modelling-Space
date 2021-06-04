<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'modelling';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

include 'admin/pages/models/Post.php';
include 'admin/pages/models/User.php';
include 'admin/pages/models/Job.php';
include 'admin/pages/models/Company.php';


?>



