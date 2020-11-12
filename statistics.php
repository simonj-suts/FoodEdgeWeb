<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Statistics</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Jibril Saleem"/>
		<meta name="description" content="about profile"/>
		<meta name="keywords" content="about, web, author, jibril, saleem"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="form_table.css"/>
		<link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<?php include "database.php"?>
		<?php include "order_class.php"?>
		<?php include "userinformation_class.php"?>
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  google.charts.load("current", {packages:["corechart"]});
		  google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Packages', 'Total Revenue'],
			  <?php
				$database = new Database();
				$db = $database->getConnection();
				$order = new Order($db);
				
				$row = $order->read();
				
				$pck1=0.0;
				$pck2=0.0;
				$pck3=0.0;
				$pck4=0.0;
				$pck5=0.0;
				
				$pac_name1 = "";
				$pac_name2 = "";
				$pac_name3 = "";
				$pac_name4 = "";
				$pac_name5 = "";
							
				for($x=0;$x<count($row);$x++) {
					if ($row[$x]['package_id']=="1"){
						$pck1+=floatval($row[$x]['price_per_pax']);
						$pac_name1=$row[$x]['package_name'];
					}
					else if($row[$x]['package_id']=="2") {
						$pck2+=floatval($row[$x]['price_per_pax']);
						$pac_name2=$row[$x]['package_name'];
					}
					else if($row[$x]['package_id']=="3") {
						$pck3+=floatval($row[$x]['price_per_pax']);
						$pac_name3=$row[$x]['package_name'];
					}
					else if($row[$x]['package_id']=="4") {
						$pck4+=floatval($row[$x]['price_per_pax']);
						$pac_name4=$row[$x]['package_name'];
					}
					else if($row[$x]['package_id']=="5") {
						$pck5+=floatval($row[$x]['price_per_pax']);
						$pac_name5=$row[$x]['package_name'];
					}	 
				}
				echo"['".$pac_name1."',".$pck1."],";
				echo"['".$pac_name2."',".$pck2."],";
				echo"['".$pac_name3."',".$pck3."],";
				echo"['".$pac_name4."',".$pck4."],";
				echo"['".$pac_name5."',".$pck5."],";
			  ?>
			]);

			var options = {
				width: 900,
				height: 500,
				title: 'Total Revenue based on packages (RM)',
				fontName:'Nominee',
				fontSize: 21,
				titleTextStyle: { color: '#FFFFFF' },
				legendTextStyle: { color: '#FFFFFF' },
				backgroundColor :{fill : '#2E2E2E' },
				is3D: true,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		  }
		</script>
	</head>
	
	<body id="statistics_body">
	
		<?php session_start() ?>
		<?php
			 /* arrays of authorised user */
			 define("AUTHORISED_ROLES",["2"]);

			 /* Connect to FoodEdge database */ 
			 $database = new Database();
			 $db = $database->getConnection();

			 /* Get current user's information */
			 $user = new userInformation($db);
			 $user->getCurrentUser($_SESSION['custid']);
			 $user->checkAuthority(AUTHORISED_ROLES);
		?>
		<?php include_once "navigation.php"?>
		
		<article>
			<h1 id="statistics_header">Statistics for Business Operation</h1>
			
				<div class="statistics_button">
					<a class="button_nav" href="statistics.php#statistics_subheader">Record Table</a>
					<a class="button_nav" href="statistics.php#total_table">Total Revenue</a>
					<a class="button_nav" href="statistics.php#piechart_3d">Graph Statistics</a>
				</div>
				
				<h2 class="statistics_subheader">Record Table</h2>
					<?php
						$sum = 0;
							
						echo "<table id=\"statistics_table\">";
						echo "<tr><th>Order Date</th><th>Package ID</th><th>Package Price</th></tr>";
						
						for($x=0;$x<count($row);$x++) {
							echo "<tr><td>".$row[$x]['order_date']."</td>";
							echo "<td>".$row[$x]['package_id']."</td>";
							echo "<td>".$row[$x]['price_per_pax']."</td>";
							$sum += $row[$x]['price_per_pax'];
						}
						echo "</table>";
						
						echo "<table id=\"total_table\">";
						
						echo "<tr><td>Total Estimated Revenue :</td><td>RM{$sum}</td></tr>";
						
						echo "</table></div>";
							
						$database->closeConnection();
					?>
				<h2 class="statistics_subheader">Graph Statistics</h2>	
				<div id="piechart_3d" style="width: 900px; height: 500px; display: block; margin: 0 auto;"></div>
				
				<div class="statistics_button">
					<a class="button_nav" href="statistics.php#statistics_header">Back to the Top</a>
				</div>
		</article>
		
		<?php include_once "footer.php" ?>  
	</body>
</html>