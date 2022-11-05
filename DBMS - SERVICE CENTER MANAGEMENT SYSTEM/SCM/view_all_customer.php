<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title><!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body>    
    <?php
    $cust_id = $cust_name = $cust_address = $cust_phone = $cust_vehicle_no = "";
    $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
    if ($conn == false) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // echo "Connected Successfully";
    $query = "select * from customer;";
    // echo $query;
    $res = $conn->query($query);
    while ($row = $res->fetch_assoc()) {
        $cust_id = $row['cust_id'];
        $cust_name = $row['cust_name'];
        $cust_address = $row['cust_address'];
        $cust_phone = $row['cust_phone'];
        $cust_vehicle_no = $row['cust_vehicle_no'];
        echo $cust_id;
        echo " ";
        echo $cust_name;
        echo " ";
        echo $cust_address;
        echo " ";
        echo $cust_phone;
        echo " ";
        echo $cust_vehicle_no;
        echo "<br>";
    }
    ?>
    <center>
        <div class="container" style="padding: 15%;">
            <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" id="username"></h1>
            <button type="button" class="btn" style="background-color:red;"><a href="index.php" style="text-decoration:none;color:white;">Logout</a></button>
            //generate invoice
            // add customer than add vehicle
            // create invoice
            //view part
            // view invoice
            // view customer
            // view vehicle
        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>