<html>
<body>
	<br><br>
	<center>
		<h3>Signup</h3>
		<form action = "signup-backend.php" method = "POST" >
			Name: <input name = "name" placeholder = "Name" style="<?php echo $error_css; ?>"><br><br>
			Username: <input name = "username" placeholder = "username" style="<?php echo $error_css; ?>"><br><br>
			Password: <input name = "password" type = "password" placeholder = "Password" style="<?php echo $error_css; ?>"><br><br>
			Address: <input name = "address" placeholder = "Address" style="<?php echo $error_css; ?>"><br><br>
			<button type = "submit">Submit</button>
		</form>
	</center>
</body>
</html>
