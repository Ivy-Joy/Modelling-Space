<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="mystyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>HOME</title>
</head>

<body>
	<?php include 'nav.php'; ?>

	<h2 style="padding: 20px;"><i>WELCOME TO MODELLING SPACE</i></h2>

	<div style=" background-image: url('images/homeimage.png');">


		<div class="container m-3">
			<div class="row">
				<div class="card col-4">
					<div class="card-body text-center">
						<p>Register with us for free</p>
						<a href="register_model.php" class="btn btn-primary">REGISTER HERE</a>
					</div>
				</div>
				<div class="card col-4">
					<div class="card-body text-center">
						<p>Already registered? Kindly login here</p>
						<a href="login.php" class="btn btn-primary">LOGIN</a>
					</div>
				</div>

			</div>
		</div>



		<section class="about" id="about">

			<h1><b>ABOUT US</b></h1>
			<p class="card card-body"><i>We are the best</i> </p>
			<div class="row">
				<div class="about-col">
					<h3>OUR TEAM</h3>
					<p>We are the modelling space linking great fashion companies with potential fasion models to showcase their products and open room for greater heights.</p>
				</div>
				<div class="about-col">
					<h3>MISSION</h3>
					<p>To be and be able to do all things at all cost that results in abundant happiness, success and wealth to all fashion models and companies.</p>
				</div>
				<div class="about-col">
					<h3>VISION</h3>
					<p>To be the best quick fashion connecting platform globally; by staying up-to-date with fashion trends,market changes and latest technology.</p>
				</div>
			</div>
		</section>
		<section id="models">
			<h1 style="font-size: 2.1rem; line-height: 1.4; letter-spacing: 0.5rem; text-align: center;"><a href="#" class="btn btn-primary">MODELS</a></h1>
			<div class="container m-3" style="padding: 1rem">
				<div class="row justify-content-center">
					<div class="col-md-4 text-center">
						<div class="card ">
							<div class="card-body">
								<h4>WOMEN</h4>
								<hr>
								<img src="images/Model1.jpg" alt="LOAD" style="width:50%">
								<p class="card-text">Follow the link to see beautiful ladies showcasing their potential in the field of fashion and design.
								</p>
								<a href="models.php?gender=female" class="btn btn-primary">WOMEN</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center">
						<div class="card">
							<div class="card-body">
								<h4>MEN</h4>
								<hr>
								<img src="images/Model8.png" alt="LOAD" style="width:60%">
								<p class="card-text">Follow the link to see gentlemen showcasing their potential in the field of fashion and design.
								</p>
								<a href="models.php?gender=male" class="btn btn-primary">MEN</a>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center">
						<div class="card">
							<div class="card-body">
								<h4>KIDS</h4>
								<hr>
								<img src="images/Model6.png" alt="LOAD" style="width:65%">
								<p class="card-text">Follow the link to see kids showcasing their potential in the field of fashion and design.
								</p>
								<a href="models.php?gender=kid" class="btn btn-primary shadow ">KIDS</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<footer class="full-footer">
	<div class="container  p-md-3 p-1">
		<div class="row bg-white border-rounded">
			<div class="col-md-3 pl-1 pr-4 ">
				<img src="images/imagelogo.PNG" class="logo">
				<!-- <p>The Modelling Space</p> -->
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-facebook"></i></a>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-google"></i></a>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-twitter-square"></i></a>
				
			</div>
		</div>
	</div>
</footer>
</body>
</html>