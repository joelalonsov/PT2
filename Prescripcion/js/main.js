const openModal = document.querySelector('.hero__cta');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');
//const tabla_CIE_10 = document.querySelector('.modal__tabla');

//const tabla = document.getElementById('table')

    var tabla = document.createElement("table");
	tabla.setAttribute("id", "tabla_CIE_10");

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
    ContenidoTabla();
    //copiarValor1(r02);
    //numeroRenglon();
    //const renglon =numeroRenglon();
    //console.log("el valor del renglon en openModal es: " + numeroRenglon());
    //copiarValor1('r'+ renglon +'1');
    //copiarValor2('r'+ renglon +'2');
});

/*
tabla.addEventListener('click', (e)=>{
    numeroRenglon();
    console.log("Entro a la tabla");
    ContenidoTabla();
    var renglon =numeroRenglon();
    console.log("El valor del renglon seleccionado es: " + renglon);
    renglonGlobal = renglon;
    console.log("El valor del renglon global es " +renglonGlobal);

    console.log("valor de renglon: " + renglonGlobal );
});
*/

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    /*
    console.log("El valor del renglon seleccionado en Close Modal es: " + numeroRenglon());
    
    numeroRenglon();
    var renglon =numeroRenglon();
    console.log("El valor del renglon seleccionado es: " + numeroRenglon());
    renglonGlobal = renglon;
    console.log("El valor del renglon global es " +renglonGlobal);

    console.log("valor de renglon: " + renglonGlobal );

    copiarValor('r'+renglonGlobal+'1');
    console.log('r'+renglonGlobal+'1');
    
    copiarValor('r'+renglonGlobal+'2');
    console.log('r'+renglonGlobal+'2');
*/
//var renglon =numeroRenglon();
//console.log("el valor del renglon en closeModal es: " + renglon);
    
    modal.classList.remove('modal--show');
});

/*
tabla_CIE_10.addEventListener('click',(e)=>{
    e.stopPropagation();
    console.log(e.target);
});
*/
/*
function copiarValor1(param) {
    var valor = param.textContent; // Obtener el contenido del elemento de la tabla
    document.getElementById('cie_10_id').value = valor; // Asignar el valor al campo de destino
    //cerrarModal(); // Cerrar la ventana modal después de copiar el valor
    console.log("El valor 1 es: " + valor);
}

function copiarValor2(param) {
    var valor = param.textContent; // Obtener el contenido del elemento de la tabla
    document.getElementById('cie_10_desc').value = valor; // Asignar el valor al campo de destino
    console.log("El valor 2 es: " + valor);
    
}
*/

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

            // Asignar el valor al campo de destino para cada columna
            document.getElementById('cie_10_id').value = contenidoCelda1;
            document.getElementById('cie_10_desc').value = contenidoCelda2;
        }
    });
}
  

/*
function numeroRenglon(){
    var tabla = document.getElementById("tabla_CIE_10");
    var numeroRenglonSeleccionado;

// Obtener todas las celdas de la tabla
var celdas = tabla.getElementsByTagName("td");

// Agregar un evento 'click' a cada celda
for (var i = 0; i < celdas.length; i++) {
  celdas[i].addEventListener("click", function() {
    // Obtener el número de renglón de la celda seleccionada
    numeroRenglonSeleccionado = this.parentNode.rowIndex; // Sumamos 1 porque rowIndex es base 0
    //console.log("Número de renglón: " + numeroRenglonSeleccionado);
    
  });
}
return numeroRenglonSeleccionado;
}
*/

