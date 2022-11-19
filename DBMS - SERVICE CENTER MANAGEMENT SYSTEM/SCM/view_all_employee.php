<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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
            <h1 class="head">Employee List</h1>
            </div>
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
                        <th scope='col'>Employee ID</th>
                        <th scope='col'>Employee Name</th>
                        <th scope='col'>Employee Address</th>
                        <th scope='col'>Employee Phone</th>
                        <th scope='col'>Employee Salary</th>
                        <th scope='col'>Employee Email ID</th>
                        <th scope='col'>Employee Password</th>
                        </tr>";
    while ($row = $res->fetch_assoc()) {
        $emp_id = $row['emp_id'];
        $emp_name = $row['emp_name'];
        $emp_address = $row['emp_address'];
        $emp_phone = $row['emp_phone'];
        $emp_salary = $row['emp_salary'];
        $emp_emailid = $row['emp_emailid'];
        $emp_password = $row['emp_password'];
        echo "<tr>
        <td>$emp_id</td>
        <td>$emp_name</td>
        <td>$emp_address</td>
        <td>$emp_phone</td>
        <td>$emp_salary</td>
        <td>$emp_emailid</td>   
        <td>$emp_password</td>
        </tr>";
    }
    echo "</thead>
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
    ?>

    <script src="algo.js">
    </script>
</body>

</html>