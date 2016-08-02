$( function() {
	$("span.card" ).qtip({
		overwrite: false,
		style: {
			def: false,
			width: 400,
		},
		position: {
			target: 'mouse',
			viewport: $(window),
			my: 'left top',
			adjust: {
				x: 10,  y: 10
			},
		},
		content: {	
	        text: function(event, api) {
	            $.ajax({
	                url: 'http://localhost/td/cartas/card-preview/'+this.data('card-uid')+'.json'
	            })
	            .then(function(content) {
	            	console.log(content);
	                // Set the tooltip content upon successful retrieval
	                api.set('content.text', '<img src="'+content.card.img+'" width="100%">');
	            }, function(xhr, status, error) {
	                // Upon failure... set the tooltip content to the status and error value
	                api.set('content.text', status + ': ' + error);
	            });

	            return 'Carregando, aguarde...'; // Set some initial text
	        }
	    }
	});
} );