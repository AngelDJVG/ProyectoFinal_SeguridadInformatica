function validarFormulario() {
  var email = document.getElementById("email").value;
  var nombre = document.getElementById("nombre").value;
  var usuario = document.getElementById("usuario").value;
  var password = document.getElementById("password").value;
  
  if (email.trim() === "" || nombre.trim() === "" || usuario.trim() === "" || password.trim() === "") {
    alert("Por favor completa todos los campos");
    return false;
  }

  if (!validarCampo(email, /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)) {
    alert("Por favor ingresa un correo electrónico válido en el formato ejemplo@dominio.com");
    return false;
  }

  if (!validarCampo(nombre, /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/)) {
    alert("Por favor ingresa un nombre válido con solo letras y espacios");
    return false;
  }

  if (!validarCampo(usuario, /^[a-zA-Z0-9]+$/)) {
    alert("Por favor ingresa un nombre de usuario válido con solo letras y números");
    return false;
  }
  if (!validarContrasena(contrasena)) {
    alert("Por favor ingresa una contraseña válida con al menos un número, mínimo 8 caracteres");
    return false;
  }
  
  return true;
}

function validarCampo(valor, expresion) {
  return expresion.test(valor);
}
function validarContrasena(password) {
  if (password.length < 8 || password.length > 100) {
    return false;
  }

  if (!/\d/.test(password)) {
    return false;
  }

  return true;
}

function validarFormularioLogin() {
var usuario = document.getElementById("username").value;
 var password = document.getElementById("password").value;
  
if (usuario.trim() === "" || password.trim() === "") {
    alert("Por favor completa todos los campos");
    return false;
  }
if (!validarCampo(usuario, /^[a-zA-Z0-9]+$/)) {
    alert("Por favor ingresa un nombre de usuario válido con solo letras y números");
    return false;
 }
 return true;
}