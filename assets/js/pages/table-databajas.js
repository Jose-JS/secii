
$(document).ready(function () {
    $('#tblbajas').DataTable({
        
        content: 'This is an sample PDF printed with pdfMake',

        responsive: true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                sFirst: '<i class="material-icons">chevron_left</i>',
                sPrevious: '<i class="material-icons">chevron_left</i>',
                sNext: '<i class="material-icons">chevron_right</i>',
                sLast: '<i class="material-icons">chevron_right</i>'
            },
            "sProcessing": "Procesando...",
        },

        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-warning',
                exportOptions: {
                    columns: ':visible'
                }
			},

            
		

			//{
				//extend:    'print',
				//text:      '<i class="fa fa-print"></i> ',
                //className: 'responsive-table btn',
                  // customize: function ( win ) {
                    //$(win.document.body)
                      //  .css( 'font-size', '10pt' )
                       // .prepend(
                         //   '<img src="http://localhost:8080/sim1.2/assets/images/f1.png" style="position:absolute; top:0; left:0;" />'
                //        );

                //    $(win.document.body).find( 'table' )
                  //      .addClass( 'compact' )
                    //    .css( 'font-size', 'inherit' );
                //},
                //exportOptions: {
              //  columns: ':visible'
			//	 }


			//},
            'colvis'
		],
        columnDefs: [{
            visible: false
        }]

    });
    $('.dataTables_length select').addClass('browser-default');
});

