<?php
# Nota: no estamos haciendo validaciones
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$rut = $_POST['rut'];
$correo = $_POST["correo"];
$cell_phone = $_POST["cell_phone"];
$date = $_POST["date"];
$keyword = $_POST["keyword"];
$keyword_confirmar = $_POST["keyword_confirmar"];

# Si no coinciden ambas contraseñas, lo indicamos y salimos
if ($keyword !== $keyword_confirmar) {
    echo "Las contraseñas no coinciden, intente de nuevo";
    exit;
}

# Incluimos las funciones, mira funciones.php para una mejor idea
include_once "funciones.php";

# Primero debemos saber si existe o no
$existe = usuarioExiste($correo);
if ($existe) {
    echo "Lo siento, ya existe alguien registrado con ese correo";
    exit; # Salir para no ejecutar el siguiente código
}

# Si no existe, se ejecuta esta parte
# Ahora intentamos registrarlo
$Registrar = registrarUsuario($name, $last_name, $rut, $date, $cell_phone, $correo, $keyword);
if ($Registrar) {
    echo "Registrado correctamente. Ahora puedes iniciar sesión";

} else {
    echo "Error al registrarte. Intenta más tarde";
}
