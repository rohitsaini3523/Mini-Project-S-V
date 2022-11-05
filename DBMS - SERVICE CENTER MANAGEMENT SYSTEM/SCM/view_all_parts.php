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
    $part_no = $part_name = $part_cost = $part_manufacturedate = $part_warrantyperiod = "";   
        $conn = new MySQLi('localhost', 'root', '', 'vehicle_service_center');
        if ($conn == false) {
            die("Connection Failed: " . $conn->connect_error);
        }
        // echo "Connected Successfully";
        $query = "select * from parts;";
        // echo $query;
        $res = $conn->query($query);
        while($row = $res->fetch_assoc()){
            $part_no = $row['part_no'];
            $part_name = $row['part_name'];
            $part_cost = $row['part_cost'];
            $part_manufacturedate = $row['part_manufacturedate'];
            $part_warrantyperiod = $row['part_warrantyperiod'];

        echo $part_no;
        echo " ";
        echo $part_name;
        echo " ";
        echo $part_cost;
        echo " ";
        echo $part_manufacturedate;
        echo " ";
        echo $part_warrantyperiod;
        echo "<br>";
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