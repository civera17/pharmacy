<?php
require_once 'dbconnect.php';
$identifier = $_GET["identifier"];
function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
$url= getAddress();
// Add new supplier
if($identifier==1)
{
	$name = $_GET['name'];
	$address = $_GET['address'];
	$supplier_id_query = "SELECT max(supplier_id) as max_supplier_id from supplier";
	$supplier_id = 0;
	$supplier_id_res = mysqli_query($con,$supplier_id_query);
	mysqli_error($con);
	if(mysqli_num_rows($supplier_id_res) == 0)
	{
		$supplier_id = 0;
	}
	else
	{
		$row = mysqli_fetch_array($supplier_id_res);
		$supplier_id = $row['max_supplier_id']+1;
	}
	$supplier_insert_query = "INSERT INTO supplier values($supplier_id,'$name','$address')";
	mysqli_query($con,$supplier_insert_query);
	// mysqli_error($con);
	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_supplier.php");
}
// Delete supplier
else if($identifier == 0){
	$supplier_id = $_GET['supplier_id'];
	$query = "DELETE FROM supplier WHERE supplier_id = '$supplier_id'";
	mysqli_query($con,$query);
	printf(mysqli_error($con));
	$scheme = parse_url($url, PHP_URL_SCHEME);
	$user = parse_url($url, PHP_URL_USER);
	$pass = parse_url($url, PHP_URL_PASS);
	$host = parse_url($url, PHP_URL_HOST);
	$port = parse_url($url, PHP_URL_PORT);
	header("Location: ".$scheme."://".$user.":".$pass."@".$host.":".$port."/MediKart/admin_view_supplier.php");
}

// Edit supplier
else if($identifier == 2){
	$supplier_id = $_GET['supplier_id'];
	$name = $_GET['name1'];
	$address = $_GET['address'];
	if($name!=''){
		$query = "UPDATE supplier SET name = '".urlencode($name)."' WHERE supplier_id = '$supplier_id'";
		mysqli_query($con,$query);
	}
	if($address != ''){
		$query = "UPDATE supplier SET address = '".urlencode($address)."' WHERE supplier_id = '$supplier_id'";
		mysqli_query($con,$query);
		printf(mysqli_error($con));
	}
	// echo "<script type='text/javascript'>";
	// echo "alert('Details Updated!'); ";
	// echo "window.location.href = 'admin_view_supplier.php';";
	// echo "</script>";
}
?>