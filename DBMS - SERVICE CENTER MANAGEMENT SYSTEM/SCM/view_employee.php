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
            <h1 style=" color:black; font-size: large;" id="heading">Search Employee by ID</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="" style="padding:1%;">
                    <h1>Employee ID: </h1> <input type="text" name="emp_id" id="emp_id" required><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
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