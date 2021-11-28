<?php
include "controller.php"; 

include "model.php"; 
include "../../database/dataHeader.php";


session_start();
                        
    if(($_SESSION["position"] != "accountant")&&($_SESSION["activated"] != 1)){
             header("Location:../../login/index.php");
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
        
    <nav class="navbar navbar-expand-md bg-dark fixed-top">
        <div class="container">
            <!---<a href="#" class="navbar-brand"><img src="img\exher1.png" alt="an e with a circle around it."></a>--->

            <a href="index.php" class="navbar-brand">HOLY CROSS</a>            
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id = "navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="addStudent.php" class="nav-link">ADD STUDENT</a>
                    </li>
                    <li class="nav-item">
                        <a href="editstudent.php" class="nav-link">EDIT STUDENT</a>
                    </li>

                    <li class="nav-item">
                        <input type="button" value="GET PDF" id="btPrint" onclick="createPDF()" class= "btn btn-primary"/>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br/>
    <input class="my-5" type="text" id="firstNameSearch" onkeyup = "myFirstNameFunction()" placeholder="SEARCH NAME HERE">
    
    <input type="text" id="classSearch" onkeyup = "classSearch()" placeholder="SEARCH CLASS HERE">

    
    <input type="text" id="famName" onkeyup = "famName()" placeholder="SEARCH FAMILY">
    <br/>
    <!--BELOW IS THE TABLES.-->
    <div id="tab">
    <table  width = "100%" style = "padding-top:10px" border=1px class="table table-stripped" id="myTable">
            <thead>
                <tr>                    
                    <th colspan = "7" class="tablehead">Identity</th>
                    <th colspan = "6" class="tablehead">Main</th>
                    <th colspan = "5" class="tablehead">Extra</th>
                    <th colspan = "4" class="tablehead">Final</th>
                    
        
                </tr>

                <tr>     
                    <!--This is the column under the identity section-->               
                    <th class="tablehead">first Name</th>
                    <th class="tablehead">Last Name</th>
                    <th class="tablehead">family Name</th>
                    <th class="tablehead">family ID</th>
                    <th class="tablehead">class</th>
                    <th class="tablehead">Address</th>

                    <!--This is the column under the main section-->               
                    <th class="tablehead">student id</th>
                    <th class="tablehead">tuition</th>
                    <!--<th class="tablehead">uniform</th>-->
                    <!--<th class="tablehead">books</th>-->
                    <th class="tablehead">extra curricular</th>
                    <th class="tablehead">bus  use</th>
                    <th class="tablehead">bus</th>
                    <th class="tablehead">boarding</th>
                    <th class="tablehead">misc</th>


                    <!--This is the column under the Extra section-->               
                    <th class="tablehead">uniform</th>
                    <th class="tablehead">books</th>
                    <th class="tablehead">Form</th>
                    <th class="tablehead">caution</th>
                    <th class="tablehead">maintenance</th>

                    
                    <th class="tablehead">Scholarship</th>
                    <th class="tablehead">Total Expected</th>
                    <th class="tablehead">Total Paid</th>
                    <th class="tablehead">Balance</th>
        
                </tr>
            </thead>
            <tbody>
                   <?php
                    

                    $studentDetails = getAllStudDetails($conn);
                    //print_r($studentDetails);

                    

                    //Array for the discount children.
                    $threeChildren25Disc = array();
                    $fourChildren50Disc = array();
                    $fiveChildren100Disc = array();
                    $staffChildrenDisc = array();
                    $staffFamIds = getAllStaffFamDetails($conn);

                    $allbillsPrices = getAllBillsDetails($conn);
                    //print_r($allbillsPrices);
                    //Other balances sum up.
                    $otherBill = getAllOthersDetails($conn);
                    //print_r($otherBill);

                    $nonStaffFamilies = getAllNonStaffFamDetails($conn);
                    //print_r($nonStaffFamilies);

                    foreach($nonStaffFamilies as $currentFamId){
                        $famid = $currentFamId["famid"];
                        // echo $famid;
                        // echo "<br/>";


                    
                        $studInFam = getStudDetailsUsingFamId($famid,$conn);
                        //print_r($studInFam);
                        //echo "<br/>";
                        //echo "Length of array for $famid id is = ".count($studInFam);
                        // echo "<br/>";
                        //echo "The contents are of array for $famid id is = ";
                        //print_r($studInFam);
                        // echo "<br/>";

                        //The child in lowest class.
                        $lowestClassChildId = NULL;
                        $lowestClassChildClass = 10000000000000;

                        
                        foreach($studInFam as $curStud){
                            //print_r($curStud);
                            $curStudId = $curStud["studid"];
                            $curStudClass = $curStud["class"];
                            //echo "the current id is $curStudId and the class position is $curStudClass<br/>";
                            
                            if($lowestClassChildClass >= $curStudClass){
                                $lowestClassChildId = $curStudId;
                                $lowestClassChildClass = $curStudClass;
                            }

                            
                        }
                        //echo "<br/>";

                        //echo "Lowest Child Id is $lowestClassChildId, at class $lowestClassChildClass<br/>";
                        //echo "<br/>Done<br/>";
                        $NumOfChildren = count($studInFam);

                        switch($NumOfChildren){
                            case 3:
                                array_push($threeChildren25Disc,$lowestClassChildId);
                                break;
                            
                            case 4:
                                array_push($fourChildren50Disc,$lowestClassChildId);
                                break;
                            
                            case $NumOfChildren >= 5:
                                array_push($fiveChildren100Disc ,$lowestClassChildId);
                                break;
                            
                        }
                    }

                    foreach($staffFamIds as $curStaffFAmId){
                        // echo "For staff fam loop";
                        // print_r($currentFamId);
                        // echo "<br/>";

                      

                        $curFamId = $currentFamId["famid"];
                        $childrenInFam = getStudDetailsUsingFamId($curFamId, $conn);

                        // echo "For staff fam loop<br/>";
                        // print_r($childrenInFam);
                        // echo "<br/>";
                        
                        foreach($childrenInFam as $curChild){
                            array_push($staffChildrenDisc, $curChild["studid"]);
                        }
                        

                    }

                    
                    // echo "Staff Children Ids are=<br/>";
                    // print_r($staffChildrenDisc);
                    // echo "<br/>";
                    

                    // echo "Below are the children with 25% discount.<br/>";
                    // print_r($threeChildren25Disc);
                    // echo "<br/>";

                    //echo "Below are the children with 50% discount.<br/>";
                    //print_r($fourChildren50Disc);
                    //echo "<br/>";
                    //echo "Below are the children with 100% discount.<br/>";
                    //print_r($fiveChildren100Disc);
                    //echo "<br/>";
            

                    //Time to get all students, And display them each by rows.
                    $allstudents = getAllStudDetails($conn);

                    foreach($allstudents as $studToDisplay){

                        $priceToPay = 0;
                        $totalPaid = 0;
                        $balance = 0;


                        //print_r($studToDisplay);
                        //echo "<br/>";
                        echo "<tr>";
                        echo "<td>".$studToDisplay["firstName"]."</td>";
                        echo "<td>".$studToDisplay["lastName"]."</td>";
                        $studFamid = $studToDisplay["famid"];
                        $famName = getfamNameById($studFamid,$conn);
                        //print_r($famName);
                        echo "<td>".$famName["famName"]."</td>";                  
                        echo "<td>".$studToDisplay["famid"]."</td>";

                        $curClass = $studToDisplay["class"];

                        $studId = $studToDisplay["studid"];
                        $studExtra = getStudOtherExpenseUsingStudId($studId, $conn);
                        

                        $studCurClassArray = getClassNameByClassId($curClass, $conn);
                        $studCurClass = $studCurClassArray["className"];
                        echo "<td>$studCurClass</td>";
                        echo "<td>".$studToDisplay["address"]."</td>";
                        echo "<td>".$studToDisplay["studid"]."</td>";
                        echo "<td>".$studToDisplay["tuition"]."</td>";
                        //echo "<td>".$studToDisplay["uniform"]."</td>";
                        //echo "<td>".$studToDisplay["formAdmission"]."</td>";
                        //echo "<td>".$studToDisplay["books"]."</td>";
                        echo "<td>".$studToDisplay["extraCurricular"]."</td>";
                        echo "<td>".busUse($studToDisplay["bus"])."</td>";
                        echo "<td>".checkIfEmpty($studExtra[0]["bus"])."</td>";
                        
                        echo "<td>".$studToDisplay["boarding"]."</td>";
                        echo "<td>".$studToDisplay["misc"]."</td>";
                        //The others expense
                        //echo "The returned others for studId $studId is =";
                        //print_r($studExtra[0]);
                        //echo "<br/>";
                        echo "<td>".checkIfEmpty($studExtra[0]["uniform"])."</td>";
                        echo "<td>".checkIfEmpty($studExtra[0]["books"])."</td>";
                        echo "<td>".checkIfEmpty($studExtra[0]["formAdmission"])."</td>";
                        echo "<td>".checkIfEmpty($studExtra[0]["caution"])."</td>";
                        echo "<td>".checkIfEmpty($studExtra[0]["maintenance"])."</td>";
                        //echo "<td>".$studExtra[0]["bus"]."</td>";
                        if($studToDisplay["scholarship"] == 0){
                            echo "<td>No</td>";
                        }else{
                            echo "<td>Yes</td>";
                        }
                        $boardingToPay;
                        $tuitionToPay = -1;
                        foreach($fiveChildren100Disc as $childId){
                            if($studToDisplay["studid"] == $childId){
                                $tuitionToPay = 0;
                            }
                        }
                        foreach($threeChildren25Disc as $childId){
                            if($studToDisplay["studid"] == $childId){
                                $tuitionfee = getBillsDetails($curClass,"tuition", $conn);
                                //print_r($tuitionfee);
                                $tuitionToPay = $tuitionfee["amount"] - (0.25 * $tuitionfee["amount"]);
                            }
                        }

                        
                        foreach($fourChildren50Disc as $childId){
                            if($studToDisplay["studid"] == $childId){
                                $tuitionfee = getBillsDetails($curClass,"tuition", $conn);
                                //print_r($tuitionfee);
                                $tuitionToPay = $tuitionfee["amount"] - (0.5 * $tuitionfee["amount"]);
                            }
                        }

                        if($tuitionToPay == -1){
                            $tuitionfee = getBillsDetails($curClass,"tuition", $conn);
                            //print_r($tuitionfee);
                            $tuitionToPay = $tuitionfee["amount"] ;
                        }
                        //echo "The tuition to pay is $tuitionToPay<br/>";
                        
                        foreach($staffChildrenDisc as $childId){
                            if($studToDisplay["studid"] == $childId){
                                $tuitionfee = getBillsDetails($curClass,"tuition", $conn);
                                //print_r($tuitionfee);
                                $tuitionToPay = 0.5 * $tuitionfee["amount"];
                            }
                        }
                        
                        if($studToDisplay["boarding"] != NULL){
                            $boardingToPay = 150000;
                            $priceToPay = $priceToPay + $boardingToPay;

                        }

                        $cautionToPay;
                        if($studExtra[0]["caution"] != NULL){
                            $cautionToPay = 10000;
                            $priceToPay = $priceToPay + $cautionToPay;
                        }

                        $maintenanceToPay;
                        
                        if(($studExtra[0]["maintenance"] != NULL)OR($studExtra[0]["maintenance"] != "No Data")){
                            $maintenanceToPay = 10000;
                            $priceToPay = $priceToPay + $maintenanceToPay;
                        }

                        $formFeeToPay;

                        if(($studExtra[0]["formAdmission"] != NULL) AND ($studExtra[0]["formAdmission"] != "No Data.")){
                            $formFeeToPay = getBillsDetails($studToDisplay["class"],"admissionForm",$conn);
                            //print_r($formFeeToPay);
                            //echo "<br/>";
                            //echo $formFeeToPay["amount"];
                            $priceToPay = $priceToPay + $formFeeToPay["amount"];
                        }

                        $extraCurricularToPay;
                        if($studToDisplay["extraCurricular"] != NULL){

                            foreach($staffChildrenDisc as $childId){
                                if($studToDisplay["studid"] == $childId){
                                    $extraCurricularToPay = 5050;
                                    $priceToPay = $priceToPay + $extraCurricularToPay;
                                }
                            }
                            $extraCurricularToPay = getBillsDetails($studToDisplay["studid"],"extraCurricular",$conn);
                            //print_r($extraCurricularToPay);
                            //echo $extraCurricularToPay["amount"];
                        }

                        
                        $busFeeToPay;
                        if($studToDisplay["bus"] != NULL){
                            $busFeeToPay = getBusBillDetails($studToDisplay["address"],$studToDisplay["bus"],$conn);
                            //print_r($busFeeToPay);
                            //echo "<br/>Bus cost is =".$busFeeToPay["cost"];
                            $priceToPay = $priceToPay + $busFeeToPay["cost"];

                        }

                        $priceToPay = $priceToPay + $tuitionToPay;

                        $newArray = array_slice($studToDisplay,7);
                        foreach($newArray as $content){
                            //echo gettype($content);
                            //echo "<br/>";
                            //echo $content;
                            $floatvalAttempt = floatval($content);

                            if(gettype($floatvalAttempt) == "double"){
                               //echo "It is double";
                               $totalPaid = $totalPaid + $floatvalAttempt;
                            }else{
                                //echo "Not double";
                            }
                            //echo "<br/>DATA TYPE STUFF ENDING <br/>";
                        }


                        $newArray = array_slice($studExtra[0],1);
                        foreach($newArray as $content){
                            //echo gettype($content);
                            //echo "<br/>";
                            //echo $content;
                            $floatvalAttempt = floatval($content);

                            if(gettype($floatvalAttempt) == "double"){
                               //echo "It is double";
                               $totalPaid = $totalPaid + $floatvalAttempt;
                            }else{
                                //echo "Not double";
                            }
                            //echo "<br/>DATA TYPE STUFF ENDING <br/>";
                        }

                        echo "<td>$priceToPay</td>";
                        
                        echo "<td>$totalPaid</td>";
                        //$priceToPay = 0;
                        $balance = $priceToPay - $totalPaid;
                        if($balance > 0){
                            echo "<td class = \" text-danger\">$balance</td>";
                        }else{
                            echo "<td class = \" text-success\">$balance</td>";
                        }
                        echo "</tr>";


                    }
                ?>
            </tbody>
        </table>
    


    </div>
    <script>
        function myFirstNameFunction(){
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("firstNameSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            //Loop through all table rows.
            for(i =0; i < tr.length; i++){
                td =  tr[i].getElementsByTagName("td")[0];
                if(td){
                    txtValue = td.textContent || td.innerText;

                    if(txtValue.toUpperCase().indexOf(filter)>-1){
                        tr[i].style.display = "";
                    
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }

        }

        function classSearch(){
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("classSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            //Loop through all table rows.
            for(i =0; i < tr.length; i++){
                td =  tr[i].getElementsByTagName("td")[4];
                if(td){
                    txtValue = td.textContent || td.innerText;

                    if(txtValue.toUpperCase().indexOf(filter)>-1){
                        tr[i].style.display = "";
                    
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }

        }

        function famName(){
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("famName");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            //Loop through all table rows.
            for(i =0; i < tr.length; i++){
                td =  tr[i].getElementsByTagName("td")[1];
                if(td){
                    txtValue = td.textContent || td.innerText;

                    if(txtValue.toUpperCase().indexOf(filter)>-1){
                        tr[i].style.display = "";
                    
                    }else{
                        tr[i].style.display = "none";
                    }
                }
            }

        }

        function createPDF(){
            var sTable = document.getElementById("tab").innerHTML;

            var style = "<style>";
            style = style + "table{width: 100%; font: 17px Calibri;}";
            style = style + "table, th, td{border: solid 1px #DDD; border-collapse: collapse;";
            style = style + "padding: 2px 3px; text-align: center;}";
            style = style + "</style>";

            //CREATE WINDOW OBJECT
            var win = window.open("","","height=700, width=700");

            win.document.write("<html><head>");
            win.document.write("<title>Profile</title>"); //FOR PDF HEADER
            win.document.write(style); //ADD STYLE IN THE HEAD TAG
            win.document.write("</head>");
            win.document.write("</body>");
            win.document.write(sTable);
            win.document.write("</body></html>");

            win.document.close(); //CLOSE THE CURRENT WINDOW.
            win.print(); //PRINT THE CONTENTS.
            ;
        }
    </script>
    
    <script src="../../bootstrap-5.1.0-dist\js\bootstrap.min.js" ></script>
    </body>
</html>