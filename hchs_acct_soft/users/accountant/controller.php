<?php
    //THIS WOULD CONTAIN FLOW OF EXECUTION FOR THE ACCOUNTANT.
   
    // if(!isset($_POST["submit"])){
    //     header("Location:index.php");
    // } 
    
    // if(isset($_POST["uploadSubmitted"])){
    //     //This would call the upload function in the model.
    //     $folderName = $_POST["folderName"];
    //     $term = $_POST["term"];
    //     $thedate = new DateTime();
    //     $fileNewName = $thedate -> format('Y-m-d');
    //     //$fileNewName = $fileNewName.".csv";
    //     //echo $fileNewName;
    //     //echo gettype($fileNewName);
    //     $targetDir = "../../uploads/".$folderName."/".$term."/";
    //     $fileToUpload = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    //     $fileType = strtolower(pathinfo($fileToUpload,PATHINFO_EXTENSION));

    //     if(file_exists($targetDir.$fileNewName)){
    //         header("Location:index.php?status=alreadyposted");
    //         exit();
    //     }

    //     if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetDir."$fileNewName.csv")){
    //         header("Location:index.php?status=success");
    //         exit();   
    //     }else if ($_FILES["fileToUpload"]["error"] = 4){
    //         header("Location:index.php?status=nofile");
    //     }else{
    //         //echo "Error = ".$_FILES["fileToUpload"]["error"];
    //         header("Location:index.php?status=failed");
    //     }
    // }else{
    //     header("Location:index.php");
    // }

    //This would calculate the discount and for whom.
    function checkDiscount($famArray, $discountArray){
        foreach($famArray as $curFam){
            $famKids = count($curFam);
            echo $famKids;
        }
    }


    function busUse($busNum){
        if($busNum == NULL){
            //echo "<td>-</td>";
            return "-";
        }else if($busNum == 1){
            //echo "<td>$whatToCheck</td>";
            return "Morning";
        }else if($busNum == 2){
            //echo "<td>$whatToCheck</td>";
            return "Afternoon";
        }else if($busNum == 3){
            //echo "<td>$whatToCheck</td>";
            return "Both";
        }
    }
?>