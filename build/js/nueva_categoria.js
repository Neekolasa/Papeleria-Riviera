$(document).ready(function() {

    $('#categoria').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      //console.log(datos);
      $.ajax({
          url:"cont/reg_categoria.php",
          type:"post",
          data: datos,
            success:function(data) {
                var resultado = JSON.parse(data);
                //console.log(resultado.respuesta);
                //console.log(resultado.priv);
                if (resultado.respuesta == 'Success') {
                Swal.fire(
                    'Correcto',
                    'La información se ha guardado correctamente',
                    'success'
                    )
                    $("#categoria")[0].reset();
                } else {
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