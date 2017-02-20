	/**
	 * Archivo con los scripts del proyecto zeus
	 */

	 var json = {message_title : '', message_body : '', route : ''};

	 var destinos=[
		{
			destino:"Seleccione un Destino",
			instrucciones:""
		},
		{
			destino:"Santurio de las Lajas",
			instrucciones:"santuario instrucciones"},
		{
			destino:"Sandona",
			instrucciones:"Sandona instrucciones"
		}];

	 $.getScript('../../plugins/select2/js/select2.js',function(){
		 var select = $('#select2').select2();
		 $(".tagPicker").select2({
			 closeOnSelect:false
		 });
	 });

	 $(document).on('ready',function(){
		 $('#delete').click(function () {
			 console.log(json);
			 location.href=json.route;
		 });
	 });

	function confirmDelete (message_title, message_body, route) {
		json.message_title= message_title;
		json.message_body= message_body;
		json.route=route

		$('#title_message').text(message_title)
		$("#texto").text(message_body);
		$("#dialog").modal();
	}
	function loadSelect(){
		 for(i=0; i<destinos.length; i++){
			 console.log(destinos[i]);
			 $("#destino-dinamico").append($('<option>', {value:destinos[i].destino, text:destinos[i].destino}));
		 }
	}

	loadSelect();

	function encontrarDestino(arreglo, destino){
		for (var i = 0; i < arreglo.length; i++) {
			variable=arreglo[i];
			if (variable.destino==destino) {
				return variable;
			}
		}
		return null;
	}
	$("#destino-dinamico").change(function () {
    var str = "";
		destinoGeneral=null;
    $( "#destino-dinamico option:selected" ).each(function() {
      str += $( this ).text();
			destinoGeneral=encontrarDestino(destinos, str);
			console.log(destinoGeneral);
    });
    $("#recorrido_plan").text(destinoGeneral.instrucciones)
  }).change();
