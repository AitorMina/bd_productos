<?php
require "inicializa.php";


if (!isset($_SESSION['user'])){
    header("location:index.php?msj=Debes registrarte");
    exit;
}
$producto = $_POST['producto_cod'] ??"";
$familia = $_POST['familia'] ??"";


var_dump($_POST);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content">
    <h1>Ingrese los nuevos datos para editar el producto</h1>

    <fieldset>
        <legend>Modificar Producto</legend>
        <form action="editar.php" method="POST">
            <div id="inputs">
                <div class="filds">
                    <input type="hidden" name="codigo" value="<?php $producto; ?>">
                    <input type="hidden" name="familia" value="<?php $familia; ?>">
                </div>
                <div class="filds">
                    <input type="text" placeholder="Ingresar nombre corto del producto" name="producto[nombre_corto]" value="<?php $producto; ?>">
                    <label for="">Nombre corto del producto</label>
                </div>
                <div class="filds">
                    <input type="text" placeholder="Ingresar nombre del producto" name="producto[nombre]" value="<?php $producto; ?>">
                    <label for="">Nombre del producto</label>
                </div>

                <div class="filds">
                    <textarea placeholder="Ingrese la descripción del producto..." name="producto[descripcion]" cols="30" rows="7"><?php $producto; ?></textarea>
                    <label for="">Descripción del producto</label>
                </div>

                <div class="filds">
                    <div style="color:red">
                        <input type="text" placeholder="Ingresar el precio del producto" name="producto[PVP]" value="<?php echo $producto; ?>">
                        <label for="">Precio de venta al público</label>
                    </div>
                </div>

                <div id="btn">
                    <input type="submit" id="success" value="Actualizar" name="btn">
                    <input type="submit" id="cancel" value="Cancelar" name="btn">
                </div>
            </div>
        </form>
    </fieldset>
</div>
</body>
</html>

