<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Parts</title>
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
                <h1 class="head">Register Parts</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">

                    <div class="form-floating">
                        <input class="form-control first-field" type="text" name="part_name" id="part_name" required placeholder="Part Name"><b><br><span class="form_error"></span></b>
                        <label for="part_name">Part Name</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="text" name="part_cost" id="part_cost" required placeholder="Part Cost"><b><br><span class="form_error"></span></b>
                        <label for="part_cost">Part Cost</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="text" name="part_manufacturedate" id="part_manufacturedate" required placeholder="Manufacture Date"><b><br><span class="form_error"></span></b>
                        <label for="part_manufacturedate">Manufacture Date</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control last-field" type="text" name="part_warrantyperiod" id="part_warrantyperiod" required placeholder="Warranty Period"><b><br><span class="form_error"></span></b>
                        <label for="part_warrantyperiod">Warranty Period</label>
                    </div>
                    <input type="submit" class="btn" value="Register" id="submitbutton">
                </form>
            </div>
        </div>
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