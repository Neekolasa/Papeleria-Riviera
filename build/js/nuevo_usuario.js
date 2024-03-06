$(document).ready(function() {

    $('#usuarios').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      //console.log(datos);
      $.ajax({
          url:"cont/reg_usuario.php",
          type:"post",
          data: datos,
            success:function(data) {
                console.log(data);
                var resultado = data;
                //console.log(resultado.respuesta);
                //console.log(resultado.priv);

                if (resultado == 'exito') {
                Swal.fire(
                    'Correcto',
                    'La información se ha guardado correctamente',
                    'success'
                    )
                    $("#usuarios")[0].reset();
                    $("#ver_pass").prop('checked', false).trigger("click");
                } 
                else if(resultado == "existe_nombre"){
                    Swal.fire({
                        type: 'error',
                        title: 'No se ha guardado la información',
                        text: 'Ya existe un usuario con este nombre'
                    })
                }
                else if(resultado == "existe_correo"){
                    Swal.fire({
                        type: 'error',
                        title: 'No se ha guardado la información',
                        text: 'Ya existe un usuario con este correo'
                    })
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'No se ha guardado la información',
                        text: 'Por favor verifique los datos e intente de nuevo'
                    })
                }
            }
      });
    });

    

  });

function ver(){
  var x = document.getElementById("contrasegna-name");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

