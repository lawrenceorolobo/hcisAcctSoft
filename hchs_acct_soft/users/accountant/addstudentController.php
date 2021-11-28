<?php

include "model.php"; 
include "../../database/dataHeader.php";
 


if(isset($_POST["addStudentSubmit"])){
  $famid = $_POST['famid'];
  echo "famid is $famid";


  $misc = $_POST['misc'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $scholarship = $_POST['scholarship'];
  $class = $_POST['class'];
  $address = $_POST['address'];
  $bus = $_POST['busPeriod'];
  $tuition = $_POST['tuition'];
  $extraCurricular = $_POST['extraCur'];
  $boardFee = $_POST['boardFee'];
  //isboarder
  $boarder = $_POST['isboarder'];
  echo "<br/>boarder = $boarder<br/>";
  if($bus == "NULL"){
    $busPay = 'NULL';
  }else{
    $busPay = $_POST['busPay'];
    if($busPay == NULL){
      $busPay = 0.00;
    }
  }

  if($boarder == 0){
    $boarding = 0;
  }else{
    $boarding = $boardFee;
    if($boarding == NULL){
      $boarding = 0.00;
    }
  }


  $misc = $_POST['misc'];

  //    $staffStatus = $_POST['staffChild'];


  echo "<br/>boardFee = $boardFee<br/>";

  //Inserting to the Student DB
  insertStudMain( $scholarship,$firstName, $lastName, $class, $famid, $address, $tuition, $extraCurricular, $bus, $boarder, $misc, $conn);
  echo "<br/>";
  $studIdInArray = getStudId($firstName, $lastName, $class, $famid, $address, $conn);

  echo "<br/>THE ID IS:";
  print_r($studIdInArray['studid']);

  $studId = intval($studIdInArray['studid']);
  If($boarder == 0){
    $status = createStudRowInOthers($studId, $busPay, $boarding,  $conn);
  }else{
    $status = createStudRowInOthers($studId, $busPay, 0, $conn);
  }

  if($status == "suc"){
    header("location:addStudent.php?return=success");
  }else{
    header("location:addStudent.php?return=failed");
  }

}else{
  header("location:addStudent.php");
}  
?>