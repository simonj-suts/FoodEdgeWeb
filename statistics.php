<!DOCTYPE html>
<html lang="en">

	<!-- Description: Statistics for management team -->
	<!-- Author: Jibril Saleem-->
	<!-- Date:3 October 2020-->
	<!-- Validated: -->

	<head>
		<title>Statistics</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Jibril Saleem"/>
		<meta name="description" content="about profile"/>
		<meta name="keywords" content="about, web, author, jibril, saleem"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<article>
			<h1 id="statistics_header">Statistics for Business Operation</h1>
				<h2 class="statistics_subheader">Record Table</h2>
					<?php
						$con = mysqli_connect("localhost","root","","foodedge");
						if (!$con){
							die("Connection failed: ". mysqli_connect_error());
						}else{
							echo "Successfully connecting to the database\n";
							echo "<br />";
						}
		
						$sql = "SELECT * FROM orders INNER JOIN package ON orders.package_id = package.package_id ";
						$sql2 = "SELECT SUM(price_per_pax) AS sum FROM orders INNER JOIN package ON orders.package_id = package.package_id ";
						
						$result = mysqli_query($con, $sql);
						$result2 = mysqli_query($con, $sql2);
						
						echo "<div id=\"view_table_div\"><table id=\"statistics_table\">";
						echo "<tr><th>Order Date</th><th>Package ID</th><th>Package Price</th></tr>";
						
						$row = mysqli_fetch_assoc($result);
						$row2 = mysqli_fetch_assoc($result2);
						
						while ($row){
							echo "<br/><tr><td>{$row['order_date']}</td>";
							echo "<td> {$row['package_id']}</td>";
							echo "<td> {$row['price_per_pax']}</td>";
							
							$row = mysqli_fetch_assoc($result);
						}
						echo "</table></div>";
						
						echo "<div id=\"view_table_div\"><table id=\"statistics_table\">";
						
						echo "<tr><th>Total Estimated Revenue : RM</th><th>{$row2['sum']}</th></tr>";
						
						echo "</table></div>";
							
						mysqli_close($con);
					?>
				<section>
					<h2 class="statistics_subheader">Graph Statistics</h2>	
				</section>
		</article>
	</body>
</html>