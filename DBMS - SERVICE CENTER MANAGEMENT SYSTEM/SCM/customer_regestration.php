<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1 id="form"></h1>
        <div class="container">
            <div class="homepage">
                <h1 class="head">Customer Registration</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <!-- <div class="form-floating" id="">
                        <input class="form-control" type="text" name="cust_id" id="cust_id" required placeholder="Customer Id"><b><br><span class="form_error"></span></b>
                        <label for="cust_id">Customer Id</label>
                    </div> -->
                    <div class="form-floating" id="">
                        <input class="form-control first-field" type="text" name="cust_name" id="cust_name" required placeholder="Customer name"><b><br><span class="form_error"></span></b>
                        <label for="cust_name">Customer name</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control no-border" type="text" name="cust_address" id="cust_address" required placeholder="Customer address"><b><br><span class="form_error"></span></b>
                        <label for="cust_address">Customer address</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control no-border" type="text" name="cust_phone" id="cust_phone" required placeholder="Customer phone"><b><br><span class="form_error"></span></b>
                        <label for="cust_phone">Customer phone</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control last-field" type="text" name="cust_vehicle_no" id="cust_vehicle_no" required placeholder="Customer vehicle number"><b><br><span class="form_error"></span></b>
                        <label for="cust_vehicle_no">Customer vehicle number</label>
                    </div>
                    <input type="submit" class="btn" value="Register" id="submitbutton">
                </form>
            </div>
        </div>
    </center>
    <?php
    $cust_id = $cust_name = $cust_address = $cust_phone = $cust_vehicle_no = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cust_name = test_input($_POST["cust_name"]);
        $cust_address = test_input($_POST["cust_address"]);
        $cust_phone = test_input($_POST["cust_phone"]);
        $cust_vehicle_no = test_input($_POST["cust_vehicle_no"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($cust_name != "" && $cust_address != "" && $cust_phone != "" && $cust_vehicle_no != "")
      {  $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from customer;";
        $result = $conn->query($query);
        $cust_id = $result->num_rows + 1;
        $query = "INSERT into customer VALUES('$cust_id','$cust_name','$cust_address','$cust_phone','$cust_vehicle_no');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Customer Regestration Successful');</script>";
            header("Location: vehicle_regestration.php");
        } else {
            echo "<script>alert('Customer Regestration Failed');</script>";
        }}
    ?>
    <script src="algo.js">
    </script>
</body>

</html>