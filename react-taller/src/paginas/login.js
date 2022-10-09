import { Link } from 'react-router-dom';
import React from 'react'
import usuario from "../IMG/usuario.png";
import Buscar from "../componentes/buscador";
import LoginButton from "../componentes/LoginButton"
import Logout from "../componentes/logout"
function Login() {


    return (
      <div>
      <div>
        {<Buscar/>}
      </div>
      <form className="datos">
        <div className='login'>
        <img src={usuario} className="App-logo" alt="logo" />
          {/* <input type="email" className="itemL"  placeholder="ingresar correo"/>
          <input type="password" className="itemL"   placeholder="contraseña"/> */}
          <Link to="/forgot">¿olvidaste la contraseña?</Link>
          {<LoginButton/>}
          <br/>
          {<Logout/>}
          <Link to="/registro">crear cuenta</Link>
        </div>
      </form>
      </div>
  
    );
  }

  export default Login;