/**
 *	Gourmand Callback Function
 *
 *  @creaded    october 11, 2017
 *  @updated    october 11, 2017
 *
 *  @package 	Gourmand
 *  @since      Gourmand 0.0.2
 *  @version    0.0.1
 */

function gourmand_callback( callback, args ){
	(function( c, p ){
        try{
            c( p );
        } catch( e ){
            if ( e instanceof SyntaxError ){
                console.log( ( e.message ) );
            }
        }
    })( callback, args );
}


/**
 *	Gourmand Media Upload
 *
 *  @creaded    october 11, 2017
 *  @updated    october 11, 2017
 *
 *  @package 	Gourmand
 *  @since      Gourmand 0.0.2
 *  @version    0.0.1
 */

var gourmand_media_uploader = function( args, callback ){
	jQuery(function($){

		var custom_uploader;

		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		custom_uploader = wp.media({
			title: 'Choose Image',	// args.media.title
			button: {
				text: 'Choose Image' // args.media.button
			},
			multiple: false,
			library: {
                type: [ 'image', 'video', 'audio' ] // args.media.type video | image ( from registred setting )
            }
		});

		custom_uploader.on( 'select', function() {
			var data = custom_uploader.state().get('selection').first().toJSON();

			if( typeof args === "object" ){

				args.attachment = data;

				if( typeof callback === "function" ){
					gourmand_callback( callback, args );
				}
			}
			else{
				console.log( 'MISSING ARGS [ OBJECT TYPE ARGS ]:', typeof args, args );
			}
		});

		custom_uploader.open();
	});
}
