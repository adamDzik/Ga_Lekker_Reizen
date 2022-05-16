<?php
//// Initialize the session
//session_start();
//
//// Check if the user is already logged in, if yes then redirect him to welcome page
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: ../index.php");
//    exit;
//}
//
//// Include config file
//require_once "../config/config.php";
//
//// Define variables and initialize with empty values
//$Email = $Wachtwoord = "";
//$Email_err = $Wachtwoord_err = $login_err = "";
//
//// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST"){
//
//    // Check if username is empty
//    if(empty(trim($_POST["Email"]))){
//        $Email_err = "Please enter username.";
//    } else{
//        $Email = trim($_POST["Email"]);
//    }
//
//    // Check if password is empty
//    if(empty(trim($_POST["Wachtwoord"]))){
//        $Wachtwoord_err = "Please enter your password.";
//    } else{
//        $Wachtwoord = trim($_POST["Wachtwoord"]);
//    }
//
//    // Validate credentials
//    if(empty($Email_err) && empty($Wachtwoord_err)){
//        // Prepare a select statement
//        $sql = "SELECT Student_ID, Email, Wachtwoord FROM Student WHERE Email = :Email";
//
//        if($stmt = $pdo->prepare($sql)){
//            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam(":Email", $param_Email, PDO::PARAM_STR);
//
//            // Set parameters
//            $param_Email = trim($_POST["Email"]);
//
//            // Attempt to execute the prepared statement
//            if($stmt->execute()){
//                // Check if username exists, if yes then verify password
//                if($stmt->rowCount() == 1){
//                    if($row = $stmt->fetch()){
//                        $Student_ID = $row["Student_ID"];
//                        $Email = $row["Email"];
//                        $hashed_Wachtwoord = $row["Wachtwoord"];
//                        if(password_verify($Wachtwoord, $hashed_Wachtwoord)){
//                            // Password is correct, so start a new session
//                            session_start();
//
//                            // Store data in session variables
//                            $_SESSION["loggedin"] = true;
//                            $_SESSION["Student_ID"] = $Student_ID;
//                            $_SESSION["Email"] = $Email;
//
//                            // Redirect user to welcome page
//                            header("location: ../index.php");
//                        } else{
//                            // Password is not valid, display a generic error message
//                            $login_err = "Invalid username or password.";
//                            var_dump($row);
//                        }
//                    }
//                } else{
//                    // Username doesn't exist, display a generic error message
//                    $login_err = "Invalid username or password.";
//                }
//            } else{
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//            // Close statement
//            unset($stmt);
//        }
//    }
//    // Close connection
//    unset($pdo);
//}
//?>
