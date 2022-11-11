<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employee</title>
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
                <h1 class="head">Search Employee by ID</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="emp_id" id="emp_id" placeholder="Employee ID" required><b><br><span class="form_error"></span></b>
                        <label for="emp_id">Employee ID</label>
                    </div>
                    <input type="submit" class="btn" value="Submit" id="submitbutton">
                </form>
            </div>
        </div>
    </center>

    <?php
    $emp_id = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_id = test_input($_POST["emp_id"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($emp_id != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query1 = "select * from employee where emp_id = '$emp_id';";
        $result1 = $conn->query($query1);
        $result1 = mysqli_query($conn, $query1);
        $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $emp_id = $row['emp_id'];
        $emp_name = $row["emp_name"];
        $emp_emailid = $row["emp_emailid"];
        $emp_phone = $row["emp_phone"];
        $emp_password = $row["emp_password"];
        $emp_address = $row["emp_address"];
        $emp_salary = $row["emp_salary"];
        // card
        echo '<br>';
        echo '<center><div class="card" style="width: 18rem;  style="padding:1%;"">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Employee Profile</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">Employee ID: ' . $emp_id . '</h6>';
        echo '<p class="card-text">Name: ' . $emp_name . '</p>';
        echo '<p class="card-text">Email: ' . $emp_emailid . '</p>';
        echo '<p class="card-text">Phone: ' . $emp_phone . '</p>';
        echo '<p class="card-text">Address: ' . $emp_address . '</p>';
        echo '<p class="card-text">Salary: ' . $emp_salary . '</p>';
        echo '</div>';
        echo '</div></center>';
        if ($result1 == false) {
            echo "<script>alert('Not Found');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>