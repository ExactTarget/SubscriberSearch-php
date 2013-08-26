var MessagesDataSource = function (options) {
	this._formatter = options.formatter;
	this._columns = options.columns;
};

MessagesDataSource.prototype = {	
	columns: function () {
		return this._columns;
	},
	
	data: function (options, callback) {

		var token = localStorage.getItem("token");
		var url = 'https://www.exacttargetapis.com/guide/v1/messages/f:@all?access_token=' + token;
		var self = this;		
		
		$.ajax(url, {			
			type: 'GET'
		}).done(function (response) {
			
			// Prepare data to return to Datagrid
			var data = response.items;
			var count = response.count;
			var startIndex = (response.page - 1) * response.pageSize;
			var endIndex = startIndex + response.pageSize;
			var end = (endIndex > count) ? count : endIndex;
			var pages = response.page;
			var page = response.page;
			var start = startIndex + 1;

			if (self._formatter) self._formatter(data);

			// Return data to Datagrid
			callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
		});	
		
		// Return data to Datagrid
		callback({ data: {}, start: 0, end: 0, count: 0, pages: 0, page: 0 });					
					
	}
};