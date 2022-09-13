$(document).ready(function() {

  //Currencies datatable
	var table = $('#currency').DataTable( {
		lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'print']
	} );

	table.buttons().container()
		.appendTo( '#currency_wrapper .col-md-6:eq(0)' );


} );
