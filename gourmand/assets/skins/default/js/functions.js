/* PARALLAX */
;(function($){
    $.fn.parallax = function () {
        var window_width = $(window).width();
        // Parallax Scripts
        return this.each(function(i) {
            var $this = $(this);
            $this.addClass('wp-custom-header');

            function updateParallax(initial) {
                var container_height;
                if (window_width < 601) {
                    container_height = ($this.height() > 0) ? $this.height() : $this.children("img").height();
                }
                else {
                    container_height = ($this.height() > 0) ? $this.height() : 500;
                }

                var $img = $this.children("img").first();
                var img_height = $img.height();
                var parallax_dist = img_height - container_height;

                var bottom = $this.offset().top + container_height;
                var top = $this.offset().top;
                var scrollTop = $(window).scrollTop();
                var windowHeight = window.innerHeight;
                var windowBottom = scrollTop + windowHeight;
                var percentScrolled = (windowBottom - top) / (container_height + windowHeight);
                var parallax = Math.round((parallax_dist * percentScrolled));

                if (initial) {
                    $img.css('display', 'block');
                }

                if ((bottom > scrollTop) && (top < (scrollTop + windowHeight))) {
                    $img.css('transform', "translate3D(-50%," + parallax + "px, 0)");

                    if( $img.hasClass( 'not-transform' ) ){
                        $img.css( 'transform', 'initial' );
                    }
                }
            }

            //- Wait for image load -//
            $this.children("img").one( 'load', function(){
                updateParallax(true);
            }).each(function() {
                if( this.complete ){
                    $( this ).load();
                }
            });

            $(window).scroll(function() {
                window_width = $(window).width();
                updateParallax(false);
            });

            $(window).resize(function() {
                window_width = $(window).width();
                updateParallax(false);
            });
        });
    };
}(jQuery));

(function($){
    jQuery(function(){
        gourmand_images.loaded( '.wp-custom-header', function(){
            jQuery('.wp-custom-header').parallax();
        });
    });
})(jQuery);


var gourmand_filters = [];

function gourmand_add_filter( id, callback )
{
	if( typeof callback == 'function' )
		gourmand_filters[ id ] = callback;
}

function gourmand_apply_filter( id, rett, args )
{
	if( typeof gourmand_filters[ id ] == 'function' ){
		var callback = gourmand_filters[ id ];
		rett = callback( rett, args );
	}

	return rett;
}

/**
 *  Chef Menu - Slick Slideshow
 */

