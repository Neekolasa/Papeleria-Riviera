$(document).ready(function() {

$.ajaxSetup({ cache: false });
//BUSCAR PRODUCTO
    $("#nombre_producto").keyup(function(e) {

      e.preventDefault();
      var productos = $(this).val();

      if (productos == "") {
        $('#id_producto').html('-');
        $('#cantidad_producto').html('-');
        $('#descripcion_producto').html('-');
        $('#precio_unitario').val('0');
        $('#precio_total').html('0.00');
        //$('#txt_precio_total').html('0.00');

        //Bloquear Cantidad
        $('#cantidad_producto').attr('disabled', 'disabled');
        // Ocultar Boto Agregar
        $('#btn_agregar').slideUp();
      }
      
      if (productos!='') {
        var parametros={
          "producto" : productos
        }
        $.ajax({
          url: 'cont/busc_producto.php',
          type: 'POST',
          data: parametros,
          success: function(response){
            //console.log(parametros);
            if (response == 0) {
              $('#id_producto').html('-');
              $('#cantidad_producto').html('-');
              $('#descripcion_producto').html('-');
              $('#precio_unitario').val('0');
              $('#precio_total').html('0.00');
              //$('#txt_precio_total').html('0.00');

              //Bloquear Cantidad
              $('#cantidad_producto').attr('disabled', 'disabled');
              // Ocultar Boto Agregar
              $('#btn_agregar').slideUp();
            }
            else{
              //var info = response;
              var info=JSON.parse(response);
              $('#productos').html(info.opcion);

              
              /*
              $('#cantidad_producto').val('1');
              $('#descripcion_producto').html(info.descripcion);
              $('#precio_unitario').html(info.precio_unidad);
              $('#precio_total').html(info.precio_unidad);
              
              $('#cantidad_producto').removeAttr('disabled');
             
              $('#btn_agregar').slideDown();*/
              $('#btn_agregar').removeAttr('hidden');
            }
            
          },
            error: function(error) {
            }
        });

        $('#id_producto').html('-');
        $('#cantidad_producto').html('-');
        $('#descripcion_producto').html('-');
        $('#precio_unitario').val('0');
        $('#precio_total').html('0.00');
        //$('#txt_precio_total').html('0.00');

        //Bloquear Cantidad
        $('#cantidad_producto').attr('disabled', 'disabled');
        // Ocultar Boto Agregar
        $('#btn_agregar').slideUp();
        
     
        
      }

    });

//CALCULAR TOTAL
  $("#cantidad_producto").keyup(function(e) {
    e.preventDefault();
    var precio_total = $(this).val() * $("#precio_unitario").html();
    $("#precio_total").html(precio_total);
    if ($(this).val() < 1 || isNaN($(this).val())) {
      $('#btn_agregar').slideUp();
    }
    else{
      $('#btn_agregar').slideDown();
    }  


  });

//AGREGAR A LA TABLA PRODUCTOS DE LA VENTA
  $('#btn_agregar').click(function(e) {
    e.preventDefault();
    if ($("#cantidad_producto").val() >0 ) {

      var producto=$('#nombre_producto').val();
      var cantidad=$("#cantidad_producto").val();
      var precio_tota=$("#precio_unitario").html()
      var datos={
        "producto" : producto,
        "cantidad" : cantidad,
        "total" : precio_tota 
      }

      $.ajax({
        url: 'cont/addto_ventas.php',
        type: 'POST',
        data: datos,
        success : function(response){
          //console.log(datos);
          //console.log(response);
          var info = JSON.parse(response);
          
          //$("#detalle_venta").html(info);
          //$("#detalle_total").html(info.footer);
           $("#detalle_venta").html(info.detalle);
          $("#detalle_total").html(info.footer);

          $('#nombre_producto').val("");
          $('#cantidad_producto').html('-');
          $('#descripcion_producto').html('-');
          $('#precio_unitario').val('0');
          $('#precio_total').html('0.00');
          //$('#txt_precio_total').html('0.00');

          //Bloquear Cantidad
          $('#cantidad_producto').attr('disabled', 'disabled');
          // Ocultar Boto Agregar
          $('#btn_agregar').slideUp();

        }

      });
      
      
    }
  });
  
//ELIMINAR PRODUCTO DE LA LISTA DE VENTA
  $(document).on('click','.borrar',function(){
    var modify_id=$(this).attr('id');
    var datos={
      "id" : modify_id
    }
    //console.log(modify_id);
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
              url: 'cont/borrar_detalle_producto.php',
              type: 'POST',
              data: datos,
              success : function(response){
                //console.log(datos);
                //console.log(response);
                var info = JSON.parse(response);
                //var info = response;
                //console.log(info);
                $("#detalle_venta").html(info.detalle);
                $("#detalle_total").html(info.footer);

                $('#nombre_producto').html("");
                $('#cantidad_producto').html('-');
                $('#descripcion_producto').html('-');
                $('#precio_unitario').val('0');
                $('#precio_total').html('0.00');
                //$('#txt_precio_total').html('0.00');

                //Bloquear Cantidad
                $('#cantidad_producto').attr('disabled', 'disabled');
                // Ocultar Boto Agregar
                $('#btn_agregar').slideUp();

              }
             
            });

            setTimeout(1000);

              Swal.fire(
                      'Correcto',
                      'El registro se ha eliminado correctamente',
                      'success'
                    )
          }
          else if (result.isDenied)
          {

          }
          
        });
  });

  //PROCESAR VENTA
  $("#btn_procesar").click(function(e) {
    
    var datos = {
      "info" : "insertar",
    }

    Swal.fire({
      title: '¿Estás Seguro?',
      text: "Asegurate que la información es correcta!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonText:"Cancelar",
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, guardar!'
    }).then((result) => {
        //console.log(result);
        if (result.value == true) {
          $.ajax({
              url: 'cont/procesar_venta.php',
              type: 'POST',
              data: datos,
              success : function(response){
              //console.log(datos);
              //console.log(response);
              var info = response;
              //var info = response;
              console.log(info);
                if (info=="exito") {
                  Swal.fire(
                      'Correcto',
                      'Se ha guardado la información',
                      'success'
                    )
                  .then(function(){ 
                          location.reload();
                        });
                }
                else
                {
                  Swal.fire(
                      'Error',
                      'Ha ocurrido un error inesperado',
                      'error'
                    )
                }

              }
             
            });

        }
        else if (result.isDenied)
        {

        }
          
      });

  });
  
  //ELIMINAR VENTA
  $("#btn_cancelar").click(function(e) {
    
    var datos = {
      "info" : "borrar",
    }

    Swal.fire({
      title: '¿Estás Seguro?',
      text: "Se perderá la información de la venta!",
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
              url: 'cont/procesar_venta.php',
              type: 'POST',
              data: datos,
              success : function(response){
              //console.log(datos);
              //console.log(response);
              var info = response;
              //var info = response;
              console.log(info);
                if (info=="borrado") {
                  Swal.fire(
                      'Correcto',
                      'Se ha eliminado la venta',
                      'success'
                    )
                  .then(function(){ 
                          location.reload();
                        });
                }
                else
                {
                  Swal.fire(
                      'Error',
                      'Ha ocurrido un error inesperado',
                      'error'
                    )
                }

              }
             
            });

        }
        else if (result.isDenied)
        {

        }
          
      });

  });

});




