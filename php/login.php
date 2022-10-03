<?php
# Nota: no estamos haciendo validaciones
$correo = $_POST["correo"];
$keyword = $_POST["keyword"];

# Luego de haber obtenido los valores, ya podemos comprobar
# Incluimos a las funciones, mira funciones.php
include_once "funciones.php";
$logueado = login($correo, $keyword);
if ($logueado) {
    # Redirigir a la pagina de inicio
    header("Location: ../HTML/inicio.html");  #location: (pagina de inicio)
    # Y salir
    exit;
} else {
    # Si no, entonces indicarlo
    echo "Usuario o contraseña incorrecta";
}
