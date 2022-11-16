<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
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
                <h1 class="head">Search Customer by<br>Phone Number</h1>
                <form class="login-form" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate_form()">
                    <div class="form-floating" id="" style="padding:1%;">
                        <input class="form-control" type="text" name="cust_phone" id="cust_phone" placeholder="Phone Number" required><b><br><span class="form_error"></span></b>
                        <label for="cust_phone">Phone Number</label>
                    </div>
                    <input type="submit" class="btn" value="Submit" id="submitbutton">
                </form>
            </div>
        </div>
    </center>
    
    <?php
    $cust_phone = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cust_phone = test_input($_POST["cust_phone"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($cust_phone != "") {
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $query1 = "select * from customer where cust_phone = '$cust_phone';";
        $result1 = $conn->query($query1);
        $result1 = mysqli_query($conn, $query1);
        echo "<section class='intro'>
  <div class='bg-image h-100' style='background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');'>
    <div class='mask d-flex align-items-center h-100' style='background-color: rgba(0,0,0,.25);'>
      <div class='container'>
        <div class='row justify-content-center'>
          <div class='col-12'>
            <div class='card bg-dark shadow-2-strong'>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table table-dark table-borderless mb-0'>
                    <thead>
                      <tr>
                        <th scope='col'>Customer ID</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Address</th>
                        <th scope='col'>Phone</th>
                        <th scope='col'>Vehicle No</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>";
        while ($row = mysqli_fetch_array($result1)) {
            echo "<section class='intro'>
  <div class='bg-image h-100' style='background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');'>
    <div class='mask d-flex align-items-center h-100' style='background-color: rgba(0,0,0,.25);'>
      <div class='container'>
        <div class='row justify-content-left'>
          <div class='col-12'>
            <div class='card bg-dark shadow-2-strong'>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table table-dark table-borderless mb-0'>
                    <thead>
            echo '<tr>';
            echo '<td> $row[cust_id]</td>';
            echo '<td> $row[cust_name]</td>';
            echo '<td>$row[cust_address]</td>';
            echo '<td>$row[cust_phone]</td>';
            echo '<td>$row[cust_vehicle_no]</td>';
            echo '</tr>';
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>";
            
        }
        if ($result1 == false) {
            echo "<script>alert('Not Found');</script>";
        }
    }
    ?>
    <script src="algo.js">
    </script>
</body>

</html>