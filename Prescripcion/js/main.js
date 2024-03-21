const openModal = document.querySelector('.hero__cta');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');


    //var tabla = document.createElement("table");
	//tabla.setAttribute("id", "tabla_CIE_10");

openModal.addEventListener('click', (e)=>{


    e.preventDefault();


    modal.classList.add('modal--show');

    ContenidoTabla();
 
});



closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    
    
    modal.classList.remove('modal--show');
});



function ContenidoTabla() {


    var tabla = document.getElementById("tabla_CIE_10");
    
    tabla.addEventListener("click", function(event) {
        if (event.target.tagName === "TD") {
            var celdas = tabla.getElementsByTagName("td");
            for (var i = 0; i < celdas.length; i++) {
                celdas[i].classList.remove("selected");
            }

            event.target.classList.add("selected");

            var fila = event.target.parentNode; // Obtener la fila que contiene la celda seleccionada
            var contenidoCelda1 = fila.cells[0].textContent; // Contenido de la primera celda en la fila
            var contenidoCelda2 = fila.cells[1].textContent; // Contenido de la segunda celda en la fila

            console.log("Contenido de la primera celda en la fila:", contenidoCelda1);
            console.log("Contenido de la segunda celda en la fila:", contenidoCelda2);

            // Obtener la casilla de verificación por su ID
            var checkbox = document.getElementById('cb-Padecimiento_Secundario');

            // Verificar si está seleccionada
            if (checkbox.checked) {
                document.getElementById('cie_10_id_2').value = contenidoCelda1;
                document.getElementById('cie_10_desc_2').value = contenidoCelda2;
            } else {
                document.getElementById('cie_10_id').value = contenidoCelda1;
                document.getElementById('cie_10_desc').value = contenidoCelda2;
            }

        }

            // Borrar el contenido de input
            var input = document.getElementById("CIE10");

            // Establece el valor del input a una cadena vacía
            input.value = "";
    });
}