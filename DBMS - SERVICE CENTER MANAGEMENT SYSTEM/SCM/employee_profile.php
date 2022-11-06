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
    <?php
    // define variables and set to empty values
    $emp_id = $emp_name=$emp_address = $emp_phone=$emp_salary=$emp_emailid = $emp_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_emailid = test_input($_POST["femail"]);
        $emp_password = test_input($_POST["fpass"]);
    }
    else{
        header("Location: homepage.php");
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($emp_emailid != "" && $emp_password != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        // echo "Connected Successfully";
        $query = "select * from employee where emp_emailid ='$emp_emailid' and emp_password='$emp_password';";
        // echo $query;
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row == NULL) {
            echo '<script>alert("Not Found")</script>';
            // header("Location: homepage.php");
        } else {
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
        }
    }
    ?>
    <center>
        <div class="container" style="padding: 15%;">
            <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" id="username"></h1>
            <button type="button" class="btn" style="background-color:red;"><a href="homepage.php" style="text-decoration:none;color:white;">Logout</a></button>
            <button type="button" class="btn" style="background-color:red;"><a href="create_invoice.php" style="text-decoration:none;color:white;">Create Invoice</a></button>
            <button type="button" class="btn" style="background-color:red;"><a href="customer_regestration.php" style="text-decoration:none;color:white;">Create Customer</a></button>
            <button type="button" class="btn" style="background-color:red;"><a href="vehicle_regestration.php" style="text-decoration:none;color:white;">Add Vehicle</a></button>
            <button type="button" class="btn" style="background-color:red;"><a href="view_invoice.php" style="text-decoration:none;color:white;">View Invoice</a></button>
            <button type="button" class="btn" style="background-color:red;"><a href="view_customer.php" style="text-decoration:none;color:white;">View Customer</a></button>      
            <button type="button" class="btn" style="background-color:red;"><a href="view_vehicle.php" style="text-decoration:none;color:white;">View Vehicle</a></button>      
            <button type="button" class="btn" style="background-color:red;"><a href="view_parts.php" style="text-decoration:none;color:white;">View Parts</a></button>      
        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>