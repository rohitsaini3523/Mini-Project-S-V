<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts List</title>
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
                <h1 class="head">Parts List</h1>
            </div>
        </div>
    </center>

    <?php
    // define variables and set to empty values
    $part_no = $part_name = $part_cost = $part_manufacturedate = $part_warrantyperiod = "";
    $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
    if ($conn == false) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // echo "Connected Successfully";
    $query = "select * from parts;";
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
                        <th scope='col'>Part No</th>
                        <th scope='col'>Part Name</th>
                        <th scope='col'>Part Cost</th>
                        <th scope='col'>Part Manufacture Date</th>
                        <th scope='col'>Part Warranty Period</th>
                        </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['part_no'] . "</td>";
        echo "<td>" . $row['part_name'] . "</td>";
        echo "<td>" . $row['part_cost'] . "</td>";
        echo "<td>" . $row['part_manufacturedate'] . "</td>";
        echo "<td>" . $row['part_warrantyperiod'] . "</td>";
        echo "</tr>";
    }
    echo
    "</thead>
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