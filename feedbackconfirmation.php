<!DOCTYPE html>
<?php
	session_start();
?>

<html lang="en">
	<head>
		<title>Feedback Confirmation</title>
		<meta charset="utf-8">
		<meta name="description" content="FoodEdge Feedback Form">
		<meta name="keywords" content="feedback, food, catering, services">
		<meta name="author" content="Jibril Saleem">
		<link rel="stylesheet" type="text/css" href="form_table.css"/> 
	</head>
	<body class="confirmationfeedbackbody">
	<?php 
		
		$customerID = $_SESSION["custid"];
		$feedbackCat = $_POST["feedbackcat"];
		$suggestion = $_POST["suggestion"];
		
		include 'database.php';
		$database = new Database();
		$db = $database->getConnection();
		$stmt = $db->prepare("INSERT INTO feedback(customerID, FeedbackCategory, Suggestion) values(?,?,?)");
		$stmt->bind_param("iss",$customerID,$feedbackCat,$suggestion);
		$stmt->execute();
		$stmt->close();
		$database->closeConnection();
	?>
		<div class="feedbackmessage">
			<h1 class="confirmheader">Feedback Submitted!</h1>
			
			<img id="feedbacklogo" src="media/foodedgelogo.png" alt="company logo"/>
			
			<p class = "feedbacknames"> Dear <?php echo $_SESSION["fname"]; echo " ". $_SESSION["lname"];?>,</p>
			
			<p class="confirmmessage">We at FoodEdge would like to thank you for your feedback as it is highly appreciated. We hope to improve and provide the best catering service for everyone.</p>
			
			<div class="confirmfeedbackbutton">
				<button onclick="window.location='cust_login.php';" class="buttontohome"><span>Back to Home</span></button>
			<div>
		</div>
	</body>
</html>