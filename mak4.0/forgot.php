<?php

include 'componentes/connect.php';


if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

 
    $select_user = $conn->prepare("SELECT * FROM `usuarios` WHERE email = ? ");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
 
    if($select_user->rowCount() > 0){
       header('location:C_nueva.php');
    }else{
       $message[] = 'usuario no encontrado!';
    }
 }


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot_pass</title>
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/forgot.css">
    <link rel="icon" type="image/png" href="./IMG/logo_mak.png" />
</head>
<body>

<?php include 'componentes/header.php'; ?>
        <form class="datos" action="" method='post'>
            <div class="forgot">
                    <img class="sad" src="./IMG/sad.png" width="100px">
                    <h2>¿Has olvidado tu contraseña? Ingresa tu correo, te enviaremos un link donde podras cambiar tu contraseña</h2>
                    <br>
                    <input class="item" type="text" name="email" placeholder="ingresar correo"/>
                    <br>
                    <input  type="submit" name="forgot_pass" value="enviar">
            </div>
        </form>
</body>
</html>