<?php 

$controller ="home";

$valid_controllers = ["home"];

if(isset($_GET["controller"]) && 
in_array($_GET["controller"], $valid_controllers)
) {
    $controller = $_GET["controller"];
}

require("controllers/" .$controller. ".php");