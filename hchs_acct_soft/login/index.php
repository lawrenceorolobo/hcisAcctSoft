<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
        <link rel = "stylesheet" href = "style.css"/>
    </head>
    <body>
        <div>
            <!--Login Label-->
            <h1>Login</h1>
        </div>
        <div class="detailContainer">
            <!--Login Box-->
            <form method="POST" action = "controller.php">
                <p>Phone Number</p>
                <input type="text" name = "phoneNumber"/>
                <p>Password</p>
                <input type="text" name = "password"/>
                <input class = "form-submit" type="submit" name = "submit" />
            </form>
            <a href = "../signup/index.php" id = "signup"><p>Sign-Up</p></a>
        </div>
    </body>
</html>