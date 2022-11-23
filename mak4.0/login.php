<?php

include 'componentes/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'usuario o contraseña incorrecto!';
   }

}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/login.css">
    <link rel="icon" type="image/png" href="./IMG/logo_mak.png" />
</head>
<body>
<?php include 'componentes/header.php'; ?>
	<div class="main-container">
	
		<form class="datos box login" action="" method="POST" autocomplete="on">
			<div class="login">
			<img class="user" src="./IMG/Logo usuario.png" alt="logo usuario">

				<input class="input itemL" type="text" name="email"   required  placeholder="ingresar correo">

	
				<input class="input itemL" type="password" name="pass"  required  placeholder="Contraseña">

            <a href="./olvidopass/" >olvide mi contraseña</a>   
				<input class="button" type="submit" value="enviar" name="submit">
				<a href="./registrar.php" >registrarse</a>

			</div>
		</form>
	</div>   
<script src="js/script.js"></script>

</body>
</html>