<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Employee</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="emp_algo.js">
    </script>
    <center>
        <div class="container">
            <div class="homepage">
                <h1 class="head">Employee Registration</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-floating">
                        <input class="form-control first-field" type="text" name="emp_name" id="emp_name" required placeholder="Employee name"><b><br><span class="form_error"></span></b>
                        <label for="emp_name">Employee name</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="text" name="emp_address" id="emp_address" required placeholder="Employee address"><b><br><span class="form_error"></span></b>
                        <label for="emp_address">Employee address</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="text" name="emp_phone" id="emp_phone" required placeholder="Employee phone"><b><br><span class="form_error"></span></b>
                        <label for="emp_">Employee phone</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="text" name="emp_salary" id="emp_salary" required placeholder="Employee salary"><b><br><span class="form_error"></span></b>
                        <label for="emp_">Employee salary</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control no-border" type="email" name="emp_email" id="emp_email" required placeholder="Employee Email ID"><b><br><span class="form_error"></span></b>
                        <label for="emp_email">Employee Email ID</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control last-field" type="password" name="emp_password" id="emp_password" required placeholder="Employee password"><b><br><span class="form_error"></span></b>
                        <label for="emp_password">Employee password</label>
                    </div>
                    <input type="submit" class="btn" value="Register" id="submitbutton">
                </form>
            </div>
        </div>
    </center>

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
    //form validation
    if ($emp_name != "" && $emp_address != "" && $emp_phone != "" && $emp_salary != "" && $emp_emailid != "" && $emp_password != "") {
        $emp_name = test_input($emp_name);
        $emp_address = test_input($emp_address);
        $emp_phone = test_input($emp_phone);
        $emp_salary = test_input($emp_salary);
        $emp_emailid = test_input($emp_emailid);
        $emp_password = test_input($emp_password);
        //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $emp_name)) {
            echo "<script>alert('Only letters and white space allowed in name');</script>";
        }
        if (!preg_match("/^[a-zA-Z0-9, ]*$/", $emp_address)) {
            echo "<script>alert('Only letters and white space allowed in address');</script>";
        }
        //check if phone only contains numbers
        if (!preg_match("/^[0-9]*$/", $emp_phone)) {
            echo "<script>alert('Only numbers allowed in phone');</script>";
        }
        //check if salary only contains numbers
        if (!preg_match("/^[0-9]*$/", $emp_salary)) {
            echo "<script>alert('Only numbers allowed in salary');</script>";
        }
        //check if email is valid
        if (!filter_var($emp_emailid, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
        }
        //check if password is valid
        if (strlen($emp_password) < 8) {
            echo "<script>alert('Password must be atleast 8 characters');</script>";
        }
        //check if password is valid
        if (!preg_match("/[A-Z]/", $emp_password)) {
            echo "<script>alert('Password must contain atleast one uppercase letter');</script>";
        }
        //check if password is valid
        if (!preg_match("/[a-z]/", $emp_password)) {
            echo "<script>alert('Password must contain atleast one lowercase letter');</script>";
        }
        //check if password is valid
        if (!preg_match("/[0-9]/", $emp_password)) {
            echo "<script>alert('Password must contain atleast one number');</script>";
        }
        //check if password is valid
        if (!preg_match("/[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]/", $emp_password)) {
            echo "<script>alert('Password must contain atleast one special character');</script>";
        }
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "select * from employee;";
        $result = $conn->query($query);
        //count rows
        $row_cnt = $result->num_rows;
        $emp_id = ($row_cnt + 1);
        $query = "INSERT into employee VALUES('$emp_id','$emp_name','$emp_address','$emp_phone','$emp_salary','$emp_emailid','$emp_password');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Employee Regestration Successful');</script>";
            header("Location: admin_profile.php");
        } else {
            echo "<script>alert('Employee Regestration Failed');</script>";
        }}
    ?>

</body>

</html>