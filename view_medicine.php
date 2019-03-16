<!DOCTYPE html>
<html>
<head>
	<title>Medicine Catalog</title>
</head>
<body>
	<?php
		require_once 'dbconnect.php';
		$query = "SELECT medicine.medicine_id as id, medicine.name as name,	medicine.cost as cost, sum(inventory.quantity) as quantity
					FROM medicine, inventory
					WHERE medicine.medicine_id = inventory.medicine_id
					GROUP BY medicine.medicine_id, medicine.name, medicine.cost";
		$query_result = mysqli_query($con,$query);
	?>
	<table>
		<form action="" method="POST">
		<tr>
			<th> ID </th>
			<th> Name </th>
			<th> Cost </th>
			<th> Available quantity </th>
			<th> Add to cart </th>
		</tr>
		<?php
			while ($row = mysqli_fetch_array($query_result)){
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['cost']."</td>";
				echo "<td>".$row['quantity']."</td>";
				echo "<td><input type='checkbox' name='addtocart[]' value='$row[id]'></td>";
				echo "<td><input type='number' name='orderquantity".$row['id']."'></td>";
			}
		?>
		<input type="submit" name="Place Order" value = "Place Order" align="bottom">
		</form>
	</table>
</body>
</html>