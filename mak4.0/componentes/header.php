

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


      <div class="profile" id="img">


      <div class="dropdown">
                <button class="dropbtn"><img src="./img/usuario.png" alt="usuario" width="49" height="48" /></button>
                 <div class="dropdown-content">
                 <?php          
               $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_profile->execute([$user_id]);
               if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p><?= $fetch_profile["email"]; ?></p>
   
   
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
      <a title="home" href="./home.php"><img src="./IMG/home.png" alt="home" width="49" height="48" /></a>
         <a href="cart.php">
            <img src="./IMG/carrito.png" alt="carrito" width="49" height="48" /><span class="cantidad">(<?= $total_cart_counts; ?>)</span>
         </a>     
 
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
      text-align: center;
      font-size: x-large;
   
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


