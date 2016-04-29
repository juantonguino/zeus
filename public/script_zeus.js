	/**
	 * Archivo con los scripts del proyecto zeus
	 */

	var json={message_title:'', message_body:'', route:''};

	function confirmDelete(message_title, message_body, route) {
		json.message_title= message_title;
		json.message_body= message_body;
		json.route=route

		$('#title_message').text(message_title)
		$("#texto").text(message_body);
		$("#dialog").modal();
	}

	$('#delete').click(function () {
		console.log(json);
		location.href=json.route;
	});