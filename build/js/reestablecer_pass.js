$(document).ready(function() {

    $('#restaurar-form').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      console.log(datos);
      $.ajax({
          url:"cont/recupera_pass.php",
          type:"post",
          data: datos,
            success:function(data) {
                var resultado = data;
                console.log(resultado);
                if (resultado == 'exito') {
                	Swal.fire(
                      'Correcto',
                      'Revisa tu bandeja de entrada',
                      'success'
                    ).then(function(){ 
                        window.location="index.php";
                      });
                  
                }
                else if (resultado == 'no'){
                  Swal.fire({
                        type: 'error',
                        title: 'Ha ocurrido un error al enviar el correo',
                        text: 'Reintente mas tarde'
                    });
                }
                else{
                	Swal.fire({
                        type: 'error',
                        title: 'Ha ocurrido un error inesperado',
                        text: 'Reintente mas tarde'
                    });
                }
            }
      });
    });

    
});

