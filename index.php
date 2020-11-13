<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="FoodEdge Homepage"/>
	<meta name="keywords" content="Web, programming"/>
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI"/>
	<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
	<link rel="stylesheet" type="text/css" href="form_table.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script src="https://kit.fontawesome.com/cebce8210e.js" crossorigin="anonymous"></script>
</head>
<body id="homepagebody">
	<article>
		<?php session_start() ?>
		<?php
			
			/* arrays of authorised user */

			/* Connect to FoodEdge database */ 
			include 'database.php';
			include 'userinformation_class.php';
			$database = new Database();
			$db = $database->getConnection();

			/* Get current user's information */
			$user = new userInformation($db);
			if(isset($_SESSION['custid'])){
				$user->getCurrentUser($_SESSION['custid']);
			}
		?>
		<?php include_once "navigation.php"?>
	</article>
	<section class="home">
		<div class="slider">
			<div class="slide active" style="background-image: url('media/Exquisite1.jpg')">
				<div class="container">
					<div class="caption">
						<h1>Exquisite</h1>
						<p>Our famous Western-based cuisine, customer's go-to package.</p>
						<button class="buttonsubmit" onclick="location.href='menu.php#pkg1div';"><span>Book</span></button>
					</div>
				</div>
			</div>
			<div class="slide" style="background-image: url('media/Heavenly.jpg')">
				<div class="container">
					<div class="caption">
						<h1>Heavenly</h1>
						<p>Newly added package which contains Italian's cuisine with number of Heavenly taste dishes.</p>
						<button class="buttonsubmit" onclick="location.href='menu.php#pkg2div';"><span>Book</span></button>
					</div>
				</div>
			</div>
			<div class="slide" style="background-image: url('media/Healthy.jpg')">
				<div class="container">
					<div class="caption">
						<h1>Healthy</h1>
						<p>Vegetarians favourite, meat-free dishes to serves our vegetarian customers</p>
						<button class="buttonsubmit" onclick="location.href='menu.php#pkg3div';"><span>Book</span></button>
					</div>
				</div>
			</div>
			<div class="slide" style="background-image: url('media/Zealous.jpg')">
				<div class="container">
					<div class="caption">
						<h1>Zealous</h1>
						<p>Indian cuisine, to our customers who loves Indian dishes, we serves the best curry.</p>
						<button class="buttonsubmit" onclick="location.href='menu.php#pkg4div';"><span>Book</span></button>
					</div>
				</div>
			</div>
			<div class="slide" style="background-image: url('media/Flourishing.jpg')">
				<div class="container">
					<div class="caption">
						<h1>Flourishing</h1>
						<p>We serves Sushi as well, Japanese-based cuisine to our customers who are into Japanese dishes.</p>
						<button class="buttonsubmit" onclick="location.href='menu.php#pkg5div';"><span>Book</span></button>
					</div>
				</div>
			</div>
		</div>
		<div class="indicator"></div>
	</section>
	<section class="about" id="aboutus">
		<div>
			<h1>About us</h1>
			<p>Welcome to <span class="spanstyle">FoodEdge</span>. We're dedicated to providing you the very best of Catering Services, with an emphasis on Quality, Efficiency, and Reliability.<br/><br/>
			Founded in 2020, <span class="spanstyle">FoodEdge</span> has come a long way from its beginnings in Kuching, Sarawak. When <span class="spanstyle">FoodEdge</span> first started out, his passion for Catering Services drove them to start their own business. He and his team
			took another step on their business by opening up an online catering service to expand the customers base.<br/><br/>


			We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p><br/><br/>


			<div class="aboutusp">
			<p>Sincerely,<br/>

			<span class="spanstyle">FoodEdge Catering Services</span></p>
			<img src="media/foodedgelogo.png" alt="company logo" class="logo-about"/>
			</div>
			
		</div>
	</section>

 
 <script src="slideshow.js"></script>
 <?php include_once "footer.php" ?>  

</body>
</html>



