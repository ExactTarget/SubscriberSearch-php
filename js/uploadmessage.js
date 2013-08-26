requirejs.config({
	paths: {
		'jquery': '//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min',
		'fuelux/all': '//fuelux.exacttargetapps.com/fuelux-imh/2.2/all.min'
	}
});	

$("#btnSave").click(function (event) {
	event.preventDefault(); 		
	
	var message = localStorage.getItem("message");
	var token = localStorage.getItem("token");
	var url = 'https://www.exacttargetapis.com/guide/v1/messages?access_token=' + token;
	
	var name = $('#txtName').val();
	var key = $('#txtKey').val();
	var description = $('#txtDesc').val();
	
	console.log( 'message: ', message );
	var jMessage = JSON.parse(message);
	
	jMessage["name"] = name;
	jMessage["key"] = key;
	jMessage["description"] = description;
	
	$.ajax({
		async: true,
		cache: false,
		beforeSend: function(xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer ' + token);			
		},
		url: url,
		success: function(data, textStatus, xhr) {							
			document.location.href = "/editor?id=" + data.id;			
		},
		error: function(xhr, textStatus, errorThrown) {
			
		},
		contentType: "application/json",
		dataType: "json",
		type: 'POST',
		data: JSON.stringify(jMessage)
	});	
});

$("#btnCancel").click(function (event) {
	event.preventDefault(); 		
	document.location.href = "/";
});

$('#uploadFile').on('change', function() {
	var file = this.files[0];

	if(file.type !== 'text/html') {
		console.log('invalid file, must be text/html');
		return;
	}	

	var reader = new FileReader();
	reader.onload = (function(theFile) {
		return function(e) {
			convertToJSON(e.target.result);
		};
	})(file);

	reader.readAsText(file);
});

function convertToJSON(html) {
	var token = localStorage.getItem("token");
	var url = 'https://www.exacttargetapis.com/guide/v1/messages/convert?access_token=' + token;
	
	var data = {
		content: html
	}

	$.ajax({
		async: true,
		cache: false,
		beforeSend: function(xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer ' + token);			
		},
		url: url,
		success: function(data, textStatus, xhr) {			
			localStorage.setItem("message", JSON.stringify(data));			
			// TODO: Need to load the editor
		},
		error: function(xhr, textStatus, errorThrown) {
			// TODO: Notify the user of the issue
		},
		contentType: "application/json",
		dataType: "json",
		type: 'POST',
		data: JSON.stringify(data)
	});
}
