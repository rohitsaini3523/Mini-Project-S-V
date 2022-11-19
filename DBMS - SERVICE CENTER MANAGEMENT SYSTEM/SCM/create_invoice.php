<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
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
                <h1 class="head">Create Invoice</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating" id="">
                        <input class="form-control first-field" type="text" name="invoice_number" id="invoice_number" required placeholder="Invoice Number"><b><br><span class="form_error"></span></b>
                        <label for="invoice_number">Invoice Number</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="date" name="invoice_date" id="invoice_date" required placeholder="Invoice Date"><b><br><span class="form_error"></span></b>
                        <label for="invoice_date">Invoice Date</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control no-border" type="text" name="invoice_amount" id="invoice_amount" required placeholder="Invoice Amount"><b><br><span class="form_error"></span></b>
                        <label for="invoice_amount">Invoice Amount</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control no-border" type="text" name="vehicle_number" id="vehicle_number" required placeholder="Vehicle Number"><b><br><span class="form_error"></span></b>
                        <label for="vehicle_number">Vehicle Number</label>
                    </div>
                    <div class="form-floating" id="">
                        <input class="form-control last-field" type="text" name="emp_id" id="emp_id" required placeholder="Employee ID"><b><br><span class="form_error"></span></b>
                        <label for="emp_id">Employee ID</label>
                    </div>
                    <input type="submit" class="btn" value="Create Invoice" id="submitbutton">
                </form>
            </div>
        </div>
    </center>
    <?php
    $invoice_number = $invoice_date = $invoice_amount = $vehicle_no = $emp_id = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $invoice_number = test_input($_POST["invoice_number"]);
        //reverse invoice_date
        $invoice_date = date('Y-m-d', strtotime($_POST['invoice_date']));;
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