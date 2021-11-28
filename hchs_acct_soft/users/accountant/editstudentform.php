<?php

include "model.php"; 
include "../../database/dataHeader.php";
 

if(!isset($_POST['student'])){
    header("Location:editstudent.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-5.1.0-dist\css\bootstrap.min.css"/>

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
            <div class="collapse navbar-collapse" id = "navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">STUDENT LIST</a>
                    </li>
                    <li class="nav-item">
                        <a href="addStudent.php" class="nav-link">ADD STUDENT</a>
                    </li>
                    <li class="nav-item">
                        <a href="editStudent.php" class="nav-link">EDIT STUDENT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br/>

    
     <!--FORM-->

     <?php
        $studID = $_POST["student"];
        // echo $studID;
        // echo "<br/>";
        $studMainDetails = getStudDetails($studID, $conn);
        $studOthersDetails = getOthersDetails($studID, $conn);
        //print_r($studMainDetails);
        echo "<br/>";
        //print_r($studOthersDetails);


        //Variables:
        $scholarship =$studMainDetails["scholarship"];
        $firstName =$studMainDetails["firstName"];
        $lastName =$studMainDetails["lastName"];
        $class =$studMainDetails["class"];
        $famid =$studMainDetails["famid"];
        $address =$studMainDetails["address"];
        $tuition =$studMainDetails["tuition"];
        $extraCurricular =$studMainDetails["extraCurricular"];
        $busPeriod =$studMainDetails["bus"];
        $boarder =$studMainDetails["boarding"];
        $misc =$studMainDetails["misc"];
        $uniformCash = $studOthersDetails["uniform"];
        $books = $studOthersDetails["books"];
        $formCash = $studOthersDetails["formAdmission"];
        $busCash = $studOthersDetails["bus"];
        $caution = $studOthersDetails["caution"];
        $maintenance = $studOthersDetails["maintenance"];
        $boardingCost = $studOthersDetails["boardingFee"];
?>
    
     <div class="container">
        <form action="editstudentController.php" method="post">
            <div class="form-group">
                    <label>StudId</label>
                    <input name= "studid" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" value = "<?php echo $studID; ?>">
                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>--->
                    
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input name= "firstName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" value = "<?php echo $firstName; ?>">
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>--->
                
            </div>
            
            <div class="form-group">
                <br/>
                <label for="exampleInputEmail">Last Name</label>
                <input name= "lastName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" value = "<?php echo $lastName; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>
            
            <div class="form-group">

                <br/>
                <label for="exampleScholarship">Scholarship:</label>
                <p><?php 
                if($scholarship == 0){                    
                   echo "No";
                }else{
                    echo "Yes";
                }
                ?></p>
                <br/>
            
            </div>

            <div class="form-group">

                <br/>
                <label for="class">Class:</label>
                <p><?php 
                $classArray = getClassNameByClassId($class, $conn);
                //print_r($classArray);
                $className = $classArray["className"];
                echo $className;
                ?>
                </p>
                <br/>

            </div>
            
            <div class="form-group">
                <br/>
                <label for="family">Family:</label>
                <p><?php 
                $famArray = getfamDetails($famid, $conn);
                $famName = $famArray['famName'];
                echo $famName; ?></p>

                <br/>
            </div>

            
            <div class="form-group">
                <br/>
                    <label for="exampleaddress">Address:</label>
                    <p><?php 
                if($address == 1){                    
                   echo "10,000NGN PLACE";
                }else{
                    echo "12,500NGN PLACE";
                }
                ?></p>
                <br/>
            </div>

            <div class="form-group">
                <br/>
                    <label for="busPeriodLabel">Times Bus is used:</label>
                    <p><?php 
                        if(($busPeriod == 0) OR ($busPeriod == "NULL")){                    
                            echo "NONE";
                        }else if($busPeriod == 1){
                            echo "Morning";

                        }else if($busPeriod == 2){
                            echo "Afternoon";
                        
                        }else if($busPeriod == 3){
                            echo "Both";
                        }
                        ?>
                        <p>
                <br/>
            </div>


            <div class="form-group">
                <br/>
                <label for="exampleInputEmail">Tuition</label>
                <input name= "tuition" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo nullExchange($tuition); ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Extra Curricular</label>
                <input name= "extraCur" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo $extraCurricular; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

        
            <div class="form-group">
                <br/>
                    <label for="isboarderInput">Boarder:</label>
                    <p><?php 
                        if($boarder == 0){                    
                            echo "NO";
                        }else{
                            echo "YES";

                        }
                        ?>
                        <p>
                    
                <br/>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail">Boarding</label>
                <input name= "boardFee" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"   value = "<?php echo $boardingCost; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Misc</label>
                <input name= "misc" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo $misc; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            
            <div class="form-group">
                <label for="exampleInputEmail">Uniform</label>
                <input name= "uniform" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo $uniformCash; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>
       
            
            <div class="form-group">
                <label for="exampleInputEmail">Books</label>
                <input name= "books" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo $books; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            
            <div class="form-group">
                <label for="exampleInputEmail">Form Admission</label>
                <input name= "formAdmission" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"  value = "<?php echo $formCash; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Bus</label>
                <input name= "busCost" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"   value = "<?php echo $busCash; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Caution</label>
                <input name= "caution" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"   value = "<?php echo $caution; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Maintenance</label>
                <input name= "maintenance" type="number" class="form-control" id="exampleInputEmail1" placeholder="Family ID"   value = "<?php echo $maintenance; ?>"/>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with abyone else.</small>-->
                <br/>
            </div>



            <input type = "submit" name = "editStudentSubmit" class="btn btn-primary" value = "EDIT STUDENT"/>
            <!--<button type="submit" name="addStudentSubmit" class="btn btn-primary">ADD STUDENT</button>-->
        </form>
     
    </div>
    
</body>