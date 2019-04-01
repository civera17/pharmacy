<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
	<h3>View your Orders</h3>
	<?php
	session_start();
	require_once 'dbconnect.php';
	$username = $_SESSION['username'];
	$query = 'SELECT order_id,order_date,delivery_agent.name as a_name,bill FROM orders,delivery_agent WHERE orders.agent_id=delivery_agent.agent_id and orders.customer_id="'.$username.'"';
	if(!($selectRes = mysqli_query($con,$query)))
	{
		echo 'retrieval of data from datbase failed -#'.mysqli_errno().':'.mysqli_error();
	}
	else{
	?>
		<table border ="2">
			<thead>
				<tr>
					<th width=10% style="text-align:center;">Order_id</th>
					<th width=20% style="text-align:center;">Date</th>
					<th width=20% style="text-align:center;">Agent name</th>
					<th width=20% style="text-align:center;">Bill</th>
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
							<td>{$row['order_id']}</td>
							<td>{$row['order_date']}</td>
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