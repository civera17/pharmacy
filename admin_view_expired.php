<?php

/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT inventory_id,inventory.medicine_id as medicine_id,name,quantity,manufacture_date,expiry_date,shelf_no FROM inventory,medicine WHERE expiry_date < CURDATE() and medicine.medicine_id = inventory.medicine_id";
if( !( $selectRes = mysqli_query($con, $selectSQL ) ) )
{
	echo 'Retrieval of data from Database Failed - #'.mysqli_errno($con).': '.mysqli_error($con);
}
else{
?>
<h3>MEDICINES</h3>
<table border="2">
	<thead>
	    <tr>
	    	<th>Inventory Id</th>
	    	<th>Medicine Id</th>
	    	<th>Name</th>
	       	<th>Quantity</th>
	       	<th>Manufacture Date</th>
	     	<th>Expiry Date</th>
	      	<th>Shelf no</th>
	    </tr>
	</thead>
	<tbody>
	    <?php
	      	if( mysqli_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="7">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	      		// inventory_id	medicine_id	quantity	manufacture_date	expiry_date	shelf_no
	        	while( $row = mysqli_fetch_assoc( $selectRes ) ){
	          	echo "<tr><td>{$row['inventory_id']}</td><td>{$row['medicine_id']}</td><td>{$row['name']}</td><td>{$row['quantity']}</td><td>{$row['manufacture_date']}</td><td>{$row['expiry_date']}</td><td>{$row['shelf_no']}</td></tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>
<br>
<button type = "reset" value="Reser">Reset</button>
<button type="button" value="del_medicine">Remove medicine</button>
<?php
 	}
?>