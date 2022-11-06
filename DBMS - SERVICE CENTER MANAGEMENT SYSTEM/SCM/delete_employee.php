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
            <h1 style=" color:black; font-size: large;" id="heading">Delete Employee</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="">
                    <input type="email" name="emp_email" id="emp_email" required placeholder="Employee Email ID"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Delete" id="submitbutton">
                <button type="button" class="btn" style="background-color:red;"><a href="homepage.php" style="text-decoration:none;color:white;">Logout</a></button>

    </center>
    </div>
    </div>
    </form>
    <?php
    $emp_emailid = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_emailid = $_POST["emp_email"];
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($emp_emailid != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "DELETE from employee Where emp_emailid = '$emp_emailid';";
        $query1 = "select * from employee Where emp_emailid = '$emp_emailid';";
        $result = mysqli_query($conn, $query);
        $result1 = mysqli_query($conn, $query1);
        $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        if ($row == NULL) {
            echo "<script>alert('Employee Deletion Failed');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>