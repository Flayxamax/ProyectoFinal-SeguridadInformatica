function validarContrasena() {
  $(document).ready(function () {
    // Agrega reglas de validación para la entrada de contraseña
    $("#myform").validate({
      rules: {
        pwd: {
          required: true,
          minlength: 8,
          maxlength: 20,
          pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,20}$/
        }
      },
      // Configura los mensajes de error para cada regla de validación
      messages: {
        pwd: {
          required: "Por favor ingrese una contraseña",
          minlength: "La contraseña debe tener al menos 8 caracteres",
          maxlength: "La contraseña debe tener como máximo 20 caracteres",
          pattern: "La contraseña debe contener al menos un número, una letra mayúscula, una letra minúscula y un carácter especial (!@#$%^&*)"
        }
      }
    });
  });
}