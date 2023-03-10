<?php
require "conexion.php";

ini_set("display_errors",true);
error_reporting();

$carga=fn($clase)=>require("$clase.php");
spl_autoload_register($carga);

session_start();
?>