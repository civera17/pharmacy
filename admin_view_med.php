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
if( !( $selectRes = mysql_query( $selectSQL ) ) )
{
	echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
}
else{
?>
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
	      	if( mysql_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="4">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	        	while( $row = mysql_fetch_assoc( $selectRes ) ){
	          	echo "<tr><td>{$row['name']}</td><td>{$row['addr1']}</td><td>{$row['addr2']}</td><td>{$row['mail']}</td></tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>


 <?php
 	}
 ?>