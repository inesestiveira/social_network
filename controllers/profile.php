<?php


if( !isset($_SESSION["user_id"]) ){
    header("Location: ?controller=access&action=login");
    exit;
} 

require("models/profile.php");

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

        $redirect_id = $postsModel->createPost([
            "message"   =>      $_POST["message"],
            "username"  =>      $_SESSION["username"],
            "reply_id"  =>      $reply_id,
            "user_id"   =>      $_SESSION["user_id"]
        ]);
    }
    else {
        $alert = "Please fill correctly";
    }
}

//$posts = $postsModel->getPost($_SESSION["post_id"]);


$showPosts = $postsModel->showUserPost($_SESSION["user_id"]);

$user = $_SESSION["user_id"];

$usersModel = new Users();

$users = $usersModel->getAllUsers();

require("views/profile.php");