jQuery(function(){
    jQuery( 'section.gourmand-dishes div.content-inner' ).each(function(){
        var self = this;

        if( jQuery( self ).hasClass( 'sync-time' ) ){
            jQuery( self ).on('init', function( slick ){
                var height = jQuery( this ).height();
                jQuery( this ).find( 'div.item-col' ).outerHeight( height );
            });
        }

        if( jQuery( self ).hasClass( 'cols-3' ) ){

            var

            is1 = 0,
            is2 = 0;

            if( jQuery( self ).hasClass( 'sync-time' ) ){
                var is = jQuery( self ).find( 'div.item-col.active-now' ).index();

                is1 = is;
                is2 = is;
            }

            jQuery( self ).slick({
                centerMode: false,
                focusOnSelect: false,
                initialSlide: 0,
                infinite: false,
                centerPadding: '0px',
                slidesToShow: 3,
                arrows: false,
                dots : true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1281,
                    settings: {
                        initialSlide: is1,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 941,
                    settings: {
                        initialSlide: is2,
                        slidesToShow: 1
                    }
                }]
            });
        }

        else if( jQuery( self ).hasClass( 'cols-2' ) ){

            var is = 0;

            if( jQuery( self ).hasClass( 'sync-time' ) ){
                is = jQuery( self ).find( 'div.item-col.active-now' ).index();
            }

            jQuery( self ).slick({
                centerMode: false,
                focusOnSelect: false,
                initialSlide: 0,
                infinite: false,
                centerPadding: '0px',
                slidesToShow: 2,
                arrows: false,
                dots : true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 941,
                    settings: {
                        initialSlide: is,
                        slidesToShow: 1
                    }
                }]
            });
        }

        else if( jQuery( self ).hasClass( 'cols-1' ) ){
            jQuery( self ).slick({
                centerMode: false,
                focusOnSelect: false,
                initialSlide: 0,
                infinite: false,
                centerPadding: '0px',
                slidesToShow: 1,
                arrows: false,
                dots : true,
                adaptiveHeight: true
            });
        }

        else{
            var

            is1 = 0,
            is2 = 0,
            is3 = 0;

            if( jQuery( self ).hasClass( 'sync-time' ) ){
                var t   = jQuery( self ).find( 'div.item-col' ).length;
                var is  = jQuery( self ).find( 'div.item-col.active-now' ).index();


                if( is > 1 )
                    is1 = is - 1;

                if( t == is + 1 )
                    is1 = is - 2;

                is2 = is;
                is3 = is;
            }

            jQuery( self ).slick({
                centerMode: false,
                focusOnSelect: false,
                initialSlide: is1,
                infinite: false,
                centerPadding: '0px',
                slidesToShow: 3,
                arrows: false,
                dots : true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1281,
                    settings: {
                        initialSlide: is2,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 941,
                    settings: {
                        initialSlide: is3,
                        slidesToShow: 1
                    }
                }]
            });
        }
    });

    jQuery( 'section.testimonials div.content-inner' ).slick({
        centerMode: false,
        focusOnSelect: false,
        initialSlide: 0,
        infinite: false,
        centerPadding: '0px',
        slidesToShow: 1,
        arrows: false,
        dots : true,
        fade: true,
        adaptiveHeight: true
    });
});

jQuery(function(){
    var gourmand_links_scroll = function(){
        var href = jQuery( this ).attr( 'href' );

        if( '#' !== href.substring( 0, 1 ) )
            return;

        if( jQuery( href ).length ){

            jQuery(this).click(function( e ){

                e.preventDefault();

                var

                top         = 0,
                position    = jQuery( href ).offset();

                var gourmand_top_scroll = function(){

                    var width = parseInt( jQuery(window).width() );

                    top = gourmand_apply_filter( 'gourmand_top_scroll', parseInt( position.top ), width );
                }

                gourmand_top_scroll();

                jQuery( window ).resize( gourmand_top_scroll );

                jQuery('html, body').animate({
                    scrollTop: parseInt( top )
                }, 1000);
            });
        }
    };

    jQuery( 'a' ).each( gourmand_links_scroll );
});

