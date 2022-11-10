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

    <center>
        <h1 id="form"></h1>
        <div class="form" style="width:60% ;">
            <h1 style=" color:black; font-size: large;" id="heading">Parts Regestration</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">

                <div class="form_design" id="">
                    <input type="text" name="part_name" id="part_name" required placeholder="Part name"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="part_cost" id="part_cost" required placeholder="Part Cost"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="part_manufacturedate" id="part_manufacturedate" required placeholder="Part Manufacture Date"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="part_warrantyperiod" id="part_warrantyperiod" required placeholder="Part Warranty Period"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    <?php
    // define variables and set to empty values
    $part_no = $part_name = $part_cost = $part_manufacturedate = $part_warrantyperiod = "";
    $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
    if ($conn == false) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // echo "Connected Successfully";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $part_name = $_POST['part_name'];
        $part_cost = $_POST['part_cost'];
        $part_manufacturedate = $_POST['part_manufacturedate'];
        $part_warrantyperiod = $_POST['part_warrantyperiod'];
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($part_name != "" && $part_cost != "" && $part_manufacturedate != "" && $part_warrantyperiod != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from parts;";
        $result = $conn->query($query);
        $part_id = $result->num_rows + 1;
        $query1 = "INSERT into parts VALUES('$part_id','$part_name','$part_cost','$part_manufacturedate','$part_warrantyperiod');";
        $result = mysqli_query($conn, $query1);
        if ($result) {
            echo "<script>alert('Part Added Successful');</script>";
            header("Location: admin_profile.php");
        } else {
            echo "<script>alert('Part Not Added');</script>";
        }
    }
    ?>

    <script src="algo.js">
    </script>
</body>

</html>