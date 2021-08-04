<?php

if( !isset($_SESSION["user_id"]) ){
    header("Location: ?controller=access&action=login");
    exit;
} 

require("models/posts.php");

$postsModel = new Posts();

if( isset($_POST["send"]) ) {


    if(
        mb_strlen($_POST["message"]) >= 5 &&
        mb_strlen($_POST["message"]) <= 65535
    ) {
        $alert = "Post submitted!";

        $redirect_id = $postsModel->createPost([
            "message"   =>      $_POST["message"],
            "username"  =>      $_SESSION["username"],
            "user_id"   =>      $_SESSION["user_id"]
        ]);
    }
    else {
        $alert = "Please fill correctly";
    }
}



require("views/profile.php");