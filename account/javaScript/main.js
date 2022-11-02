function login(){
    let user, pass;
    user = document.getElementsByName("correo").value;
    pass = document.getElementsByName("keyword").value;

    if(user== "" && pass== ""){
        window.location="../HTML/inicio.html";
    }
}