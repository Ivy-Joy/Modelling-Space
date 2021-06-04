<?php

include('config.php');

$post_model = new Post($conn);
// get user by gender


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Women</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="images/imagelogo.PNG" class="logo"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="myhome.html"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="myhome.html#models"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;MODELS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" tabindex="-1"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;COMPANIES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="myhome.html#about" tabindex="-1">ABOUT US</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" tabindex="-1"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;HELP</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="container">
		<header>
			<h2 class="header">Models</h2>
		</header>
		<?php
		$sql = "select * from users where gender = 'female' ";
		$result = $conn->query($sql);
		?>
		<div class="row">
			<?php 
				$i = 0;
				while($row = $result->fetch_assoc()) {
					$imageURL = 'images/'.$row["profileImage"];
					$i++
				?>
				<div style="padding: 2rem;" class="col-md-4">
					<div class="card" style="width: 16rem;">
						<img src="<?php echo $imageURL; ?>" class="card-img-top" alt="..." style="height: 25rem">
						<div class="card-body">
							<h5 class="card-title">Name: <?php echo $row['firstname']." ".$row['lastname']; ?></h5>
							<p class="card-text"><?php echo $row['email'] ?></p>
							<p class="card-text"><?php echo $row['about'] ?></p>
						</div>
						</div>
				</div>
				<?php } ?>
		</div>
	</div>
    
</body>
<footer class="full-footer">
	<div class="container top-footer p-md-3 p-1">
		<div class="row">
			<div class="col-md-3 pl-1 pr-4">
				<img src="images/imagelogo.PNG" class="logo">
				<p>The Modelling Space</p>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-facebook"></i></a>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-google"></i></a>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-twitter-square"></i></a>
				<a style="color: silver;" class="p-1" href="#"><i class="fa fa-instagram-square"></i></a>
			</div>
		</div>
	</div>
</footer>
</html>