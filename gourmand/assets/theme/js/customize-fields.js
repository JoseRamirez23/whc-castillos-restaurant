/**
 *	Setup and Init Customize Fields:
 *
 *	uploader
 *	tab
 *	to do: number
 *	to do: int
 *	to do: natural
 *	to do: range
 *	to do: percent
 *	to do: gmap
 *	to do: slide
 *
 *  @creaded    october 11, 2017
 *  @updated    october 11, 2017
 *
 *  @package 	Gourmand
 *  @since      Gourmand 0.0.2
 *  @version    0.0.1
 */


/**
 *	Setup Customize Uploader
 */

var gourmand_customizer_uploader = function(callback){

	/**
	 *	Upload Function
	 */

	var gourmand_upload = function( src, id ){
		new gourmand_media_uploader({
			'src' 	: src,
			'id'	: id
		}, callback );
	}

	jQuery(function(){

		/**
		 *	Init Upload Buttons
		 */

		jQuery( 'div.gourmand-attachment-view button.upload-button.gourmand-upload-button' ).on( 'click', function(event){

			event.preventDefault();

			var

			src = jQuery( this ).attr( 'data-uploader-src' ),
			id 	= jQuery( this ).attr( 'data-uploader-id' );

			gourmand_upload( src, id );
		});

		/**
		 *	Init Remove Buttons
		 */

		jQuery( 'div.gourmand-attachment-view button.upload-button.gourmand-remove-button' ).on( 'click', function(event){

            event.preventDefault();

			var

			src = jQuery( this ).attr( 'data-uploader-src' ),
			id 	= jQuery( this ).attr( 'data-uploader-id' ),

			preview 		= 'div.gourmand-attachment-view div.gourmand-preview#gourmand-preview-' + src,
			image 			= 'div.gourmand-attachment-view div.gourmand-preview#gourmand-preview-' + src + ' img',
			place_holder 	= 'div.gourmand-attachment-view div.gourmand-place-holder#gourmand-place-holder-' + src,
			button_select	= 'div.gourmand-attachment-view button.upload-button.gourmand-upload-button[data-uploader-src="' + src + '"] span.select-file',
			button_change	= 'div.gourmand-attachment-view button.upload-button.gourmand-upload-button[data-uploader-src="' + src + '"] span.change-file';


			/**
			 *	Remove Values From Fields
			 */

			jQuery( 'div.gourmand-attachment-view input[data-customize-setting-link="' + src + '"]' ).val( '' ).trigger('change');
			jQuery( 'div.gourmand-attachment-view input[data-customize-setting-link="' + id + '"]' ).val( 0 ).trigger('change');

			/**
			 *	Reset Image Preview
			 */

			jQuery( image ).attr( "src", '' );

			if( !jQuery( preview ).hasClass( 'hidden' ) )
				jQuery( preview ).addClass( 'hidden' );

			/**
 			 *	Reset place_holder
 			 */

			if( jQuery( place_holder ).hasClass( 'hidden' ) )
 				jQuery( place_holder ).removeClass( 'hidden' );

			/**
 			 *	Reset Buttons
 			 */

			if( jQuery( button_select ).hasClass( 'hidden' ) )
  				jQuery( button_select ).removeClass( 'hidden' );

			if( !jQuery( button_change ).hasClass( 'hidden' ) )
				jQuery( button_change ).addClass( 'hidden' );

			if( !jQuery( this ).hasClass( 'hidden' ) )
				jQuery( this ).addClass( 'hidden' );
		});
	});
}


/**
 *	Customize Uploader
 */

