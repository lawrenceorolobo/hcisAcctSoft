<?php
    include "model.php";
    //This would recieve the user's form submission.
    $formSubmitted = $_POST["submit"];
    

    if(!isset($formSubmitted)){
        header("Location:index.php");
        exit();
    }else{
        
        //The rest of the form details.
        $passwrd = mysqli_real_escape_string($conn, $_POST["passwrd"]);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);
        $position = mysqli_real_escape_string($conn, $_POST["position"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
       
        //store data in database.
        addTodb($phoneNumber,$passwrd,$position,$lastName,$firstName, $conn);        
        header("Location:index.php?status=success");
        exit();
    }

?>