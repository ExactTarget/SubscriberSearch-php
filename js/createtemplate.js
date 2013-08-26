$("#btnSave").click(function (event) {
	event.preventDefault(); 		
	document.location.href = "/editor";
});

$("#btnCancel").click(function (event) {
	event.preventDefault(); 		
	document.location.href = "/";
});
