

<header class="header">

   <section class="flex">



      <div class="icons" id="buscador">
         <input class="item1" name="buscar" type="text" placeholder="Buscar"> 
         <?php


            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
      <div id="menu-btn" class="container">
         <a title="home" href="./home.php"><img src="./IMG/home.png" alt="home" width="49" height="48" /></a>
         <a href="cart.php"><img src="./IMG/carrito.png" alt="carrito" width="49" height="48" /><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>

      

      <div class="profile" id="img"><a title="usuario" href="#"><img src="./IMG/usuario.png" alt="carrito" width="49" height="48" /></a>
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["email"]; ?></p>

         <div class="flex-btn">
            <a href="registrar.php" class="option-btn">registrarse</a>
            <a href="login.php" class="option-btn">login</a>
         </div>
         <a href="componentes/user_logout.php" class="delete-btn" onclick="return confirm('quiere cerrar su sesion?');">cerrar sesion</a> 
         <?php
            }else{
         ?>
         <p>porfavor registrese primero</p>
         <div class="flex-btn">
            <a href="registrar.php" class="option-btn">registrar</a>
            <a href="login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
      </div>
      </div>
   </section>

</header>
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<style>
   div.message{
      color:white;
   }
   div.profile{
      margin: 10px -15px 0px -15px;
      
   }
   div.container{
      margin:0px 0px 0px  -80%;
      grid-template-columns: auto  auto auto;


  display: grid;
   }
</style>

<!-- <div id="buscador">
            <input class="item1" name="buscar" type="text" placeholder="Buscar"> 
            <div id="img">
                <a title="home" href="./home.html"><img src="./IMG/home.png" alt="home" width="49" height="48" /></a>
                <a title="usuario" href="#"><img src="./IMG/usuario.png" alt="carrito" width="49" height="48" /></a>
                <a title="caarrito" href="./pedidos/cart.php"><img src="./IMG/carrito.png" alt="carrito" width="49" height="48" /></a>
            </div>
        </div> -->