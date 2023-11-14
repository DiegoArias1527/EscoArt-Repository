function validarRegistro() {
    var nombres = document.querySelector('input[name="nombre"]').value;
    var primerApellido = document.querySelector('input[name="primerape"]').value;
    var segundoApellido = document.querySelector('input[name="segundoape"]').value;
    var email = document.querySelector('input[name="correo"]').value;
    var contraseña = document.querySelector('input[name="contrasena"]').value;
    var confirmarContraseña = document.querySelector('input[name="confirmarcontrasena"]').value;

    if (nombres === '' || primerApellido === '' || segundoApellido === '' || email === '' || contraseña === '' || confirmarContraseña === '') {
        alert('Por favor, completa todos los campos.');
        return false; 
    }

    if (contraseña !== confirmarContraseña) {
        alert('Las contraseñas no coinciden.');
        return false; 
    }

    alert('Registro exitoso.');
    return true; 
}

