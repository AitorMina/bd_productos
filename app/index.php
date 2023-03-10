<?php
require "conexion.php";

ini_set('display_errors',true);
error_reporting(E_ALL);
$carga=fn($clase)=>require("$clase.php");
spl_autoload_register($carga);
session_start();

if (isset($_SESSION['user'])){
    header("location:sitio.php");
}

$msj =$_GET['msj']??"";

if (isset($_POST['submit'])){
    $db= new Db();

    $user=$_POST['usuario'];
    $pass=$_POST['pass'];

    if ($db->valida_usuario($user,$pass)){
        $_SESSION['user']=$user;
        header('location:sitio.php');
        exit;
    }else{
        $msj="Datos incorrectos";
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset>
<legend>Inicio de sesión</legend>
    <span style="color=red"><?=$msj ?? ""?></span>
<form action="index.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="" name="usuario"><br><br>
    <label for="pass">Password:</label>
    <input type="text" id="" name="pass"><br><br>
    <input type="submit" name="submit" value="Iniciar">
</form>


</fieldset>
</html>
