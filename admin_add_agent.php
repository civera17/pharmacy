<!DOCTYPE html>
<html>
<head>
	<title>Update agent info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Add Agent</h3>
<form action="admin_view_agent_backend.php" method="GET">
<?php

	require_once 'dbconnect.php';

	echo '<input type="hidden" name="identifier" value="2">';
	echo 'Agent ID:<input type="text" name="agent_id"><br>';
	echo 'Name: <input type="text" name="name"><br>';
	echo 'Salary: <input type="text" name="salary"><br>';
	echo 'Address: <input type="text" name="address"><br>';
	echo '<button type="submit">Add Supplier</button>';

?>

</form>
</center>
</body>
</html>