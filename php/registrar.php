<?php
# Nota: no estamos haciendo validaciones
$names = $_POST['names'];
$rut = $_POST['rut'];
$correo = $_POST["correo"];
$keyword = $_POST["keyword"];
$keyword_confirmar = $_POST["keyword_confirmar"];

# Si no coinciden ambas contraseñas, lo indicamos y salimos
if ($keyword !== $keyword_confirmar) {
    echo "Las contraseñas no coinciden, intente de nuevo";
    exit;
}

# Incluimos las funciones, mira funciones.php para una mejor idea
include_once "funciones.php";


$response = array();

# Primero debemos saber si existe o no
$existe = usuarioExiste($correo);
if ($existe) {
    echo "Lo siento, ya existe alguien registrado con ese correo";
    exit; # Salir para no ejecutar el siguiente código
}

# Si no existe, se ejecuta esta parte
# Ahora intentamos registrarlo
$Registrar = registrarUsuario($names, $rut, $correo, $keyword);
if ($Registrar) {

    echo "Registrado correctamente. Ahora puedes iniciar sesión";

} else {
    echo "Error al registrarte. Intenta más tarde";
}
