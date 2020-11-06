<!DOCTYPE html>
<html lang="en">

	<!-- Description: Forget password page -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 7 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Account Recovery</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="forget password page"/>
		<meta name="keywords" content="forget-password,users,catering"/>
		<script src="validateForm.js"></script>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

		
		
	</head>
	
	<body class="login-body" onload="document.registration-form.first.focus()">
	
		<?php include_once "navigation.php"?>
		
		
		
			<h1 class="fogpass-page-title">Forget Password?</h1>
			
			
			
			<form id="fogpass-form" method="post" action="fogpass2.php" onsubmit="return validateEmailRecovery()">
			<table id="fogpass-table" >
			<tr>
				<td id="fogpass-desc-cell">
					<p id="fogpass-form-desc">We need to verify your account first before you can change your password</p>	
				</td>
			</tr>
			<tr>
				<td>
					<p><label id="fogpass-label" for="email">Enter email address: </label></p>
				</td>
			</tr>
			<tr>
				<td>
					<p><input type="text" name="email" id="email" placeholder="nobody@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"/></p>
				</td>
			</tr>
			<tr>
				<td>
					
						<input id="recovery-submit-button" type="submit" value="Check My Email"/>
						<div id="fogpass-table-button">
							<button><a href="cust_login.php">Cancel</a></button>
						</div>
				</td>
			</tr>
			</table>
		</form>
		
		
		 <?php include_once "footer.php" ?>
	</body>
</html>