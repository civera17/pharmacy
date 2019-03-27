<?php
	session_start();
	require_once 'dbconnect.php';
	$chosen = $_POST['data'];
	$total_cost = $_POST['bill_amount'];
	$username = $_SESSION['username'];
	$N = count($chosen);
	$order_id_query = 'SELECT max(order_id) as max_order_id from orders';
	$order_id_res = mysqli_query($con,$order_id_query);
	$num_rows = mysqli_num_rows($order_id_res);
	$order_id = 0;
	if($num_rows == 0)
	{	
		$order_id = 1;
	}
	else
	{
		$row = mysqli_fetch_array($order_id_res);
		$order_id = $row['max_order_id']+1;
	}
	$agent_id_query = 'SELECT agent_id, delivery_count from (SELECT delivery_agent.agent_id, count(orders.order_id) as delivery_count from delivery_agent LEFT JOIN orders ON delivery_agent.agent_id = orders.agent_id GROUP BY agent_id) as agent_order_count HAVING delivery_count = min(delivery_count) LIMIT 1';
	$result = mysqli_query($con,$agent_id_query);
	if(!$result){
		printf(mysqli_error($con));
	}
	$row = mysqli_fetch_array($result);
	$agent_id = $row['agent_id'];
	$curr_date = date('y/m/d',time());
	$insert_query = "INSERT INTO orders VALUES ('$order_id','$username','$agent_id','$curr_date','$total_cost')";
	mysqli_query($con,$insert_query);
	echo "<h3> Order inserted! </h3>";
	foreach($chosen as $chosen_val)
	{
		printf($chosen_val);
		echo "<br>";	
		printf('orderquantity'.$chosen_val);
		echo "<br>";	
		$med_quant = $_POST['orderquantity'.$chosen_val];
		printf($med_quant."\n");
		echo "<br>";	
		$insert_query = "INSERT INTO contains VALUES('$order_id','$chosen_val','$med_quant')";
		mysqli_query($con,$insert_query);
		// printf(mysqli_error($con));
		echo "<br>";	
		printf("Inserted ".$chosen_val."\n");
		echo "<br>";
		$done = 0;
		$inv_query = "SELECT medicine_id,quantity,inventory_id FROM inventory WHERE medicine_id = '$chosen_val' ORDER BY expiry_date";
		$result = mysqli_query($con,$inv_query);
		while($row = mysqli_fetch_array($result)){
			if($row['quantity'] > $med_quant){
				$update_query = "UPDATE inventory SET quantity = quantity - '$med_quant' WHERE inventory_id = $row['inventory_id']";
				mysqli_query($con,$update_query);
				break;
			}
			else if($row['quantity'] == $med_quant){
				$delete_query = "DELETE FROM inventory WHERE inventory_id = $row['inventory_id']";
				mysqli_query($con,$delete_query);
				break;
			}
			else{
				$med_quant = $med_quant - $row['quantity'];
				$delete_query = "DELETE FROM inventory WHERE inventory_id = $row['inventory_id']";
				mysqli_query($con,$delete_query);
			}
		}
	}

?>	