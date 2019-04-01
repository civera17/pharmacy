<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body style="margin:5%;padding:0; background-image:url('medicine.jpg'); background-repeat:no-repeat;background-size: cover"  >
<!-- background-color:#edb6aa;"  -->
<!-- /*#99e5e8; #efd7ed"*/ -->
<center>
<h1 style="font-size: 35px"><b> Your medicine requests </b></h1><br><br>
	<?php
		session_start();
		$username = $_SESSION["username"];
		require_once 'dbconnect.php';
		$query = "SELECT medicine_name
				  FROM requests
				  WHERE customer_id = '$username'";
		$query_result = mysqli_query($con, $query);
		printf(mysqli_error($con));
	?> 
	<!-- <h3>Your medicine requests</h3> -->


	<table border="2" style="background-color:white ; font-size: 20px">
		<tr>
			<th> Medicine Name</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($query_result))
			{
				echo "<tr>";
				echo "<td>".$row['medicine_name']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</center>
</body>
</html>