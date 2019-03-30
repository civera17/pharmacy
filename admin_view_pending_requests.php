<?php

/*$host = "localhost";
$user = "USER_NAME";
$dbpass = "PASSWORD";
$dbname = "DB_NAME";
$con = mysqli_connect($host,$user,$dbpass,$dbname);
*/

session_start();
require_once 'dbconnect.php';

$selectSQL = "SELECT * FROM pending_requests";
if( !( $selectRes = mysqli_query($con, $selectSQL ) ) )
{
	echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
}
else{
?>
<!DOCTYPE html>
<head>

	<title>View Pending Requests</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body style="margin:5%;padding:0" background="med.jpg" background-size=cover>
<center>
<h3>PENDING REQUESTS</h3>
<table border="2">
	<thead>
	    <tr>
	    	<!-- <input type="checkbox" id="checkall" /></th> -->
	    	<th width=25% style="text-align:center;">Supplier Id</th>
	    	<th width=25% style="text-align:center;">Medicine Id</th>
	       	<th width=10% style="text-align:center;">Quantity</th>

	      	<!-- <th width=10% style="text-align:center;">Edit</th> -->
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
	        	while( $row = mysqli_fetch_assoc( $selectRes ) )
            {
	          	echo "<tr><td>{$row['supplier_id']}</td><td>{$row['medicine_id']}</td><td>{$row['quantity']}</td>";
			   
		    	
          echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><form action=\"admin_view_medicine_backend.php\" method=\"get\">
          <input type='hidden' name='identifier' value='0'>
          <input type='hidden' name='medicine_id' value='".$row['medicine_id']."'>
          <input type='hidden' name='supplier_id' value='".$row['supplier_id']."'>
          <input type='hidden' name='quantity' value='".$row['quantity']."'>
          <button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" ><span class=\"glyphicon glyphicon-trash\"></span>
          </button>
          </form>
          </p></td>";
          echo "";
		    	echo "</tr>";

	        }
	      }
	    ?>
	</tbody> 
</table>
<br>
<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>

  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
</div>

<button onclick = "location.href='admin_add_pending_request.php'" type="button" name="Add pending request">Add pending request</button>


<!-- <button type = "button" value="add_medicine">Add medicine</button>
<button type="button" value="del_medicine">Remove medicine</button> -->
</center>
</body>
<?php
 	}
?>