jQuery(function(){
    var gourmand_tools = function( event ){

        event.preventDefault();

        var do_action = false;

        var gourmand_tools_width = function(){

            var width = parseInt( jQuery(window).width() );

            if( width <= 1024 )
                do_action = true;
        }

        gourmand_tools_width();

        jQuery( window ).resize( gourmand_tools_width );

        var self    = this;
        var parent  = jQuery( self ).parent();

        if( jQuery( self ).hasClass( 'gourmand-popup-active' ) || !do_action )
            return;

        jQuery( 'body' ).css({ 'overflow' : 'hidden' });

        jQuery(
            '<div class="gourmand-shadow-wrapper">' +
            '<div class="gourmand-shadow-inner">' +
            '<div class="gourmand-shadow"></div>' +
            '<div class="gourmand-popup"></div>' +
            '</div>' +
            '</div>'
        ).appendTo( parent );

        jQuery( self ).clone().appendTo( jQuery( parent ).find( 'div.gourmand-popup' ) );

        if( !jQuery( 'div.gourmand-shadow' ).hasClass( 'gourmand-visible' ) )
            jQuery( 'div.gourmand-shadow' ).addClass( 'gourmand-visible' );

        if( !jQuery( 'div.gourmand-popup' ).hasClass( 'gourmand-visible' ) )
            jQuery( 'div.gourmand-popup' ).addClass( 'gourmand-visible' );

        if( !jQuery( 'div.gourmand-shadow' ).hasClass( 'gourmand-effect' ) )
            jQuery( 'div.gourmand-shadow' ).addClass( 'gourmand-effect' );

        if( !jQuery( 'div.gourmand-popup' ).hasClass( 'gourmand-effect' ) )
            jQuery( 'div.gourmand-popup' ).addClass( 'gourmand-effect' );

        jQuery( 'div.gourmand-shadow' ).on( 'click', function(){

            jQuery( 'div.gourmand-shadow' ).removeClass( 'gourmand-effect' );
            jQuery( 'div.gourmand-popup' ).removeClass( 'gourmand-effect' );

            jQuery( 'div.gourmand-shadow' ).removeClass( 'gourmand-visible' );
            jQuery( 'div.gourmand-popup' ).removeClass( 'gourmand-visible' );

            jQuery( parent ).find( 'div.gourmand-shadow-wrapper' ).remove();

            jQuery( self ).removeClass( 'gourmand-popup-active' );

            jQuery( 'body' ).css({ 'overflow' : 'initial' });
        });
    }

    jQuery( 'a.tools-address.without-url' ).on( 'click', gourmand_tools );
    jQuery( 'a.tools-phone.without-url' ).on( 'click', gourmand_tools );

    // Search Form
    var gourmand_search_form = function( event ){

        event.preventDefault();

        var self    = this;
        var parent  = jQuery( 'div.gourmand-shadow-wrapper.search-form' );

        if( jQuery( self ).hasClass( 'gourmand-popup-active' ) )
            return;

        jQuery( 'body' ).css({ 'overflow' : 'hidden' });

        if( !jQuery( parent ).hasClass( 'gourmand-visible' ) )
            jQuery( parent ).addClass( 'gourmand-visible' );

        if( !jQuery( parent ).find( 'div.gourmand-shadow' ).hasClass( 'gourmand-visible' ) )
            jQuery( parent ).find( 'div.gourmand-shadow' ).addClass( 'gourmand-visible' );

        if( !jQuery( parent ).find( 'div.gourmand-shadow' ).hasClass( 'gourmand-visible' ) )
            jQuery( parent ).find( 'div.gourmand-shadow' ).addClass( 'gourmand-visible' );

        if( !jQuery( parent ).find( 'div.gourmand-popup' ).hasClass( 'gourmand-visible' ) )
            jQuery( parent ).find( 'div.gourmand-popup' ).addClass( 'gourmand-visible' );

        if( !jQuery( parent ).find( 'div.gourmand-shadow' ).hasClass( 'gourmand-effect' ) )
            jQuery( parent ).find( 'div.gourmand-shadow' ).addClass( 'gourmand-effect' );

        if( !jQuery( parent ).find( 'div.gourmand-popup' ).hasClass( 'gourmand-effect' ) )
            jQuery( parent ).find( 'div.gourmand-popup' ).addClass( 'gourmand-effect' );

        jQuery( parent ).find( 'div.gourmand-shadow' ).on( 'click', function(){

            jQuery( parent ).find( 'div.gourmand-shadow' ).removeClass( 'gourmand-effect' );
            jQuery( parent ).find( 'div.gourmand-popup' ).removeClass( 'gourmand-effect' );

            jQuery( parent ).find( 'div.gourmand-shadow' ).removeClass( 'gourmand-visible' );
            jQuery( parent ).find( 'div.gourmand-popup' ).removeClass( 'gourmand-visible' );

            jQuery( parent ).removeClass( 'gourmand-visible' );

            jQuery( self ).removeClass( 'gourmand-popup-active' );

            jQuery( 'body' ).css({ 'overflow' : 'initial' });

        });
    };

    jQuery( 'div.gourmand-navs-wrapper button.gourmand-btn-search' ).on( 'click', gourmand_search_form );
});


// Embed Responsive Video
jQuery(function(){
	var

    wrapper = jQuery( 'div.gourmand-video-wrapper' ),
    width 	= parseInt( jQuery( wrapper ).width() ),
    height 	= parseInt( width * 9/16 );

	if( wrapper.length ){

		var gourmand_video_resize = function(){

			setTimeout(function(){
				var

				wrapper = jQuery( 'div.gourmand-video-wrapper' ),
                width 	= parseInt( jQuery( wrapper ).width() ),
                height 	= parseInt( width * 9/16 );

				jQuery( wrapper ).css({ 'height' : height + 'px' });

			}, 200);
		}

		gourmand_video_resize();

		jQuery( window ).resize(function(){
			gourmand_video_resize();
		});
	}
});



