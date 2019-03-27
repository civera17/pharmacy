<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Add medicine</h3>	
<form action= "admin_view_medicine_backend.php" method="GET">
	<?php

	require_once 'dbconnect.php';

	echo '<input type="hidden" name="identifier" value="2">';
	echo 'Medicine ID: <input type="text" name="medicine_id"><br>';
	echo 'Name: <input type="text" name="name"><br>';
	echo 'Maximum Count: <input type="text" name="max_count"><br>';
	echo 'Minimum Count: <input type="text" name="min_count"><br>';
	echo 'Cost: <input type="text" name="cost"><br>';

	echo '<button type="submit">Add medicine</button>';
	?>
</form>
</center>
</body>
</html>