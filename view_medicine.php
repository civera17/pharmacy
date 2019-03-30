<?php
	require_once 'dbconnect.php';
	$query = "SELECT medicine.medicine_id as id, medicine.name as name,	medicine.cost as cost, sum(inventory.quantity) as quantity
				FROM medicine, inventory
				WHERE medicine.medicine_id = inventory.medicine_id
				GROUP BY medicine.medicine_id, medicine.name, medicine.cost";
	$query_result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<head> 
	<title> View Medicines </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util_table.css">
	<link rel="stylesheet" type="text/css" href="css/main_table.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body style="margin:5%;padding:0" background-size=cover>
	<center>
		<h3> Medicines </h3>
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table border="2">
								<thead>
									<tr class="row100 head">
										<th style="text-align: center;" class="cell100 column2"> ID </th>
										<th style="text-align: center;" class="cell100 column1"> Name </th>
										<th style="text-align: center;" class="cell100 column2"> Cost </th>
										<th style="text-align: center;" class="cell100 column2"> Available quantity </th>
										<th style="text-align: center;" class="cell100 column2"> Add to cart </th>
										<th style="text-align: center;" class="cell100 column4"> Choose quantity </th>
									</tr>
								</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<form action="confirm_booking.php" method="POST" id='view_medicine'>
							<?php
								while ($row = mysqli_fetch_array($query_result)){
									echo "<tr class='row100 body'>";
									echo "<td style='text-align: center' class='cell100 column2'>".$row['id']."</td>";
									echo "<td style='text-align: center' class='cell100 column1'>".$row['name']."</td>";
									echo "<td style='text-align: center' class='cell100 column2'>".$row['cost']."</td>";
									echo "<td style='text-align: center' class='cell100 column2'>".$row['quantity']."</td>";
									$row_quant = $row['quantity'];
									echo "<td class='cell100 column2'><input type='checkbox' name='addtocart[]' value='$row[id]' style='margin-left: 50%'></td>";
									echo "<td style='text-align: center' class='cell100 column2'><input type='number' name='orderquantity".$row['id']."' max='$row_quant'></td>";
									echo "</tr>";
								}
							?>
								</form>
							</tbody>
						</table>
					</div>
				</div>
				<div>
					<button style="padding: 5px 16px; border: 2px solid black; border-radius: 10px; color: black; font-size: 15px; font-style: bold" type='submit' form='view_medicine' name='Place Order' value = 'Place Order' align='bottom'> Place Order </button>
				</div>
				<br>
				<div>
					<button style="padding: 5px 16px; border: 2px solid black; border-radius: 10px; color: black; font-size: 15px; font-style: bold" class = "login100-form-btn" onclick="location.href='request_medicine.php'" type="button" name="Request New Medicine">Request New Medicine </button>
				</div>
			</div>
		</div>
	</center>
</body>
</html>