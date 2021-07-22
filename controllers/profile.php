<?php


require("models/profile.php");

$postsModel = new Posts();

$post_id = "";

$posts = $postsModel->getDetail($post_id);

$usersModel = new Users();

$users = $usersModel->get();

require("views/profile.php");