new gourmand_customizer_uploader(function(args){

	jQuery(function(){

		/**
		 *	Set the src for customizer input with src link and reset:
		 *
		 *	Image Preview
		 *	place_holder
		 *	Buttons
		 */

		if( args.hasOwnProperty( 'src' ) ){
			jQuery( 'div.gourmand-attachment-view input[data-customize-setting-link="' + args.src + '"]' ).val( args.attachment.url ).trigger('change');

			var

			preview 		= 'div.gourmand-attachment-view div.gourmand-preview#gourmand-preview-' + args.src,
			image 			= 'div.gourmand-attachment-view div.gourmand-preview#gourmand-preview-' + args.src + ' img',
			video 			= 'div.gourmand-attachment-view div.gourmand-preview#gourmand-preview-' + args.src + ' video',
			place_holder 	= 'div.gourmand-attachment-view div.gourmand-place-holder#gourmand-place-holder-' + args.src,
			button_select	= 'div.gourmand-attachment-view button.upload-button.gourmand-upload-button[data-uploader-src="' + args.src + '"] span.select-file',
			button_change	= 'div.gourmand-attachment-view button.upload-button.gourmand-upload-button[data-uploader-src="' + args.src + '"] span.change-file',
			button_remove	= 'div.gourmand-attachment-view button.upload-button.gourmand-remove-button[data-uploader-src="' + args.src + '"]';


			/**
			 *	Reset Image Preview
			 */

			if( args.attachment.type == 'video' ){
				jQuery( image ).attr( "src", '' );
				jQuery( video ).find('source').attr( "src", args.attachment.url );
				jQuery( video ).find('source').attr( "type", args.attachment.mime );

				if( jQuery( video ).hasClass( 'hidden' ) )
					jQuery( video ).removeClass( 'hidden' );

				if( !jQuery( image ).hasClass( 'hidden' ) )
					jQuery( image ).addClass( 'hidden' );
			}

			else{
				jQuery( image ).attr( "src", args.attachment.url );
				jQuery( video ).find('source').attr( "src", '' );
				jQuery( video ).find('source').attr( "type", '' );

				if( !jQuery( video ).hasClass( 'hidden' ) )
					jQuery( video ).addClass( 'hidden' );

				if( jQuery( image ).hasClass( 'hidden' ) )
					jQuery( image ).removeClass( 'hidden' );
			}

			if( jQuery( preview ).hasClass( 'hidden' ) )
				jQuery( preview ).removeClass( 'hidden' );

			/**
 			 *	Reset place_holder
 			 */

			if( !jQuery( place_holder ).hasClass( 'hidden' ) )
 				jQuery( place_holder ).addClass( 'hidden' );

			/**
 			 *	Reset Buttons
 			 */

			if( !jQuery( button_select ).hasClass( 'hidden' ) )
  				jQuery( button_select ).addClass( 'hidden' );

			if( jQuery( button_change ).hasClass( 'hidden' ) )
				jQuery( button_change ).removeClass( 'hidden' );

			if( jQuery( button_remove ).hasClass( 'hidden' ) )
				jQuery( button_remove ).removeClass( 'hidden' );
		}

		/**
		 *	Set the id for customizer input with id link
		 */

		if( args.hasOwnProperty( 'id' ) ){
			jQuery( 'div.gourmand-attachment-view input[data-customize-setting-link="' + args.id + '"]' ).val( args.attachment.id ).trigger('change');
		}
	});
});

/**
 *	Uploader Class
 */
var gourmand_uploader_class = function(callback){

	/**
	 *	Setup Upload Function
	 */

	var gourmand_upload = function( el ){
		new gourmand_media_uploader({
			'el' : el
		}, callback );
	}

	var init = function( selector ){
		jQuery(function(){

			/**
			 *	Init Upload Actions
			 */

			jQuery( selector ).each(function(){
				var self = this;

				jQuery( self ).find( 'input[type="button"]' ).on( 'click', function(event){

					event.preventDefault();

					gourmand_upload( self );
				});
			});
		});
	}

	init( 'div.mythemes-field.mythemes-upload' );
}

/**
 *	Uploader Class Instance
 */

new gourmand_uploader_class(function(args){
	jQuery(function(){
		if( args.hasOwnProperty( 'el' ) ){
			jQuery( args.el ).find( 'input[type="url"]' ).val( args.attachment.url );
		}
	});
});



;(function( $ ){
	$.fn.hasAttr = function( name ){
   		return this.attr( name ) !== undefined;
	};

})( jQuery );

/**
 *	Gourmand Html
 */
