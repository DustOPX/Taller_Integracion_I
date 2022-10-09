import React, { Component } from 'react'
import Buscar from "../componentes/buscador"
import Logout from "../componentes/logout"
export default class inicio extends Component {
  render() {
    return (
      <div>
        <div>
          {<Buscar/>}
          <h1>inicio</h1>
          {<Logout/>}
        </div>
      </div>
    )
  }
}
