<?php

if( !isset($_SESSION["user_id"]) ){
    header("Location: ?controller=access&action=login");
    exit;
} 

require("models/posts.php");

$postsModel = new Posts();

if( isset($_POST["send"]) ) {

    $reply_id = null;
    if( isset($_POST["reply_id"]) ) {
        $reply_id = $_POST["reply_id"];
    }

    if(
        mb_strlen($_POST["message"]) >= 5 &&
        mb_strlen($_POST["message"]) <= 65535
    ) {
        $alert = "Post submitted!";

        $redirect_id = $postsModel->create([
            "message"   =>      $_POST["message"],
            "username"  =>      $_SESSION["username"],
            "reply_id"  =>      $reply_id
        ]);
    }
    else {
        $alert = "Please fill in data correctly";
    }
}


//view posts

$post_id = $action;

$posts = $postsModel->getDetail( (int)$post_id  );

if( empty($posts) ) {
    header("HTTP/1.1 404 Not Found");
    die("Not found");
}


require("views/profile.php");