/**
 *  Callback Function
 */

 ;var gourmand_callback = function( callback, args ){
    (function( c, p ) {
        try{
            c( p );
        }catch ( e ){
            if (e instanceof SyntaxError) {
                console.log( (e.message) );
            }
        }
    })( callback, args );
};


 /**
 *  Images Loaded
 *
 *  Allow to run a callback function after
 *  loading all images from a dom element
 *
 *  eg:
 *
 *  gourmand_images.loaded( '.gallery-wrapper', function(){
 *      jQuery( '.tempo-wrapper' ).masonry();
 *  });
 */

;var gourmand__images = {
    _class : function(){
        this.loaded = function( el, callback ){
            var total = jQuery( el ).find( 'img' ).length;

            if( total == 0 ){
                callback();
            }
            else{
                jQuery( el ).find( 'img' ).each(function(){
                    var image = new Image();

                    image.onload = function(){
                        total--;

                        if( total == 0 ){
                            callback();
                        }
                    }

                    image.src = jQuery( this ).attr( 'src' );
                });
            }
        }
    }
};

var gourmand_images = new gourmand__images._class();

/**
 *  Collapse Menu
 */

function gourmand_collapse_navigation( classes )
{
    jQuery(function(){
        var nav = jQuery( 'div.' + classes + '.nav-collapse' );

        if( !jQuery( nav ).hasClass( 'collapse-in' ) ){
            if( jQuery( nav ).hasClass( 'collapse-out' ) ){
                jQuery( nav ).removeClass( 'collapse-out' );
            }

            jQuery( nav ).addClass( 'collapse-in' );

            jQuery( 'body' ).css({ 'overflow' : 'hidden' });

            jQuery( nav ).find( 'div.gourmand-navigation-shadow' ).click(function(){
                if( jQuery( nav ).hasClass( 'collapse-in' ) ){
                    jQuery( nav ).addClass( 'collapse-out' ).removeClass( 'collapse-in' );
                }

                jQuery( 'body' ).css({ 'overflow' : 'initial' });
            });
        }
    });
}

/**
 *  Collapse SubMenu
 */

jQuery(function(){
    var nav = jQuery( 'div.gourmand-navigation-wrapper.nav-collapse' );

    if( jQuery( nav ).hasClass( 'collapse-submenu' ) ){
        jQuery( nav ).find( 'li.menu-item-has-children' ).prepend( '<span></span>' );

        jQuery( nav ).find( 'li.menu-item-has-children span' ).each(function(){
            jQuery( this ).on( 'click', function( event ){

                event.preventDefault();

                var li = jQuery( this ).parent( 'li' );

                if( jQuery( li ).hasClass( 'collapse-children' ) ){
                    jQuery( this ).parent( 'li' ).children( 'ul' ).slideUp( 'fast', function(){
    					jQuery( li ).removeClass( 'collapse-children' );
    				});
                }

                else{
                    jQuery( this ).parent( 'li' ).children( 'ul' ).slideDown( 'fast', function(){
    					jQuery( li ).addClass( 'collapse-children' );
    				});
                }

            });

            var a = jQuery( this ).parent( 'li' ).children( 'a' );

            jQuery( a ).on( 'click', function(){
                var href = jQuery( this ).attr( 'href' );

                if( '#' == href.substring( 0, 1 ) ){

                    event.preventDefault();

                    var li = jQuery( this ).parent( 'li' );

                    if( jQuery( li ).hasClass( 'collapse-children' ) ){
                        jQuery( this ).parent( 'li' ).children( 'ul' ).slideUp( 'fast', function(){
                            jQuery( li ).removeClass( 'collapse-children' );
                        });
                    }

                    else{
                        jQuery( this ).parent( 'li' ).children( 'ul' ).slideDown( 'fast', function(){
                            jQuery( li ).addClass( 'collapse-children' );
                        });
                    }
                }
            });
        });
    }
});

