import { Link } from 'react-router-dom';
import React, { Component } from 'react'
import Buscar from "../componentes/buscador"
export default class registro extends Component {
  render() {
    return (
        <div>
            <div>
            {<Buscar/>}
            </div>
            <h1>Crear cuenta</h1>
            <form className='datos'>
                <div className='datos'>
                    <input className="itemC1" required name="names" type="text" placeholder=" Nombre y apellido"/>
                    <input className="itemC2" required name="rut" type="text" placeholder=" Rut"/>
                    <input className="itemC3" required name="correo" type="email" placeholder="Correo electrónico"/>
                    <input className="itemC4" required name="keyword" type="password" placeholder="Contraseña"/>
                    <input className="itemC5" required name="keyword_confirmar" type="password" placeholder="Confirma contraseña"/>
                </div>
                <button className="registrar" type="submit" >crear cuenta</button>
                <br/>
                <Link to="/">Ya tengo una cuenta</Link>
            </form>
        </div>
    )
  }
}
