<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Update information</h3>	
<form action= "admin_view_agent_backend.php" method="GET">
<?php
	
	require_once 'dbconnect.php';

	$agent_id = $_GET["agent_id"];
	$name = $_GET["name"];
	$salary = $_GET["salary"];
	$address = $_GET["address"];

	echo '<input type="hidden" name="identifier" value="1">';
	echo 'Agent ID:<input type="text" name="agent_id" value="'.$agent_id.'" readonly><br>';
	echo 'Name: <input type="text" name="name" value="'.$name.'"><br>';
	echo 'Salary: <input type="text" name="salary" value="'.$salary.'"><br>';
	echo 'Address: <input type="text" name="address" value="'.$address.'"><br>';
	echo '<button type="submit">Edit</button>';
	?>
</form>
</center>
</body>
</html>