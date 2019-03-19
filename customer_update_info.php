<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Update information</h3>	
<form action= "customer_update_info_backend.php" method="POST">
	<?php
	session_start();
	require_once 'dbconnect.php';
	$username = $_SESSION['username'];
	$query = 'SELECT name, address FROM customer WHERE customer_id = "'.$username.'"';
	$query_result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($query_result);
	echo 'Enter new password: <input type="password" name="password"><br>';
	echo 'Confirm password: <input type="password" name="password1"><br>';
	echo 'Name: <input type="text" name="name" value = "'.$row['name'].'"><br>';
	echo 'Address: <input type="text" name="address" value = "'.$row['address'].'"><br>';
	echo '<button type="submit">Edit</button>';
	?>
</form>
</center>
</body>
</html>
