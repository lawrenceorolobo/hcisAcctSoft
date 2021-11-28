<?php

    include "model.php"; 
    include "../../database/dataHeader.php";
 

        if(isset($_POST["editStudentSubmit"])){
      
            $studId = nullExchange($_POST['studid']);
            $firstName = nullExchange($_POST['firstName']);
            $lastName = nullExchange($_POST['lastName']);
            $tuition = nullExchange($_POST['tuition']);
            $extraCurricular = nullExchange($_POST['extraCur']);
            $boardFee = nullExchange($_POST['boardFee']);
            $misc = nullExchange($_POST['misc']);
            $uniform = nullExchange($_POST['uniform']);
            $books = nullExchange($_POST['books']);
            $formAdmission = nullExchange($_POST['formAdmission']);
            $busCost = nullExchange($_POST['busCost']);
            $caution = nullExchange($_POST['caution']);
            $maintenance = nullExchange($_POST['maintenance']);
            $statusMain = updateMain($studId, $conn, $tuition, $extraCurricular, $misc);
            $statusOthers = updateOthers($studId, $conn, $boardFee, $uniform, $books, $formAdmission, $busCost, $caution, $maintenance);
            print_r($statusMain);
            print_r($statusOthers);

            if(($statusMain == "success") && ($statusOthers == "success")){
              header("location:editstudent.php?return=success");
            }else{
              header("location:editstudent.php?return=failed");
            }

        }else{
          header("location:index.php");
        }  
?>