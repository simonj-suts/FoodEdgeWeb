<!DOCTYPE html>
<html lang="en">

	<!-- Description: Log in page -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 7 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Customer Login</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="registration page"/>
		<meta name="keywords" content="login,users,catering"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<script src="validateForm.js"></script>
		
	</head>
	
	<body class="login-body" onload="document.registration-form.first.focus()">
	
		<header>
			
		</header>
		
		<nav>
			
		</nav>
		<?php 
		session_start();
		if(isset($_SESSION['custid'])){
			header('Location: bookingform.php');
		}
		
		
		?>

	
			
		
		<form id="login-form" method="post" onsubmit="return validateUserAccount()" >
				
			<?php 
				
				include 'database.php';
				include 'userinformation_class.php';
				$database = new Database();
				$db= $database->getConnection();
				if(isset($_POST['email'])&&$_POST['password']){
					$loginEmail = $_POST['email'];
					$loginPass = $_POST['password'];
					$userinformation= new userInformation($db);
					
					if($userinformation->ifExist($loginEmail,$loginPass)){
						
						echo 'You have successfully logged in';
						
						session_start();
						$_SESSION["login"]=$loginEmail;
						$_SESSION["fname"]=$userinformation->getCustomerFirstName();
						$_SESSION["lname"]=$userinformation->getCustomerLastName();
						$_SESSION["custid"]=$userinformation->getCustomerID();
						//header("Location: index.php");
						
						
						if($userinformation->getUserRole()=='1'){
							$redirect='bookingform.php';
						}
						else {
							$redirect='index.php';
						}
						header("Location:".$redirect);
					}
				}
				$database->closeConnection();
				
			?>
				<table id="login-table"  >
					
					<tr>
						<th class="page_title" colspan="2">Login</th>
					</tr>
					<tr>
					
						<td class="login-label"><label for="email">Email address: </label></td>
						<td><input type="text" name="email" id="email" placeholder="nobody@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"/></td>
					</tr>
					
					<tr>
					
						<td class="login-label"><label for="password">Password </label></td>
						<td><input type="password" name="password" id="password"  pattern="[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}"/> </td>
						</td>
					</tr>
					
					<tr><td id="loginBtn" colspan="2"><button type='submit' class="loginbuttonsubmit"><span>Log In</span></button>
					
					</td></tr>
					
					<tr><td id="link-cell" colspan="2"><span id="link"><a href="fogpass.php">Forget Your Password?</a> <a href="registration.php">Dont have an account yet?</a></span></td></tr>
						
					
				</table>
				
				
				
		</form>
		
		
		
		
		<footer>
			
	</footer>
	</body>
</html>
