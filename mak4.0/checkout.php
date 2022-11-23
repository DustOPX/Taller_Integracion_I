<?php
include 'componentes/connect.php';  

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
};
         
$perfil = $conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
$perfil->execute([$user_id]);
if($perfil->rowCount() > 0){
$buscar = $perfil->fetch(PDO::FETCH_ASSOC);
?>
<?php
}      

if(isset($_POST['order'])){
      
   $name = $buscar["name"];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $email = $buscar["email"];;
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $time = $_POST["time"];
   $time = filter_var($time, FILTER_SANITIZE_STRING);

   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, email, total_products, total_price,hora) VALUES(?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $email, $total_products, $total_price,$time]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      header("Location: ./QR/");
      $message[] = 'Pedido realizado con éxito!';

   }else{
      $message[] = 'tu carrito esta vacio';
   }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pedido</title>
   <link rel="icon" type="image/png" href="./IMG/logo_mak.png" />
   <link rel="stylesheet" href="./style/general.css">
   <link rel="stylesheet" href="./style/checkout.css">


</head>
<body>
   
<?php include 'componentes/header.php'; ?>

<section class="orden">

   <form action="" method="POST">

   <h3>Mi pedido</h3>

      <div class="display">

      <div class="producto">
         <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if($select_cart->rowCount() > 0){
               while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                  $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
                  $total_products = implode($cart_items);
                  $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
         ?>
            <p>🔹 <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
            <br>
         <?php
               }
            }else{
               echo '<p class="empty">Su carrito está vacío!</p>';
            }
         ?>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
      </div>

         <div class="orden">
            <div class="total">PRECIO TOTAL : <span> $<?= $grand_total; ?>/-</span></div>
            <input type="time" name="time" value="12:00" required>
            <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="Realizar compra">
         </div>
      </div>



   </form>

</section>















<script src="js/script.js"></script>

</body>
</html>