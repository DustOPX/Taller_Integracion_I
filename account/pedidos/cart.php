<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "./php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/carrito.css">
	<link rel="icon" type="image/png" href="../IMG/logo mak.png" />
</head>
<body>

<div id="buscador">
        <input class="item1" name="buscar" type="text" placeholder="Buscar"> 
        <div id="img">
            <a title="usuario" href="../HTML/home.html"><img src="../IMG/usuario.png" alt="carrito" width="49" height="48" /></a>
            <a title="caarrito" href="./cart.php"><img src="../IMG/carrito.png" alt="carrito" width="49" height="48" /></a>
        </div>
     </div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Carrito</h1>
			<a href="../HTML/home.html" class="btn btn-default pedir">seguir pidiendo</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/


if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<div class="inicio">
	
	<table class="table table-bordered">
	<thead>
		<th>Cantidad</th>
		<th>Producto</th>
		<th>Precio Unitario</th>
		<th>Total </th>
		<th> </th>
	</thead>
	<?php 
	/*
	* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
	*/
	foreach($_SESSION["cart"] as $c):
	$products = $con->query("select * from productos where id=$c[product_id]");
	$r = $products->fetch_object();
		?>
	<tr>
	<th><?php echo $c["q"];?></th>
		<td><?php echo $r->name;?></td>
		<td>$<?php echo $r->price; ?></td>
		<td>$<?php echo number_format($valor= $c["q"]*$r->price) ; ?></td>
		<td style="width:260px;">
		<?php
	
	$found = false;

		foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){$total; $found=true; break; }}
		?>
			<a href="./php/delfromcart.php?id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
		</td>
	</tr>
	<?php endforeach; $cart = $_SESSION["cart"]; $total=count($cart);?>
	</table>
		
<form class="form-horizontal" method="post" action="./php/process.php">
	<div class="form-group">
		<label for="obtener">valor a pagar</label>
		<div class="obtener">
		<td><label id="spTotal">$<?php echo number_format($total) ?></label></td>
		</div>

		<label for="hora-cons" class="col-sm-2 control-label">hora retiro</label>
		<div class="col-sm-5">
		<input id="hora-cons" type="time" name="hora-cons" min="12:00" max="18:00">
  		<span class="validacao"></span>
      <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">
    </div>
  </div>
  <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-primary venta">Procesar Venta</button>
		</div>
	</div>
</form>

</div>



<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>


		</div>
	</div>
</div>
</body>
</html>