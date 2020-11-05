<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Feedback Form</title>
		<meta charset="utf-8">
		<meta name="description" content="FoodEdge Feedback Form">
		<meta name="keywords" content="feedback, food, catering, services">
		<meta name="author" content="Jibril Saleem">
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	</head>
	<body class="feedbackformbody">
		<article>
			<?php session_start() ?>
			<?php
				 /* arrays of authorised user */
				 define("AUTHORISED_ROLES",["1","2","3"]);

				 /* Connect to FoodEdge database */ 
				 include 'database.php';
				 include 'userinformation_class.php';
				 $database = new Database();
				 $db = $database->getConnection();

				 /* Get current user's information */
				 $user = new userInformation($db);
				 $user->getCurrentUser($_SESSION['custid']);
				 $user->checkAuthority(AUTHORISED_ROLES);
			?>
			<?php include_once "navigation.php"?>
		</article>
		<div class="feedbackform">
			<form name="feedbackform" action="feedbackconfirmation.php" method="post" onsubmit="return myFunction()">
				<h1 class="feedbackform_header">Feedback Session</h1>
				<p class = "feedbacknames"> Hello <?php echo $_SESSION["fname"]; echo " ". $_SESSION["lname"];?>,</p>
				<p class="feedbackdesc">Your feedback is important to us. This way we can keep improving our services.</p>
				
				<div>
					<label class="feedbacklabel" for="fcategory">Feedback Category: </label><br/>
					
					<select name="feedbackcat" id="feedbackcat">
					  <option value="Packages">Packages</option>
					  <option value="Catering">Catering Services</option>
					  <option value="Others">Others</option>
					</select>
				</div>
				
				<div>
					<label class="feedbacklabel" for="suggestion">Suggestion/Feedback: </label><br/>
					<textarea name="suggestion" id="suggestion" maxlength="250" rows="6" placeholder="Suggestion/Feedback" required="required"></textarea>
				</div>
				<div class ="feedbackbuttongroup">
					<button class="feedbacksubmitbutton"><span>Submit</span></button>
					<input type="reset" class="feedbackresetbutton"></button>
				</div>	
			</form>
		</div>
	  <?php include_once "footer.php" ?>  
	</body>
</html>
