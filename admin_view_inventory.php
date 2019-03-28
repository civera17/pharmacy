<?php

// inventory_id	medicine_id	quantity	manufacture_date	expiry_date	shelf_no

session_start();
require_once 'dbconnect.php';
$selectSQL = "SELECT inventory_id,medicine.medicine_id as m_id,medicine.name as name, quantity,manufacture_date,expiry_date,shelf_no FROM inventory,medicine WHERE inventory.medicine_id=medicine.medicine_id";

if(!($selectRes = mysqli_query($con,$selectSQL)))
{
	echo 'retrieval of data from database failed -#'.mysqli_errno().':'.mysqli_error();
}
else
{
?>

<!DOCTYPE html>
<head>
	<title>View inventory</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<center>
	<h3>INVENTORY</h3>
	<table border="2">
		<thead>
			<tr>
				<th width=10% style="text-align:center;">Inventory ID</th>
				<th width=10% style="text-align:center;">Medicine ID</th>
				<th width=15% style="text-align:center;">Name</th>
				<th width=10% style="text-align:center;">Quantity</th>
				<th width=15% style="text-align:center;">Manufacture Date</th>
				<th width=15% style="text-align:center;">Expiry Date</th>
				<th width=10% style="text-align:center;">Shelf No.</th>
				<th width=10% style="text-align:center;">Edit</th>
	      		<th width=10% style="text-align:center;">Delete</th>
			</tr>
		</thead>
		<tbody  style="text-align:center;">
			<?php
			if(mysqli_num_rows($selectRes)==0)
				{
					echo '<tr><td colspan="9">No Rows Returned</td></tr>';
				}
				else
				{
					while($row=mysqli_fetch_array($selectRes))
					{
						echo"<tr>
						<td>{$row['inventory_id']}</td>
						<td>{$row['m_id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['quantity']}</td>
						<td>{$row['manufacture_date']}</td>
						<td>{$row['expiry_date']}</td>
						<td>{$row['shelf_no']}</td>";
						echo "<td align='center'><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"edit\" formaction=\"/edit_row.php\" ><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>";
				    	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" formaction=\"/admin_delete_row.php\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td>";
						echo "</tr>\n";

					}
				}
				?>
		</tbody>
		<br>
		<br>

</table>
<br>
<button type="button" value="Add">Add to inventory</button>
</center>
<?php
}
?>