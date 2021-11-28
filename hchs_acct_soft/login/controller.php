<?php
    include "model.php";
    include "../database/dataHeader.php";
    //This would recieve the user's form submission.
    $phoneNumber = $_POST["phoneNumber"];
    $passwrd = $_POST["password"];
    
    if(isset($_POST["submit"])){
       login($phoneNumber, $passwrd, $conn);
    }
?>