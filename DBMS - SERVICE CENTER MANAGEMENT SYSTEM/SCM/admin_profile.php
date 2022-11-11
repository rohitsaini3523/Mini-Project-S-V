<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
    if ($email != "Admin@scm.in" || $pass != "Admin@123") {
        echo '<script>alert("Not Found")</script>';
    }
    ?>
    <center>
        <div class="profile-page">
        <img class="logo-img" src="images/admin-profile.png" alt="admin-img">
            <table>
                <tr>
                    <td>
                        <a href="employee_regestration.php"><button class="btn profile-btn">Add Employee</button></a>
                    </td>
                    <td>
                        <a href="update_employee.php"><button class="btn profile-btn">Update Employee</button></a>
                    </td>
                    <td>
                        <a href="delete_employee.php"><button class="btn profile-btn">Remove Employee</button></a>
                    </td>
                    <td>
                        <a href="view_employee.php"><button class="btn profile-btn">Search Employee</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_all_employee.php"><button class="btn profile-btn">View All Employees</button></a>
                    </td>
                    <td>
                        <a href="view_all_customer.php"><button class="btn profile-btn">View All Customers</button></a>
                    </td>
                    <td>
                        <a href="view_parts.php"><button class="btn profile-btn">Search parts</button></a>
                    </td>
                    <td>
                        <a href="view_all_parts.php"><button class="btn profile-btn">View All Parts</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_invoice.php"><button class="btn profile-btn">Search Invoice</button></a>
                    </td>
                    <td>
                        <a href="view_vehicle.php"><button class="btn profile-btn">Search Vehicle</button></a>
                    </td>
                    <td>
                        <a href="parts_regestration.php"><button class="btn profile-btn">Register Parts</button></a>
                    </td>
                    <td>
                        <a href="logout.php"><button class="btn btn-danger profile-btn">Logout</button></a>
                    </td>
                </tr>
            </table>

        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>