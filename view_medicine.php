<!DOCTYPE html>
<html>
<head>
	<title>Medicine Catalog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<center>
	<?php
		require_once 'dbconnect.php';
		$query = "SELECT medicine.medicine_id as id, medicine.name as name,	medicine.cost as cost, sum(inventory.quantity) as quantity
					FROM medicine, inventory
					WHERE medicine.medicine_id = inventory.medicine_id
					GROUP BY medicine.medicine_id, medicine.name, medicine.cost";
		$query_result = mysqli_query($con,$query);
	?>
	<h3> Medicines </h3>
	<table border="2">
		<form action="confirm_booking.php" method="POST" id='view_medicine'>
		<tr>
			<th> ID </th>
			<th> Name </th>
			<th> Cost </th>
			<th> Available quantity </th>
			<th> Add to cart </th>
			<th> Choose quantity </th>
		</tr>
		<?php
			while ($row = mysqli_fetch_array($query_result)){
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['cost']."</td>";
				echo "<td>".$row['quantity']."</td>";
				$row_quant = $row['quantity'];
				echo "<td><input type='checkbox' name='addtocart[]' value='$row[id]'></td>";
				echo "<td><input type='number' name='orderquantity".$row['id']."' max='$row_quant'></td>";
				echo "</tr>";
			}
		?>
		<!-- <input type="submit" name="Place Order" value="Place Order"> -->
		</form>
	</table>
	<button type='submit' form='view_medicine' name='Place Order' value = 'Place Order' align='bottom'> Place Order </button>
	</center>
</body>
</html>