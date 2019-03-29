<?php

/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/
// agent_id	name	salary	address

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT * FROM delivery_agent";
if( !( $selectRes = mysqli_query($con, $selectSQL ) ) )
{
	echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
}
else{
?>
<!DOCTYPE html>
<head>
	<title>View Agents</title>
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
	    	<th width=10% style="text-align:center;">Agent Id</th>
	       	<th width=20% style="text-align:center;">Name</th>
	       	<th width=20% style="text-align: center;">Salary</th>
	       	<th width=35% style="text-align:center;">Address</th>
	       	<th width=10% style="text-align:center;">Edit</th>
	      	<th width=10% style="text-align:center;">Delete</th>
	    </tr>
	</thead>
	<tbody style="text-align:center;">
	    <?php
	      	if( mysqli_num_rows( $selectRes )==0 )
	      	{
	        	echo '<tr><td colspan="6">No Rows Returned</td></tr>';
	      	}
	      	else
	      	{
	        	while( $row = mysqli_fetch_assoc( $selectRes ) ){
	          	echo "<tr><td>{$row['agent_id']}</td><td>{$row['name']}</td><td>{$row['salary']}</td><td>{$row['address']}</td>";
	          	echo "<td align='center'><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"edit\" formaction=\"/edit_row.php\" ><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>";
		    	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" formaction=\"/admin_delete_row.php\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td>";
	          	echo "</tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>
<br><br>
<button type = "button" value="add_agent">Add supplier</button>
</center>
</body>
<?php
 	}
?>