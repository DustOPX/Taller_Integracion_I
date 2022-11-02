<?php
include_once "funciones.php";
# Nota: no estamos haciendo validaciones
$correo = $_POST["correo"];
$keyword = $_POST["keyword"];

# Luego de haber obtenido los valores, ya podemos comproba
# Incluimos a las funciones, mira funciones.php
$logueado = login($correo, $keyword);
if ($logueado) {
    # Redirigir a la pagina de inicio
     header("Location:../HTML/inicio.html");
    // header("Location: inicio.php");  
    # Y salir
    exit;
} else {
    // $response = "usuario o contraseña incorrecta" . $BD->error;
    // exit(json_encode($response));
    # Si no, entonces indicarlo
    echo "Usuario o contraseña incorrecta";
}
