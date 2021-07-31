<?php

require_once("models/users.php");

require_once("models/posts.php");

$postsModel = new Posts();

$usersModel = new Users();

$posts = $postsModel->getAllPosts();

$users = $usersModel->getAllUsers();

if (isset($_POST["send"])) {
    $user = $usersModel->deleteUser($_POST["user_id"]);
    $message = 'User ' . $_POST["user_id"] . ' was deleted';
}


require("views/admin.php");