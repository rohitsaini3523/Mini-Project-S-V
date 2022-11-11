<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <center>
        <div class="container">
            <div class="homepage">
                <h1 class="head">Customer List</h1>
            </div>
        </div>
    </center>
    <?php
    $cust_id = $cust_name = $cust_address = $cust_phone = $cust_vehicle_no = "";
    $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
    if ($conn == false) {
        die("Connection Failed: " . $conn->connect_error);
    }
    $query = "select * from customer;";
    $res = $conn->query($query);
    while ($row = $res->fetch_assoc()) {
        $cust_id = $row['cust_id'];
        $cust_name = $row['cust_name'];
        $cust_address = $row['cust_address'];
        $cust_phone = $row['cust_phone'];
        $cust_vehicle_no = $row['cust_vehicle_no'];
        echo "<div class='container' style ='padding:1%;'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Customer ID: $cust_id</h5>";
        echo "<h6 class='card-subtitle mb-2 text-muted'>Customer Name: $cust_name</h6>";
        echo "<p class='card-text'>Customer Address: $cust_address</p>";
        echo "<p class='card-text'>Customer Phone: $cust_phone</p>";
        echo "<p class='card-text'>Customer Vehicle No: $cust_vehicle_no</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <script src="algo.js">
    </script>
</body>

</html>