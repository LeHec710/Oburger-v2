<?php
session_start();
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define("WEBROOT", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));

require_once "controllers/Router.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', TRUE);

$router = new Router();
$router->routeReq();

?>