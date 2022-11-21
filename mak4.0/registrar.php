<?php

include 'componentes/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){
   $Rut = $_POST['Rut'];
   $Rut = filter_var($Rut, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = '¡El correo ya existe!';
   }else{
      if($pass != $cpass){
         $message[] = '¡Confirme que la contraseña no coincide!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(Rut,name, email, password) VALUES(?,?,?,?)");
         $insert_user->execute([$Rut,$name, $email, $cpass]);
         $message[] = 'Registrado correctamente, inicie sesión ahora por favor!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style/general.css">
   <link rel="stylesheet" href="./style/registro.css">

</head>
<body>
   
<?php include 'componentes/header.php'; ?>

<section class="form-container">

   <form  class="datos" action="" method="post">
      <h1>crear cuenta</h1>
<div class="datos">
         <input class="itemC1" type="text" name="name" required placeholder="nombres" maxlength="20"  class="box">
         <input class="itemC2" type="text" name="Rut" required placeholder="Rut ej: 12345678-9" maxlength="20"  class="box">
         <input class="itemC3" type="email" name="email" required placeholder="email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input class="itemC4" type="password" name="pass" required placeholder="contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input class="itemC5" type="password" name="cpass" required placeholder="confirmar contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="crear cuenta" class="btn" name="submit">

      </div>
      <a href="login.php" class="option-btn">tengo una cuenta</a>
   </form>

</section>















<script src="js/script.js"></script>

</body>
</html>