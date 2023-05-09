
window.addEventListener('load', function() {
    var estadoInicial = document.forms[0].innerHTML;
    window.addEventListener('pageshow', function(event) {

      if (document.forms[0].innerHTML === estadoInicial) {

        limpiarFormulario();
      }
    });
  });
  

  function limpiarFormulario() {
    document.forms[0].reset();
  }

function validateForm() {
    var nombre = document.forms[0]["nombre"].value;
    var email = document.forms[0]["email"].value;
    var usuario = document.forms[0]["usuario"].value;
    var contrasena = document.forms[0]["contrasena"].value;
    if (nombre == "" || email == "" || usuario == "" || contrasena == "") {
      showEmptyFieldsAlert();
      return false;
    }
    return true;
  }

  window.addEventListener('DOMContentLoaded', function() {
    var password = document.getElementById("password");
    var icon = document.querySelector(".fas");
    var isMouseDown = false;
  
    icon.addEventListener("mousedown", function() {
      isMouseDown = true;
      show();
    });
  
    document.addEventListener("mouseup", function() {
      if (isMouseDown) {
        stopShowing();
        isMouseDown = false;
      }
    });
  
    icon.addEventListener("mouseleave", function() {
      if (isMouseDown) {
        stopShowing();
        isMouseDown = false;
      }
    });
  
    function show() {
      if (password.type === "password") {
        password.type = "text";
      } else {
        password.type = "password";
      }
    }
  
    function stopShowing() {
      password.type = "password";
    }
  });

  function showEmptyFieldsAlert() {
    window.alert("Por favor, complete todos los campos");
  }