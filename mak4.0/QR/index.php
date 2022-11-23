<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>mak</title>

		<link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/C_compra.css">
    <link rel="icon" type="image/png" href="../IMG/logo_mak.png" />	
		<!-- qrcode generator-->
		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
		<script defer src="script.js"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	</head>
	<body>
	<form class="datos">    
        <div class="confirmar">
            <h1>Compra confirmada</h1>
            <br>
            <h2>Su compra se ha realizado con exito. </h2>
            <br>
			<div id="contenedorQR" class="contenedorQR"></div>
			<br>
            <button type="submit" name="confirm" ><a href="../home.php">Volver al inicio</a></button>
        </div>
    </form> 
	<form>

					<div id="contenedorQR" class="contenedorQR"></div>
	
	</form>
	
	</body>
</html>

<style>
	div#contenedorQR{
		margin:auto;
	}
</style>