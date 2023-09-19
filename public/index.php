<?php
session_start();

define("ABSPATH", true);
require "../app/core/init.php";

$controller=$_GET["pg"] ?? "home";
$controller=strtolower($controller);
// show($controller);

if(file_exists("../app/controllers/".$controller.".php")){
    require("../app/controllers/".$controller.".php");
}else{
    echo "Controller not found";
}