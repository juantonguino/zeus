	/**
	 * Archivo con los scripts del proyecto zeus
	 */

	 var json = {message_title : '', message_body : '', route : ''};

	 $.getScript('plugins/select2/js/select2.js',function(){
		 var select = $('#select2').select2();
		 $("#tagPicker").select2({
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
