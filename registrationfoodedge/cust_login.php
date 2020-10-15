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
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
		
	</head>
	
	<body onload="document.registration-form.first.focus()">
	
		<header>
			
		</header>
		
		<nav>
			
		</nav>
		

	
			
		
		<form id="login-form" method="post" >
			
									
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
						header("Location: registration.php");
						
						
						
					
					
				}
				$database->closeConnection();
				}
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
					
					<tr><td id="loginBtn" colspan="2"><input id="submit" type="submit" value="Log In"/>
					
					</td></tr>
					
					<tr><td id="link-cell" colspan="2"><span id="link"><a href="fogpass.php">Forget Your Password?</a> <a href="registration.php">Dont have an account yet?</a></span></td></tr>
						
					
				</table>
				
				
				
				
				
				
				
				
				
		</form>
		
		
		
		
		<footer>
			
	</footer>
	</body>
</html>