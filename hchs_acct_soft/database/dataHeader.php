<?php
    //This would contain the database login details.

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "hchs";

    //Connecting to db.
    $conn = mysqli_connect($serverName, $userName, $password, $database);

    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error());
    }

    //echo "Connected to db successfully";
    //Then include this file in all the models.
?>