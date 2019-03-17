<?php


/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/
require_once 'dbconnect.php';

$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$address = $_POST["address"];
$password = md5($password);
// $error_css = "";
$query = "SELECT * FROM customer WHERE customer_id='$username'";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	echo "<br><br><br><center><h1>Username already taken!</h1></center>";
}
else
{
	if(empty($name) || empty($username) || empty($password) || empty($address)) 
	{
		$error_css='border: 2px solid red';
	}
	else
	{
		$query = "INSERT INTO customer VALUES ('$username', '$password', '$name', '$address')";
		mysqli_query($con, $query);
		echo "<br><br><br><center><h1>Successfully registered $name ! </h1></center>";
	}
}

?>
