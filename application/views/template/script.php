</div><!-- /container -->

<script src="<?= base_url();?>js/jquery-1.10.2.js"></script>
<script src="<?= base_url();?>js/bootstrap.min.js"></script>

<script src="<?= base_url();?>js/search.js"></script>
<script src="<?= base_url();?>js/jquery.knob.js"></script>
<!-- jQuery File Upload Dependencies -->
<script src="<?= base_url();?>js/jquery.ui.widget.js"></script>
<script src="<?= base_url();?>js/jquery.iframe-transport.js"></script>
<script src="<?= base_url();?>js/jquery.fileupload.js"></script>
<script src="<?= base_url();?>js/script.js"></script>
<script src="<?= base_url();?>js/historico.js"></script>
<script src="<?= base_url();?>js/posepesquisa.js"></script>
<script src="<?= base_url();?>js/core.js"></script>
<script src="<?= base_url();?>js/jquery.dataTables.js"></script>
<script type="text/javascript">
 
//datatable - ERROR
 var oTable
 function fnFormatDetails ( nTr )
 {
  var aData = oTable.fnGetData( nTr );

  var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
  sOut += '<tr><td>'+aData['extra']+'</td></tr>';
  sOut += '</table>';

  return sOut;
}

   jQuery(document).ready(function($) {
  oTable = $('#table_error').dataTable({
   "bProcessing": true,
   "bServerSide": true,
   "sAjaxSource": "/NovaCarteirinha/admin/pendencia/error",
   "oLanguage": {
    "sProcessing":   "A processar...",
    "sLengthMenu":   "Mostrar _MENU_ registos",
    "sZeroRecords":  "Não foram encontrados resultados",
    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
    "sInfoPostFix":  "",
    "sSearch":       "Procurar:",
    "sUrl":          "",
    "oPaginate": {
     "sFirst":    "Primeiro",
     "sPrevious": "Anterior",
     "sNext":     "Seguinte",
     "sLast":     "Último"
   }
 },

 "aoColumnDefs" : [{ "aTargets": [ 0 ], "bSortable": false },
 { "aTargets": [ 1 ], "bSortable": true },
 { "aTargets": [ 2 ], "bSortable": true },
 { "aTargets": [ 3 ], "bSortable": false } ]


} );


  $('#renderingEngineFilter').on( 'change', function () {
   oTable.fnFilter( $(this).val() );
 } );



  $(document).on('click','#table_error tbody td img',function () {
   var nTr = $(this).parents('tr')[0];
   if ( oTable.fnIsOpen(nTr) )
   {
    /* This row is already open - close it */
    this.src = "img/details_open.png";
    oTable.fnClose( nTr );
  }
  else
  {
    /* Open this row */
    this.src = "img/details_close.png";
    oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
  }
} );


} );

</script>

 <script>
	 

//datatable - LIMBO
 var ooTable
    $(document).ready(function() {
  ooTable = $('#table_limbo').dataTable({
   "bProcessing": true,
   "bServerSide": true,
   "sAjaxSource": "/NovaCarteirinha/limbo/error",
   "bFilter": true,
   "oLanguage": {
    "sProcessing":   "A processar...",
    "sLengthMenu":   "Mostrar _MENU_ registos",
    "sZeroRecords":  "Não foram encontrados resultados",
    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
    "sInfoPostFix":  "",
    "sSearch":       "Procurar:",
    "sUrl":          "",
    "oPaginate": {
     "sFirst":    "Primeiro",
     "sPrevious": "Anterior",
     "sNext":     "Seguinte",
     "sLast":     "Último"
   }
 },

 "aoColumnDefs" : [{ "aTargets": [ 0 ], "bSortable": false },
 { "aTargets": [ 1 ], "bSortable": true },
 { "aTargets": [ 2 ], "bSortable": true },
 { "aTargets": [ 3 ], "bSortable": false } ]


} );


} );
   </script>
 <script type="text/javascript">
jQuery(document).ready(function(){
		$("#wallmessages").first().children().find(".btn_historico").click();
		$(".ok").click(function(){
			$(".alert-danger").fadeOut();
			$(".alert-warning").fadeIn();
			$(".alert-success").fadeIn();
		});
		
		$(".error").click(function(){
			$(".alert-warning").fadeOut();
			$(".alert-success").fadeOut();
			$(".alert-danger").fadeIn();
		});
		$(".todos").click(function(){
			$(".alert-warning").fadeIn();
			$(".alert-success").fadeIn();
			$(".alert-danger").fadeIn();
		});

});
</script>
</body>
</html>