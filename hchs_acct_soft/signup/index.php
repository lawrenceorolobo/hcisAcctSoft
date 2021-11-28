<!DOCTYPE html>
<html>
    <head>
        <title>SIGN UP</title>
        <link rel = "stylesheet" href = "style.css"/>
    </head>
    <body>
        <?php
            if(isset($_GET["status"])){
                if($_GET["status"] == "success"){
                    echo "<h1>ACCOUNT CREATED SUCCESSFULLY.</h1>";
                }else{
                    echo "<h1>ACCOUNT NOT SUCCESSFULLY CREATED.</h1>";
                }
            }
        ?>
        <div>
            <!--Login Label-->
            <h1>SIGN UP</h1>
        </div>
        <div class="detailContainer">
            <!--Login Box-->
            <form method="POST" action = "controller.php">
                <p>Phone Number</p>
                <input type="text" name = "phoneNumber"/>
                <p>First Name</p>
                <input type="text" name = "firstName"/>
                <p>Last Name</p>
                <input type="text" name = "lastName"/>
                <p>Position</p>
                <select name="position">
                    <option value="accountant">Accountant</option>
                    <option value="admin">Admin</option>
                </select>
                <p>Password</p>
                <input type="password" name = "passwrd"/>
                <input class = "form-submit" type="submit" name = "submit" />
            </form>
            <a href = "../login/index.php" id = "Login"><p>Login</p></a>
        </div>
    </body>
</html>