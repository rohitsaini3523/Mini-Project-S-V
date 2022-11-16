<?php
session_start();

if (!isset($_SESSION['emp_emailid'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: employee_login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['emp_emailid']);
    header("location: employee_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onload = function() {
            null
        };
    </script>
    <?php
    // define variables and set to empty values
    $emp_id = $emp_name = $emp_address = $emp_phone = $emp_salary = $emp_emailid = $emp_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_emailid = test_input($_POST["femail"]);
        $emp_password = test_input($_POST["fpass"]);
    } else {
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
            header("Location: homepage.php");
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
            $_SESSION['username'] = "employee";
        }
    }
    ?>
    <center>
        <div class="profile-page">
            <img class="logo-img" src="images/screwdriver-wrench.png" alt="screwdriver-wrench-img">
            <table>
                <tr>
                    <td>
                        <a href="create_invoice.php"><button class="btn profile-btn">Create Invoice</button></a>
                    </td>
                    <td>
                        <a href="customer_regestration.php"><button class="btn profile-btn">Add Customer</button></a>
                    </td>
                    <td>
                        <a href="vehicle_regestration.php"><button class="btn profile-btn">Add Vehicle</button></a>
                    </td>
                    <td>
                        <a href="view_invoice.php"><button class="btn profile-btn">View Invoice</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_customer.php"><button class="btn profile-btn">Search Customer</button></a>
                    </td>
                    <td>
                        <a href="view_vehicle.php"><button class="btn profile-btn">Search Vehicle</button></a>
                    </td>
                    <td>
                        <a href="view_parts.php"><button class="btn profile-btn">Search Parts</button></a>
                    </td>
                    <td>
                        <a href="homepage.php"><button class="btn profile-btn btn-danger">Logout</button></a>
                    </td>
                </tr>
            </table>
        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>
<?php
if ($_SESSION['username'] != "employee") {
    header('location: homepage.php');
    session_destroy();
    session_unset();
}
?>