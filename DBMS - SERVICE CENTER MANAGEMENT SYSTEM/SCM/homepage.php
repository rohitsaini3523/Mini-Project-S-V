<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Service Center</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="homepage">
        <img class="logo-img" src="images/screwdriver-wrench.png" alt="screwdriver-wrench-img">
            <div class="head">
                Vehicle Service Center
            </div>
            <div class="button-container">
                <form method="post" style="display: flex;">
                    <input class="btn" type="submit" name="EMPLOYEE" value="Employee" />
                    <input class="btn" type="submit" name="ADMIN" value="Admin" >
                </form>
        </div>
    </div>

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