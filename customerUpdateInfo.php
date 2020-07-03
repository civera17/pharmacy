
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
<?php
session_start();
require_once 'dbconnect.php';
$username = $_SESSION['username'];
$query = 'SELECT name, address FROM customer WHERE customer_id = "' . $username . '"';
$query_result = mysqli_query($con, $query);
$row = mysqli_fetch_array($query_result);
?>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><img src="images/logoFinal.png" width="200" height="33"></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="viewMedicine.php">Place Order</a>
                <a class="nav-link" href="CustomerViewOrders.php">My Orders</a>
                <a class="nav-link active" href="customerUpdateInfo.php">Update profile</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <form action="customer_update_info_backend.php" method="POST">
            <!-- echo 'Name: <input type="text" name="name" value = "'.$row['name'].'"><br>'; -->
            <div class="form-group" data-validate="Name is required">
                <!-- <span class="label-input100">Medicine ID</span> -->
                <label for="email">Name:</label>
                <?php
                echo '<input class="form-control" type="text" name="name" placeholder="Enter Name" required="true" value="' . $row['name'] . '">';
                ?>
            </div>
            <!-- echo 'Enter new password: <input type="password" name="password"><br>'; -->
            <div class="form-group" data-validate="password is required">
                <!-- <span class="label-input100">Medicine ID</span> -->
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" placeholder="Enter Password">
            </div>
            <!-- echo 'Confirm password: <input type="password" name="password1"><br>'; -->
            <div class="form-group" rs1-wrap-input100 validate-input
            " data-validate="Confirm password is required">
            <!-- <span class="label-input100">Medicine ID</span> -->
            <label for="password">Confirm Password:</label>
            <input class="form-control" type="password" name="password1" placeholder="Confirm Password">
    </div>
    <div class="form-group" data-validate="Address is required">
        <!-- <span class="label-input100">Medicine ID</span> -->
        <label for="password1">Adress:</label>
        <?php
        echo '<input class="form-control" type="text" name="address" placeholder="Enter Address" required="true" value="' . $row['address'] . '">';
        ?>
    </div>
    <!-- echo 'Address: <input type="text" name="address" value = "'.$row['address'].'"><br>'; -->
    <!-- echo '<button type="submit">Edit</button>'; -->
    <button type="submit" class="btn btn-primary">Update</button>
    <br>
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