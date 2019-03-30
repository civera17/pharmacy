<?php
require_once 'dbconnect.php';

$inventory_id = $_GET["inventory_id"];

$query = "DELETE FROM inventory WHERE inventory_id=$inventory_id";

$result = mysqli_query($con, $query);

// $numResults = mysqli_num_rows($result);

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

$url= getAddress();
$scheme = parse_url($url, PHP_URL_SCHEME);
$user = parse_url($url, PHP_URL_USER);
$pass = parse_url($url, PHP_URL_PASS);
$host = parse_url($url, PHP_URL_HOST);
$port = parse_url($url, PHP_URL_PORT);
header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_inventory.php");

?>
