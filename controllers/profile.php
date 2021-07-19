<?php

//require("models/users.php");

require("models/posts.php");

$postsModel = new Posts();

$post_id = $action;

$posts = $postsModel->getDetail($post_id);

require("views/profile.php");
