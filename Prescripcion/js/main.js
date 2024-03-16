const openModal = document.querySelector('.hero__cta');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');
//const tabla_CIE_10 = document.querySelector('.modal__tabla');

//const tabla = document.getElementById('table')

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
    ContenidoTabla();
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    
    copiarValor(celda1);
    console.log(celda1);
    
    modal.classList.remove('modal--show');
});

/*
tabla_CIE_10.addEventListener('click',(e)=>{
    e.stopPropagation();
    console.log(e.target);
});
*/

function copiarValor(celda2) {
    var valor = celda1.textContent; // Obtener el contenido del elemento de la tabla
    document.getElementById('cie_10_id').value = valor; // Asignar el valor al campo de destino
    //cerrarModal(); // Cerrar la ventana modal después de copiar el valor
}


    
function ContenidoTabla(){
    var tabla = document.getElementById("tabla_CIE_10");

    tabla.addEventListener("click",function(event){

    if(event.target.tagName === "TD"){

        var celdas = tabla.getElementsByTagName("td");
        for(var i = 0; i < celdas.length; i++){
            celdas[i].classList.remove("selected");
        }

        event.target.classList.add("selected");

        var contenidoCelda = event.target.textContent;
        console.log("Contenido de la celda seleccionada", contenidoCelda);
        document.getElementById('cie_10_desc').value = contenidoCelda; // Asignar el valor al campo de destino


    }
});
}