function fill(){
  var product = $("#nombre_producto").val();
  var marca = $("#nombre_producto").attr('marca');
  //console.log(marca);
  var parameter={
    "datos" : "datos",
    "product" : product
  }
//console.log(parameter);
  $.ajax({
          url: 'cont/busc_producto.php',
          type: 'POST',
          data: parameter,
          success: function(response){
            
            if (response == 0) {
              $('#cantidad_producto').html('-');
              $('#descripcion_producto').html('-');
              $('#precio_unitario').val('0');
              $('#precio_total').html('0.00');
              $('#marca_producto').html('-')
              //$('#txt_precio_total').html('0.00');

              //Bloquear Cantidad
              $('#cantidad_producto').attr('disabled', 'disabled');
              // Ocultar Boto Agregar
              $('#btn_agregar').slideUp();
            }
            else{
              //console.log(response);
              var info=JSON.parse(response);


              $('#cantidad_producto').val('1');
              $('#descripcion_producto').html(info.descripcion);
              $('#precio_unitario').html(info.precio_unidad);
              $('#precio_total').html(info.precio_unidad);
              $('#marca_producto').html(info.marca);
              
              $('#cantidad_producto').removeAttr('disabled');
             
              $('#btn_agregar').slideDown();
            }
            
          },
            error: function(error) {
            }
        });

}
