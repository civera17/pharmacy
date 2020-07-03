<?php
require_once 'dbconnect.php';
$query = "SELECT medicine.medicine_id as id, medicine.name as name,	medicine.cost as cost, sum(inventory.quantity) as quantity
				FROM medicine, inventory
				WHERE medicine.medicine_id = inventory.medicine_id and expiry_date > curdate()
				GROUP BY medicine.medicine_id, medicine.name, medicine.cost";
$query_result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.6">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Customer Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/cover/">
    <!-- Bootstrap core CSS -->
    <link href="./CustomerHome_files/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png"
          sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32"
          type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16"
          type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg"
          color="#563d7c">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            background: lightseagreen !important;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="./CustomerHome_files/cover.css" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><img src="images/logoFinal.png" width="200" height="33"></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="viewMedicine.php">Place Order</a>
                <a class="nav-link" href="CustomerViewOrders.php">My Orders</a>
                <a class="nav-link" href="customerUpdateInfo.php">Update Info</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Select what you want to do</h2>
        <br>
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Request Medicine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Place Order</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
                <form action="request_medicine_backend.php" method="POST">
                    <div class="form-group">
                        <label for="text">Medicine Name</label>
                        <input type="text" class="form-control" placeholder="Enter medicine name" name="medicine_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Request new medicine</button>
                </form>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <div class="container p-3 my-3 text-white">
                    <table border="2" class="table table-bordered table-info" style="text-align: center; font-size: 20px">
                        <thead>
                        <tr>
                            <th style="text-align: center; font-size:20px"> ID</th>
                            <th style="text-align: center; font-size:20px"> Name</th>
                            <th style="text-align: center; font-size:20px"> Cost</th>
                            <th style="text-align: center; font-size:20px"> Available quantity</th>
                            <th style="text-align: center; font-size:20px"> Add to cart</th>
                            <th style="text-align: center;font-size:20px"> Choose quantity</th>
                        </tr>
                        </thead>
                        <!-- </table> -->
                </div>
                <!-- <div class="table100-body js-pscroll"> -->
                <!-- <table border="2" style="background-color: white ; font-size: 20px"> -->
                <tbody>
                <form action="confirm_booking.php" method="POST" id='view_medicine'>
                    <?php
                    while ($row = mysqli_fetch_array($query_result)) {
                        // echo "<tr class='row100 body'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['cost'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        $row_quant = $row['quantity'];
                        echo "<td class='cell100 column2'><input type='checkbox' name='addtocart[]' value='$row[id]' style='margin-left: 50% '></td>";
                        echo "<td style='text-align: center;' class='cell100 column2'><input style='border: 2px solid #cdcdcd; border-color: rgba(0, 0, 0, .14); background-color:#aeefb2; font-size: 14px; font-weight: bold; text-align:center; width:100%' type='number' min='1' name='orderquantity" . $row['id'] . "' max='$row_quant'></td>";
                        echo "</tr>";
                    }
                    ?>
                </form>
                </tbody>
                </table>
                <div class="container">
                    <button class="btn btn-primary" form="view_medicine">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<footer class="mastfoot mt-auto">
    <div class="inner">
        <p><a>Online pharmacy</a>.</p>
    </div>
</footer>
</div>


<div at-magnifier-wrapper="">
    <div class="at-theme-light">
        <div class="at-base notranslate" translate="no">
            <div class="Z1-AJ" style="top: 0px; left: 0px;"></div>
        </div>
    </div>
</div>
</body>
</html>
