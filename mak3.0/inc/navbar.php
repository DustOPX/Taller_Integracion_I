<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">


        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="buscador">
            <input class="item1" name="buscar" type="text" placeholder="Buscar"> 
            <div id="img">
                <div class="dropdown" >
                    <button class="dropbtn"><img src="./IMG/usuario.png" alt="usuario" width="49" height="48" /></button>
                    <div class="dropdown-content">
                        <a href="#">Mis pedidos</a>
                        <br>
                        <a href="index.php?vista=logout" class="button is-link is-rounded">cerrar sesion</a>
                    </div>  
                    <a title="home" href="index.php?vista=home"><img src="./IMG/home.png" alt="home" width="49" height="48" /></a>
                    <a title="caarrito" href="index.php?vista=cart"><img src="./IMG/carrito.png" alt="carrito" width="49" height="48" /></a>
                </div >
            </div>
        </div>
        
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="index.php?vista=logout" class="button is-link is-rounded">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>