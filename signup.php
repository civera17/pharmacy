<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<br><br>
	<center>
		<h3>Signup</h3>
		<form action = "signup-backend.php" method = "POST" >
			Name: <input name = "name" placeholder = "Name" required><br><br>
			Username: <input name = "username" placeholder = "username" required><br><br>
			Password: <input name = "password" type = "password" placeholder = "Password" required><br><br>
			Address: <input name = "address" placeholder = "Address" required><br><br>
			Phone no. <input name = "phoneno1" placeholder = "Phone No" required><br><br>
			Phone no.(optional) <input name = "phoneno2" placeholder = "Phone No(optional)"><br><br>
			<button type = "submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
	</center>
</body>
</html>
