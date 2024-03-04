const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

inputs.forEach((input)=>{
	input.addEventListener('keyup', () => {
		console.log('Tecla levantada');
	});
});
