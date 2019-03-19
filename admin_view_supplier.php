<?php

/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT * FROM supplier";
if( !( $selectRes = mysqli_query($con, $selectSQL ) ) )
{
	echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
}
else{
?>
<!DOCTYPE html>
<head>
	<title>View Medicines</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<center>
<h3>SUPPLIERS</h3>
<table border="2">
	<thead>
	    <tr>
	    	<th>Supplier Id</th>
	       	<th>Name</th>
	       	<th>Address</th>
	    </tr>
	</thead>
	<tbody>
	    <?php
	      	if( mysqli_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="3">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	        	while( $row = mysqli_fetch_assoc( $selectRes ) ){
	          	echo "<tr><td>{$row['supplier_id']}</td><td>{$row['name']}</td><td>{$row['address']}</td></tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>
<br><br>
<button type = "button" value="add_supplier">Add supplier</button>
<button type="button" value="del_supplier">Remove Supplier</button>
</center>
</body>
<?php
 	}
?>