var gourmand_html = {
	in_array : function( key, array ){

    	var i = array.length;
    	while( i-- ){
        	if ( array[ i ] === key ) {
            	return true;
        	}
    	}
    	return false;
	},

	// is selected
	is_selected : function( selector, args ){

		var self 	= this;

		jQuery(document).ready(function(){

			var show 	= [];
	        var hide 	= [];

	        jQuery( selector ).find( 'option' ).each(function(){
	            if( jQuery( this ).is(':selected') ){
	                var val = jQuery( this ).val().trim();

	                if( args.hasOwnProperty( 'show' ) ){
	                	show = args.show;
	                }

	                if( args.hasOwnProperty( 'hide' ) ){
	                	hide = args.hide;
	                }

	                for ( var key in args ) {

	                    if( key == val ){
	                        if( args[ key ].hasOwnProperty( 'show' ) ){
	                            for( var i = 0; i < args[ key ].show.length; i++ ){
	                            	if( !self.in_array( args[ key ].show[ i ], show ) ){
	                            		show[ show.length ] = args[ key ].show[ i ];
	                            	}
	                            	if( self.in_array( args[ key ].show[ i ], hide ) ){
	                            		hide.splice( hide.indexOf( args[ key ].show[ i ] ) , 1 );
	                            	}
	                            }
	                        }
	                        if( args[ key ].hasOwnProperty( 'hide' ) ){
	                            for( var i = 0; i < args[ key ].hide.length; i++ ){
	                            	if( !self.in_array( args[ key ].hide[ i ], hide ) ){
	                            		hide[ hide.length ] = args[ key ].hide[ i ];
	                            	}
	                            	if( self.in_array( args[ key ].hide[ i ], show ) ){
	                            		show.splice( show.indexOf( args[ key ].hide[ i ] ) , 1 );
	                            	}
	                            }
	                        }
	                        if( !args[ key ].hasOwnProperty( 'show' ) && !args[ key ].hasOwnProperty( 'hide' ) ){
	                            for( var i = 0; i < args[ key ].length; i++ ){
	                            	if( !self.in_array( args[ key ][ i ], show ) ){
	                            		show[ show.length ] = args[ key ][ i ];
	                            	}
	                            	if( self.in_array( args[ key ][ i ], hide ) ){
	                            		hide.splice( hide.indexOf( args[ key ][ i ] ) , 1 );
	                            	}
	                            }
	                        }
	                    }
	                    else{
	                        if( args[ key ].hasOwnProperty( 'hide' ) ){
	                            for( var i = 0; i < args[ key ].hide.length; i++ ){
	                            	if( !self.in_array( args[ key ].hide[ i ], show ) ){
	                            		hide[ hide.length ] = args[ key ].hide[ i ];
	                            	}
	                            }
	                        }
	                    }
	                }
	            }
	        });

			if( hide.length ){
				jQuery( hide.toString() ).hide( 'slow' );
			}

			if( show.length ){
				jQuery( show.toString() ).show( 'slow' );
			}
		});
	}
};


/**
 *	Logic Slide
 */

jQuery(function(){
	if( typeof gourmand_customize_fields == 'object' && gourmand_customize_fields.hasOwnProperty( 'url' ) ){
	    if( jQuery( 'li#accordion-section-themes' ).length ){
	        jQuery( 'li#accordion-section-themes' ).append(
	            '<a href="' + gourmand_customize_fields.url + '" title="' + gourmand_customize_fields.label + '" class="mythemes-btn upgrade-pro-btn">' +
	            '<i class="gourmand-icon-publish"></i> ' + gourmand_customize_fields.label +
	            '<small>' + gourmand_customize_fields.desc +'</small>' +
	            '</a>'
	        );
	    }
	}

	jQuery( '.mythemes-input-logic' ).each(function(){
		jQuery( this ).click(function(){

			if( jQuery( this ).hasClass( 'is-on' ) ){
				jQuery( this ).removeClass( 'is-on' );
				jQuery( this ).addClass( 'is-off' );

				if( jQuery( this ).hasAttr( 'data-action' ) ){
					jQuery( jQuery( this ).attr( 'data-action' ) ).hide( 'slow' );
				}

				jQuery( this ).find( 'input' ).val( 0 );
			}
			else{
				jQuery( this ).removeClass( 'is-off' );
				jQuery( this ).addClass( 'is-on' );

				if( jQuery( this ).hasAttr( 'data-action' ) ){
					jQuery( jQuery( this ).attr( 'data-action' ) ).show( 'slow' );
				}

				jQuery( this ).find( 'input' ).val( 1 );
			}
		});
	});
});

