<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Successful</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8">
	<meta name="description" content="Confirmation Process">
	<meta name="keywords" content="Web, programming">
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI">
</head>
<body class = "test">
	<?php
		include 'database.php';
		include 'order_class.php';
		$packageid = packageCheck();
		$database = new Database();
		$db = $database->getConnection();
		$order = new Order($db);
		$order->setCustomerID(3);
		$order->setOrderDate(date("Y-m-d"));
		$order->setOrderStatus("Pending");
		$order->setOccasion($_SESSION['occasion']);
		$order->setPackageID($packageid);
		$order->setAddress($_SESSION["address"]);
		$order->setEventTime($_SESSION["time"]);
		$order->setEventDate($_SESSION["eventdate"]);
		$order->createOrder();
		$database->closeConnection();
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
	<div class="confirmation">
		<h1 class="confirmationheader">Booking Successful!</h1>
		<table class="confirmtable">
			<tr>
				<td class="title">Time: </td>
				<td><?php echo $_SESSION["time"] ?></td>
			</tr>
			<tr>
				<td class="title">Address: </td> 
				<td><?php echo $_SESSION["address"] ?></td>
			</tr>
			<tr>
				<td class="title">Event Date: </td>
				<td><?php echo $_SESSION["eventdate"] ?></td>
			</tr>
			<tr>
				<td class="title">Package: </td>
				<td><?php echo $_SESSION["package"] ?></td>
			</tr>
			<tr>
				<td class="title">Occasion: </td>
				<td><?php echo $_SESSION["occasion"] ?></td>
			</tr>
		</table>
		<div class="buttongroup">
			<button onclick="window.location='bookingform.php';" class="button2"><span>Back</span></button>
		</div>
	</div>
	<?php
		unset($_SESSION["time"], $_SESSION["eventdate"], $_SESSION["package"], $_SESSION["occasion"], $_SESSION["address"]);
	?>
</body>
</html>
	