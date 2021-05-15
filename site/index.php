<?php 
session_start();
require "../bootstrap.php";


$c = !empty($_GET["c"]) ? $_GET["c"] : "home";
$a = !empty($_GET["a"]) ? $_GET["a"] : "list";

$controller = ucfirst($c) . "Controller";//HomeController

//Include controller first
require "controller/" . $controller . ".php"; //controller/HomeController.php

$objectController = new $controller(); //$objectController = new HomeController();
$objectController->$a();//$objectController->list()

// call_user_func_array([$controller, $a],[]);
 ?>