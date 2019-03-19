<?php

/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT * FROM medicine";
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
<h3>MEDICINES</h3>
<table border="2">
	<thead>
	    <tr>
	    	<th>Medicine Id</th>
	       	<th>Name</th>
	       	<th>Max Count</th>
	     	<th>Min Count</th>
	      	<th>Cost</th>
	    </tr>
	</thead>
	<tbody>
	    <?php
	      	if( mysqli_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="5">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	        	while( $row = mysqli_fetch_assoc( $selectRes ) ){
	          	echo "<tr><td>{$row['medicine_id']}</td><td>{$row['name']}</td><td>{$row['max_count']}</td><td>{$row['min_count']}</td><td>{$row['cost']}</td></tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>
<br>
<button type = "button" value="add_medicine">Add medicine</button>
<button type="button" value="del_medicine">Remove medicine</button>
</center>
</body>
<?php
 	}
?>