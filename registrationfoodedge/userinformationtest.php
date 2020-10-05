<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Database Codes">
	<meta name="keywords" content="Web, programming">
	<meta name="author" content="">
</head>
<body>
	<h1>hello</h1>
	<?php
	function OpenCon()
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "foodedge";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn->error);
		return $conn;
	}
	 
	function CloseCon($conn)
	{
		$conn -> close();
	}
	?>

	<?php
		$conn = OpenCon();
		$sql = "SELECT * FROM userinformation WHERE CustomerFName = 'Simon'";
		if($result = mysqli_query($conn, $sql))
		{
			if(mysqli_num_rows($result) > 0){
					echo "<table>";
					echo "<tr>";
						echo "<th>first_name</th>";
						echo "<th>last_name</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>";
						echo "<td>" . $row['CustomerFName'] . "</td>";
						echo "<td>" . $row['CustomerLName'] . "</td>";
					echo "</tr>";
				}
			}
		}
        echo "</table>";
        mysqli_free_result($result);
		CloseCon($conn);
	?>
</body>
</html>