/**
 *  jQuery Tools
 *  gourmand_height    - setting a proportional height based on current width.
 *  hasAttr         - check if DOM element has an attribute
 *
 *  eg:
 *  jQuery( '.tempo-youtube-thumbnail' ).gourmand_height( 16/9 )
 */

;(function( $, window ){

    // tempo height
    $.fn.gourmand_height = function( ratio ){
        if( typeof ratio == 'undefined' || ratio == 0 )
            ratio = 16/9;

        return this.each(function(){
            if ( !$.data(this, 'ratio_instantiated' ) ){
                $.data(this, 'ratio_instantiated', (function( el, ratio ){

                    var resize = function( ratio ){
                        setTimeout(function(){
                            var

                            width   = parseInt( jQuery( el ).width() ),
                            height  = parseInt( width / ratio );

                            jQuery( el ).css({ 'height' : height + 'px' });
                        }, 100 );
                    }

                    resize( ratio );

                    // reset height on resize
                    jQuery( window ).resize(function(){
                        resize( ratio );
                    });

                })( this, ratio ));
            }
        });
    };

    $.fn.gourmand_youtube_height = function( ratio ){
        if( typeof ratio == 'undefined' || ratio == 0 )
            ratio = 16/9;

        return this.each(function(){
            if ( !$.data(this, 'ratio_instantiated' ) ){
                $.data(this, 'ratio_instantiated', (function( el, ratio ){

                    var resize = function( ratio ){
                        setTimeout(function(){
                            var

                            width   = parseInt( jQuery( el ).width() ),
                            pWidth,
                            height  = parseInt( jQuery( el ).height() ),
                            pHeight
                            $tplayer = jQuery( el ).find( '#wp-custom-header-video' );

                            $tplayer.attr('width', '100%').attr( 'height' , '100%');


                            if( width / ratio < height ){
                                pWidth = Math.ceil( height * ratio );
                                $tplayer.width(pWidth).height(height).css({
                                    'left'  : parseInt((width - pWidth) / 2),
                                    'top'   : 0
                                });
                            }
                            else{
                                pHeight = Math.ceil(width / ratio);
                                $tplayer.width(width).height( pHeight ).css({
                                    'left'  : 0,
                                    'top'   : parseInt((height - pHeight) / 2)
                                });
                            }

                        }, 100 );
                    }

                    resize( ratio );

                    // reset height on resize
                    jQuery( window ).resize(function(){
                        resize( ratio );
                    });

                })( this, ratio ));
            }
        });
    }

    $.fn.gourmand_min_height = function( w, ratio ){
        if( typeof ratio == 'undefined' || ratio == 0 )
            ratio = 16/9;

        return this.each(function(){
            if ( !$.data(this, 'ratio_instantiated' ) ){
                $.data(this, 'ratio_instantiated', (function( el, ratio ){

                    var resize = function( ratio ){

                        var

                        width   = parseInt( jQuery( el ).width() ),
                        height  = parseInt( width / ratio );

                        if( w > width )
                            jQuery( el ).css({ 'height' : height + 'px' });
                    }

                    resize( ratio );

                    // reset height on resize
                    jQuery( window ).resize(function(){
                        resize( ratio );
                    });

                })( this, ratio ));
            }
        });
    };

    // has attribute
    $.fn.hasAttr = function( name ){
        return this.attr( name ) !== undefined;
    };

})( jQuery, window);



/////   SETUP    /////


