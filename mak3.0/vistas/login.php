
<div class="main-container">

	<form class="datos box login" action="" method="POST" autocomplete="on">
		<div class="login">
		<img class="user" src="./IMG/Logo usuario.png" alt="logo usuario">
			<div class="field">
				<div class="control">
					<input class="input itemL" type="text" name="login_usuario"   required  placeholder="ingresar correo">
				</div>
			</div>
	
			<div class="field">
				<div class="control">
					<input class="input itemL" type="password" name="login_clave"  required  placeholder="Contraseña">
				</div>
			</div>

				<button type="submit" >Ingresar</button>
				<a href="index.php?vista=registro" >registrar</a>
				<a href="index.php?vista=logout" >olvide mi contraseña?</a>
			<?php
			if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
				require_once "./php/main.php";
				require_once "./php/iniciar_sesion.php";
			}
		?>
		</div>
	</form>
</div>