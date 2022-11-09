<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "./php/conection.php";
$producto1
?>
<!DOCTYPE html>
<html>
<head>
	<title>cafes</title>
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/pedidos.css">
	<link rel="icon" type="image/png" href="../IMG/logo mak.png" />
</head>
<body>

<div id="buscador">
        <input class="item1" name="buscar" type="text" placeholder="Buscar"> 
        <div id="img">
		<a title="home" href="../HTML/home.html"><img src="../IMG/home.png" alt="carrito" width="49" height="48" /></a>
		<a title="usuario" href="#"><img src="../IMG/usuario.png" alt="carrito" width="49" height="48" /></a>
            <a title="caarrito" href="./cart.php"><img src="../IMG/carrito.png" alt="carrito" width="49" height="48" /></a>
        </div>
     </div>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>cafes</h1>

<?php
/* Esta es la consula para obtener todos los productos de la base de datos.*/
$products = $con->query("select * from productos where IDcategory = '4'");
?>
<table class="table table-bordered">

	<?php 
	/** Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.*/
	while($r=$products->fetch_object()):?>
		<tr>
			<td><?php echo $r->name;?></td>
			<td>$<?php echo $r->price; ?></td>
			<td>
			<?php
			$found = false;
			if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}}
			?>
			<?php if($found):?>
			<a href="../cart.php" class="btn btn-info ">Agregado</a>
			<?php else:?>
			<form class="datos form-inline" id method="post" action="../php/addtocart.php">
			<div class="inicio">
				<input type="hidden" name="product_id" value="<?php echo $r->id; ?>">
				<div class="form-group">
					<label for="">Cantidad</label><br>
					<input type="number" name="q" value="1"  min="1" class="form-control" placeholder="Cantidad">
					
				</div>
				<input type="submit" class="btn btn-primary" name="button4" value="Añadir"/>

			</div>
			</form>	
			<?php endif; ?>
			</td>
		</tr>
	<?php endwhile; ?>
</table>
	</div>
	</div>
</div>
</body>
</html>