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
            echo '<script>alert("Login Success")</script>';
            echo "Name:- $emp_name<br>";
            echo "Employee ID:- $emp_id<br>";
            echo "Email:- $emp_emailid<br>";
            echo "PhoneNo:- $emp_phone";
        }
    }
    ?>
    <center>
        <div class="container" style="padding: 15%;">
            <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" id="username"></h1>
            <button type="button" class="btn" style="background-color:red;"><a href="index.php" style="text-decoration:none;color:white;">Logout</a></button>
            //generate invoice 
            // add customer than add vehicle
            // create invoice
            //view part
            // view invoice
            // view customer
            // view vehicle
        </div>
    </center>
    <script src="algo.js">
    </script>
</body>

</html>