const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	folio: /^[a-zA-Z0-9\_\-.]{4,16}$/, // Letras, numeros, guion, punto y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	ap_paterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	ap_materno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	temperatura: /^\d{1,2}\.\d{1,2}$/, // 1 a 2 digitos, punto y dos decimales.
	presion_art: /^\d{2,3}\/\d{2,3}$/,
	peso: /^\d{1,3}\.\d{1,2}$/, // 1 a 3 digitos, punto y dos decimales.
	estatura: /^\d{1}\.\d{1,2}$/, // 7 a 14 numeros.
	frec_respiratoria: /^\d{2,3}$/, // 7 a 14 numeros.
	ritmo_card: /^\d{2,3}$/ // 7 a 14 numeros.
}

//nombre de cada campo en el formualrio
const campos = {
	Folio: false,
	Nombre: false,
	A_Paterno: false,
	A_Materno: false,
	Temperatura: false,
	P_Arterial: false,
	Peso: false,
	Estatura: false,
	Frec_resp: false,
	Ritmo_Cardiaco: false

}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "Folio":
			validarCampo(expresiones.folio, e.target, 'Folio');
		break;
		case "Nombre":
			validarCampo(expresiones.nombre, e.target, 'Nombre');
		break;
		case "A_Paterno":
			validarCampo(expresiones.nombre, e.target, 'A_Paterno');
		break;
		case "A_Materno":
			validarCampo(expresiones.nombre, e.target, 'A_Materno');
		break;
		case "Temperatura":
			validarCampo(expresiones.temperatura, e.target, 'Temperatura');
		break;
		case "P_Arterial":
			validarCampo(expresiones.presion_art, e.target, 'P_Arterial');
		break;
		case "Peso":
			validarCampo(expresiones.peso, e.target, 'Peso');
		break;
		case "Estatura":
			validarCampo(expresiones.estatura, e.target, 'Estatura');
		break;
		case "Frec_resp":
			validarCampo(expresiones.frec_respiratoria, e.target, 'Frec_resp');
		break;
		case "Ritmo_Cardiaco":
			validarCampo(expresiones.ritmo_card, e.target, 'Ritmo_Cardiaco');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

/*
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('PWD');
	const inputPassword2 = document.getElementById('PWD_2');

	if(inputPassword1.value != inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}
*/

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});



formulario.addEventListener('submit', (e) => {
	//e.preventDefault();

	//const terminos = document.getElementById('terminos');
	if(campos.User && campos.nombre && campos.password){
		//formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
			$("#formulario").submit();
			formulario.reset();
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		//e.preventDefault();
	}
});