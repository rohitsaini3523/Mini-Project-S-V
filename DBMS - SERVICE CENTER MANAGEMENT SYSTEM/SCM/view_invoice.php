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
            <h1 style=" color:black; font-size: large;" id="heading">Search Invoice by Invoice-Number</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="" style="padding:1%;">
                    <h1>Enter Invoice Number: </h1> <input type="text" name="invoice_number" id="invoice_number" required><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php
    $invoice_number = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $invoice_number = test_input($_POST["invoice_number"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($invoice_number != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from invoice where invoice_number = $invoice_number;";
        $result = $conn->query($query);
        $result = mysqli_query($conn, $query);
        echo "<center>";
        echo "<table border='1' style='width:60% ;'>";
        echo "<tr>";
        echo "<th>Invoice Number</th>";
        echo "<th>Invoice Date</th>";
        echo "<th>Invoice Amount</th>";
        echo "<th>Vehicle number</th>";
        echo "<th>Employee Id</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['invoice_number'] . "</td>";
            echo "<td>" . $row['invoice_date'] . "</td>";
            echo "<td>" . $row['invoice_date'] . "</td>";
            echo "<td>" . $row['vehicle_no'] . "</td>";
            echo "<td>" . $row['emp_id'] . "</td>";
            echo "</tr>";
        }
        if ($result == false) {
            echo "<script>alert('Not Found');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>