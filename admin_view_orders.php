<?php

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT order_id,order_date,orders.customer_id as c_id,customer.name as c_name,orders.agent_id as a_id,delivery_agent.name as a_name,bill FROM orders,customer,delivery_agent WHERE customer.customer_id=orders.customer_id and orders.agent_id=delivery_agent.agent_id ";
if(!($selectRes = mysqli_query($con,$selectSQL)))
{
	echo 'retrieval of data from datbase failed -#'.mysqli_errno().':'.mysqli_error();
}
else{
?>

<!DOCTYPE html>
<head>
	<title>View Orders</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
	<h3>ORDERS</h3>
	<table border ="2">
		<thead>
			<tr>
				<th width=10%>Order_id</th>
				<th width=20%>Date</th>
				<th width=10%>Customer ID</th>
				<th width=20%>Customer name</th>
				<th width=10%>Agent ID</th>
				<th width=20%>Agent name</th>
				<th width=20%>Bill</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(mysqli_num_rows($selectRes)==0)
				{
					echo '<tr><td colspan="7">No Rows Returned</td></tr>';
				}
				else
				{
					while($row=mysqli_fetch_array($selectRes))
					{
						echo"<tr>
						<td>{$row['order_id']}</td>
						<td>{$row['order_date']}</td>
						<td>{$row['c_id']}</td>
						<td>{$row['c_name']}</td>
						<td>{$row['a_id']}</td>
						<td>{$row['a_name']}</td>
						<td>{$row['bill']}</td>
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