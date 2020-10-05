<!DOCTYPE html>
<html lang="en">

	<!-- Description: Registrationpage -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 3 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Customer Registration</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="registration page"/>
		<meta name="keywords" content="registration,users,catering"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script src="validateReg.js"></script>
		
	</head>
	
	<body onload="document.registration-form.first.focus()">
	
		<header>
			
		</header>
		
		<nav>
			
		</nav>
		

		
		<h1 id="registration-heading">Registration Form</h1>
			
		
		<form id="registration-form" method="post" action="conreg.php"  onsubmit="return ifInputInfoValid()" >
			<fieldset>
				<legend></legend>
				<table class="registration-table">
					<tr>
						<td class="registration-label"><label for="firstname">First name: </label></td>
						<td><input type="text" name="first" id="firstname" maxlength="25" pattern="^[a-zA-Z ]+$"/></td>
					</tr>
					
					<tr>
						<td class="registration-label"><label for="lastname">Last name: </label></td>
						<td><input type="text" name="last" id="lastname" maxlength="25"pattern="^[a-zA-Z ]+$"/></td>
					</tr>
					
					<tr>
					
						<td class="registration-label"><label for="email">Email address: </label></td>
						<td><input type="text" name="email" id="email"pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"/></td>
					</tr>
					
					<tr>
					
						<td class="registration-label"><label for="password">Password </label></td>
						<td><input type="password" name="password" id="password"  pattern="[a-zA-Z0-9!@#\$%\^\&*+=\._-]{8,}"/> </td>
					
					</tr>
						
					<tr>
							<td class="registration-label"><label for="tel">Phone number: </label></td>
							<td><input type="tel" name="telephone" id="telephone" placeholder="012345678" pattern="^(01)[0-9]{7}$" /></td>
					</tr>
					
					<tr>
							<td class="registration-label">Security Question: </td>
							<td><textarea name="secQues" id="secQues" rows="8" cols="70" placeholder="Enter one question only. This will help in verifying your account when you forget your password." ></textarea></td>
						
					</tr>
					
					<tr>
							<td class="registration-label">Security Answer: </td>
							<td><textarea name="secAns" id="secAns" rows="8" cols="70" placeholder="Enter one answer to the question" ></textarea></td>
					</tr>
					
					
				</table>
				
			</fieldset>
			
					<p>
						<input id="submit" type="submit" value="SUBMIT"/>
						<input type="reset" value="RESET"/>
				    </p>	
			
				
		</form>
		
		
		<footer>
			
	</footer>
	</body>
</html>