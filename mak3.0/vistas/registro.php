<h1>Crear cuenta</h1>
<form action="./php/registrar.php" method="POST" id="formulario" class="FormularioAjax" autocomplete="off" > 
        <div class="datos"> 
            <input class="itemC1" required name="usuario_nombre" type="text" placeholder=" Nombre y apellido">
            <input class="itemC2" required name="usuario_usuario" type="number" placeholder=" Rut">
            <input class="itemC3" required name="usuario_email" type="email" placeholder="Correo electrónico">
            <input class="itemC4" required name="usuario_clave_1" type="password" placeholder="Contraseña">
            <input class="itemC5" required name="usuario_clave_2" type="password" placeholder="Confirma contraseña">
        </div>

            <button class="registrar" type="submit" >crear cuenta</button>
            <br>
            <a class="link" href="index.php?vista=login">Ya tengo una cuenta</a>
            <div class="notification is-danger is-light"></div>
    </form>

    <style>
        div #respuesta{  
            color: white;                        
            background-color: var(--color-auto);
            margin: 5px;
            padding: 5px;
            width: 100%;
            border-radius: 15px;
            
          }
    </style>


