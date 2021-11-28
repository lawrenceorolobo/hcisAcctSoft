<?php

    function login($phone, $password,$conn){
            //This would check if there is a user that has that creditential.
            $sql_stmt_to_confirm = mysqli_stmt_init($conn);
            $sql_command_to_check = "SELECT * FROM users WHERE phone = ?";
    
            //Get the data the user inputted
            //$phone = $phone;
            $passwrd = $password;
    
            //Prepare the MySql statement
            if(mysqli_stmt_prepare($sql_stmt_to_confirm ,$sql_command_to_check)){
                //This would run if the statement is CORRECT!!..Now we bind param.
                mysqli_stmt_bind_param($sql_stmt_to_confirm,"s", $phone);
    
                mysqli_stmt_execute($sql_stmt_to_confirm);
            
                //The below is for checking if there was error.
                //echo "<br/>The error for cheking the data was...".mysqli_stmt_error($sql_stmt_to_confirm)."<br/>";
    
                $result = mysqli_stmt_get_result($sql_stmt_to_confirm);
                    
                if(mysqli_num_rows($result) == 0){
                    //This would run if none of the inputted data is used.
                    header("location:index.php?return=nonexistent");
                }else{
                    //echo "Your phone exist.";
                    
                    //The below fetch the data containing the phone the user inputed.
                    $user_data = mysqli_fetch_array($result);
                    print_r($user_data);
    
                    //$hashed_passwrd = $user_data["passwrd"];
                    //echo $hashed_passwrd; 
    
                    $inputted_passwrd = $passwrd;
    
                    //$password_status = password_verify($inputted_passwrd, $hashed_passwrd);
                    //$password_status = password_verify($inputted_passwrd, $user_data["passwrd"]);
    
                    //echo "<br/>".$password_status;
    
                    if($inputted_passwrd != $user_data["passwrd"]){
                        //This would run if the inputed password isn't same as hashed password.
                        header("Location:index.php?return=wrongpasswrd");
                    }else{
                        //Create session here.
                        session_start();
                        echo "session created here."."<br/>";
                        
                        //instantiate a user class here, then fill the session var with important info.                    
                        
                        /* $user = new User($user_data["firstname"],$user_data["lastname"],$user_data["callnumber"],
                                $user_data["whatsapp"], $user_data["phone"], $inputted_passwrd);
                         */
                        $_SESSION["firstname"] = $user_data["firstname"];
                        $_SESSION["lastname"] = $user_data["lastname"];
                        $_SESSION["position"] = $user_data["position"];
                        $_SESSION["phone"] = $user_data["phone"];
                        $_SESSION["connected"] = 'yes';
                        $_SESSION["uid"] = $user_data["uid"];
                        $_SESSION["activated"] = $user_data["activated"];
    
                        $position = $_SESSION["position"];
                        $position = strtolower($position);
                        header("Location:../users/$position");
                        //Once session has been created, we direct the user to the dashboard's view.
                        
                    }
                }
    
    
            }else{
                echo "The SQL statement is WRONG!!";
            }
    
    }

?>