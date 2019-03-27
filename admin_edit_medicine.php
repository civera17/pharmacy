<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Update information</h3>	
<form action= "admin_view_medicine_backend.php" method="GET">
	<?php
	require_once 'dbconnect.php';

	$medicine_id = $_GET["medicine_id"];
	$name = $_GET["name"];
	$max_count = $_GET["max_count"];
	$min_count = $_GET["min_count"];
	$cost = $_GET["cost"];

	echo '<input type="hidden" name="identifier" value="1">';
	echo 'medicine_id: <input type="text" name="medicine_id1" value="'.$medicine_id.'" readonly><br>';
	echo 'name: <input type="text" name="name1" placeholder="'.$name.'"><br>';
	echo 'max_count: <input type="text" name="max_count1" placeholder = "'.$max_count.'"><br>';
	echo 'min_count: <input type="text" name="min_count1" placeholder = "'.$min_count.'"><br>';
	echo 'cost: <input type="text" name="cost1" placeholder="'.$cost.'"><br>';

	echo '<button type="submit">Edit</button>';
	?>
</form>
</center>
</body>
</html>