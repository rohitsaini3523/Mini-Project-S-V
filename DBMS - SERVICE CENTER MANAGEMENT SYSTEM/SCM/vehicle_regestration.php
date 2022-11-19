<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration</title>
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
                <h1 class="head">Vehicle Registration</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating" id="">
                        <input class="form-control first-field" type="text" name="vehicle_number" id="vehicle_number" required placeholder="Vehicle Number"><b><br><span class="form_error"></span></b>
                        <label for="vehicle_number">Vehicle Number</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="vehicle_type" id="vehicle_type" required>
                            <option value="" disabled selected>Select Vehicle Type</option>
                            <option value="2 Wheeler">2 Wheeler</option>
                            <option value="4 Wheeler">4 Wheeler</option>
                        </select>
                        <label for="vehicle_type">Vehicle Type</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control no-border" type="text" name="RCbook" id="RCbook" required placeholder="RC Book Number"><b><br><span class="form_error"></span></b>
                        <label for="RCbook">RC Book Number</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control last-field" type="text" name="customer_id" id="customer_id" required placeholder="Customer ID"><b><br><span class="form_error"></span></b>
                        <label for="custome_id">Customer ID</label>
                    </div>
                    <input type="submit" class="btn" value="Submit" id="submitbutton">
                </form>
            </div>
        </div>
    </center>
    <?php
    $vehicle_number = $vehicle_type = $RCbook = $customer_id = "";
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
    if ($vehicle_number != "" && $vehicle_type != "" && $RCbook != "" && $customer_id != "") {
        if(!preg_match("/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/", $vehicle_number)){
            echo "<script>alert('Invalid Vehicle Number');</script>";
        }
        else if(!preg_match("/^[0-9]{9}$/", $RCbook)){
            echo "<script>alert('Invalid RC Book Number');</script>";
        }
        else if(!preg_match("/^[0-9]{1,4}$/", $customer_id)){
            echo "<script>alert('Invalid Customer ID');</script>";
        }
        else{
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "INSERT into vehicle VALUES('$vehicle_number','$vehicle_type','$RCbook','$customer_id');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Vehicle Regestration Successful');</script>";
            header("Location: employee_profile.php");
        } else {
            echo "<script>alert('Vehicle Regestration Failed');</script>";
        }
    }}

    ?>
    <script src="algo.js">
    </script>
</body>

</html>