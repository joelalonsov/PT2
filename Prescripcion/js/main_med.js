const openModal_med = document.querySelector('.hero__cta_med');
const modal_med = document.querySelector('.modal_med');
const closeModal_med = document.querySelector('.modal__close_med');


    //var tabla = document.createElement("table");
	//tabla.setAttribute("id", "tabla_CIE_10");

openModal_med.addEventListener('click', (e)=>{
 

    e.preventDefault();

    
    modal_med.classList.add('modal--show_med');
    ContenidoTabla_med();
   
    
    
 
});



closeModal_med.addEventListener('click', (e)=>{
    e.preventDefault();
    
    
    modal_med.classList.remove('modal--show_med');
});



function ContenidoTabla_med() {
	
    var tabla = document.getElementById("tabla_Medicamento");

    if(tabla){

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
            var contenidoCelda3 = fila.cells[2].textContent; // Contenido de la primera celda en la fila
            var contenidoCelda4 = fila.cells[3].textContent; // Contenido de la segunda celda en la fila
            var contenidoCelda5 = fila.cells[4].textContent; // Contenido de la primera celda en la fila

            console.log("Contenido de la primera celda en la fila:", contenidoCelda1);
            console.log("Contenido de la segunda celda en la fila:", contenidoCelda2);

            // Obtener la casilla de verificación por su ID
            var radio1 = document.getElementById('rb_primero');
            var radio2 = document.getElementById('rb_segundo');
            var radio3 = document.getElementById('rb_tercero');

            // Verificar si está seleccionada
            if (radio1.checked) {
                document.getElementById('Medicamento_Codigo_1').value = contenidoCelda1;
                document.getElementById('Medicamento_Nombre_1').value = contenidoCelda2;
                document.getElementById('Medicamento_Descripcion_1').value = contenidoCelda3;
                document.getElementById('Medicamento_Cantidad_1').value = contenidoCelda4;
                document.getElementById('Medicamento_Presentacion_1').value = contenidoCelda5;
                
            } else if (radio2.checked) {
                document.getElementById('Medicamento_Codigo_2').value = contenidoCelda1;
                document.getElementById('Medicamento_Nombre_2').value = contenidoCelda2;
                document.getElementById('Medicamento_Descripcion_2').value = contenidoCelda3;
                document.getElementById('Medicamento_Cantidad_2').value = contenidoCelda4;
                document.getElementById('Medicamento_Presentacion_2').value = contenidoCelda5;

            } else{
                document.getElementById('Medicamento_Codigo_3').value = contenidoCelda1;
                document.getElementById('Medicamento_Nombre_3').value = contenidoCelda2;
                document.getElementById('Medicamento_Descripcion_3').value = contenidoCelda3;
                document.getElementById('Medicamento_Cantidad_3').value = contenidoCelda4;
                document.getElementById('Medicamento_Presentacion_3').value = contenidoCelda5;

            }
        }
            // Borrar el contenido de input
            var input = document.getElementById("BuscaMed");

            // Establece el valor del input a una cadena vacía
            input.value = "";
    });
    }
}