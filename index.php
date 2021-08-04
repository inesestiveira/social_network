<?php 

session_start();

$controller ="home";

$valid_controllers = ["home", "access", "profile", "timeline", "posts", "admin_access", "deletePosts", "deleteUsers"];

if(
    isset($_GET["controller"]) && 
    in_array($_GET["controller"], $valid_controllers)
) {
    $controller = $_GET["controller"];
}


require("controllers/" .$controller. ".php");