<?php

include 'componentes/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'componentes/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>categoria</title>
   <link rel="icon" type="image/png" href="./IMG/logo_mak.png" />
   <link rel="stylesheet" href="./style/general.css">
   <link rel="stylesheet" href="./style/pedidos.css">

</head>
<body>
   
<?php include 'componentes/header.php'; ?>

<section class="productos">

   <h1 class="heading">Producto</h1>

   <div class="box-container">

   <?php
     $category = $_GET['category'];
     $select_products = $conn->prepare("SELECT * FROM `products` WHERE categoria LIKE '%{$category}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
     

     
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="agregar" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no exixten productos!</p>';
   }
   ?>

   </div>

</section>









<script src="js/script.js"></script>

</body>
</html>