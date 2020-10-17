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
		<title>Customer Login</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="forget password page"/>
		<meta name="keywords" content="forget-password,users,catering"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<script src="validateForm.js"></script>
		
		
	</head>
	
	<body class="login-body" onload="document.registration-form.first.focus()">
	
		<header>
			
		</header>
		
		<nav>
			
		</nav>
		

		
		<h1 class="fogpass3-page-title">New Password</h1>
				
		<form id="fogpass-form3" method="post" action="fogpass4.php" onsubmit="return ifInputInfoValid()"><tr>
			
		
		<?php 
		
		include 'database.php';
		include 'userinformation_class.php';
		
		$email=$_SESSION['email'];
		
		
		$database = new Database();
		$db= $database->getConnection();
		$userinformation= new userInformation($db);
		
		if(isset($_POST['secAns'])){
			$fogpassAns = $_POST['secAns'];
			if($userinformation->matchSecAns($email,$fogpassAns)){
				echo '<style type="text/css"> 
				.chgPassword{
					display:block;
				}
				</style>';
				
				
			}
			else{
				echo 'Answer is not correct.';
			}
		}
		$database->closeConnection();
		
	?>	
		
		<table>
			<tr>
				<td>
				
					<label for="password">Change Password </label>
				</td>
				<td>
					<input type="password" name="password" id="password"  pattern="[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}" required="required"/> 
				</td>
			</tr>
			
				<td>
					<label for="c_password">Confirm New Password </label>
				</td>
				<td>
					<input type="password" name="c_password" id="c_password"  pattern="[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}" required="required"/> 
				</td>
		</table>
		<div class="submitBtn">
					<input id="fogpass3-submit" type="submit" value="Confirm"/>
					<input id="fogpass3-reset" type="reset" value="Reset"/>
				</div>
		</form>
		
		
		<footer>
			
	</footer>
	</body>
</html>