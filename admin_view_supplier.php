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
	<title>View Suppliers</title>
	<!--< link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body style="margin:5%;padding:0">
<center>
<h3>SUPPLIERS</h3>
<table border="2">
	<thead>
	    <tr>
	    	<th width=20% style="text-align:center;">Supplier Id</th>
	       	<th width=30% style="text-align:center;">Name</th>
	       	<th width=40% style="text-align:center;">Address</th>
	       	<th width=10% style="text-align:center;">Edit</th>
	      	<th width=10% style="text-align:center;">Delete</th>
	    </tr>
	</thead>
	<tbody style="text-align:center;">
	    <?php
	      	if( mysqli_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="5">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	        	while( $row = mysqli_fetch_assoc( $selectRes ) ){
		          	echo "<tr><td>".urldecode($row['supplier_id'])."</td><td>".urldecode($row['name'])."</td><td>".urldecode($row['address'])."</td>";
		          	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\">
			          <form action=\"admin_edit_supplier.php\" method=\"get\">
			          <input type='hidden' name='identifier' value='2'>
			          <input type='hidden' name='supplier_id' value='".$row['supplier_id']."'>
			          <input type='hidden' name='name' value='".urlencode($row['name'])."'>
			          <input type='hidden' name='address' value='".urlencode($row['address'])."'>
			          <button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"edit\" ><span class=\"glyphicon glyphicon-pencil\"></span>
			          </button>
			          </form>
			          </p></td>";

			    	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><form action=\"admin_view_supplier_backend.php\" method=\"get\">
			          <input type='hidden' name='identifier' value='0'>
			          <input type='hidden' name='supplier_id' value='".$row['supplier_id']."'>
			          <button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" ><span class=\"glyphicon glyphicon-trash\"></span>
			          </button>
			          </form>
			          </p></td>";
		          	echo "</tr>\n";
		        }
	      	}
	    ?>
	</tbody> 
</table>
<br><br>
<button type = "button" value="add_supplier" onclick="window.location.href='admin_add_supplier.php'">Add supplier</button>
</center>
</body>
<?php
 	}
?>