/**
 *	Range, Percent, Int and Number
 */
jQuery(function(){
	jQuery( 'div.gourmand-field-wrapper' ).each(function(){
		var

		self 	= this,
		link 	= jQuery( self ).find( 'a' ),
		input 	= jQuery( self ).find( 'input[type="number"]' ),
		range 	= jQuery( self ).find( 'input[type="range"]' );

		// Reset Link
		jQuery( link ).on( 'click', function(event){

			event.preventDefault();

			var value = null;

			if( jQuery( input ).hasAttr( 'data-default' ) )
				value = jQuery( input ).attr( 'data-default' );

			jQuery( input ).val( value );

			if( !jQuery( range ).length ){
				jQuery( input ).trigger('change');
			}

			else{
				jQuery( range ).val( value ).trigger('change');
			}
		});

		if( jQuery( range ).length ){

			// Change Input
			jQuery( input ).on( 'change', function(){
				var value = jQuery( this ).val();
				jQuery( range ).val( value ).trigger('change');
				//jQuery( range ).slider('refresh');
			});

			// Change Range
			jQuery( range ).on( 'change', function(){
				var value = jQuery( this ).val();
				jQuery( input ).val( value );
			});
		}
	});
});


/**
 *	Icon
 */

jQuery(function(){
	jQuery( 'div.customize-icon-wrapper' ).each(function(){
		jQuery( this ).find( 'span.selected-icon' ).click(function(){

			var

			self 	= jQuery( this ).parent( 'div.customize-icon-wrapper' ),
			wrapper = jQuery( self ).find('div.icons-wrapper' );

			// Enable Icons Wrapper
			if( !jQuery( wrapper ).hasClass( 'enabled' ) ){
				jQuery( wrapper ).addClass( 'enabled' );
			}

			// Close Icons Panel
			jQuery( wrapper ).find('div.header a[data-action="close"]').click(function(event){

				event.preventDefault();

				if( jQuery( wrapper ).hasClass( 'enabled' ) ){
					jQuery( wrapper ).removeClass( 'enabled' );
				}
			});

			// Search Icons
			jQuery( wrapper ).find('div.header input[type="search"]').on('focusin', function(){
				jQuery( this ).on('keyup', function(){
					var search = jQuery( this ).val();
					jQuery( wrapper ).find('div.content span.icon-wrapper').hide();
					jQuery( wrapper ).find('div.content span.icon-wrapper i[class^="gourmand-icon-' + search + '"]').parent( 'span.icon-wrapper' ).show();
				});
			});

			// Choose Icon
			jQuery( wrapper ).find('div.content span.icon-wrapper').click(function(){

				var attr = jQuery( this ).find('i').attr( 'class' );

				if( !jQuery( this ).hasClass( 'selected' ) ){
					jQuery( wrapper ).find('div.content span.icon-wrapper').removeClass( 'selected' );
					jQuery( this ).addClass( 'selected' );
				}

				jQuery( self ).find( 'span.selected-icon i' ).attr({ 'class' : attr });
				jQuery( self ).find( 'input[type="hidden"]' ).val( attr ).trigger('change');

				if( jQuery( wrapper ).hasClass( 'enabled' ) ){
					jQuery( wrapper ).removeClass( 'enabled' );
				}
			});
		});
	});
});

/**
 *	Hex Color
 */

jQuery(function(){
	jQuery( 'input.gourmand-color-picker-hex, input.mythemes-pickcolor' ).each(function(){
		var self = this;
		jQuery( self ).wpColorPicker({
			change: function( event ){
				setTimeout(function(){
   					jQuery( self ).trigger( 'change' );
				},100);
			}
		});
	});
});

/**
 *	Customize Tabs
 */

