<?php

function updateOthers($studId, $conn, $boardFee, $uniform, $books, $formAdmission, $busCost, $caution, $maintenance){
    
    $sqlCmd = "
    UPDATE `others` SET `uniform`= $uniform,`books`= $books,`formAdmission`= $formAdmission,
    `bus`= $busCost,`caution`= $caution,`maintenance`= $maintenance,
    `boardingFee`= $boardFee
        WHERE (`studid` = $studId);";

    
//$sqlStmt = mysqli_stmt_init($conn);
    print("<br/>".$sqlCmd);
    $main_exec_state = mysqli_query($conn, $sqlCmd);
    echo "<br/>". $main_exec_state;
    if($main_exec_state == TRUE){
        echo "Successfully updated Others INfo";
        return "success";
    }else{
        echo "Unsuccessful update of Others Info <br/>";
        print_r(mysqli_error($conn));
        $status = mysqli_error($conn);
        return "failed $status";
    }


}

function updateMain($studId, $conn, $tuition, $extraCurricular, $misc){
    $sqlCmd = "
    UPDATE `students` SET `tuition`= $tuition,`extraCurricular`= $extraCurricular,`misc`= $misc
     WHERE (`studid` = $studId);";
    //$sqlStmt = mysqli_stmt_init($conn);
    $main_exec_state = mysqli_query($conn, $sqlCmd);
    echo "<br/>". $main_exec_state;
    if($main_exec_state == TRUE){
        echo "Successfully updated Main INfo";
        return "success";
    }else{
        echo "Unsuccessful update of Main Info <br/>";
        print_r(mysqli_error($conn));
        $status = mysqli_error($conn);
        return "failed $status";
    }


}

function nullExchange($whatToCheck){
    if($whatToCheck == NULL){
        return "NULL";
        //echo "NULL";
    }else{
        return $whatToCheck;
        //echo $whatToCheck;
    }
}

function checkIfEmpty($whatToCheck){
    if($whatToCheck == NULL){
        //echo "<td>-</td>";
        return "-";
    }else{
        //echo "<td>$whatToCheck</td>";
        return $whatToCheck;
    }
}

function EmptyForNull($whatToCheck){
    if($whatToCheck == NULL){
        //echo "<td>-</td>";
        return NULL;
    }else{
        //echo "<td>$whatToCheck</td>";
        return $whatToCheck;
    }
}


