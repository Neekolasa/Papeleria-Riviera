$(document).ready(function() {

    $('#form_producto').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      console.log(datos);
      $.ajax({
          url:"cont/reg_inventario.php",
          type:"post",
          data: datos,
            success:function(data) {
                var resultado = JSON.parse(data);
                console.log(resultado.respuesta);
                console.log(resultado.priv);
               
                if (resultado.respuesta == 'Success') {
                Swal.fire(
                    'Correcto',
                    'La información se ha guardado correctamente',
                    'success'
                    )
                    $("#form_producto")[0].reset();
                } else if (resultado.respuesta=='Fail') {
                    Swal.fire({
                        type: 'error',
                        title: 'No se ha guardado la información',
                        text: 'Por favor verifique los datos e intente de nuevo'
                    })
                }
                else{
                  Swal.fire({
                        type: 'error',
                        title: 'No se ha guardado la información',
                        text: 'Dato duplicado'
                    })
                }
            }
      });
    });

    

  });