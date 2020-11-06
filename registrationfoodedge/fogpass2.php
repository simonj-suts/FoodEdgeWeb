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
		<meta name="description" content="account recovery page"/>
		<meta name="keywords" content="forget-password,users,recovery"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		
		
	</head>
	
	<body class="login-body" onload="document.registration-form.first.focus()">
	
		  <?php include_once "navigation.php"?>

		
		<h1 class="fogpass-page-title">Account Recovery</h1>
				
		<form id="fogpass-form2" method="post" action="fogpass3.php"><tr>
			
		
			<?php 
			$fogpassEmail = $_POST['email'];
			
			include 'database.php';
			include 'userinformation_class.php';
			$database = new Database();
			$db= $database->getConnection();
			$userinformation= new userInformation($db);
			
			if(isset($_POST['email'])){	
				
				if($userinformation->ifEmailExist($fogpassEmail)){
					$userinformation->retrieveSecQues($fogpassEmail);
					
				}
			}
			$_SESSION['email'] = $_POST['email'];
			$database->closeConnection();
		?>	
		
		
			<div id="showSecAns" >
				<p><label for="secAns">Security Answer:</label></p>
				<textarea name="secAns" id="secAns" rows="5" cols="50" placeholder="Enter one answer to the question" required="required"></textarea>
			</div>
			<p  >
					<input id="fogpass2-submit" type="submit" value="SUBMIT"/>
			</p>
			
			
		</form>
		
		
		<?php include_once "footer.php" ?>
	</body>
</html>