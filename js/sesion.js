

//Guardar el nombre de usuario.
function guardarNombreDeUsuario(){
   var nombreDeUsuario = document.getElementById("username").value;
    sessionStorage.setItem('username', nombreDeUsuario);
}
function obtenerNombreDeUsuario(){
    return sessionStorage.getItem('username');
}
//Mostrar el nombre de usuario.
function mostrarNombreDeUsuario() {
 var nombreDeUsuario = sessionStorage.getItem('username');
  var elemento = document.getElementById("username");
  elemento.textContent = "El usuario es: " + nombreDeUsuario;
}