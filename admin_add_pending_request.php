<!DOCTYPE html>
<html>
<head>
	<title>Add pending request</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>Add pending request</h3>	
<form action= "admin_view_pending_request_backend.php" method="GET">
	<?php
	
	echo '<input type="hidden" name="identifier" value="2">';
	echo 'Supplier ID: <input type="text" name="supplier_id"><br>';
	echo 'Medicine ID: <input type="text" name="medicine_id"><br>';
	echo 'Quantity: <input type="text" name="quantity"><br>';

	echo '<button type="submit">Add pending request</button>';
	?>
</form>
</center>
</body>
</html>