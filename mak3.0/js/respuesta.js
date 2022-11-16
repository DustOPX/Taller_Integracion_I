function enviarFormulario() {
    const formulario = document.getElementById('formulario');
    const formularioData = new FormData(formulario);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/registrar.php', true);
    xhr.send(formularioData);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById('respuesta').innerHTML = response;
        }
    };
}


function validar() {
    const formulario = document.getElementById('formulario');
    const formularioData = new FormData(formulario);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/login.php', true);
    xhr.send(formularioData);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById('validar').innerHTML = response;
        }
    };
}



