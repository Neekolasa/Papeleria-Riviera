$(document).ready(function() {

$('.datatable').DataTable({
    dom: 'lfrtip',
    //"sDom": 'B<lf>tip',
    //"ordering": true, // false to disable sorting (or any other option)
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
  });

$('.datatable-buttons').DataTable({
    /*
        B= Botones
        l= Select para mostrar datos
        f= Filtro de busqueda
        t= tabla
        i= informacion de la tabla
        p= paginacion de la tabla
        r=
    */
    aaSorting: [[ 0, "desc" ]],
    dom: 'Blfrtip',
    className: 'buttons',
    buttons: [
    {
        extend: 'copy',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'excel',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'pdf',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'print',
        exportOptions: {
            columns: ':visible'
        }

    }, 'colvis'],
    columnDefs: [ {
            targets: 9,
            visible: true
        } ],
    
    "sDom": 'B<lf>tip',
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
  });

$(".dataTables_length").attr('class', 'dataTables_length col-sm-5');

$('.buttons-pdf').html('<span class="btn btn-success" data-toggle="tooltip" title="">Exportar a PDF</span>');
$('.buttons-excel').html('<span class="btn btn-success" data-toggle="tooltip" title="">Exportar a Excel</span>');
$('.buttons-copy').html('<span class="btn btn-success" data-toggle="tooltip" title="">Copiar a portapapeles</span>');
$('.buttons-print').html('<span class="btn btn-success" data-toggle="tooltip" title="">Imprimir tabla</span>');
$('.buttons-colvis').html('<span class="btn btn-success" data-toggle="tooltip" title="">Mostrar / Ocultar columnas</span>');


});