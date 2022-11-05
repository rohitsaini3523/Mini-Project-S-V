<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Service Center</title><!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body style="padding:1%">
    <center>
        <h1 id="form"></h1>
        <div class="form" style="width:60% ;">
            <h1 style=" color:black; font-size: large;" id="heading">Customer Vehicle Regestration</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="vehicle_number">
                    <input type="text" name="vehicle_number" id="" required placeholder="Vehicle number"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="vehicle_type">
                    <input type="text" name="vehicle_type" id="" required placeholder="Vehicle type"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="RCbook">
                    <input type="text" name="RCbook" id="" required placeholder="RCbook"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="customer_id">
                    <input type="text" name="customer_id" id="" required placeholder="Customer id"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vehicle_number = test_input($_POST["vehicle_number"]);
        $vehicle_type = test_input($_POST["vehicle_type"]);
        $RCbook = test_input($_POST["RCbook"]);
        $customer_id = test_input($_POST["customer_id"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <?php
    $cust_id = $cust_name = $cust_address = $cust_phone = $cust_vehicle_no = "";
    if ($cust_id != "" && $cust_name != "" && $cust_address != "" && $cust_phone != "" && $cust_vehicle_no != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "INSERT into customer VALUES('$cust_id','$cust_name','$cust_address','$cust_phone','$cust_vehicle_no');";
        try {
            if (mysqli_query($conn, $query) == true) {
                throw new Exception('SuccesFully Regestered');
            } else {
                echo '<script>alert("Already Exists")</script>';
            }
        } catch (Exception $e) {
            echo '<script>alert("SuccesFully Regestered")</script>';
            header("Location:vehicle_regestration.php");
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>