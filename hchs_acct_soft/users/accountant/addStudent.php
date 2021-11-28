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
                    <div class=\"alert alert-success\" role=\"alert\"><span><strong>Alert:</strong> Successfully Added.</span></div>                
                    ";
                }else{
                    echo "
                    <div class=\"alert alert-success\" role=\"alert\"><span><strong>Alert:</strong> Failed to add, Please Call Drekline.</span></div>
                    ";
                }
            }
        ?>
    </div>

     <!--FORM-->
    <div class="container">
        <form action="addstudentController.php" method="post">
            <div class="form-group">
                <label>First Name</label>
                <input name= "firstName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>--->
                
            </div>
            
            <div class="form-group">
                <br/>
                <label for="exampleInputEmail">Last Name</label>
                <input name= "lastName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>
           <!-- <div class="form-group">

                <br/>
                <label for="exampleScholarship">Is Staff Child?</label>
                <select name="staffChild" id="staffChildInput">

                    <option value="1">YES</option>
                    <option value="0">NO</option>

                </select>
                <br/>
            
            </div>--->
            
            <div class="form-group">

                <br/>
                <label for="exampleScholarship">Scholarship</label>
                <select name="scholarship" id="scholarshipInput">

                    <option value="1">YES</option>
                    <option value="0">NO</option>

                </select>
                <br/>
            
            </div>

            <div class="form-group">

                <br/>
                <label for="class">Class</label>
                <select name="class" id="classInput">
                    <?php
                        include "model.php"; 
                        include "../../database/dataHeader.php";

                        $classes = getAllClasses($conn);
                        // echo "returned array is";
                        // print_r($classes);
                        // echo "<br/>";
                        foreach($classes as $classOption){
                            $className = $classOption[1];
                            $classId = $classOption[0];
                            echo "<option value=\"$classId\">$className</option>                            ";
                        }

                    ?>
                </select>
                <br/>

            </div>
            
            <div class="form-group">
                <br/>
                <label for="family">Family</label>
                <select name="famid" id="familyId">
                    <?php

                        $famids = getAllfamilies($conn);
                        //echo "returned array is";
                        //print_r($famids);
                        // echo "<br/>";
                        foreach($famids as $famid){
                            $famName = $famid[1];
                            $famId = $famid[0];
                            echo "<option value=\"$famId\">$famName</option>                            ";
                        }

                    ?>
                </select>


                <br/>
            </div>

            
            <div class="form-group">
                <br/>
                    <label for="exampleaddress">Address</label>
                    <select name="address" id="addressInput">

                        <option value="1">Address billed 10,000NGN</option>
                        <option value="2">Address billed 12,500NGN</option>

                    </select>
                <br/>
            </div>

            <div class="form-group">
                <br/>
                    <label for="busPeriodLabel">Times Bus is used</label>
                    <select name="busPeriod" id="busPeriodInput">
                        <option value="NULL">None</option>
                        <option value="1">Morning</option>
                        <option value="2">Afternoon</option>
                        <option value="3">Both</option>

                    </select>
                <br/>
            </div>


            <div class="form-group">
                <br/>
                <label for="exampleInputEmail">Tuition</label>
                <input value="NULL" name= "tuition" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Extra Curricular</label>
                <input name= "extraCur" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Bus</label>
                <input name= "busPay" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>
        
            <div class="form-group">
                <br/>
                    <label for="isboarderInput">Boarder</label>
                    <select name="isboarder" id="isboarderInput">
                        <option value=0>No</option>
                        <option value=1>YES</option>
                        
                    </select>
                <br/>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail">Boarding</label>
                <input name= "boardFee" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Misc</label>
                <input name= "misc" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>
       
            <input type = "submit" name = "addStudentSubmit" class="btn btn-primary" value = "ADD STUDENT"/>
            <!--<button type="submit" name="addStudentSubmit" class="btn btn-primary">ADD STUDENT</button>-->
        </form>
    </div>

    <script src="../../bootstrap-5.1.0-dist/js/bootstrap.min.js" ></script>
    </body>
</html>