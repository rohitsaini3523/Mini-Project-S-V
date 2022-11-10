<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1 id="form"></h1>
        <div class="form" style="width:60% ;">
            <h1 style=" color:black; font-size: large;" id="heading">Employee Login</h1>
            <form name="myform" method="post" action="employee_profile.php">
                <div class="form_design" id="email">
                    <input type="email" name="femail" id="" required placeholder="Enter E-mail here"><b><br><span class="form_error"> </span></b>
                </div>
                <div class="form_design" id="pass">
                    <input type="password" name="fpass" id="" required placeholder="Password"><b><br><span class="form_error"></span></b>
                </div>
                <input type="submit" class="button" value="Login" id="submitbutton">
    </center>
    </div>
    </div>
    </form>

    <script src="algo.js">
    </script>

</body>

</html>