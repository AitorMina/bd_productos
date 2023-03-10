<?php
require "inicializa.php";

if (!isset($_SESSION['user'])){
    header("location:index.php?msj=Debes registrarte");
    exit;
}

$familia = null;

$usuario= $_SESSION['user'];

$opcion = $_POST['submit'] ??"";
switch ($opcion){
    case "Guardar":
        $bd =new Db();
        $familia = $_POST['familia'];
        $lista_productos = $bd->obtener_productos($familia);
        break;
    case "Ver productos":
        $bd =new Db();
        $familia = $_POST['familia'];
        $lista_productos = $bd->obtener_productos($familia);
        break;
    case "logout":
        session_destroy();
        header("location:index.php?msj=Espero que vuelvas pronto");
        exit;

    default:
}


$db = new Db();

$familias = $db->obtener_familias();
$productos =$db->obtener_productos($familia);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" >
    <title>Document</title>
</head>
<body>
<header><h1>Bienvenido a este sitio web <?=$usuario?></h1>
<form action="sitio.php" method="post">
    <input type="submit" value="logout" name="submit">

</form>
</header>

<div class="content">
    <h1>Listado de familias</h1>
<form action="sitio.php" method="post">
    <input type="submit" value="Ver productos" name="submit">
    <?= Plantilla::html_select_familias($familias,$familia)?>
</form>
<table>
    <?= Plantilla::html_select_productos($productos,$familia)?>

</table>

</div>

</body>
</html>
