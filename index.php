<?php 

session_start();

$action = "";

if(!empty($url_parts[6])){
    $action = strip_tags(trim($url_parts[6]));
}

$controller ="home";

$valid_controllers = ["home", "access", "profile", "timeline", "posts", "admin_access", "deletePosts"];

if(
    isset($_GET["controller"]) && 
    in_array($_GET["controller"], $valid_controllers)
) {
    $controller = $_GET["controller"];
}

if(
    !empty($url_parts[5]) &&
    in_array($url_parts[5], $valid_controllers)
) {
    $controller = $url_parts[5];
}

require("controllers/" .$controller. ".php");