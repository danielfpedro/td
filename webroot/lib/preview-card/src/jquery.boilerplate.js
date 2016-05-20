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
		function Plugin ( element, options ) {
			this.element = element;

			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;

			this.ratio = .7;

			this.init();

		}

		// Avoid Plugin.prototype conflicts
		$.extend( Plugin.prototype, {
			init: function() {
				
				this.popoverOpened = false;
				this.img = '';

				// Place initialization logic here
				// You already have access to the DOM element and
				// the options via the instance, e.g. this.element
				// and this.settings
				// you can add more functions like the one below and
				// call them like the example below
				var _this = this;
				this.popoverOptions = {
					"trigger": "hover",
					html: true,
					content: "<div class=\"loader-container\"><div class=\"loader\"></div></div>",
					placement: "top",
					template: '<div class="popover custom-popover" role="tooltip"><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
				};

				$(this.element).popover(this.popoverOptions);

				$(this.element).click(function(){
					var $this = $(this);
					var cardUid = $this.data("card-uid");
					$(this).popover("hide");

					_this.openModal();
					if (!$this.data('image')) {
						$('.my-modal-body').css('background-image', 'none').html('<div class="my-modal-body-loading">Carregando</div>');
						$.ajax({
						    beforeSend: _this.settings.beforeSend,
						    dataType: "json",
						    url: _this.settings.endPoint.replace('{id}', cardUid),
						    success: function(data) {
						        console.log(data);
						        _this.image = data[0][_this.settings.field];

						        $this.data('image', data[0][_this.settings.field]);

						        $('[data-card-uid="'+cardUid+'"]').each(function(){
						        	$(this).data('image', data[0][_this.settings.field]);
						        });

						        $('.my-modal-body').html('').css('background-image', 'url("'+_this.image+'")');
						    },
						});
					} else {
						$('.my-modal-body').html('').css('background-image', 'url("'+$this.data('image')+'")');
					}
					return false;
				});

				$(document).on('click', '.my-modal-close', function(){
					_this.closeModal();
				});

				$('.overlay').click(function(){
					_this.closeModal();
				});

				this.togglePopoverBasedMediaQuery();
				$(window).resize(function(){
					_this.togglePopoverBasedMediaQuery();
				});

				this.setElementInitialSettings();
				this.setRarityColor();
			},
			togglePopoverBasedMediaQuery: function(){
				var _this = this;
				var documentWidth = $(window).width();
				if (documentWidth <= this.settings.xsBreakpoint) {
					$(this.element).popover('destroy');
				} else {
					/**
					 * Importantissimo este destroy para noa acumular quando faz o resize
					 */
					$(this.element).popover('destroy');
					$(this.element).popover(this.popoverOptions);

					$(this.element).on("shown.bs.popover", function () {
						// console.log("On show");
						$(_this.element).addClass('popover-opened');
						_this.setContent($(this));
					});
					$(this.element).on("hidden.bs.popover", function () {
						// console.log("On show");
						$(_this.element).removeClass('popover-opened');
						_this.setContent($(this));
					});
				}
			},
			closeModal: function(){
				this.modalOpened = false;
				$('.overlay').fadeOut('fast');
			},
			openModal: function() {
				this.modalOpened = true;
				$('.overlay').fadeIn('fast');
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
					        _this.image = data[0][_this.settings.field];

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
