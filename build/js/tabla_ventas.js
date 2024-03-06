$(document).ready(function() {
    $(document).on('click','.borrar',function(){
        var borrar_id=$(this).attr('id');
        var datos={
            "borrar_id" : borrar_id,
            "proceso" : "borrar_venta" 
        }
        //console.log(datos);
        Swal.fire({
          title: '¿Estás Seguro?',
          text: "Si lo borras, se perderán las ventas relacionadas con este producto!",
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
                url: 'cont/modal_mod_ventas.php',
                type: 'POST',
                data: datos,
                success : function(response){
                  console.log(response);
                  var info = response;
                  if (info == "eliminado") {
                  	Swal.fire(
                      'Correcto',
                      'El registro se ha eliminado correctamente',
                      'success'
                    ).then(function(){ 
                        location.reload();
                      });
                  }
                  
                  else if(info == "error"){
                  	Swal.fire({
	                    type: 'error',
	                    title: 'Oops...',
	                    text: 'Algo ha salido mal, por favor verifique los datos'
                	});
                  }
                  
            }

        });

              
          }
          else if (result.isDenied)
          {

          }
          
        });
        //console.log(datos);
        
    });

    $("#inventario_mod").submit(function(event) {
        event.preventDefault();
        var datos = $("#inventario_mod").serializeArray();
        datos.push({"name" : "proceso", "value" : "modificar"});
        console.log(datos);
        $.ajax({
            url: 'cont/modal_mod_inventario.php',
            type: 'POST',
            data: datos,
        })
        .done(function(response) {
            console.log(response);
            if (response == "exito") {
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
