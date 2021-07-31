<?php

require_once("models/users.php");

$usersModel = new Users();

if($_GET["action"] === "register"){
    if( isset($_POST["send"]) ){
        //print_r($_POST);
        if(
            !empty($_POST["username"]) && 
            mb_strlen($_POST["username"]) >= 3 &&
            mb_strlen($_POST["username"]) <= 60 &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000 &&
            $_POST["password"] === $_POST["confirm_password"] &&
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($_POST["phone"]) >= 9 &&
            mb_strlen($_POST["phone"]) <= 30 &&
            mb_strlen($_POST["full_name"]) >= 5 &&
            mb_strlen($_POST["full_name"]) <= 150
            //mb_strlen($_POST["gender"]) >= 5 &&
           // mb_strlen($_POST["gender"]) <= 15
        ) {
            $user_id = $usersModel->createUser( $_POST );
            if(!empty($user_id)) {
                $user = $usersModel->getUser( $_POST["username"] );
                
                $_SESSION["user_id"] = $user_id;
                $_SESSION["username"] = $user["username"];
                header("Location: ?controller=profile&$user[user_id]");
            }
            else{
                $message = "This user already exists";
            }
        }
        else{
            $message = "Please fill your data correctly";
        }
    }
    require("views/register.php");
}
//login
else if($_GET["action"] === "login"){

    if( isset($_POST["send"]) ) {
        
        if(
            mb_strlen($_POST["email"]) >= 3 &&
            mb_strlen($_POST["email"]) <= 252 &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000
        ){
            $user = $usersModel->getUser( $_POST["email"] );

            if( 
                !empty($user) && 
                password_verify($_POST["password"], $user["password"])
            ){
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["username"] = $user["username"];
    
                header("Location: ?controller=profile&$user[user_id]");
            }
            if ($user["user_type"] === "admin") {
                $_SESSION["user_type"] =  $user["user_type"];
                $_SESSION["user_id"]   =  $user["user_id"];
                $_SESSION["email"]  =  $user["email"];
                $_SESSION["username"] = $user["username"];
                header("Location: ?controller=admin_access");
            
            
        }
            else {
                $message = "Invalid login data";
            }
    }
            else {
                $message = "Please fill your data correctly";
            }
        
    }
    require("views/login.php");
}

//logout 
else if($_GET["action"] === "logout"){
    session_destroy();
    header("Location: ?controller=home");
}

