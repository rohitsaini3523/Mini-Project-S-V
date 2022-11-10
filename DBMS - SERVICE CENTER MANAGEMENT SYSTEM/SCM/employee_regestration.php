
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
            <h1 style=" color:black; font-size: large;" id="heading">Customer Regestration</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="">
                    <input type="text" name="emp_name" id="emp_name" required placeholder="Employee name"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="emp_address" id="emp_address" required placeholder="Employee address"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="number" name="emp_phone" id="emp_phone" required placeholder="Employee phone"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="emp_salary" id="emp_salary" required placeholder="Employee Salary"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="email" name="emp_email" id="emp_email" required placeholder="Employee Email ID"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="password" name="emp_password" id="emp_password" required placeholder="Employee Password"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php
    $emp_id = $emp_name = $emp_address = $emp_phone = $emp_salary = $emp_emailid = $emp_password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_name = $_POST["emp_name"];
        $emp_address = $_POST["emp_address"];
        $emp_phone = $_POST["emp_phone"];
        $emp_salary = $_POST["emp_salary"];
        $emp_emailid = $_POST["emp_email"];
        $emp_password = $_POST["emp_password"];
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($emp_name != "" && $emp_address != "" && $emp_phone != "" && $emp_salary != "" && $emp_emailid != "" && $emp_password != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from customer;";
        $result = $conn->query($query);
        $emp_id = $result->num_rows + 1;
        $query = "INSERT into employee VALUES('$emp_id','$emp_name','$emp_address','$emp_phone','$emp_salary','$emp_emailid','$emp_password');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Employee Regestration Successful');</script>";
        } else {
            echo "<script>alert('Employee Regestration Failed');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>