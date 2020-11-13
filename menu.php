<!DOCTYPE html>
<html lang="en">

	<!-- Description: Log in page -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 7 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Our Menu</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="registration page"/>
		<meta name="keywords" content="menu,users,catering"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<script src="bookNowButton.js"></script>
		
	</head>
	
	<body id="menubackground">
	<?php session_start()?> 
		
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
	<?php 
			//include 'database.php';
			include 'package_class.php';
			
			$packages= new package($db);
			$rows=[];
			
			$rows= $packages->read();
			
			
			?>

			
			
	<h1 id="menu-title">Our Menu</h1>
	<?php 
		if($user->getUserRole()=='2'){
			echo '<div><button id="editMenuBtn" ><a href="editmenu.php">Edit</a></button></div>	';
		} 
		
		?>
		
		
			<div class="menudivLeft" id="pkg1div">
			
				
					<img src="images/Exquisite.jpg" alt="<?php echo $rows[0]['package_name'];?> Package" width="330px" height="310px">
				
				
				
					<div class="pkgInfoLeft">
						<div class="innerPkgInfoLeft"><h1 class="packagename"><?php echo $rows[0]['package_name'];?>	 <span class="cuis"><i class='fas fa-bread-slice' style='color:#E35F21'></i> <?php echo $rows[0]['package_cuisine']; ?> Cuisine</span></h1>
						<p>Pax: <?php echo $rows[0]['pax']; ?> </p>
						<p>Price: RM <?php echo $rows[0]['price_per_pax'];?></p>
						<p> <?php echo $rows[0]['package_desc'];?></p></div>
						<div class="menuBtnDivLeft"><button class="menuBtnLeft" id="pkg1btn" onclick="selectPackage(0)"><a href="bookingform.php">BOOK NOW<span></span></a></button></div>
						
					</div>
				
			</div>
			
			<div class="menudivRight" id="pkg2div">
			
				
				<div class="pkgInfoRight">
						<div class="innerPkgInfoRight"><h1 class="packagename"><?php echo $rows[1]['package_name'];?> 	 <span class="cuis"><i class='fas fa-bread-slice' style='color:#E35F21'></i> <?php echo $rows[1]['package_cuisine']; ?> Cuisine</span></h1>
						<p>Pax: <?php echo $rows[1]['pax']; ?> </p>
						<p>Price: RM <?php echo $rows[1]['price_per_pax'];?></p>
						<p> <?php echo $rows[1]['package_desc'];?></p></div>
						<div class="menuBtnDivRight"><button class="menuBtnRight" id="pkg2btn" onclick="selectPackage(1)"><a href="bookingform.php">BOOK NOW</a><span></span></button></div>
				</div>
				<img src="images/Heavenly.jpg" alt="<?php echo $rows[1]['package_name'];?> Package" width="330px" height="310px">
			</div>
			
			<div class="menudivLeft" id="pkg3div">
				<img src="images/Healthy.jpg" alt="<?php echo $rows[2]['package_name'];?> Package" width="330px" height="310px">
				<div class="pkgInfoLeft">
					<div class="innerPkgInfoLeft">
					<h1 class="packagename"><?php echo $rows[2]['package_name'];?>	 <span class="cuis"><i class='fas fa-bread-slice' style='color:#E35F21'></i> <?php echo $rows[2]['package_cuisine']; ?> Cuisine</span></h1>
					<p>Pax: <?php echo $rows[2]['pax']; ?> </p>
					<p>Price: RM <?php echo $rows[2]['price_per_pax'];?></p>
					<p> <?php echo $rows[2]['package_desc'];?></p>
					</div>
					<div class="menuBtnDivLeft"><button class="menuBtnLeft" id="pkg3btn" onclick="selectPackage(2)"><a href="bookingform.php">BOOK NOW</a></button></div>
				</div>
			</div>
			
			
			<div class="menudivRight" id="pkg4div">
			
				
				<div class="pkgInfoRight">
					<div class="innerPkgInfoRight"><h1 class="packagename"><?php echo $rows[3]['package_name'];?>	 <span class="cuis"><i class='fas fa-bread-slice' style='color:#E35F21'></i> <?php echo $rows[3]['package_cuisine']; ?> Cuisine</span></h1>
					<p>Pax: <?php echo $rows[3]['pax']; ?> </p>
					<p>Price: RM <?php echo $rows[3]['price_per_pax'];?></p>
					<p> <?php echo $rows[3]['package_desc'];?></p></div>
					<div class="menuBtnDivRight"><button class="menuBtnRight" id="pkg4btn" onclick="selectPackage(3)"><a href="bookingform.php">BOOK NOW</a><span></span></button></div>
				</div>
				<img src="images/Zealous.jpg" alt="<?php echo $rows[3]['package_name'];?> Package"width="330px" height="310px">
			</div>
			
			<div class="menudivLeft" id="pkg5div">
			
				<img src="images/Flourishing.jpg" alt="<?php echo $rows[4]['package_name'];?> Package" width="330px" height="310px">
				
				<div class="pkgInfoLeft">
					<div class="innerPkgInfoLeft"><h1 class="packagename"><?php echo $rows[4]['package_name'];?>	 <span class="cuis"> <i class='fas fa-bread-slice' style='color:#E35F21'></i> <?php echo $rows[4]['package_cuisine']; ?> Cuisine</span></h1>
					<p>Pax: <?php echo $rows[4]['pax']; ?> </p>
					<p>Price: RM <?php echo $rows[4]['price_per_pax'];?></p>
					<p> <?php echo $rows[4]['package_desc'];?></p></div>
					<div class="menuBtnDivLeft"><button class="menuBtnLeft" id="pkg5btn" onclick="selectPackage(4)"><a href="bookingform.php">BOOK NOW</a></button></div>
				</div>
			</div>
		
		
	<?php include_once "footer.php" ?>  
	</body>
</html>
