<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Feedback Form</title>
		<meta charset="utf-8">
		<meta name="description" content="FoodEdge Feedback Form">
		<meta name="keywords" content="feedback, food, catering, services">
		<meta name="author" content="Jibril Saleem">
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
	</head>
	<body class="feedbackformbody">
		<?php session_start() ?>
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
				<div>
				<div class ="feedbackbuttongroup">
					<button class="feedbacksubmitbutton"><span>Submit</span></button>
					<input type="reset" class="feedbackresetbutton"></button>
				</div>	
			</form>
		</div>
	</body>
</html>