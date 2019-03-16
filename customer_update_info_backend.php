<?php

require_once 'dbconnect.php';

$username = $_SESSION['username'];
$password = $_POST["password"];
$password1 = $_POST["password1"];

$password = md5($password);
$password1 = md5($password1);

$query = "UPDATE customer SET password=$password 
		WHERE customer_id='$username' AND $password=$password1";

$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	// echo "<br><br><br><center><h1>Hi ".$row["name"]."!</h1></center>";
	header("Location: http://localhost:8080/MediKart/customer_home.php");
}
else
{
	echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
}

?>
