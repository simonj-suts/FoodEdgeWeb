<!DOCTYPE html>
<html lang="en">

	<!-- Description: Confirm Registration is Successful page -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 3 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Confirm Registration</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="confirm registration page"/>
		<meta name="keywords" content="registration,users,success"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script src="validateReg.js"></script>
		
		
		
	</head>
	
	<body onload="successRegistration()">
	
		<header></header>
		
		<nav></nav>
		
		
		<h1 id="registration-heading">Registration Successful</h1>
		
		
		<?php 
			include 'database.php';
			include 'userinformation_class.php';
			$database = new Database();
			$db= $database->getConnection();
			
			
			$fname = $_POST['first'];
			$lname = $_POST['last'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$telephone = $_POST['telephone'];
			$secQues = $_POST['secQues'];
			$secAns = $_POST['secAns'];
			
			$userinformation= new userInformation($db);
			$userinformation->setCustomerFirstName($fname);
			$userinformation->setCustomerLastName($lname);
			$userinformation->setEmail($email);
			$userinformation->setPassword($password);
			$userinformation->setPhoneNo($telephone);
			$userinformation->setSecQuestion($secQues);
			$userinformation->setSecAnswer($secAns);
			$userinformation->createOrder();
			$database->closeConnection();
		
			?>
			
		
			<p>Information of account created: </p>
	
			<table class="center" border="1">
				<th>Description</th>
				<th>Value</th>
				<tr><td>First name: </td><td><?php echo $fname;?></td></tr>
				<tr><td>Last name: </td><td><?php echo $lname;?></td></tr>
				<tr><td>Email address: </td><td><?php echo $email;?></td></tr>
				<tr><td>Password:</td><td><?php echo  str_repeat("*",strlen( $password));?></td></tr>
				<tr><td>Telephone: </td><td><?php echo $telephone;?></td></tr>
				<tr><td>Security Question: </td><td><?php echo $secQues?></td></tr>
				<tr><td>Security Answer: </td><td><?php echo $secAns;?></td></tr>
			</table>
	
			<button type="button"><a href="registration.php">RETURN</button>
		
		
		<footer>
			
	</footer>
	</body>
</html>