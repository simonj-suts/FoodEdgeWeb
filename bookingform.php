<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="FoodEdge Booking Form"/>
	<meta name="keywords" content="Web, programming"/>
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI"/>
	<link rel="stylesheet" type="text/css" href="form_table.css"/>
	<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="validator.js"></script>
	<script src="https://kit.fontawesome.com/cebce8210e.js" crossorigin="anonymous"></script>
</head>
<body class="bookingformbody">
<article>
		<?php session_start() ?>
		<?php
			
			 /* arrays of authorised user */
			 define("AUTHORISED_ROLES",["1","2","3"]);

			 /* Connect to FoodEdge database */ 
			 include 'database.php';
			 include 'userinformation_class.php';
			 $database = new Database();
			 $db = $database->getConnection();

			 /* Get current user's information */
			 $user = new userInformation($db);
			 $user->getCurrentUser($_SESSION['custid']);
			$user->checkAuthority(AUTHORISED_ROLES);
		?>
		<?php include_once "navigation.php"?>
	</article>
	
	<div class="bookingform">
	<button onclick="window.location='cust_login.php';" class="buttonback"><span>Back</span></button>
	<form name = "bookingform" action="confirmationpage.php" method="post" onsubmit="return checkForm()">
		<h1 class="bookingform_header">Booking</h1>
		<p class = "Names"> Hello <?php echo $_SESSION["fname"]; echo " ". $_SESSION["lname"];?>,</p>
		<div class="occasion">
			<select name="occasion" id="occasion">
				<option value="" selected disabled hidden>Please select your occasion</option>
				<option value="Celebration">Celebration</option>
				<option value="Corporate">Corporate</option>
				<option value="Social">Social</option>
				<option value="Holiday">Holiday</option>
			</select>
			<small id="occasionappear"></small>
		</div>
			<input type="time" id="time" name="time">
			<input type="date" id="eventdate" name="eventdate">
			<small id="timeappear"></small>
		<div class="error">
			<small id="dateappear"></small>
		</div>
		<div id="radiobuttondiv">
			<p class="title">Package: </p>
			<div id="radiogroup">
				<label for="package1" class="package">Exquisite
				<input type="radio" id="package1" name="package" value="Exquisite">
				<span class="checkmark"></span>
				</label>
			
				<label for="package2" class="package">Heavenly
				<input type="radio" id="package2" name="package" value="Heavenly">
				<span class="checkmark"></span>
				</label>
			
				<label for="package3" class="package">Healthy
				<input type="radio" id="package3" name="package" value="Healthy">
				<span class="checkmark"></span>
				</label>
			
			
				<label for="package4" class="package">Zealous
				<input type="radio" id="package4" name="package" value="Zealous">
				<span class="checkmark"></span>
				</label>
				
				<label for="package5" class="package">Flourishing
				<input type="radio" id="package5" name="package" value="Flourishing">
				<span class="checkmark"></span>
				</label>
			</div>
		<small id="packageappear"></small>
		</div>
		<textarea name="address" id="address" maxlength="250" rows="6" placeholder="Address"></textarea>
		<small id="addressappear"></small>
		<div class ="buttongroup">
			<input type="reset" class="button2"/>
			<button type='submit' class="buttonsubmit"><span>Submit</span></button>
		</div>	
	</form>
	</div>
	<?php include_once "footer.php" ?>  
</body>
</html>
