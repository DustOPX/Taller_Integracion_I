<?php

include './componentes/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include './componentes/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MAK</title>
        <link rel="icon" type="image/png" href="./IMG/logo_mak.png" />
        <link rel="stylesheet" href="./style/general.css">
        <link rel="stylesheet" href="./style/home.css">
    </head>
    <body>
    <?php include 'componentes/header.php'; ?>

        <form method="post" target="home" class="datos">
            <div class="inicio">
            <a title="snacks" href="category.php?category=snacks"><img src="./IMG/Snacks.png" width="200" height="200"></a>
            <a title="completos" href="category.php?category=completos"><img src="./IMG/Completo.png" width="200" height="200"></a>
            <a title="bebidas" href="category.php?category=bebidas"><img src="./IMG/Bebidas.png" width="200" height="200"></a>
            <a title="cafe" href="category.php?category=cafes"><img src="./IMG/Cafe.png" width="200" height="200"></a>
            <a title="sandwiches" href="category.php?category=sandwiches"><img src="./IMG/Sandwiches.png" width="200" height="200"></a>
            <a title="wraps" href="category.php?category=wraps"><img src="./IMG/Wrap.png" width="200" height="200"></a>
            </div>
        </form>
        
    </body>
</html>