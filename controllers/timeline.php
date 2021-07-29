<?php

require("models/profile.php");


$postsModel = new Posts();



$posts = $postsModel->getAllPosts();





$usersModel = new Users();

$user = "";

$users = $usersModel->getAllUsers();


require("views/timeline.php");