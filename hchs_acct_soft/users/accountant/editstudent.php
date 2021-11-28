<?php
session_start();
                        
    if(($_SESSION["position"] != "accountant")){
            header("Location:../../login/index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../bootstrap-5.1.0-dist/css/bootstrap.min.css"/>

        <title>HOLY CROSS</title>
    </head>
    <body>
        
    <nav class="navbar navbar-expand-md bg-dark">
        <div class="container">
            <!---<a href="#" class="navbar-brand"><img src="img\exher1.png" alt="an e with a circle around it."></a>--->

            <a href="index.php" class="navbar-brand">HOLY CROSS</a>            
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar -collapse" id = "navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">STUDENT LIST</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ADD STUDENT</a>
                    </li>
                    <li class="nav-item">
                        <a href="editstudent.php" class="nav-link">EDIT STUDENT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br/>

    
    <div class="container">
        <?php
            if(isset($_GET["return"])){
                if($_GET["return"] == "success"){
                    echo "
                    <div class=\"alert alert-success\" role=\"alert\"><span><strong>Alert:</strong> Successfully Edited.</span></div>                
                    ";
                }else{
                    echo "
                    <div class=\"alert alert-success\" role=\"alert\"><span><strong>Alert:</strong> Failed to edit, Please Call Drekline.</span></div>
                    ";
                }
            }
        ?>
    </div>

     <!--FORM-->
    <div class="container">
        <form action="editstudentform.php" method="post">

            <div class="form-group">

                <br/>
                <label for="class">Student</label>
                <select name="student" id="classInput">
                    <?php
                        include "model.php"; 
                        include "../../database/dataHeader.php";

                        $classes = getAllStudid($conn);
                        // echo "returned array is";
                        //print_r($classes);
                        // echo "<br/>";
                        foreach($classes as $classOption){
                            print_r($classOption);
                            $firstName = $classOption["firstName"];
                            $studId = $classOption["studid"];
                            $lastName = $classOption["lastName"];
                            echo "<option value=\"$studId\">$firstName $lastName</option>                            ";
                        }

                    ?>
                </select>
                <br/>

            </div>
            <br/>

            <input type = "submit" name = "chooseStudentSubmit" class="btn btn-primary" value = "GET DETAIL"/>
            <!--<button type="submit" name="addStudentSubmit" class="btn btn-primary">ADD STUDENT</button>-->
        </form>
    </div>

    <script src="../../bootstrap-5.1.0-dist/js/bootstrap.min.js" ></script>
    </body>
</html>