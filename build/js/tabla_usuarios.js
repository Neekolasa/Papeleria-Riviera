$(document).ready(function() {

    $(document).on('click','.editar',function(){
        var modify_id=$(this).attr('id');
        var datos={
            "modify_id" : modify_id,
            "proceso" : "editar_usuario" 
        }
        //console.log(datos);
        $.ajax({
                url: 'cont/modal_mod_usuarios.php',
                type: 'POST',
                data: datos,
                success : function(response){
                  //console.log(response);
                  
                  var info = response;
                  $("#usuarios_mod").html(info);
                  $(".editar_usuario_modal").modal('show');
            }

        });
    });

    $(document).on('click','.borrar',function(){
        var borrar_id=$(this).attr('id');
        var datos={
            "borrar_id" : borrar_id,
            "proceso" : "borrar_usuario" 
        }
        Swal.fire({
          title: '¿Estás Seguro?',
          text: "Si lo borras no podrás recuperarlo!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonText:"Cancelar",
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
          //console.log(result);
          if (result.value == true) {
            $.ajax({
                url: 'cont/modal_mod_usuarios.php',
                type: 'POST',
                data: datos,
                success : function(response){
                  console.log(response);
                  var info = response;
                  if (info == "borrado") {

                  }
                  else if(info == "logeado"){

                  }
                  else if(info == "error"){

                  }
                  
            }

        });

              Swal.fire(
                      'Correcto',
                      'El registro se ha eliminado correctamente',
                      'success'
                    ).then(function(){ 
                        location.reload();
                      });
          }
          else if (result.isDenied)
          {

          }
          
        });
        //console.log(datos);
        
    });

    $("#usuarios_mod").submit(function(event) {
        event.preventDefault();
        var datos = $("#usuarios_mod").serializeArray();
        datos.push({"name" : "proceso", "value" : "modificar"});
        //console.log(datos);
        $.ajax({
            url: 'cont/modal_mod_usuarios.php',
            type: 'POST',
            data: datos,
        })
        .done(function(response) {
            console.log(response);
            if (response == "igual") {
                Swal.fire(
                    'Correcto',
                    'Vuelve a iniciar sesión',
                    'success').then(function(){
                        window.location.replace('login.php?token=salir');
                });
            }
            else if (response == "diferente") {
                Swal.fire(
                    'Correcto',
                    'El registro se modificó correctamente',
                    'success').then(function(){
                        window.location.href = window.location.href;
                });
            }
            else if (response == "error") {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Algo ha salido mal, por favor verifique los datos'
                });
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