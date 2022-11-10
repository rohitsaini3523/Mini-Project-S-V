
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            <img class="logo-img" src="images/admin-profile.png" alt="admin-logo">
            <div class="head">
                Admin Login
            </div>
            <form class="login-form" name="myform" method="post" action="admin_profile.php">
                <div class="form-floating" id="email">
                    <input class="form-control" type="email" name="femail" id="femail" placeholder="E-mail" required><b><br><span class="form_error"> </span></b>
                    <label for="femail">E-mail</label>
                </div>
                <div class="form-floating" id="pass">
                    <input class="form-control" type="password" name="fpass" id="fpass" required placeholder="Password"><b><br><span class="form_error"></span></b>
                    <label for="fpass">Password</label>
                </div>
                <input type="submit" class="btn" value="  Login  " id="submitbutton">
            </form>
        </div>
        
    </center>
    </div>
    </div>
    </form>

    <script src="algo.js">
    </script>
</body>

</html>