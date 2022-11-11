<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Parts</title>
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
                <h1 class="head">Search Part By ID</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="part_id" id="part_id" placeholder="Part ID" required><b><br><span class="form_error"></span></b>
                        <label for="part_id">Part ID</label>
                    </div>
                    <input type="submit" class="btn" value="Submit" id="submitbutton">
                </form>
            </div>
        </div>
    </center>

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