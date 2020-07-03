<?php
require_once 'dbconnect.php';

session_start();

$username = $_POST["username"];
$password1 = $_POST["password"];

$password = ($password1);

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

if($username == 'admin' && $password1 == 'admin')
{
	$_SESSION['username'] = 'admin';
	$url= getAddress();
	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_home.php");
}
else
{
	$query = "SELECT * FROM customer WHERE customer_id='$username' AND password='$password'";

	$result = mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);

	$numResults = mysqli_num_rows($result);

	if($numResults == 1)
	{
		$_SESSION['username'] = $username;
		$url= getAddress();
		$scheme = parse_url($url, PHP_URL_SCHEME);
		$user = parse_url($url, PHP_URL_USER);
		$pass = parse_url($url, PHP_URL_PASS);
		$host = parse_url($url, PHP_URL_HOST);
		$port = parse_url($url, PHP_URL_PORT);
		header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/customerHome.php");
	}
	else
	{
		echo "<br><br><br><center><h1>Invalid credentials!</h1></center>";
	}
}
?>
