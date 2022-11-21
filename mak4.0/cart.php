<?php

include 'componentes/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
}

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:cart.php');
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'Cantidad del carrito actualizada';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>carrito</title>
   
   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style/general.css">
   <link rel="stylesheet" href="./style/carrito.css">
  

</head>
<body>
   
<?php include 'componentes/header.php'; ?>

<h1 class="heading">carrito</h1>
<section class="inicio">

 

<div class="pedir">
         <a class="pedir" href="home.php" class="option-btn">continuar comprando</a>
         <a class="pedir" href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">eliminar todo</a>
         <a class="pedir" href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procesar compra</a>
</div>
 
   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">


      <div class="name"><?= $fetch_cart['name']; ?></div>
      <div class="flex">
         <div class="price"> $<?= $fetch_cart['price']; ?>/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
         <button type="submit" class="fas fa-edit" name="update_qty"><img src="./IMG/editar.png" alt="editar" width="15px" ></button>
      </div>
      <div class="sub-total"> sub total : <span> $<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
      <input type="submit" value="eliminar" onclick="return confirm('eliminar del carrito?');" class="delete-btn" name="delete">
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty total">carrito vacio</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p class="total">total a pagar : <span>$<?= $grand_total; ?>/-</span></p>
   </div>

</section>















<script src="js/script.js"></script>

</body>
</html>