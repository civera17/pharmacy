<?php
session_start();
require_once 'dbconnect.php';

$username = $_SESSION['username'];
$password = $_POST["password"];
$password1 = $_POST["password1"];

$password = md5($password);
$password1 = md5($password1);

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
if($password == $password1){
$query = "UPDATE customer SET password='$password' 
		WHERE customer_id='$username' AND '$password'='$password1'";

$result = mysqli_query($con, $query);

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
	echo "<br><br><br><center><h1>Passwords don't match!</h1></center>";
}

?>
