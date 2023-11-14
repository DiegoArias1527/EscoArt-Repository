function validarInicioSesion() {
  var email = document.getElementById('email').value;
  var contraseña = document.getElementById('contraseña').value;

  if (email.trim() === '' || contraseña.trim() === '') {
      alert('Por favor, completa ambos campos: correo electrónico y contraseña.');
      return false;
  }

  // Realiza una solicitud al servidor para validar la contraseña
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../login/validar.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {

            
              // Respuesta exitosa del servidor (contraseña correcta)
              if (xhr.responseText === "Contraseña incorrecta") {
                  alert('Contraseña incorrecta');
              } else if (xhr.responseText === "Correo electrónico no registrado") {
                  alert('Correo electrónico no registrado');
              } else {
                  // Redireccionar u otras acciones si es necesario
                  window.location.href = '../index2.html';
              }
          } else {
              alert('Error en la solicitud al servidor');
          }
      }
  };
  xhr.send('correo=' + email + '&contrasena=' + contraseña);

  return false; // Evita el envío del formulario por defecto
}