//this would contain the methods/functions that involve database.
    function getfamDetails($famid, $conn){
        $sqlGetFamCmd = "SELECT * FROM `families` WHERE (`famid` = $famid);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllStudents($conn){
        $sqlGetFamCmd = "SELECT * FROM `classes`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
           // mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllStudid($conn){
        $sqlGetFamCmd = "SELECT * FROM `students`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
           // mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllClasses($conn){
        $sqlGetFamCmd = "SELECT * FROM `classes`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
           // mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    
    function getAllfamilies($conn){
        $sqlGetFamCmd = "SELECT `famid`,`famName` FROM `families`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
           // mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    

    function getfamNameById($famid, $conn){
        $sqlGetFamCmd = "SELECT `famName` FROM `families` WHERE (`famid` = $famid);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetFamCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllFamDetails($conn){
        $sqlGetAllFamCmd = "SELECT * FROM `families`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllFamCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetAllFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    //
    function getAllNonStaffFamDetails($conn){
        $sqlGetAllNonStaffFamCmd = "SELECT `famid` FROM `families` WHERE (`stats` != 'staff');";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllNonStaffFamCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetAllStaffFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllStaffFamDetails($conn){
        $sqlGetAllStaffFamCmd = "SELECT `famid` FROM `families` WHERE (`stats` = 'staff');";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllStaffFamCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d", $sqlGetAllStaffFamCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }


    

    function getOthersDetails($studId, $conn){
        $sqlGetOthersDetails = "SELECT * FROM `others` WHERE (`studid` = $studId);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetOthersDetails)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetOthersDetails);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
                
            }else{
                $recievedData = mysqli_fetch_array($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    
    function getAllOthersDetails($conn){
        $sqlGetAllOthers = "SELECT * FROM `others`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllOthers)){
            //mysqli_stmt_bind_param($sqlStmt,"s",$sqlGetAllOthers);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }
    
    function getClassNameByClassId($classId, $conn){
        $sqlGetClassNameCmd = "SELECT `className` FROM `classes` WHERE (`classid` = $classId);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetClassNameCmd)){
           // mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetClassNameCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }
  

    function getStudDetails($studId, $conn){
        $sqlGetStudCmd = "SELECT * FROM `students` WHERE (`studid` = ?);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetStudCmd)){
            mysqli_stmt_bind_param($sqlStmt,"d",$studId);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllStudIdAndName($conn){
        $sqlGetStudCmd = "SELECT `studid`, `firstName` FROM `students`;";
        $sqlStmt = mysqli_stmt_init($conn);

        mysqli_stmt_execute($sqlStmt);
            
        if (mysqli_stmt_error($sqlStmt) != ""){
            echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
        }

        $result = mysqli_stmt_get_result($sqlStmt);

        if(mysqli_num_rows($result) == 0){
            //return "No Data.";
        }else{
            $recievedData = mysqli_fetch_array($result,MYSQLI_ASSOC);
            //return $recievedData;
        }
            

    }

    function getStudId($firstName, $lastName, $classid, $famId, $address, $conn){
        $sqlGetStudCmd = "SELECT `studid` FROM `students` WHERE (`firstName` = \"$firstName\") AND (`lastName` = \"$lastName\")AND (`class` = \"$classid\")AND (`famid` = \"$famId\")AND (`address` = \"$address\");";
        $sqlStmt = mysqli_stmt_init($conn);
        echo $sqlGetStudCmd;
        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetStudCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetStudCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }
  
    function getStudDetailsUsingFamId($famId, $conn){
        $sqlGetStudCmd = "SELECT * FROM `students` WHERE (`famid` = $famId);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetStudCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetStudCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return; //This would mean that there is no data.
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getStudOtherExpenseUsingStudId($studId, $conn){
        $sqlGetStudCmd = "SELECT * FROM `others` WHERE (`studid` = $studId);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetStudCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetStudCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return; //This would mean that there is no data.
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getAllStudDetails($conn){
        $sqlGetAllStudentsCmd = "SELECT * FROM `students`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllStudentsCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetAllStudentsCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }
    
    function getBillsDetails($classId, $billName, $conn){
        $sqlGetDiscountCmd = "SELECT `amount` FROM `billscategory` WHERE (`classid` = $classId) AND (`billName` = \"$billName\");";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetDiscountCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetDiscountCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getBusBillDetails($place, $busNum, $conn){
        $sqlGetDiscountCmd = "SELECT `cost` FROM `bus` WHERE (`place` = $place) AND (`busNum` = $busNum);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetDiscountCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetDiscountCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }


    function getAllBillsDetails($conn){
        $sqlGetAllBillsCmd = "SELECT * FROM `billscategory`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllBillsCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetAllBillsCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function getDiscountDetails($studId, $conn){
        $sqlGetDiscountCmd = "SELECT * FROM `discounts` WHERE (`discid` == $studId);";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetDiscountCmd)){
            mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetDiscountCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }


    function getAllDiscountsDetails($conn){
        $sqlGetAllDiscountsCmd = "SELECT * FROM `discounts`;";
        $sqlStmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($sqlStmt ,$sqlGetAllDiscountsCmd)){
            //mysqli_stmt_bind_param($sqlStmt,"d",$sqlGetAllDiscountsCmd);
            mysqli_stmt_execute($sqlStmt);
            
            if (mysqli_stmt_error($sqlStmt) != ""){
                echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sqlStmt)."<br/>";
            }

            $result = mysqli_stmt_get_result($sqlStmt);

            if(mysqli_num_rows($result) == 0){
                return "No Data.";
            }else{
                $recievedData = mysqli_fetch_array($result);
                return $recievedData;
            }
            
        }else{
            echo "The SQL statement is WRONG!!";
        }
    }

    function insertStudMain($scholarship,$firstName, $lastName, $class, $famid, $address, $tuition, $extraCurricular, $bus, $boarding, $misc, $conn){
            //The sql cmd that would be ran.
            
            $sqlMainCmd = "INSERT INTO `students`(`scholarship`,`firstName`, `lastName`, `class`, `famid`, `address`, `tuition`, `extraCurricular`, `bus`, `boarding`, `misc`) 
                            VALUES (\"$scholarship\",\"$firstName\", \"$lastName\", \"$class\", \"$famid\", \"$address\", \"$tuition\", \"$extraCurricular\", \"$bus\", \"$boarding\", \"$misc\");";
            echo "<br/>".$sqlMainCmd;
            $main_exec_state = mysqli_query($conn, $sqlMainCmd);
            echo "<br/>". $main_exec_state;
            if($main_exec_state == TRUE){
                echo "Successfully inserted Main INfo";
            }else{
                echo "Unsuccessful insert of Main Info <br/>";
                print_r(mysqli_error($conn));
            }


           
        
    }

    function createStudRowInOthers($studId, $bus,  $boarding, $conn){
        //The sql cmd that would be ran.
  
       $sqlOtherCmd = "INSERT INTO `others`(`studid`, `uniform`, `books`, `formAdmission`, `bus`, `caution`, `maintenance`, `boardingFee`, `misc`) 
                    VALUES ($studId,NULL,NULL,NULL,$bus,NULL,NULL, $boarding,0);";
        echo "<br/>".$sqlOtherCmd;
        $exec_sate = mysqli_query($conn, $sqlOtherCmd);
        echo "<br/>". $exec_sate;
        if($exec_sate == TRUE){
            echo "Successfully inserted";
            return "suc";
        }else{
            echo "Unsuccessful insert<br/>";
            $error = mysqli_error($conn);
            return "unsuc $error";
            //print_r(mysqli_error($conn));
        }

    }
  
    function UpdateStudOthers($studOtherfinInfoArray, $conn){
        //The sql cmd that would be ran.

        $sqlOtherCmd = "
        UPDATE `others` SET `uniform`= $studOtherfinInfoArray[1],`books`=$studOtherfinInfoArray[2],`formAdmission`=$studOtherfinInfoArray[3],`bus`=$studOtherfinInfoArray[4],`caution`=$studOtherfinInfoArray[5],`maintenance`=$studOtherfinInfoArray[6],`misc`=$studOtherfinInfoArray[7] WHERE (`studid` == $studOtherfinInfoArray[0]);";
        echo "<br/>".$sqlOtherCmd;
        $exec_sate = mysqli_query($conn, $sqlOtherCmd);
        echo "<br/>". $exec_sate;
        if($exec_sate == TRUE){
            echo "Successfully inserted";
            return "success";
        }else{
            echo "Unsuccessful insert<br/>";
            print_r(mysqli_error($conn));
            $status = mysqli_error($conn);
            return "failed $status";
        }

    }


    function addNewFamily($parent1, $parent2, $familyName, $status, $conn){
        //The sql cmd that would be ran.
  
        $sqlOtherCmd = "INSERT INTO `families`( `parent1`, `parent2`, `famName`, `stats`) VALUES ($parent1, $parent2, $familyName, $status);";
        echo "<br/>".$sqlCmd;
        $exec_sate = mysqli_query($conn, $sqlCmd);
        echo "<br/>". $exec_sate;
        if($exec_sate == TRUE){
            echo "Successfully inserted New Family.";
        }else{
            echo "Unsuccessful insert of New Family.<br/>";
            print_r(mysqli_error($conn));
        }

    }
?>