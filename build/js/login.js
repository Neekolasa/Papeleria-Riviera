$(document).ready(function() {

    $('#login-form').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      //console.log(datos);
      $.ajax({
          url:"cont/login.php",
          type:"post",
          data: datos,
            success:function(data) {
                var resultado = data;
                //console.log(resultado);
                if (resultado == 'exito') {
                  window.location="inicio.php"
                }
                else{
                  Swal.fire({
                        type: 'error',
                        title: 'Usuario y/o contraseña incorrectos',
                        text: 'Por favor verifique los datos'
                    })
                }
            }
      });
    });

    
});