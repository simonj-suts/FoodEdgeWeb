<!DOCTYPE html>
<html lang="en">
<head>
	<title>Confirmation Page</title>
	<link rel="stylesheet" type="text/css" href="form_table.css"/>
	<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8">
	<meta name="description" content="FoodEdge Confirmation Page">
	<meta name="keywords" content="Web, programming">
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI">
</head>
<body class = "bookingformbody">
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
	<div class="confirmation">
		<h1 class="confirmationheader">Confirmation Page</h1>
		<table class="confirmtable">
		<tr>
			<td class="title">Time: </td>
			<td><?php echo $_SESSION["time"] = $_POST['time'] ?></td>
		</tr>
		<tr>
			<td class="title">Address: </td> 
			<td><?php echo $_SESSION["address"] = $_POST['address']?></td>
		</tr>
		<tr>
			<td class="title">Event Date: </td>
			<td><?php echo $_SESSION["eventdate"] = $_POST['eventdate'] ?></td>
		</tr>
		<tr>
			<td class="title">Package: </td>
			<td><?php echo $_SESSION["package"] = $_POST['package'] ?></td>
		</tr>
		<tr>
			<td class="title">Occasion: </td>
			<td><?php echo $_SESSION["occasion"] = $_POST['occasion'] ?></td>
		</tr>
		</table>
		<div class="buttongroup">
			<button onclick="window.location='bookingform.php';" class="button2"><span>Cancel</span></button>
			<button onclick="window.location='confirmbookingprocess.php';" class="buttonconfirm"><span>Confirm</span></button>
		</div>
	</div>
	<?php include_once "footer.php" ?>  
</body>
</html>