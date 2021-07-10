"use strict";

document.querySelector('#enviar_formulario').addEventListener('submit', function(e){
    e.preventDefault();
    
    const data = new URLSearchParams(new FormData(this));

    fetch('E10_login.php', {
        method: 'POST',
        body: data,
    })
    .then(response => response.text())
    .then(html=>{
        document.querySelector('#respuesta').innerHTML = html
    })
    .catch(error=>console.log(error));
})

