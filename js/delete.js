$("#btnCancel").click(function (event) {
	event.preventDefault(); 		
	document.location.href = "/";
});

$("#btnDelete").click(function (event) {
	event.preventDefault(); 		
	deleteMessage();	
}); 

function deleteMessage () {
	var id = localStorage.getItem("deleteId");
	var url = 'https://www.exacttargetapis.com/guide/v1/messages/' + id + '?access_token=' + token;	
	
	$.ajax(url, {			
		type: 'DELETE'		
	}).done(function (response) {		
	    document.location.href = "/";		
	});	
};