jQuery(function(){
	jQuery( 'div.gourmand-tab' ).each(function(i){
		jQuery( this ).find( 'div.gourmand-tab-head' ).on( 'click', function(event){

			event.preventDefault();

			var self 	= jQuery( this ).parent().parent();
			var tabs 	= jQuery( this ).parent().parent().parent().children( 'li.customize-control.customize-control-tab' );
			var ctabs 	= jQuery( this ).parent().parent().parent().children( 'li.customize-control.customize-control-child_tab' );

			var hidden_tabs = function(i){
				if( self !== this ){
					if( !jQuery( this ).children( 'div.gourmand-tab' ).hasClass( 'collapsed' ) ){
						jQuery( this ).children( 'div.gourmand-tab' ).children( 'div.gourmand-tab-content' ).slideUp( 'fast', function(){
							jQuery( this ).parent().addClass( 'collapsed' );
						});
					}
				}
			};

			jQuery( tabs ).each(hidden_tabs);
			jQuery( ctabs ).each(hidden_tabs);

			if( !jQuery( this ).parent().hasClass( 'child-tab' ) || jQuery( this ).parent().hasClass( 'collapsed' ) ){
				jQuery( this ).parents( 'ul.customize-pane-child' ).find('li.current-tab').removeClass( 'current-tab' );
				jQuery( this ).parents( 'ul.customize-pane-child' ).find('div.gourmand-tab.active-tab').removeClass( 'active-tab' );
			}

			if( !jQuery( this ).parent().hasClass( 'collapsed' ) ){
				jQuery( this ).parent().children( 'div.gourmand-tab-content' ).slideUp( 'fast', function(){
					jQuery( this ).parent().addClass( 'collapsed' );
				});

				if( jQuery( this ).parent().hasClass( 'active-tab' ) ){
					jQuery( this ).parent().removeClass( 'active-tab' );
				}

				if( jQuery( this ).parent().hasClass( 'child-tab' ) ){
					jQuery( this ).parent().parent( 'li.customize-control.current-tab' ).removeClass( 'current-tab' );
					jQuery( this ).parent().parent( 'li.customize-control' ).parent().parent().parent().addClass( 'active-tab' );
				}

				else{
					if( jQuery( this ).parents( 'ul.customize-pane-child' ).hasClass( 'current-tab' ) ){
						jQuery( this ).parents( 'ul.customize-pane-child' ).removeClass( 'current-tab' )
					}

					jQuery( this ).parents('li').map(function(){
						if( jQuery( this ).hasClass( 'current-tab' ) ){
							jQuery( this ).removeClass( 'current-tab' );
						}
					});
				}
			}

			else{
				jQuery( this ).parent().children( 'div.gourmand-tab-content' ).slideDown( 'fast', function(){
					jQuery( this ).parent().removeClass( 'collapsed' );
				});

				if( !jQuery( this ).parent().hasClass( 'active-tab' ) ){
					jQuery( this ).parent().addClass( 'active-tab' );
				}

				if( !jQuery( this ).parents( 'ul.customize-pane-child' ).hasClass( 'current-tab' ) ){
					jQuery( this ).parents( 'ul.customize-pane-child' ).addClass( 'current-tab' )
				}

				jQuery( this ).parents('li').map(function(){
					if( !jQuery( this ).hasClass( 'current-tab' ) ){
						jQuery( this ).addClass( 'current-tab' );
					}
				});
			}
		});
	});
});


/**
 *	TinyMCE Plugin Accent Color
 */

(function() {
	if( typeof tinymce !== 'undefined' ){
		tinymce.PluginManager.add( 'accent_color', function( editor, url ) {
			// Add Button to Visual Editor Toolbar
			editor.addButton('accent_color', {
				class: 'accent-color',
				title: 'Apply Accent Color',
				cmd: 'accent_color',
				//image: '/icon.png',
			});

			editor.addCommand( 'accent_color', function(){
				// Check we have selected some text that we want to link
				var text = editor.selection.getContent({
					'format': 'html'
				});

				if ( text.length === 0 ) {
					alert( 'Please select some text to Accent.' );
					return;
				}

				// Insert selected text back into editor, wrapping it in an anchor tag
				editor.execCommand( 'mceReplaceContent', false, '<span class="accent-color">' + text.replace(/<\/?[^>]+(>|$)/g, "") + '</span>' );
			});
		});
	}
})();
