<?php
require_once 'dbconnect.php';


$identifier = $_GET["identifier"];

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

$url= getAddress();
if($identifier==0)
{
	$medicine_id = $_GET["medicine_id"];
	$query = "DELETE FROM medicine WHERE medicine_id=$medicine_id";
	$result = mysqli_query($con, $query);

	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_medicine.php");
}
else if($identifier==1)
{

	$medicine_id = $_GET["medicine_id1"];
	$name = $_GET["name1"];
	$max_count = $_GET["max_count1"];
	$min_count = $_GET["min_count1"];
	$cost = $_GET["cost1"];

	if($name!='')
	{
		echo 'here';
		$query = "UPDATE medicine SET name='$name' WHERE medicine_id='$medicine_id'";
		$result = mysqli_query($con, $query);
	}
	if($max_count!='')
	{
		$query = "UPDATE medicine SET max_count='$max_count' WHERE medicine_id='$medicine_id'";
		$result = mysqli_query($con, $query);
	}
	if($min_count!='')
	{
		$query = "UPDATE medicine SET min_count='$min_count' WHERE medicine_id='$medicine_id'";
		$result = mysqli_query($con, $query);
	}
	if($cost!='')
	{
		$query = "UPDATE medicine SET cost='$cost' WHERE medicine_id='$medicine_id'";
		$result = mysqli_query($con, $query);
	}
	// $query = "UPDATE medicine SET name='$name' and max_count='$max_count' and min_count='$min_count' 
	// 			and cost='$cost'
	// 		  WHERE medicine_id='$medicine_id'";
	// $result = mysqli_query($con, $query);

	printf(mysqli_error());

	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_medicine.php");

}
else if($identifier==2)
{
	$medicine_id = $_GET["medicine_id"];
	$name = $_GET["name"];
	$max_count = $_GET["max_count"];
	$min_count = $_GET["min_count"];
	$cost = $_GET["cost"];

	$query = "INSERT INTO medicine VALUES('$medicine_id', '$name', '$max_count', '$min_count', '$cost')";
	$result = mysqli_query($con, $query);

	printf(mysqli_error());

	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_medicine.php");

}

?>
