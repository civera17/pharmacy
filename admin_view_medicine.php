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
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body style="margin:5%;padding:0" background="med.jpg" background-size=cover>
<center>
<h3>MEDICINES</h3>
<table border="2">
	<thead>
	    <tr>
	    	<!-- <input type="checkbox" id="checkall" /></th> -->
	    	<th width=10% style="text-align:center;">Medicine Id</th>
	       	<th width=25% style="text-align:center;">Name</th>
	       	<th width=10% style="text-align:center;">Max Count</th>
	     	<th width=10% style="text-align:center;">Min Count</th>
	      	<th width=15% style="text-align:center;">Cost</th>
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
	          	echo "<tr><td>{$row['medicine_id']}</td><td>{$row['name']}</td><td>{$row['max_count']}</td><td>{$row['min_count']}</td><td>{$row['cost']}</td>";
			    echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"edit\" ><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>";
		    	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><form action=\"admin_view_medicine_delrow.php\" method=\"get\"><input type='hidden' name='medicine_id' value='".$row['medicine_id']."'>
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
 <!--  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li> --> 
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
</div>

<button type="button" name="Add medicine">Add medicine</button>

<!-- <button type = "button" value="add_medicine">Add medicine</button>
<button type="button" value="del_medicine">Remove medicine</button> -->
</center>
</body>
<?php
 	}
?>