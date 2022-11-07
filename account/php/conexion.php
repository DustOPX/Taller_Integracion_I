<?php
function obtenerBD()
{
    $BD = "usuarios_login";
    $usuario = "root";
    $contraseña = "";
    try {

        $BD = new PDO('mysql:host=localhost;dbname=' . $BD, $usuario, $contraseña);
        $BD->query("set names utf8;");
        $BD->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $BD->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $BD;
    } catch (Exception $e) {
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }
}
