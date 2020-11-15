
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Successful</title>
	<link rel="stylesheet" type="text/css" href="form_table.css"/>
	<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8">
	<meta name="description" content="Confirmation Process">
	<meta name="keywords" content="Web, programming">
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI">
</head>
<body class = "bookingformbody">
	<?php
		<?php session_start() ?>
		if(isset($_SESSION["occasion"])){
			include 'database.php';
			include 'order_class.php';
			$packageid = packageCheck();
			$database = new Database();
			$db = $database->getConnection();
			$order = new Order($db);
			$order->setCustomerID($_SESSION["custid"]);
			$order->setOrderDate(date("Y-m-d"));
			$order->setOrderStatus("Pending");
			$order->setOccasion($_SESSION['occasion']);
			$order->setPackageID($packageid);
			$order->setAddress($_SESSION["address"]);
			$order->setEventTime($_SESSION["time"]);
			$order->setEventDate($_SESSION["eventdate"]);
			$order->createOrder();
			$database->closeConnection();
			$_SESSION["packageid"] = $packageid;
		}
	?>
	<?php
		function packageCheck(){
			if($_SESSION["package"] == "Exquisite"){
				return $packageid = 1;
			}
			else if($_SESSION["package"] == "Heavenly"){
				return $packageid = 2;
			}
			else if($_SESSION["package"] == "Healthy"){
				return $packageid = 3;
			}
			else if($_SESSION["package"] == "Zealous"){
				return $packageid = 4;
			}
			else if($_SESSION["package"] == "Flourishing"){
				return $packageid = 5;
			}
		}
	?>
	<article>
		<?php
			 /* arrays of authorised user */
			 define("AUTHORISED_ROLES",["1","2","3"]);

			 /* Connect to FoodEdge database */ 
			 include 'database.php';
			 include 'userinformation_class.php';
			 $db = $database->getConnection();

			 /* Get current user's information */
			 $user = new userInformation($db);
			 $user->getCurrentUser($_SESSION['custid']);
			$user->checkAuthority(AUTHORISED_ROLES);
		?>
		<?php include_once "navigation.php"?>
	</article>
	<div class="confirmation">
		<h1 class="confirmationheader">Booking Successful!</h1>
		<table class="confirmtable">
			<tr>
				<td class="title">Time: </td>
				<td><?php echo $_SESSION["time"]; ?></td>
			</tr>
			<tr>
				<td class="title">Address: </td> 
				<td><?php echo $_SESSION["address"]; ?></td>
			</tr>
			<tr>
				<td class="title">Event Date: </td>
				<td><?php echo $_SESSION["eventdate"]; ?></td>
			</tr>
			<tr>
				<td class="title">Package: </td>
				<td><?php echo $_SESSION["package"]; ?></td>
			</tr>
			<tr>
				<td class="title">Occasion: </td>
				<td><?php echo $_SESSION["occasion"]; ?></td>
			</tr>
		</table>
		<div class="buttongroup1">
			<button onclick="window.location='payment.php';" class="buttonsubmit"><span>Proceed</span></button>
		</div>
	</div>
	<?php include_once "footer.php" ?>
</body>
</html>
	
