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
            <h1 style=" color:black; font-size: large;" id="heading">Create invoice</h1>
            <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                <div class="form_design" id="">
                    <input type="text" name="invoice_number" id="invoice_number" required placeholder="Invoice Number"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="invoice_date" id="invoice_date" required placeholder="Invoice Date"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="invoice_amount" id="invoice_amount" required placeholder="Invoice Amount"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="vehicle_number" id="vehicle_number" required placeholder="Vehicle Number"><b><br><span class="form_error"></span></b>
                </div>
                <div class="form_design" id="">
                    <input type="text" name="emp_id" id="emp_id" required placeholder="Employee Id"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Submit" id="submitbutton">
    </center>
    </div>
    </div>
    </form>
    <?php
    $invoice_number = $invoice_date = $invoice_amount = $vehicle_no = $emp_id = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $invoice_number = test_input($_POST["invoice_number"]);
        $invoice_date = test_input($_POST["invoice_date"]);
        $invoice_amount = test_input($_POST["invoice_amount"]);
        $vehicle_no = test_input($_POST["vehicle_number"]);
        $emp_id = test_input($_POST["emp_id"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($invoice_number != "" && $invoice_date != "" && $invoice_amount != "" && $vehicle_no != "" && $emp_id != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query = "INSERT into invoice VALUES('$invoice_number','$invoice_date','$invoice_amount','$vehicle_no','$emp_id');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Invoice Generated Successfully');</script>";
            header("Location: employee_profile.php");
        } else {
            echo "<script>alert('Invoice Generation Failed');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>