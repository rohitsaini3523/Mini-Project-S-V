<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Employee</title>
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
                <h1 class="head">Remove Employee</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating">
                        <input class="form-control" type="email" name="emp_email" id="emp_email" required placeholder="Employee Email ID"><b><br><span class="form_error"></span></b>
                        <label for="emp_email">Employee Email ID</label>
                    </div>
                    <input type="submit" class="btn btn-danger" value="Remove" id="submitbutton">
                </form>
            </div>
        </div>
    </center>

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