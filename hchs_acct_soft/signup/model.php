<?php
    //The line includes the database header file.
    include "../database/dataHeader.php";

    function addTodb($phoneNumber,$passwrd,$position,$lastName,$firstName,$conn){
        //The sql cmd that would be ran.
        
        $activated = 0;
        $sqlCmd = "INSERT INTO `users`(`firstName`, `lastName`, `phone`, `passwrd`, `position`, `activated`) VALUES ('$firstName','$lastName','$phoneNumber','$passwrd','$position','$activated');";
        echo "<br/>".$sqlCmd;
        $exec_sate = mysqli_query($conn, $sqlCmd);
        echo "<br/>". $exec_sate;
        if($exec_sate == TRUE){
            echo "Successfully inserted";
        }else{
            echo "Unsuccessful insert<br/>";
            print_r(mysqli_error($conn));
        }
    }

    function checkPhoneUsed($phoneNumber){
        //The students should write the code for this part.
        /**
         * 1. WRITE A SQL CMD TO SELECT * FROM THE RABLE WHERE phoneNumber equal to parameter.
         * 2. Check if the length is equal to or greater than zero, then say already in use..but if not then run the addTodb function.
         */
    }

?>