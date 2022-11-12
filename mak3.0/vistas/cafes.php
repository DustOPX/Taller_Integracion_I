<?php
/*
* Este archio muestra los productos en una tabla.
*/
include "./php/conection.php";
?>
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
			<a href="index.php?vista=cart.php" class="btn btn-info ">Agregado</a>
			<?php else:?>
			<form class="datos form-inline" id method="post" action="./php/addtocart.php">
			<div class="pedido">
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