<!DOCTYPE html>
<html>
<head>
	<title>Your medicine requests</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
	<?php
		session_start();
		$username = $_SESSION["username"];
		require_once 'dbconnect.php';
		$query = "SELECT requests.medicine_id as medicine_id
				  FROM requests
				  WHERE customer_id = $username";
		$query_result = mysqli_query($con, $query);
	?> 
	<h3>Your medicine requests</h3>
	<table border="2">
		<tr>
			<th> Medicine ID</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($query_result))
			{
				echo "<tr>";
				echo "<td>".$row['medicine_id']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</center>
</body>
</html>