import React from 'react';
import ReactDOM from 'react-dom/client';
import {BrowserRouter as Router,  Routes,  Route} from "react-router-dom"

import {Auth0Provider} from "@auth0/auth0-react"

import './css/fondo.css'; 
import './css/general.css';
import './css/login.css';
import './css/registro.css';
import './css/forgot.css';
import './css/buscador.css';
import './css/recuperar.css';

import Inicio from "./paginas/inicio"
import Registro from "./paginas/registro"
import Login from './paginas/login'; 
import Forgot from './paginas/forgot'; 
import Recovery from './paginas/recuperar'; 

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
<React.StrictMode>
<Auth0Provider
    domain="dev-9wyau1jd.us.auth0.com"
    clientId="WWYQHRNTgcfjg1HrBHw6OobJEk7swmR8"
    redirectUri={window.location.origin}
    >
    <Router>
      <Routes>
      <Route path="/" element={<Login />}></Route>
        <Route path='/inicio' element={<Inicio />}></Route>   
        <Route path='/registro' element={<Registro />}></Route>  
        <Route path='/forgot' element={<Forgot />}></Route>  
        <Route path='/forgot/recovery' element={<Recovery />}></Route>  
      </Routes>
    </Router>
  </Auth0Provider>
</React.StrictMode>
);

