<!DOCTYPE html>
<html>
<head>
	<title>Confirm booking</title>
</head>
<body>
	<?php
		$chosen = $_POST['addtocart'];
		require_once 'dbconnect.php';
		if(empty($_POST['addtocart'])){
			echo "<h1> Nothing chosen! </h1>";
		}
		else{
			echo "<table>";
			echo "<tr>";
			echo "<th> ID </th>";
			echo "<th> Name </th>";
			echo "<th> Quantity chosen </th>";
			echo "<th> Cost </th>";
			echo "</tr>";
			// echo "<form action='confirm_booking_backend.php' method='POST'>";
			$N = count($chosen);
			$total_cost = 0;
			for($i=0;$i<$N;$i++){
				// echo "<p> chosen $chosen[$i] of quantity ".$_POST['orderquantity'.$chosen[$i]]."</p>";	
				$query = "SELECT medicine_id,name,cost from medicine where medicine_id = ".$chosen[$i];
				$query_result = mysqli_query($con,$query);
				$row = mysqli_fetch_array($query_result);
				echo "<tr>";
				echo "<td>".$row['medicine_id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$_POST['orderquantity'.$chosen[$i]]."</td>";
				echo "<td>".$_POST['orderquantity'.$chosen[$i]]*$row['cost']."</td>";
				$total_cost += $_POST['orderquantity'.$chosen[$i]]*$row['cost'];
				echo "</tr>";
			}
			echo "</table>";
			echo "<p> total bill amount = ".$total_cost."<p>";

		}
	?>
</body>
</html>