<?php
/*
$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/

require_once 'dbconnect.php';

$username = $_POST["username"];
$password = $_POST["password"];

$password = md5($password);

$query = "SELECT * FROM customer WHERE customer_id='$username' AND password='$password'";

$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	// echo "<br><br><br><center><h1>Hi ".$row["name"]."!</h1></center>";
	header("Location: http://localhost:8080/MediKart/welcome.php");
}
else
{
	echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
}

?>
