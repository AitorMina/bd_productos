<?php

class Plantilla
{

    public static function html_select_familias($familias, $opcion_seleccionada = "")
    {
        $html_select = "<select name='familia'>";
        foreach ($familias as $familia) {
            $selected = "";
            if ($opcion_seleccionada != "" && $familia['cod'] == $opcion_seleccionada) {
                $selected = 'selected';
            }
            $html_select .= "<option value='{$familia['cod']}' $selected>{$familia['nombre']}</option>\n";
        }
        $html_select .= "</select>";
        return $html_select;
    }

public static function html_select_productos($productos,$familia)
{
    $html_prod = "";
    foreach ($productos as $producto) {
        $html_prod .= "<tr><td>{$producto['nombre_corto']}</td><td>{$producto['familia']}</td><td>{$producto['PVP']}</td>
        <td><form method='post' action='editar.php'>
        <input type='hidden' name='producto_cod' value='{$producto['cod']}'>
        <input type='hidden' name='familia' value='$familia'>
        <input type='submit' value='Editar' name='submit'></form></td></tr>";
    }
    $html_select = "<table><tr><th>Nombre corto</th><th>Familia</th><th>PVP</th><th></th></tr>{$html_prod}</table>";
    return $html_select;
}
}