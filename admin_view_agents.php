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
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--Include the above in your HEAD tag -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body style="margin:5%;padding:0; background-image:url('medicine.jpg'); background-repeat:no-repeat;background-size: cover">
<center>
<h1 style="font-size: 45px">DELIVERY AGENTS</h1><br><br>
<table border="2" style="background-color:white ; font-size: 20px">
	<thead>
	    <tr>
	    	<th width=10% style="text-align:center; font-size:25px">Agent Id</th>
	       	<th width=20% style="text-align:center; font-size:25px">Name</th>
	       	<th width=20% style="text-align: center; font-size:25px">Salary</th>
	       	<th width=35% style="text-align:center; font-size:25px">Address</th>
	       	<th width=10% style="text-align:center; font-size:25px">Edit</th>
	      	<th width=10% style="text-align:center; font-size:25px">Delete</th>
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
	          	echo "<td align='center'><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\">
	          		<form action=\"admin_edit_agent.php\" method=\"get\">
					<input type='hidden' name='identifier' value='1'>
					<input type='hidden' name='agent_id' value='".$row['agent_id']."'>
					<input type='hidden' name='name' value='".$row['name']."'>
					<input type='hidden' name='salary' value='".$row['salary']."'>
					<input type='hidden' name='address' value='".$row['address']."'>
	          	  	<button class=\"btn btn-primary btn-xs\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"edit\">
	          		<span class=\"glyphicon glyphicon-pencil\">
	          		</span></button></form></p></td>";
		    	echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\">
		    	<form action=\"admin_view_agent_backend.php\" method=\"get\">
		    		<input type='hidden' name='identifier' value='0'>
		    		<input type='hidden' name='agent_id' value='".$row['agent_id']."'>
		    		<button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"delete\" >
		    		<span class=\"glyphicon glyphicon-trash\">
		    		</span></button></form></p></td>";
		    	echo "";
	          	echo "</tr>\n";
	        }
	      }
	    ?>
	</tbody> 
</table>
<br><br>
<div class="container-login100-form-btn">
<button style="width: 20%; font-size: 15px" class="login100-form-btn" onclick = "location.href='admin_add_agent.php'" type="button" value="add_agent">Add Agent</button>
</div>
<div class="container-login100-form-btn">
<button style="width: 20%; font-size: 15px ;
     margin-top: 1%;  margin-right: 1%;
     position:relative;" class="login100-form-btn" onclick = "location.href='admin_home.php'" type="button" name="Back">Back to home</button>
</div>
</center>
</body>
<?php
 	}
?>