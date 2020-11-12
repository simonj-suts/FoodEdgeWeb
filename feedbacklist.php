<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Feedback Records</title>
		<meta charset="utf-8">
		<meta name="description" content="FoodEdge Feedback Form">
		<meta name="keywords" content="feedback, food, catering, services">
		<meta name="author" content="Jibril Saleem">
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	</head>
	
	<body id="feedbacklistbody">
		<?php session_start() ?>
		<?php
			 /* arrays of authorised user */
			 define("AUTHORISED_ROLES",["2"]);

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
		
		<h1 id="feedbacklist_header">Feedback Records</h1>
		
		<div class="feedbacklist_tablediv">
			<?php
				$query = "SELECT * FROM feedback";
				$result = @mysqli_query($db,$query);
					
				echo "<table class=\"feedbacklist_table\">";
				echo "<tr><th>CustomerID</th><th>Feedback Category</th><th>Suggestion</th></tr>";
				
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row['CustomerID']."</td>";
					echo "<td>".$row['FeedbackCategory']."</td>";
					echo "<td>".$row['Suggestion']."</td></tr>";
				}
				echo "</table>";
		
				$database->closeConnection();
			?>
		</div>
		
		<div class="feedbacklist_buttondiv">
			<a class="feedbacklist_button" href="feedbacklist.php#feedbacklist_header">Back to the Top</a>
		</div>
		
		<?php include_once "footer.php" ?>  
	</body>
</html>
