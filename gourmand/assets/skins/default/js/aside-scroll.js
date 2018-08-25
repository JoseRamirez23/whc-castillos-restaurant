/**
 *	Aside Scroll
 * 	Module
 */

var gourmand_aside_scroll = {
	_class : function(){

		////	PRIVATE VARIABLES

		this.args = {};


		////	PRIVATE FUNCTIONS

		/**
		 *	init
		 *	args, dom elements, classes,
		 *	style, scroll event
		 */

		this.init = function(){
			var self = this;

			// reset
			self.reset();

			if( self.args.content.height < self.args.aside.height )
            	return;

			// on scroll
            jQuery( window ).scroll(function(){
            	new gourmand_callback( self.on_scroll, self.args );
            });
		}


		/**
		 *	on Scroll
		 */

		this.on_scroll = function( args ){

			var

			content 		= args.content,
			aside 			= args.aside,
			wind			= args.window,
            space           = args.space,

			dom_aside   	= jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar' ),
			dom_aside_cnt	= jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar div.gourmand-sidebar' ),
	        dom_section 	= jQuery( 'div#gourmand-content-wrapper section#gourmand-content' ),

			aside_height 	= parseInt( jQuery( dom_aside_cnt ).height() ),
			section_height 	= parseInt( jQuery( dom_section ).height() ),

			top     		= jQuery( window ).scrollTop(),
            aside_set  		= jQuery( dom_aside ).offset(),
            section_set 	= jQuery( dom_section ).offset(),

            content_bottom  = aside_set.top + content.height,
            window_bottom   = top + wind.height,
            aside_bottom 	= aside_set.top + aside.height;

			/**
			 *	The content is smaller than
			 * 	the aside sidebar content
			 */

			if( section_height < aside_height ){
				return;
			}

			/**
			 *	Less Top Scroll Position relative to
			 *	Content Top Position
			 */

			if( parseInt( section_set.top ) > parseInt( top ) ){
				if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) ){
					jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'absolute' );
				}

				if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) ){
					jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'fixed' )
				}

				return;
			}

            /**
             *	Bottom side of browser window is between of
             *	bottom side of aside and bottom side of content
             */

            if( aside_bottom < window_bottom && window_bottom < content_bottom ){

            	// clean sidebar content class ( vertical align bottom )
                if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'absolute' ) )
                    jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'absolute' );


                /**
                 *	The window height is bigger
                 *	than aside height
                 */

                if( wind.height > aside.height ){

                	/**
                	 *	Start the aside scroll
                	 *	by adding classes
                	 */

                    if( section_set.top - top < space ){
                        if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) ){

                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'fixed' ).css({
                                'width' : aside.width + 'px'
                            });

                            if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'small-height' ) )
                                jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'small-height' );
                        }
                    }


                    /**
                     *	End the aside scroll
                     *	by removing classes
                     */

                    else{
                        if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'fixed' );

                        if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'small-height' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'small-height' );
                    }
                }


                /**
                 *	The window height is smaller
                 *	than aside height
                 */

                else{

                	/**
                	 *	Start the aside scroll
                	 *	by adding classes
                	 */

                    if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) ){
                        jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'fixed' ).css({
                            'width' : aside.width + 'px'
                        });

                        if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'large-height' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'large-height' );
                    }
                }
            }


			/**
             *	Bottom side of browser window is
             *	below content bottom side
             */

            else if( content_bottom < window_bottom ){

                if( wind.height > aside.height ){

                	/**
	                 *	Vertical align Aside
	                 *	content to bottom
	                 */

                    if( content_bottom - (top + aside.height + space) < 0 ){

                    	// clean sidebar content class ( effect scroll )
                        if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'fixed' );


                        if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'absolute' ) ){
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'absolute' ).css({
                                'width' : aside.width + 'px'
                            });
                        }
                    }


                    /**
                     *	Restart aside scroll
                     */

                    else{
                    	// clean sidebar content class ( vertical align bottom )
                    	if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'absolute' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'absolute' );


                        if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) )
                            jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'fixed' ).css({
	                            'width' : aside.width + 'px'
	                        });
                    }
                }


                /**
                 *	Vertical align Aside
                 *	content to bottom
                 */

                else{

                	// clean sidebar content class ( effect scroll )
                    if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) )
                        jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'fixed' );


                    if( !jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'absolute' ) ){
                        jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).addClass( 'absolute' ).css({
                            'width' : aside.width + 'px'
                        });
                    }
                }
            }


            // Reset aside DOM Elements and clen style

            else{

                if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'fixed' ) )
                    jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'fixed' );

                if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'small-height' ) )
                    jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'small-height' );

                if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'large-height' ) )
                    jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'large-height' );

                if( jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).hasClass( 'absolute' ) )
                    jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeClass( 'absolute' );

                jQuery( dom_aside ).find( 'div.gourmand-sidebar' ).removeAttr( 'style' );
            }
		}


		/**
		 *	reset
		 *	args, classes, style
		 */

		this.reset = function( scroll ){

			var

            space           = 20,
			aside_width	 	= parseInt( jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar' ).width() ),
			aside_height	= parseInt( jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar div.gourmand-sidebar' ).height() ),
			content_height 	= parseInt( jQuery( 'div#gourmand-content-wrapper section#gourmand-content' ).height() ),
			wind_height		= parseInt( jQuery( window ).height() );

            // reset top space for admin bar
            if( jQuery('body').hasClass( 'admin-bar' ) ){
                var space = 20 + parseInt( jQuery( 'div#wpadminbar' ).height() );
            }


			// init args
			this.args = {
				content	: {
					height 	: content_height,
				},
				aside 	: {
					height 	: aside_height,
					width 	: aside_width
				},
				window 	: {
					height 	: wind_height
				},
                space   : space
			}


			// init DOM Elements ( section and aside )
	        var dom_aside   = jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar' );
	        var dom_section = jQuery( 'div#gourmand-content-wrapper section#gourmand-content' );


	        // reset aside classes
	        if( jQuery( dom_aside ).find( 'div.sidebar-content' ).hasClass( 'fixed' ) )
                jQuery( dom_aside ).find( 'div.sidebar-content' ).removeClass( 'fixed' );

            if( jQuery( dom_aside ).find( 'div.sidebar-content' ).hasClass( 'small-height' ) )
                jQuery( dom_aside ).find( 'div.sidebar-content' ).removeClass( 'small-height' );

            if( jQuery( dom_aside ).find( 'div.sidebar-content' ).hasClass( 'large-height' ) )
                jQuery( dom_aside ).find( 'div.sidebar-content' ).removeClass( 'large-height' );

            if( jQuery( dom_aside ).find( 'div.sidebar-content' ).hasClass( 'absolute' ) )
                jQuery( dom_aside ).find( 'div.sidebar-content' ).removeClass( 'absolute' );


            // reset aside style
            jQuery( dom_aside ).removeAttr( 'style' );
            jQuery( dom_aside ).find( 'div.sidebar-content' ).removeAttr( 'style' );


            // reset aside height
			if( content_height > aside_height )
				jQuery( dom_aside ).css({ 'height' : content_height + 'px' });


			/**
			 *	After hard reset do a fake
			 *	scroll with the new args
			 */

			if( scroll )
				this.on_scroll( this.args );
		}


		/**
		 *	Initialize Aside Scroll
		 */

		this.init();
	}
}

////	TEMPO ASIDE SCROLL MODULE

jQuery(function(){

    var aside_scroll;

    if( jQuery( 'div#gourmand-content-wrapper aside#gourmand-sidebar' ).length ){

        // initialize aside scroll
        setTimeout(function(){
            aside_scroll = new gourmand_aside_scroll._class();
        }, 1500);

        // reset on resize browser window
        jQuery(window).resize(function(){
            setTimeout(function(){
                aside_scroll.reset( true );
            }, 1500);
        });
    }
});
