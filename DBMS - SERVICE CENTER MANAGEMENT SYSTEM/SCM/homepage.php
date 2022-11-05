<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEHICLE SERVICE CENTER </title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1 id="form" style = "padding:10%">Vehicle Service Center</h1>
        <form method="post">
            <div class="form" style="width:60% ;">
                <input type="submit" name="EMPLOYEE" class="button" value="EMPLOYEE" />
                <input type="submit" name="ADMIN" class="button" value="ADMIN"/>
    </center>
    </div>
    </div>
    </form>

    <script src="algo.js">
    </script>
    <?php

    if (isset($_POST['EMPLOYEE'])) {
        header('location: employee_login.php');
    }
    if (isset($_POST['ADMIN'])) {
        header('location: admin_login.php');

    }
    ?>
</body>

</html>