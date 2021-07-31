<?php

require_once("models/posts.php");
require_once("models/users.php");

$postsModel = new Posts();

$usersModel = new Users();

$posts = $postsModel->getAllPosts();

$users = $usersModel->getAllUsers();

if (isset($_POST["send"])) {
    $post = $postsModel->deletePost($_POST["post_id"]);
    $message = 'Post ' . $_POST["post_id"] . ' was deleted';
}



    

require("views/admin.php");