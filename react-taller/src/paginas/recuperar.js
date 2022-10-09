import React, { Component } from 'react'
import Buscar from "../componentes/buscador"
export default class recuperar extends Component {
  render() {
    return (
      <div>
        <div>
            {<Buscar/>}
            <h1>recuperar contraseña</h1>
            <form>
                <div className='recovery'>
                    <label>ingrese contraseña nueva:</label>
                    <input className='newPass'></input>
                    <label>confirme contraseña nueva:</label>
                    <input className='confirmNewPass'></input>
                    <button>cambiar</button>
                </div>
            </form>
        </div>
      </div>
    )
  }
}
