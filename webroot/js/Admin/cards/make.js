$(function(){
	var url = $('#search').data('url');
	var currentItem = {};

	var data = [];
	getCardsDataFromJson();
	console.log('Data', data);
	createLis();

	//console.log($.parseJSON($('#cards-json').val()));

	function getCardsDataFromJson(){
		var cards = $.parseJSON($('#cards-json').val());
		$.each(cards, function(k, v){
			cards[k].qtd = v._joinData.qtd;
		});

		data = cards;
	}

	function groupData(){
		var out = {0: [], 1: []};
		$.each(data, function(k, v){
			key = 1;
			if (v.play_class_id) {
				key = 0;
			}
			out[key].push(v);
		});

		return out;
	}

	$('#search').autocomplete({
		source: function(request, response) {
			$.getJSON(url, request, function(data){
				return response(data.cards);
			});
		},
		select: function(e, ui){
			console.log('Item', ui.item);
			currentItem = ui.item;

			$('#qtd').focus().select();
			// $('#cards').append(createLi(curretItem));
		}
	});

	$('.btn-add').click(function(){
		currentItem.qtd = $('#qtd').val();
		data.push(currentItem);

		createLis();
		$('#search').val('').focus();
	});

	$(document).on('click', 'button.btn-delete', function(){
		var $this = $(this);
		console.log('Data', data);
		console.log('Tamanho da data', data.length);

		$.each(data, function(k, v){
			console.log('V', v);
			var id = parseInt($this.siblings('input.card-id').val());
			if (v.id == id) {
				console.log('Apagar aqui', k);
				data.splice(parseInt(k), 1);
				return false;
			}
		});

		console.log('Data depois de apagada', data);
		console.log('Tamanho depois de apagada', data.length);
		$(this).parent().remove();
	});

	function createLis(){
		$('#cards').empty();
		var dataSorted = data.sort(function (a, b) {
		    return a.mana_cost - b.mana_cost;
		});

		dataGrouped = groupData(dataSorted);
		console.log('Data Agrupada', dataGrouped);

		var i = 0;
		$.each(dataGrouped, function(group, cards){
			var title = 'Da Classe';
			if (group == 1) {
				title = 'Neutros';
			}
			var $li = $('<li>')
				.css({'background-color': 'pink'})
				.html(title);
			$('#cards').append($li);
			$.each(cards, function(k, v){
				var $btnDelete = $('<button>')
					.attr({'type': 'button'})
					.addClass('btn-delete btn btn-danger btn-xs')
					.text('x');
				var $li = $('<li>')
					.html(v.qtd + 'x ' + v.name);

				$li.append($btnDelete);

				var $inputCard = $('<input/>')
					.attr({
						type:'hidden',
						name: 'cards['+i+'][id]' 
					})
					.addClass('card-id')
					.val(v.id);
				var $inputQtd = $('<input/>')
					.attr({
						type:'hidden',
						name: 'cards['+i+'][_joinData][qtd]'
					})
					.val(v.qtd);

				$li.append($inputCard);
				$li.append($inputQtd);
				$('#cards').append($li);

				i++;
			});
		})
	}
});