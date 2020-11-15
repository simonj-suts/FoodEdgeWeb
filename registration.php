<!DOCTYPE html>
<html lang="en">

	<!-- Description: Registrationpage -->
	<!-- Author: Joanna Wong -->
	<!-- Date: 3 October 2020 -->
	<!-- Validated: not yet-->
	
	<head>
		<title>Registration</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Joanna Wong"/>
		<meta name="description" content="registration page"/>
		<meta name="keywords" content="registration,users,catering"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
		<script src="https://kit.fontawesome.com/cebce8210e.js" crossorigin="anonymous"></script>
		<script src="validateForm.js"></script>
		
	</head>
	
	<body class="registration-body" >
	<?php 
		session_start();
		include 'database.php';
		include 'userinformation_class.php';
		$database = new Database();
		$db = $database->getConnection();

			 /* Get current user's information */
		$user = new userInformation($db);
		if(isset($_SESSION['custid'])){
			header('Location: bookingform.php');
		}
		?>
		<?php include_once "navigation.php"?>
		<form id="registration-form" method="post" action="conreg.php"  onsubmit="return ifInputInfoValid()">
		
			
			
			<table id="registration-table" >
				<tr>
					<th class="page_title" colspan="2">Registration</th>
				</tr>
				<tr>
					<td class="registration-unit">
						<label for="firstname" class="reg-label">First name</label>
						<input type="text" name="first" id="firstname" maxlength="25" pattern="^[a-zA-Z ]+$"/>
						
						<small id="fnamemessage"></small>
					</td>
				</tr>
				
				<tr>
					<td class="registration-unit">
						<label for="lastname" class="reg-label">Last name </label>
						<input type="text" name="last" id="lastname" maxlength="25"pattern="^[a-zA-Z ]+$"/>
					
						<small id="lnamemessage"></small>
					</td>
				</tr>
				
				<tr>
				
					<td class="registration-unit">
						<label for="email" class="reg-label">Email address </label>
						<input type="text" name="email" id="email" placeholder="nobody@example.com" /><!--pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation circle"></i>-->
						<small id="email-message"></small>
					</td>
				</tr>
				
				<tr>
					
					<td class="registration-unit">
						<label for="password" class="reg-label">Password </label>
						<input type="password" name="password" id="password" placeholder="upper/lowercase/digits/characters more than 9 letters" /> 
						<small id="pword-message"></small>	
					</td>
				
				</tr>
				
				<tr>
				
					<td class="registration-unit">
						<label for="conpassword" class="reg-label">Confirm Password </label>
						<input type="password" name="conpassword" id="conpassword"  />
						<small id="cpword-message"></small>
					</td>
				
				</tr>
					
				<tr>
						<td class="registration-unit">
							<label for="tel" class="reg-label">Phone number </label>
							<input type="tel" name="telephone" id="telephone" placeholder="012345678"/> 
							<small id="phone-message"></small>
						</td>
				</tr>
				
				<tr>
						<td class="registration-unit">
							<label for="secQues" class="reg-label">Security Question</label> 
							<select name="secQues" id="secQues">
								  <option value="Favourite number?" selected>What is your favourite number?</option>
								  <option value="What primary school?">What primary school did you attend?</option>
								  <option value="What day of the week were you born on?">Which day of the week were you exactly born on (Monday/Tuesday e.g)?</option>
							</select>
						</td>
					
				</tr>
				
				<tr>
						<td class="registration-unit"><label for="secAns" class="reg-label">Security Answer:</label>
							<textarea name="secAns" id="secAns" rows="5" cols="50" placeholder="Enter one answer to the question" ></textarea>
						
							<small id="secAns-message"></small>
						</td>
				</tr>
				<tr id="reg-btn-div" colspan="2">
					<td id="registrationBtn" >
					<button type="reset" class="button2">Reset</button><button type='submit' id="submit" class="buttonsubmit"><span>Submit</span></button>
					</td>
				</td>
			</tr>	
			</table>
			
		
								
		</form>
		<?php include_once "footer.php" ?>
	</body>
</html>