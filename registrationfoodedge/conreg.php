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
		
		
		
	</head>
	
	<body>
	
		<header></header>
		
		<nav></nav>
		<h1 id="registration-heading">Registration Confirmation</h1>
		<?php 
		
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "foodedge";
			$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn->error);

			$fname = $_POST['first'];
			$lname = $_POST['last'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$telephone = $_POST['telephone'];
			$secQues = $_POST['secQues'];
			$secAns = $_POST['secAns'];
			
			//insert into database
			$sql = "INSERT INTO userinformation (CustomerFName, CustomerLName, Email, Password, PhoneNo, SecQuestion, SecAnswer) VALUES ('$fname', '$lname', '$email', '$password', '$telephone', '$secQues', '$secAns')";
			if (mysqli_query($conn, $sql)) {
				echo "Registration is successful. Your information has been added to the system.\n";
			} else {
				echo "Error:" . $sql . "<br>" . mysqli_error($conn);
			}
		
		
        
?>
		
		
		
		
			
		
	
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
	
	<?php
		
		mysqli_close($conn);
	?>
	
		
		
		<footer>
			
	</footer>
	</body>
</html>