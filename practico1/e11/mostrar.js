"use strict";

let as = document.getElementsByTagName("a");
        for (let i = 0; i < as.length; i++) {
            let a = as[i];
            a.addEventListener("click", mostrarLista);
        };

function mostrarLista(e) {
    e.preventDefault();
    let href = e.target.href; // localhost/web2/A/p1/e11.php?limite=10
    
    fetch(href).then(response => response.text())
    .then(html=>{
        document.querySelector('#mostrarHTML').innerHTML = html
    })
    .catch(error=>console.log(error));

    return false;
}
