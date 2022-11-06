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
            <h1 style=" color:black; font-size: large;" id="heading">Search Part By ID</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="" style="padding:1%;">
                    <h1>Enter Part Id: </h1> <input type="text" name="part_id" id="part_id" required><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php
    $part_id = $part_name = $part_cost = $part_manufacturedate = $part_warrantyperiod = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $part_id = test_input($_POST["part_id"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($part_id != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from parts where part_no = $part_id;";
        $result = $conn->query($query);
        $result = mysqli_query($conn, $query);
        echo "<center>";
        echo "<table border='1' style='width:60% ;'>";
        echo "<tr>";
        echo "<th>Part No</th>";
        echo "<th>Part Name</th>";
        echo "<th>Part Cost</th>";
        echo "<th>Part Manufacture Date</th>";
        echo "<th>Part Warranty Period</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['part_no'] . "</td>";
            echo "<td>" . $row['part_name'] . "</td>";
            echo "<td>" . $row['part_cost'] . "</td>";
            echo "<td>" . $row['part_manufacturedate'] . "</td>";
            echo "<td>" . $row['part_warrantyperiod'] . "</td>";
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