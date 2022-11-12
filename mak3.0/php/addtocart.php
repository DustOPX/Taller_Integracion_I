<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/

include "conection.php";


if(!empty($_POST)){
	if(isset($_POST["product_id"]) && isset($_POST["q"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart"])){
			$_SESSION["cart"]=array( array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["cart"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["product_id"]==$_POST["product_id"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart, array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
				$_SESSION["cart"] = $cart;
			}
		}


        if(isset($_POST['button1'])) {
            print "<script>window.location.href='index.php?vista=bebidas';</script>";
        }
        if(isset($_POST['button2'])) {
            print "<script>window.location.href='index.php?vista=snacks';</script>";
        }
        if(isset($_POST['button3'])) {
            print "<script>window.location.href='index.php?vista=completos';</script>";
        }
        if(isset($_POST['button4'])) {
            print "<script>window.location.href='index.php?vista=cafes';</script>";
        }
        if(isset($_POST['button5'])) {
            print "<script>window.location.href='index.php?vista=sandwiches';</script>";
        }
        if(isset($_POST['button6'])) {
            print "<script>window.location.href='index.php?vista=wraps;</script>";
        }

		}	

	
}


?>

