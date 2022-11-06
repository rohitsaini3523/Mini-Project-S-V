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
    $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["femail"]);
        $pass = test_input($_POST["fpass"]);
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
    ?>
    <?php
    if ($email != "Admin@scm.in" || $pass != "Admin@123") {
        echo '<script>alert("Not Found")</script>';
        header("Location: homepage.php");
    }
    ?>
    <center>
        <div class="container" style="padding: 15%;">
            <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" id="username"></h1>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="employee_regestration.php" style="text-decoration:none;color:red;">Add Employee</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="update_employee.php" style="text-decoration:none;color:red;">Update Employee</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="delete_employee.php" style="text-decoration:none;color:red;">Delete Employee</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_employee.php" style="text-decoration:none;color:red;">Search Employee</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_all_employee.php" style="text-decoration:none;color:red;">View All Employee</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_all_customer.php" style="text-decoration:none;color:red;">View All Customer</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_parts.php" style="text-decoration:none;color:red;">View parts</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_all_parts.php" style="text-decoration:none;color:red;">View All Parts</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_invoice.php" style="text-decoration:none;color:red;">Search Invoice</a></button>
            <button type = "button" class="btn" style="background-color:yellow;"><a href="view_vehicle.php" style="text-decoration:none;color:red;">View Vehicle</a></button>
        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>