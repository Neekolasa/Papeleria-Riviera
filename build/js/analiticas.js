$(document).ready(function() {

  $.ajax({
    url: 'cont/analiticas.php',
    type: 'POST',
    data: "",
      success: function(response){
        //console.log(response);
        var info=JSON.parse(response);
        if (info.dia != null) 
          { $('#ventas_dia').html("$"+info.dia); }
        else 
          { $('#ventas_dia').html("$0"); }


        if (info.semana != null) 
          { $('#ventas_semana').html("$"+info.semana); }
        else 
          { $('#ventas_semana').html("$0"); }


        if (info.mes != null) 
          { $('#ventas_mes').html("$"+info.mes); }
        else 
          { $('#ventas_mes').html("$0"); }


        if (info.inventario != null) 
          { $('#productos_inventario').html(info.inventario); }
        else 
          { $('#productos_inventario').html("0"); }
        

        
        if (info.barra != null) 
          { Morris.Bar({
              barGap:4,
              barSizeRatio:0.55,
              element: 'bar-example',
              data: info.barra,
              xkey: 'mes',
              ykeys: ['total'],
              labels: ['Ventas Totales'],
              barColors:['#1abb9c'],
              hideHover: 'auto'
            });
          }
        else 
          { }
        //$('.count').attr('style', 'color: #1abb9c;');
        
        //console.log(info.barra);
        
      },
      error: function(error) {
        }
    });


});
