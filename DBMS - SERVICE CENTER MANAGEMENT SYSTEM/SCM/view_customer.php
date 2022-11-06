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
            <h1 style=" color:black; font-size: large;" id="heading">Search Customer by Phone Number</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="" style="padding:1%;">
                    <h1>Customer Phone No: </h1> <input type="text" name="cust_phone" id="cust_phone" required><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php
    $cust_phone = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cust_phone = test_input($_POST["cust_phone"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($cust_phone != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query1 = "select * from customer where cust_phone = '$cust_phone';";
        $result1 = $conn->query($query1);
        $result1 = mysqli_query($conn, $query1);
        echo "<center>";
        echo "<table border='1' style='width:60% ;'>";
        echo "<tr>";
        echo "<th>Customer Id</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Address</th>";
        echo "<th>Phone</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result1)) {
            echo "<tr>";
            echo "<td>" . $row['cust_id'] . "</td>";
            echo "<td>" . $row['cust_name'] . "</td>";
            echo "<td>" . $row['cust_address'] . "</td>";
            echo "<td>" . $row['cust_phone'] . "</td>";
            echo "</tr>";
        }
        if ($result1 == false) {
            echo "<script>alert('Not Found');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>