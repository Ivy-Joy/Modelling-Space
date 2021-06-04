<?php

require('config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['submit'])){



	$filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];    
        $folder = "images/".$filename;



	$first = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$dob = $_POST["dob"];
	$email = $_POST["email"];
	$phone = $_POST["phoneNo"];
	$username = $_POST["username"];
	$state = $_POST["state"];
	$county = $_POST["county"];
	$zip =$_POST["zip"];
	$experience =$_POST["experience"];
	$height = $_POST["heigth"];
	$model = json_encode($_POST["model_type"]) ;
	$password = $_POST["password"];
	$password = password_hash($password, PASSWORD_DEFAULT);
	$dy = $_POST["dy"];
	$gender = $_POST["gender"];
	$user_type = $_POST["user_type"];



	// printed values

			// echo 'Your lastname is'.$_POST["lastname"]."<br>";
			// echo 'Your date of birth is'.$_POST["dob"]."<br>";
			// echo 'Your email is'.$_POST["email"]."<br>";
			// echo 'Your phone number is'.$_POST["phoneNo"]."<br>";
			// echo 'Your gender is'.$_POST["gender"]."<br>";
			// echo 'Your username is'.$_POST["username"]."<br>";
			// echo 'Your password is'.$_POST["password"]."<br>";
			// echo 'Your dy is'.$_POST["dy"]."<br>";
			// echo 'Your  county is'.$_POST["county"]."<br>";
			// echo 'Your zip is'.$_POST["zip"]."<br>";
			// echo 'Your experience is'.$_POST["experience"]."<br>";
			// echo 'Your heigth is'.$_POST["heigth"]."<br>";
			// echo 'Your model-type is'.$_POST["model_type"]."<br>";


	$sql = "INSERT INTO `users` ( `firstname`, `lastname`, `dob`, `email`, `phone`, `type`, `state`, `county`, `zip`, `experince`, `height`, `username`, `password`, `about`, `profileImage`,`gender`, `user_type` )
		VALUES('$first', '$lastname', '$dob', '$email', '$phone', '$model', '$state', '$county', '$zip', '$experience', '$height', '$username',' $password', '$dy','$filename',' $gender', '$user_type')";

		if ($conn->query($sql) === TRUE) {

			 if (move_uploaded_file($tempname, $folder))  {
				 
				 $_SESSION['registration_success'] = "Registration was successful please login";
				 header('Location: login.php');
				}else{
					$msg = "Failed to upload image";

				 }
				  $_SESSION['registration_success'] = "Registration was successful please login";
				 header('Location: login.php');
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

}
?>