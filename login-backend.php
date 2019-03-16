<?php
require_once 'dbconnect.php';

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$password = md5($password);

$query = "SELECT * FROM customer WHERE customer_id='$username' AND password='$password'";

$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);

$numResults = mysqli_num_rows($result);

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}


if($numResults == 1)
{
	$_SESSION['username'] = $username;
	$url= getAddress();
	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/customer_home.html");
}
else
{
	echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
}

?>
