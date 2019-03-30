<?php

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT customer.customer_id as customer_id,customer.name as name,medicine_name FROM customer, requests WHERE customer.customer_id=requests.customer_id ";
if(!($selectRes = mysqli_query($con,$selectSQL)))
{
	echo 'retrieval of data from database failed -#'.mysqli_errno().':'.mysqli_error();
}
else{
?>

<!DOCTYPE html>
<head>
	<title>View Customer Requests</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<center>
	<h3>CUSTOMER REQUESTS</h3>
	<table border ="2">
		<thead>
			<tr>
				<th width=20% style="text-align:center;">Customer ID</th>
				<th width=30% style="text-align:center;">Customer name</th>
				<th width=30% style="text-align:center;">Medicine Name</th>
				<th width=20% style="text-align:center;">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(mysqli_num_rows($selectRes)==0)
				{
					echo '<tr><td colspan="4">No Rows Returned</td></tr>';
				}
				else
				{
					while($row=mysqli_fetch_array($selectRes))
					{
						echo"<tr>
						<td>{$row['customer_id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['medicine_name']}</td>";
						echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\">
		    			<form action=\"admin_view_medicine_requests_backend.php\" method=\"get\">
			    		<input type='hidden' name='identifier' value='0'>
			    		<input type='hidden' name='customer_id' value='".$row['customer_id']."'>
			    		<input type='hidden' name='medicine_name'value='".$row['medicine_name']."'>
			    		<button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" >
			    		<span class=\"glyphicon glyphicon-trash\">
			    		</span></button></form></p></td>";
				    	echo "";
			          	echo "</tr>\n";

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