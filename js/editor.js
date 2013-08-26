requirejs.config({
		paths: {
			'jquery': '//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min',
			'fuelux/all': '//fuelux.exacttargetapps.com/fuelux-imh/2.3/all.min',
			'fuelux-cke': '//internalcdn.xexacttargetapps.com/fuelux-cke/0.1/',				
			'fuelux-editor': 'http://internalcdn.xexacttargetapps.com/fuelux-editor/nightlies/0.1.7-wip/6-24-2013/'
		}
	});	
	
	function setAlerts() {
		if ($("#alertSaved").attr("hidden") !== undefined) {
			 console.log('a');
		} else {
			$("#alertSaved").attr('hidden', 'true');
			console.log('b');
		};
	};
	
	$("#btnSave").click(function (event) {
	
		setAlerts();
	
		event.preventDefault(); 		
		var token = localStorage.getItem("token");	
		var id = "";
		var qs = (function(a) {
			if (a == "") return {};
			var b = {};
			for (var i = 0; i < a.length; ++i)
			{
				var p=a[i].split('=');
				if (p.length != 2) continue;
				b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			}
			return b;
		})(window.location.search.substr(1).split('&'));	
		
		if (qs["id"] != undefined) {
			id = qs["id"];
			
			var msg = $('#example').editor('getResource');			

			var postBody = {
				msg: msg,
				id: id,
				token: token
			};
		
			$.ajax('/saveMessage', {			
				type: 'PUT',
				data: postBody
			}).done(function (response) {
				$("#alertSaved").removeAttr("hidden");							
				console.log('saved');
				console.log( 'response: ', response );
				return response;
			});				
		}; 	
	});	

	$("#btnPreview").click(function (event) {
		// TODO Setup Alers for Prevew if needed

		event.preventDefault();
		// Call on the /preview route of the app
		var token = localStorage.getItem('token');
		var id = '';
		var qs = (function(a) {
			if (a == "") return {};
			var b = {};
			for (var i = 0; i < a.length; ++i)
			{
				var p=a[i].split('=');
				if (p.length != 2) continue;
				b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			}
			return b;
		})(window.location.search.substr(1).split('&'));	

		if (qs["id"] != undefined) {
			id = qs["id"];
			
			var url = '/previewById?id=' + id;		
		
			$.ajax({
				url: url,
				method: 'GET',
				success: function( data, status, xhr ) {
					console.log( 'DATA: ', data );
				},
				error: function( xhr, status, error ) {
					console.log( 'ERROR: ', error );
				}
			});
			
			/*
			var requestBody = {};
			requestBody.msg = $('#example').editor('getResource');			
			requestBody.id = id;

			console.log( 'Request Body: ', requestBody );
		
			$.ajax(url, {			
				type: 'POST',
				data: JSON.stringify( requestBody )
			}).done(function (response) {
				//$("#alertSaved").removeAttr("hidden");							
				console.log('saved');
				console.log( 'response: ', response );
				return response;
			});				
			*/
		}; 	
	});
	
	function createEditorInstance(message, token){	
		console.log(message);
		$('#example').editor({
				resource: message, //
				height: '100%',
				features: {
					gears: {
						panel: true
					},		
					global: true,
					toolbox: {
						open: false,
						panelOrder: ['gears', 'global'],
						selectedPanel: 'gears'
					},
					slots: {
						hints: false,
						toggler: true
					},
					menu: true,
					views: {
						allowed: ['*'],
						restricted: []
					}, //http://base/@api/deki/files/11327/=ThemeDefaultValues.txt
					styling: {			
						selections: {
							"_global": {
								"background-color": {
									"advanced": true,
									"options": [
										"#000000", "#9a3400", "#333400", "#003300", "#003067", "#050181", "#342c9b", "#333333",
										"#810200", "#ff6800", "#7f8200", "#008100", "#008081", "#1505ff", "#67649a", "#808080",
										"#ff0600", "#ff9b00", "#97cf00", "#2c9a64", "#29cbcd", "#375dff", "#810181", "#999999",
										"#ff04ff", "#ffcf00", "#feff00", "#00ff00", "#00ffff", "#00cbff", "#9a3167", "#c0c0c0",
										"#ff98cd", "#ffcd97", "#ffff94", "#caffca", "#cbffff", "#99caff", "#ce95ff", "#ffffff"
									]
								},
								"border-color": {
									"advanced": true,
									"options": [
										"#000000", "#9a3400", "#333400", "#003300", "#003067", "#050181", "#342c9b", "#333333",
										"#810200", "#ff6800", "#7f8200", "#008100", "#008081", "#1505ff", "#67649a", "#808080",
										"#ff0600", "#ff9b00", "#97cf00", "#2c9a64", "#29cbcd", "#375dff", "#810181", "#999999",
										"#ff04ff", "#ffcf00", "#feff00", "#00ff00", "#00ffff", "#00cbff", "#9a3167", "#c0c0c0",
										"#ff98cd", "#ffcd97", "#ffff94", "#caffca", "#cbffff", "#99caff", "#ce95ff", "#ffffff"
									]
								},
								"border-sides": {
									"options": ["top", "bottom", "left", "right", "all", "none"]
								},
								"border-style": {
									"options": ["solid", "dotted", "dashed", "double", "groove", "ridge", "inset", "outset"]
								},
								"border-width": {
									"options": ["1px", "2px", "3px", "4px", "5px", "6px", "7px", "8px"]
								},
								"color": {
									"advanced": true,
									"options": [
										"#000000", "#9a3400", "#333400", "#003300", "#003067", "#050181", "#342c9b", "#333333",
										"#810200", "#ff6800", "#7f8200", "#008100", "#008081", "#1505ff", "#67649a", "#808080",
										"#ff0600", "#ff9b00", "#97cf00", "#2c9a64", "#29cbcd", "#375dff", "#810181", "#999999",
										"#ff04ff", "#ffcf00", "#feff00", "#00ff00", "#00ffff", "#00cbff", "#9a3167", "#c0c0c0",
										"#ff98cd", "#ffcd97", "#ffff94", "#caffca", "#cbffff", "#99caff", "#ce95ff", "#ffffff"
									]
								},
								"font-family": {
									"options": [
										"Arial, Helvetica, sans-serif", "Arial Black, Gadget, sans-serif", "Comic Sans MS, cursive", "Courier New, monospace",
										"Georgia, serif", "Impact, Charcoal, sans-serif", "Lucida Console, Monaco, monospace", "Palatino Linotype, Book Antiqua, Palatino, serif",
										"Tahoma, Geneva, sans-serif", "Times New Roman, Times, serif", "Trebuchet MS, sans-serif", "Verdana, Geneva, sans-serif"
									]
								},
								"font-size": {
									"options": ["6px", "8px", "10px", "12px", "14px", "18px", "24px"]
								},
								"padding-sides": {
									"options": ["top", "bottom", "left", "right", "all", "none"]
								},
								"padding-width": {
									"options": ["1px", "2px", "3px", "4px", "5px", "6px", "7px", "8px"]
								}
							}
						}
					}
			},
			_restBaseUrl: 'https://www.exacttargetapis.com/',
			_restHeaders: {
				'Authorization': 'Bearer ' + token
			}
		});
		
		// TODO: with 0.1.5, call methods to switch views
		$('.editor-views-select .editor-views-item').each(function() {
			var _el = $(this);
			var value = _el.value;
			var name = _el.text();
			$('#viewSwitcher').append('<button class="btn">' + name + '</button>');
		});
		
		$('#viewSwitcher .btn').button();						

		var baseUrl = window.location.protocol + '//' + window.location.host;

		// register gears
		// note: should be to root directory of gear
		$('#example').editor('registerGearsByUrl', [
			baseUrl + '/gears/googleMaps/',
			baseUrl + '/gears/twitter/',
			baseUrl + '/gears/youtube/',
			baseUrl + '/gears/rssFeed/',					
			'http://fuelux-gears.xexacttargetapps.com/foursquare/',					
			baseUrl + '/gears/weather/',
			baseUrl + '/gears/poll/',
			baseUrl + '/gears/htmlPaste/',
			baseUrl + '/gears/flickr/',
			baseUrl + '/gears/wysiwyg/'					
		]);
	}
	
	function getMessage() {
		var token = localStorage.getItem("token");	
		var id = "";
		var qs = (function(a) {
			if (a == "") return {};
			var b = {};
			for (var i = 0; i < a.length; ++i)
			{
				var p=a[i].split('=');
				if (p.length != 2) continue;
				b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
			}
			return b;
		})(window.location.search.substr(1).split('&'));	
		
		if (qs["id"] != undefined) {
			id = qs["id"];
			
			var url = 'https://www.exacttargetapis.com/guide/v1/messages/id:' + id + '?access_token=' + token;		
		
			$.ajax(url, {			
				type: 'GET'
			}).done(function (response) {
				createEditorInstance(response, token);
				return response;
			});				
		}; 
	};
	
	require(['jquery', 'fuelux/all', 'fuelux-editor/all'], function($) {
		$(function() {	
			getMessage();
		});
	});		
		
		/*var token = localStorage.getItem("token");
		var url = 'https://www.exacttargetapis.com/guide/v1/messages/' + id + '?access_token=' + token;
		var self = this;		
		
		//https://raw.github.com/adamalex/fuelux-dgdemo/master/datasource.js
		
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
		});	*/
