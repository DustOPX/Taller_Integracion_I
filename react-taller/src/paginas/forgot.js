import React from 'react'
import { useNavigate } from "react-router-dom";
import Buscar from "../componentes/buscador"
function Forgot(){
  const Navigate = useNavigate();
  function recovery(e) {
    e.preventDefault();
    Navigate('/forgot/recovery');
  }
  return (
    <div>
    <div>
      {<Buscar/>}
    </div>
    <form className='datos'>
      <div className="forgot">
        <h2>¿Has olvidado tu contraseña? Ingresa tu correo, te enviaremos un link donde podras cambiar tu contraseña</h2>
        <br/>
        <input class="item" type="text" name="email" placeholder="ingresar correo"/>
        <br/>
        <button onClick={recovery} type="submit" name="forgot_pass">Enviar</button>
      </div>
    </form>
  </div>
  );
}
export default Forgot;