// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;( function( $, window, document, undefined ) {

	"use strict";

		// undefined is used here as the undefined global variable in ECMAScript 3 is
		// mutable (ie. it can be changed by someone else). undefined isn't really being
		// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
		// can no longer be modified.

		// window and document are passed through as local variables rather than global
		// as this (slightly) quickens the resolution process and can be more efficiently
		// minified (especially when both are regularly referenced in your plugin).

		// Create the defaults once
		var pluginName = "defaultPluginName",
			defaults = {
				xsBreakpoint: 768,
				imageSize: 300,
				height: 300,
				width: 240,
				modalFadeSpeed: 200,
				popoverFadeSpeed: 100,
				loadingText: "Carregando...",
				rarityColors: {
					rare: "blue",
					epic: "pink",
					common: "#FFF",
					legend: "gold"
				},
				beforeSend: function(){

				}
			};

		// The actual plugin constructor
		function Plugin (element, options) {
			this.element = element;

			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;

			this.init();

		}

		// Avoid Plugin.prototype conflicts
		$.extend( Plugin.prototype, {
			init: function() {
				
				this.popoverOpened = false;
				this.img = "";

				// Place initialization logic here
				// You already have access to the DOM element and
				// the options via the instance, e.g. this.element
				// and this.settings
				// you can add more functions like the one below and
				// call them like the example below
				var _this = this;
				// $(this.element).popover(this.popoverOptions);

				$(this.element).mouseenter(function(){
					// var $this = $(this);
					// var cardUid = $this.data("card-uid");

					_this.showPopover();

					// if (!_this.checkPopoverCreated($(_this.element))) {
					// 	$(_this.element).append('Carregando...');
					// 	$.ajax({
					// 	    beforeSend: _this.settings.beforeSend,
					// 	    dataType: "json",
					// 	    url: _this.settings.endPoint.replace('{id}', cardUid),
					// 	    success: function(data) {
					// 	    	var image = data.card[_this.settings.field];
					// 	        _this.image = data.card[_this.settings.field];

					// 	        $this.data('image', image);

					// 	        $('[data-card-uid="'+cardUid+'"]').each(function(){
					// 	        	$(this).data('image', image);
					// 	        });
					// 	    },
					// 	});
					// }
				});
				$(this.element).mouseleave(function(){
					_this.hidePopover();
				});
				$(this.element).blur(function(){
					_this.hidePopover();
				});

				$(this.element).click(function(){
					var $this = $(this);
					$this.blur();

					// if (_this.getWhereToDisplay() !== "modal") {
					// 	return;
					// }

					var cardUid = $this.data("card-uid");

					_this.openModal();
					// var wWidth = $(window).width();
					// var wHeight = $(window).height();
					// if ($) {}
					if (!$this.data("image")) {
						var $loader = $("<img/>")
							.attr("src", "/td/lib/preview-card/src/loader.gif")
							.addClass("my-modal-body-loading");

						$(".my-modal-body")
							.css("background-image", "none")
							.html("")
							.append($loader);

						// $close.show().addClass("animated bounceInDown");

						$.ajax({
						    beforeSend: _this.settings.beforeSend,
						    dataType: "json",
						    url: _this.settings.endPoint.replace("{id}", cardUid),
						    success: function(data) {
						        _this.image = data.card[_this.settings.field];

						        $this.data("image", data.card[_this.settings.field]);

						        $("[data-card-uid=\""+cardUid+"\"]").each(function(){
						        	$(this).data("image", data.card[_this.settings.field]);
						        });
								$(".my-modal-loading").fadeOut(_this.settings.modalFadeSpeed);
						        $(".my-modal-body").hide().html("").css("background-image", "url("+_this.image+")").show().addClass('animated bounceInDown');
						    },
						});
					} else {
						$(".my-modal-body").html("").css("background-image", "url("+$this.data("image")+")").show().addClass("animated bounceInDown");
					}
					return false;
				});

				$(document).on('click', ".my-modal-close", function(){
					_this.closeModal();
				});

				$(".overlay").click(function(){
					_this.closeModal();
				});

				// this.togglePopoverBasedMediaQuery();
				$('.overlay').css({
					width: $(window).width(),
					height: $(window).height(),
				});
				$(window).resize(function(){
					$('.overlay').css({
						width: $(window).width(),
						height: $(window).height(),
					});
				});

				// this.setElementInitialSettings();
				// this.setRarityColor();
			},
			getPopoverElement: function(image){
				console.log('Here');
				var $element = $("<div/>")
					.addClass("my-hs-popover")
					.css({
						// "background-image": "url("+image+")",
						height: this.settings.height + 'px',
						width: this.settings.width + 'px'
					});

				if (image) {
					$element
						.css({"background-image": "url("+image+")"});
				}

				return $element;
			},
			checkPopoverCreated: function($element){
				var created = $element.data("popover-created");
				return !(typeof created === "undefined" || !created);
			},
			createPopover: function($element, image){
				image = (typeof image === "undefined") ? null : image;

				if (!this.checkPopoverCreated($element)) {
					var $popover = this.getPopoverElement(image);
					$element.after($popover);
					$element.data("popover-created", true);
				}
			},
			getPopover: function(){
				return $(this.element).next(".my-hs-popover");
			},
			showPopover: function(){
				/**
				 * O showpopover é chamado sempre que acontecer um mouse over porem o metodo abaixo é inteligente
				 * o suficiente para criar o popover somente se ele ainda nao foi criado.
				 */
				this.createPopover($(this.element));
				var $popover = this.getPopover();
				/**
				 * Diferente do createpopover que só vai criar o popover se ele ainda nao foi criado, a posição do popover tem que recalculada toda a vez que o popover 
				 * for ser exibido
				 */
				var whereToDisplay = this.getWhereToDisplay();

				if (whereToDisplay !== "modal") {
					this.positionPopover($popover, whereToDisplay);
					console.log('Mostrando o popover');
					$popover.stop().fadeIn(this.settings.popoverFadeSpeed);

					var imageName = $(this.element).data("image");
					if (typeof imageName === "undefined") {		
						
						$popover.html("Carregando...");
						var _this = this;
						var $this = $(this.element);
						var cardUid = $this.data("card-uid");

						$.ajax({
						    beforeSend: _this.settings.beforeSend,
						    dataType: "json",
						    url: _this.settings.endPoint.replace("{id}", cardUid),
						    success: function(data) {
						    	var image = data.card[_this.settings.field];
						        _this.image = data.card[_this.settings.field];

						        $popover.html("");
						        $this.data("image", image);

						        $("[data-card-uid=\""+cardUid+"\"]").each(function(){
						        	$(this)
						        		.data({
						        			"image": image
						        		});
						        	_this.createPopover($(this), image);
						        });

						        $popover.css({
						        	"background-image": "url("+image+")"
						        });
						    },
						});
					}
				}
			},
			hidePopover: function(){
				var $popover = $(this.element).next(".my-hs-popover");
				$popover.fadeOut(this.settings.popoverFadeSpeed);
			},
			getWhereToDisplay: function(){
				var distanceTop = this.getDistanceFromTop($(this.element));
				var distanceBottom = this.getDistanceFromBottom($(this.element));

				var whereToDisplay = "modal";
				var wWidth = $(window).width();

				// var $elementHeight = $(this.element).height();

				if (distanceTop > this.settings.height && wWidth > this.settings.width) {
					whereToDisplay = "top";
				} else if (distanceBottom > this.settings.height && wWidth > this.settings.width) {
					whereToDisplay = "bottom";
				} else {
					whereToDisplay = "bottom";
				}
				console.log("Display in", whereToDisplay);
				return whereToDisplay;
			},
			positionPopover: function($popover, whereToDisplay){
				console.log("Posicionando em ", whereToDisplay);
				var rightDistance = $(window).width() - $(this.element).offset().left;

				$popover.css({
					left: $(this.element).offset().left,
					"margin-left": 0
				});

				if (rightDistance < this.settings.width) {
					$popover.css({
						'margin-left': -(this.settings.width - rightDistance)
					});
				}

				switch (whereToDisplay) {
					case 'top':
						$popover.css({
							'margin-top': -(this.settings.height + $(this.element).height()),
						});
						break;
					case 'bottom':
						$popover.css({
							'margin-top': 0,
						});
						break;
				}
				return whereToDisplay;
				console.log('Distancia para o topo', distanceTop);
				console.log('Distancia para o bottom', distanceBottom);
			},
			getDistanceFromTop: function($element){
				var scrollTop     = $(window).scrollTop(),
					elementOffset = $element.offset().top,
					distance      = (elementOffset - scrollTop);

				return distance;
			},
			getDistanceFromBottom: function($element){
				var wHeight     = $(window).height();
				var distanceTop = this.getDistanceFromTop($element);
				console.log($element.height());

				return wHeight - distanceTop - $element.height();
			},
			closeModal: function(){
				this.modalOpened = false;
				$(".my-modal-body").removeClass("animated bounceInDown");
				$(".overlay").fadeOut(this.settings.modalFadeSpeed);
			},
			openModal: function() {
				this.modalOpened = true;
				$(".overlay").fadeIn(this.settings.modalFadeSpeed);
			},
			setElementInitialSettings: function() {
				$(this.element)
					.data({
						html: true
					});
			},
			setContent: function($this) {
				var _this = this;
				var cardUid = $this.data("card-uid");
				var $elementByUid = $("[data-card-uid=\""+cardUid+"\"]");
				console.log('Dentro do setContent');
				if (!$this.data("loaded")) {
					console.log('Dentro do loaded do setContent');
					$.ajax({
					    beforeSend: _this.settings.beforeSend,
					    dataType: "json",
					    url: this.settings.endPoint.replace('{id}', cardUid),
					    success: function(data) {
					        console.log(data);
					        _this.image = data.card[_this.settings.field];

							$("<img/>")
								.css({
									"height": _this.settings.imageSize + "px",
									// "width": (_this.settings.previewSize * _this.ratio)
								})
								.attr("src", _this.image)
								.load(function(){
									var that = $(this);

									$elementByUid.each(function(){
										$(this).attr({
											"data-content": that.prop("outerHTML")
										});
									});

									if ($(_this.element).hasClass('popover-opened')) {
										$(_this.element).popover('show');
									}
								});
							$elementByUid.data({
								"loaded": true
							});
					    }
					});
				}
			},
			setRarityColor: function(){
				var rarity = $(this.element).data("rarity");
				$(this.element)
					.css("color", this.settings.rarityColors[rarity]);
				// console.log(rarity);
			}
		} );

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function( options ) {
			return this.each( function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
					$.data( this, "plugin_" +
						pluginName, new Plugin( this, options ) );
				}
			} );
		};

} )( jQuery, window, document );
