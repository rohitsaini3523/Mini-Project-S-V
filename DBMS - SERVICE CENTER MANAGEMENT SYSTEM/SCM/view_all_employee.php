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
        <div class="container" style="padding: 1%;">
            <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" id="username"></h1>
            <button type="button" class="btn" style="background-color:red;"><a href="index.php" style="text-decoration:none;color:white;">Logout</a></button>
        </div>
    </center>
    <?php
    $emp_id = $emp_name = $emp_address = $emp_phone = $emp_salary = $emp_emailid = $emp_password = "";
    $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
    if ($conn == false) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // echo "Connected Successfully";
    $query = "select * from employee;";
    // echo $query;
    $res = $conn->query($query);
    while ($row = $res->fetch_assoc()) {
        $emp_id = $row['emp_id'];
        $emp_name = $row['emp_name'];
        $emp_address = $row['emp_address'];
        $emp_phone = $row['emp_phone'];
        $emp_salary = $row['emp_salary'];
        $emp_emailid = $row['emp_emailid'];
        $emp_password = $row['emp_password'];
        echo "<div class='container' style ='padding:1%;'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Employee ID: $emp_id</h5>";
        echo "<h6 class='card-subtitle mb-2 text-muted'>Employee Name: $emp_name</h6>";
        echo "<p class='card-text'>Employee Address: $emp_address</p>";
        echo "<p class='card-text'>Employee Phone: $emp_phone</p>";
        echo "<p class='card-text'>Employee Salary: $emp_salary</p>";
        echo "<p class='card-text'>Employee Email ID: $emp_emailid</p>";
        echo "<p class='card-text'>Employee Password: $emp_password</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <script src="algo.js">
    </script>
</body>

</html>