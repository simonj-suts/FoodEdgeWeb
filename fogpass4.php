<!DOCTYPE html>
<html lang="en">

	<!-- Description: Forget password page -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 7 October 2020 -->
	<!-- Validated: not yet-->
	<?php
// Start the session
		session_start();
		?>
	<head>
		<title>Account Recovery</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="forget password page"/>
		<meta name="keywords" content="forget-password,users,catering"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		
		
	</head>
	
	<body class="login-body" onload="document.registration-form.first.focus()">
	
		<header>
			
		</header>
		
		<nav>
			
		</nav>
		

		
							
		
		<?php 
		
		
		
		
		include 'database.php';
		include 'userinformation_class.php';
		
		$email=$_SESSION['email'];
		
		
		$database = new Database();
		$db= $database->getConnection();
		$userinformation= new userInformation($db);
		
		
		
		
		if((isset($_POST['password']))&&(isset($_POST['c_password']))){	
			$fogpassNewPass = $_POST['password'];
			$fogpassNewConPass=$_POST['c_password'];
			if($fogpassNewPass==$fogpassNewConPass){
				$userinformation->changePassword($fogpassNewPass,$email);
				
			}else{
				echo'<h1 class="changePassword">Fail to Change Password</h1>';
				echo'<p class="changePassword">Password and confirm password do not match. Please try again</p>';
				
				
			}
		}
						
		
		$database->closeConnection();
		
	?>	
		<div id="fogpass4-button">
			<button ><a href="cust_login.php">Return to Login page</a></button>
		</div>
		
		
		<footer>
			
	</footer>
	</body>
</html>