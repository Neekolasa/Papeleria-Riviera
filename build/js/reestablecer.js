$(document).ready(function() {

    $('#recuperar-form').on('submit', function(e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var datos = $(this).serializeArray();
      console.log(datos);
      $.ajax({
          url:"cont/rec_pass.php",
          type:"post",
          data: datos,
            success:function(data) {
                var resultado = data;
                console.log(resultado);
                if (resultado == 'exito') {
                	Swal.fire(
                      'Correcto',
                      'Vuelve a iniciar sesión',
                      'success'
                    ).then(function(){ 
                        window.location="index.php";
                      });
                  
                }
                else{
                  Swal.fire({
                        type: 'error',
                        title: 'Ha ocurrido un error',
                        text: 'Por favor verifique los datos'
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
