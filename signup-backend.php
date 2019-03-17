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
$phoneno1 = $_POST["phoneno1"];
$phoneno2 = $_POST["phoneno2"];
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
	$query = "INSERT INTO customer VALUES ('$username', '$password', '$name', '$address')";
	$query1 = "INSERT INTO c_phone_no VALUES ('$username','$phoneno1')";
	
	mysqli_query($con, $query);
	mysqli_query($con,$query1);
	if(!empty($phoneno2))
	{
		$query2 = "INSERT INTO c_phone_no VALUES ('$username','$phoneno2')";
		mysqli_query($con,$query2);
	}

	echo "<br><br><br><center><h1>Successfully registered $name ! </h1></center>";
}

?>