jQuery(function(){

    // video thumbnail ratio 16:9
    jQuery( 'div.tempo-video-thumbnail' ).gourmand_height();

    // header video youtube
    setTimeout(function(){
        jQuery( 'div#wp-custom-header.wp-custom-header' ).gourmand_youtube_height();
    }, 1000 );

    // Features Section with Masonry
    gourmand_images.loaded( 'section.gourmand-section.features div.content-inner', function(){

        setTimeout(function(){
            jQuery( 'section.gourmand-section.features div.content-inner' ).masonry();
        }, 500 );

        // reset masonry on resize
        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( 'section.gourmand-section.features div.content-inner' ).masonry();
            }, 500 );
        });
    });

    // Latest News Section with Masonry
    gourmand_images.loaded( 'section.gourmand-section.latest-news div.content-inner div.masonry-content', function(){

        setTimeout(function(){
            jQuery( 'section.gourmand-section.latest-news div.content-inner div.masonry-content' ).masonry();
        }, 500 );

        // reset masonry on resize
        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( 'section.gourmand-section.latest-news div.content-inner div.masonry-content' ).masonry();
            }, 500 );
        });
    });


    // Gallery with Masonry
    gourmand_images.loaded( '.tempo-gallery:not(.features):not(.story)', function(){
        setTimeout(function(){
            jQuery( '.tempo-gallery:not(.features):not(.story)' ).masonry();
        }, 500 );

        // reset masonry on resize
        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( '.tempo-gallery:not(.features):not(.story)' ).masonry();
            }, 500 );
        });
    });

    var gourmand_widget_masonry = false;

    // header and foorter sidebars with masonry
    gourmand_images.loaded( 'aside .widgets-row', function(){
        setTimeout(function(){
            jQuery( 'aside .widgets-row' ).masonry();
            gourmand_widget_masonry = true;
        }, 500 );

        // reset masonry on resize
        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( 'aside .widgets-row' ).masonry();
            }, 500 );
        });
    });

    if( !gourmand_widget_masonry ){
        setTimeout(function(){
            jQuery( 'aside .widgets-row' ).masonry();
            gourmand_widget_masonry = true;
        }, 500);

        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( 'aside .widgets-row' ).masonry();
            }, 500);
        });
    }

    // woocommerce products
    gourmand_images.loaded( 'div.tempo-section-content ul.products', function(){
        setTimeout(function(){
            jQuery( 'div.tempo-section-content ul.products' ).masonry();
        }, 500 );

        // reset masonry on resize
        jQuery(window).resize(function(){
            setTimeout(function(){
                jQuery( 'div.tempo-section-content ul.products' ).masonry();
            }, 500 );
        });
    });


    /**
     *  Scroll to Top Action
     */

    jQuery(function(){
        jQuery( 'div.gourmand-scroll-top a' ).click(function(){
            jQuery( 'html, body' ).animate({
                scrollTop: 0
            }, 1000 );
        });
    });

    /**
     *  Scroll to Top Button
     */

    jQuery( window ).scroll(function(){
        var top     = parseInt( jQuery( window ).scrollTop());
        var wheight = parseInt( jQuery( window ).height());
        var dheight = parseInt( jQuery('body').height());
        var fheight = parseInt( jQuery('footer#gourmand-footer').height());

        /**
         *  Scroll to Top
         */

        if( top > 150 && !jQuery( 'div.gourmand-scroll-top' ).hasClass( 'display-scroll-top' ) ){
            jQuery( 'div.gourmand-scroll-top' ).addClass( 'display-scroll-top' );
        }else if( top < 150 && jQuery( 'div.gourmand-scroll-top' ).hasClass( 'display-scroll-top' ) ){
            jQuery( 'div.gourmand-scroll-top' ).removeClass( 'display-scroll-top' );
        }

        if( parseInt( dheight ) <= parseInt( wheight + top + fheight + 15 ) && !jQuery( 'div.gourmand-scroll-top' ).hasClass( 'display-absolute' ) ){
            jQuery( 'div.gourmand-scroll-top' ).addClass( 'display-absolute' );
        }
        else if( parseInt( dheight ) > parseInt( wheight + top + fheight + 15 ) && jQuery( 'div.gourmand-scroll-top' ).hasClass( 'display-absolute' ) ){
            jQuery( 'div.gourmand-scroll-top' ).removeClass( 'display-absolute' );
        }
    });


    // Counter UP on scroll page
    jQuery('.counter').counterUp({
        delay: 10,
        time: 1500
    });
});
