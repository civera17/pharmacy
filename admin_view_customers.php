<?php

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT * from customer";
if(!($selectRes = mysqli_query($con,$selectSQL)))
{
	echo 'retrieval of data from datbase failed -#'.mysqli_errno().':'.mysqli_error();
}
else{
?>

<!DOCTYPE html>
<head>
	<title>View Customers</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
	<h3>CUSTOMERS</h3>
	<table border ="2">
		<thead>
			<tr>
				<th width=20% style="text-align:center;">Customer ID</th>
				<th width=30% style="text-align:center;">Name</th>
				<th width=50% style="text-align:center;">Address</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(mysqli_num_rows($selectRes)==0)
				{
					echo '<tr><td colspan="3">No Rows Returned</td></tr>';
				}
				else
				{
					while($row=mysqli_fetch_array($selectRes))
					{
						echo"<tr>
						<td>{$row['customer_id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['address']}</td>
						</tr>\n";

					}
				}
				?>
		</tbody>
		<br>
		<br>

</table>
</center>
<?php
}
?>