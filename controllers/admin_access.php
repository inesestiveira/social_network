<?php

require_once("models/users.php");

require_once("models/posts.php");

$usersModel = new Users();

$postsModel = new Posts();

$admin = $usersModel->getAdmin();

$users = $usersModel->getAllUsers();

$posts = $postsModel->getAllPosts();

require("views/admin.php");

