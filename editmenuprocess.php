<?php
session_start();
include "database.php";
include "package_class.php";
include 'userinformation_class.php';

$database = new Database();
$db = $database->getConnection();
define("AUTHORISED_ROLES", ["1", "2", "3"]);

$package = new package($db);
$user = new userInformation($db);
$user->getCurrentUser($_SESSION['custid']);
$user->checkAuthority(AUTHORISED_ROLES);

$package->setPackageName($_POST['packagename']);
$package->setPackageCuisine($_POST['packagecuisine']);
$package->setPax($_POST['packagepax']);
$package->setPricePerPax($_POST['packageprice']);
$package->setPackageDesc($_POST['packagedesc']);
if($package->updatePackage($_SESSION["packageid"]) == true){
    $success = "Edit Success";
}else{
    $success = "Edit Failed, Please Try Again.";
}
?>

<?php include_once "navigation.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="form_table.css"/>
    <link rel="stylesheet" type="text/css" href="styles/nav_style.css" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8">
</head>
<body class = "editmenuprocess">
	<div class="confirmation">
		<h1 class="confirmationheader"><?php echo $success?></h1>
		<table class="confirmtable">
		<tr>
			<td class="title">Package Name: </td>
			<td><?php echo $_POST['packagename'] ?></td>
		</tr>
		<tr>
			<td class="title">Cuisine: </td> 
			<td><?php echo $_POST['packagecuisine']?></td>
		</tr>
		<tr>
			<td class="title">Pax: </td>
			<td><?php echo $_POST['packagepax'] ?></td>
		</tr>
		<tr>
			<td class="title">Price: </td>
			<td><?php echo $_POST['packageprice'] ?></td>
		</tr>
		<tr>
			<td class="title">Description: </td>
			<td><?php echo $_POST['packagedesc'] ?></td>
		</tr>
		</table>
		<div class="buttongroup">
			<button onclick="window.location='editmenu.php';" class="buttonconfirm"><span>Back to Edit Menu</span></button>
		</div>
    </div>
    
    <?php include_once "footer.php" ?>
</body>
</html>