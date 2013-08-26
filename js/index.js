$("#btnCreate").click(function (event) {
	event.preventDefault(); 		
	document.location.href = "/messageoptions";
});

function loadGrid () {
	$('#grid').datagrid({
	  dataSource: new MessagesDataSource({

		// Column definitions for Datagrid
		columns: [{
		  property: 'main',
		  label: 'Message',
		  sortable: false
		},{
		  property: 'key',
		  label: 'Key',
		  sortable: true
		},{
		  property: 'modelType',
		  label: 'Model Type',
		  sortable: true
		},{
		  property: 'hasViews',
		  label: 'Supported Views',
		  sortable: true
		},{
		  property: 'hasActions',
		  label: 'Actions',
		  sortable: false
		}],
		
		formatter: function (items) {
		  $.each(items, function (index, item) {
								
				item.hasViews = '<ul>';
				for (var i = 0; i < item.views.length; i++)
				{ 					
					if(item.views[i].viewType.kind != '' || item.views[i].viewType.kind != 'undefined') {
						item.hasViews += '<li>' + item.views[i].viewType.kind + '</li>';
					};
				}
				item.hasViews += '</ul>';
				
				var btnEdit = '<a href=\"/editor?id=' + item.id + '&name=' + item.name + '\" class=\"btn btn-primary\"><i class=\"icon-pencil icon-white\"></i></a>';								
				var btnDelete = '<a href=\"/delete?id=' + item.id + '&name=' + item.name + '\" class=\"btn btn-danger\"><i class=\"icon-remove icon-white\"></i></a>';		  				
				
				item.main = '<a href=\"/editor?id=' + item.id + '\"><strong>' + item.name + '</strong></a><br>' + item.description				
												
				item.hasActions = btnEdit + ' ' + btnDelete;				
		  });
		}
	  })
	});
};

loadGrid();