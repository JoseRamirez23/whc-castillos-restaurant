function gourmand_hex2rgb( hex )
{
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
    var colors = result ? {
        r: parseInt( result[ 1 ], 16 ),
        g: parseInt( result[ 2 ], 16 ),
        b: parseInt( result[ 3 ], 16 )
    } : null;

    var rett = '';

    if( colors.hasOwnProperty( 'r' ) ){
    	rett += colors.r + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'g' ) ){
    	rett += colors.g + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'b' ) ){
    	rett += colors.b;
    }
    else{
    	rett += '255';
    }

    return rett;
}

function gourmand_brightness( hex, steps )
{
    var steps 	= Math.max( -255, Math.min( 255, steps ) );
    var hex 	= hex.toString().replace( /#/g, "" );

    if ( hex.length == 3 ) {
        hex =
        hex.substring( 0, 1 ) + hex.substring( 0, 1 ) +
        hex.substring( 1, 2 ) + hex.substring( 1, 2 ) +
        hex.substring( 2, 3 ) + hex.substring( 2, 3 );
    }

    var r = parseInt( hex.substring( 0, 2 ).toString() , 16 );
    var g = parseInt( hex.substring( 2, 4 ).toString() , 16 );
    var b = parseInt( hex.substring( 4, 6 ).toString() , 16 );

    r = Math.max( 0, Math.min( 255, r + steps ) ).toString(16).toUpperCase();
    g = Math.max( 0, Math.min( 255, g + steps ) ).toString(16).toUpperCase();
    b = Math.max( 0, Math.min( 255, b + steps ) ).toString(16).toUpperCase();

	var r_hex = Array( 3 - r.length ).join( '0' ) + r;
	var g_hex = Array( 3 - g.length ).join( '0' ) + g;
	var b_hex = Array( 3 - b.length ).join( '0' ) + b;

    return '#' + r_hex + g_hex + b_hex;
}

(function($){

    {   //- SITE IDENTITY -//

        //	top space
        wp.customize( 'top-space' , function( value ){
            value.bind(function( newval ){
                jQuery( 'style#gourmand-site-identity-top-space' ).html(
                    'div.gourmand-site-identity div.custom-logo-wrapper a,' +
                    'div.gourmand-site-identity div.text-wrapper a:first-child{' +
                    'margin-top:' + parseInt( newval ) + 'px;' +
                    '}'
                );
            });
        });

		wp.customize( 'left-space' , function( value ){
            value.bind(function( newval ){
                jQuery( 'style#gourmand-site-identity-left-space' ).html(
                    'div.gourmand-site-identity > div:first-child a{' +
                    'margin-left:' + parseInt( newval ) + 'px;' +
                    '}'
                );

            });
        });
	}



    {   //  Accent Color

        wp.customize( 'accent-color' , function( value ){
            value.bind(function( newval ){
                var

                rgb     = gourmand_hex2rgb( newval ),
                rgba    = 'rgba( ' + rgb + ', 0.3 )';

                jQuery( 'style#gourmand-accent-color' ).html(
                    /**
            		 *	Color
            		 */

            		'a,' +
            		'a:visited,' +
            		'.accent-color,' +
            		'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li.current-menu-item > a,' +
            		'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.current-menu-item > a,' +
            		'ol.gourmand-comments-list li header cite a:hover,' +
            		'.button.empty-btn,' +
            		'button.empty-btn,' +
                    'btn.empty-btn,' +
            		'input[type="button"].empty-btn,' +
            		'input[type="submit"].empty-btn,' +
            		'input[type="reset"].empty-btn,' +
            		'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor > a,' +
            		'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor:hover > a,' +
            		'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item > a,' +
            		'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item:hover > a,' +
            		'.gourmand-section.gourmand-dishes .cols.sync-time .item-col.active-now div.header strong,' +
            		'.gourmand-section.gourmand-dishes .item-col ul.item-menu li.dish span.price,' +
            		'.gourmand-section.testimonials .content-inner .testimonial-wrapper span.rank,' +
            		'.gourmand-section.testimonials .content-inner .testimonial-identity cite a:hover,' +
            		'.gourmand-section.latest-news article h3.title a:hover,' +
            		'div.gourmand-author h4.gourmand-author-name a:hover,' +
                    '.header-partial #gourmand-header-wrapper a.button.btn-1.empty-btn,' +
            		'.header-partial #gourmand-header-wrapper a.button.btn-2.empty-btn,' +
            		'.header-partial #gourmand-header-wrapper a.button.btn-3.empty-btn{' +
            		'color: ' + newval + ';' +
            		'}' +

            		/**
            		 *	Background Color
            		 */
            		'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,' +
            		'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover,' +
            		'ol.gourmand-comments-list li header cite span.author-tag,' +
            		'.button,' +
                    '.btn,' +
            		'button,' +
            		'input[type="button"],' +
            		'input[type="submit"],' +
            		'input[type="reset"],' +
            		'.header-topper .business-tools a i,' +
            		'.accent-bkg,' +
            		'.gourmand-section.gourmand-dishes .item-col ul.item-menu li.dish span.daily-dish,' +
            		'.gourmand-section.gourmand-dishes .slick-dots li.slick-active button,' +
            		'.gourmand-section.testimonials .slick-dots li.slick-active button,' +
            		'.gourmand-section.latest-news article div.thumbnail-wrapper a.thumbnail-read-more:hover,' +
            		'.gourmand-section.latest-news article div.thumbnail-wrapper:hover a.thumbnail-read-more,' +
            		'.standard-view article div.meta.activity a.comments,' +
            		'body.single .header-partial #gourmand-header-wrapper div.meta.activity a.comments,' +
            		'body.page .header-partial #gourmand-header-wrapper div.meta.activity a.comments,' +
            		'body.single div.meta.activity a.comments,' +
            		'body.page div.meta.activity a.comments{' +
            		'background: ' + newval + ';' +
            		'}' +

            		/**
            		 *	Background Color Important
            		 */
            		'.mejs-controls .mejs-time-rail .mejs-time-current{' +
            		'background: ' + newval + ' !important;' +
            		'}' +

            		/**
             		 *	Border Color
             		 */
            		'.button.small.empty-btn,' +
             		'button.small.empty-btn,' +
             		'input[type="button"].small.empty-btn,' +
             		'input[type="submit"].small.empty-btn,' +
             		'input[type="reset"].small.empty-btn,' +
            		'.button.large.empty-btn,' +
                    '.btn.large.empty-btn,' +
            		'button.large.empty-btn,' +
            		'input[type="button"].large.empty-btn,' +
            		'input[type="submit"].large.empty-btn,' +
            		'input[type="reset"].large.empty-btn,' +
            		'.button.empty-btn,' +
            		'button.empty-btn,' +
            		'input[type="button"].empty-btn,' +
            		'input[type="submit"].empty-btn,' +
            		'input[type="reset"].empty-btn,' +
                    '.header-partial #gourmand-header-wrapper a.button.btn-1.empty-btn,' +
            		'.header-partial #gourmand-header-wrapper a.button.btn-2.empty-btn,' +
            		'.header-partial #gourmand-header-wrapper a.button.btn-3.empty-btn{' +
            		'border-color: ' + newval + ';' +
            		'}' +

                    /**
                     *  Box Shadow
                     */

                    '.btn, .button, button, input[type="button"], input[type="submit"], input[type="reset"]{' +
                    '-webkit-box-shadow: 0px 6px 24px ' + rgba + ';' +
                    '-mox-box-shadow: 0px 6px 24px ' + rgba + ';' +
                    'box-shadow: 0px 6px 24px ' + rgba + ';' +
                    '}' +

                    'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,' +
                    'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover{' +
                    '-webkit-box-shadow: 0 3px 14px ' + rgba + ';' +
                    '-mox-box-shadow: 0 3px 14px ' + rgba + ';' +
                    'box-shadow: 0 3px 14px ' + rgba + ';' +
                    '}'
                );

            });
        });
    }

    {   // Tools

        // Tools Background Color
        wp.customize( 'tools-bkg-color' , function( value ){
            value.bind(function( newval ){
                jQuery( 'style#gourmand-tools-bkg-color' ).html(
                    '.header-topper{' +
                    'background:' + newval + ';' +
                    '}'
                );

            });
        });

        // Email
        wp.customize( 'tools-email' , function( value ){
            value.bind(function( newval ){
                jQuery( '.header-topper .business-tools a.tools-email span' ).html( newval );
            });
        });

        // Adress
        wp.customize( 'tools-address' , function( value ){
            value.bind(function( newval ){
                jQuery( '.header-topper .business-tools a.tools-address span' ).html( newval );
            });
        });

        // Phone
        wp.customize( 'tools-phone' , function( value ){
            value.bind(function( newval ){
                jQuery( '.header-topper .business-tools a.tools-phone span' ).html( newval );
                jQuery( 'div.gourmand-menu-phone-wrapper span.tools-item-inner' ).html( newval );
            });
        });
    }

    {   // Default Navigation

        wp.customize( 'nav-def-bkg-color', function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-bkg-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-bkg' ).html(
                        'header#gourmand-header div.gourmand-header nav.header-navigation,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation{' +
                        'background-color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-bkg-transp', function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-bkg-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    console.log( rgba );

                    jQuery( 'style#gourmand-nav-def-bkg' ).html(
                        'header#gourmand-header div.gourmand-header nav.header-navigation,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation{' +
                        'background-color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-site-title
        wp.customize( 'nav-def-site-title-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-site-title-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-site-title' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-title{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-site-title-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-site-title-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-site-title' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-title{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-site-title-h
        wp.customize( 'nav-def-site-title-h-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-site-title-h-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-site-title-h' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-title:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-site-title-h-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-site-title-h-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-site-title-h' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-title:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-tagline
        wp.customize( 'nav-def-tagline-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-tagline-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-tagline' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-description{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-tagline-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-tagline-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-tagline' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-description{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-tagline-h
        wp.customize( 'nav-def-tagline-h-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-tagline-h-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-tagline-h' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-description:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-tagline-h-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-tagline-h-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-tagline-h' ).html(
                        'div.gourmand-site-identity div.text-wrapper a.site-description:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-current-link
        wp.customize( 'nav-def-current-link-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-current-link-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-current-link' ).html(
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor:hover > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item:hover > a,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.current-menu-item > a{' +
                        'color: ' + rgba + ';' +
                        '}' +

                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children span,' +
                		'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover{' +
                		'background-color: ' + rgba + ';' +
                		'}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-current-link-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-current-link-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-current-link' ).html(
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor:hover > a,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item:hover > a,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.current-menu-item > a{' +
                        'color: ' + rgba + ';' +
                        '}' +

                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children span,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover,' +
                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation form.gourmand-search-form button[type="submit"]{' +
                        'background-color: ' + rgba + ';' +
                        '}' +

                        'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,' +
                		'body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover{' +
                		'-webkit-box-shadow: 0 3px 14px rgba( ' + gourmand_hex2rgb( hex ) + ', 0.3 );' +
                		'-moz-box-shadow: 0 3px 14px rgba( ' + gourmand_hex2rgb( hex ) + ', 0.3 );' +
                		'box-shadow: 0 3px 14px rgba( ' + gourmand_hex2rgb( hex ) + ', 0.3 );' +
                		'}'
                    );
                }
            });
        });

        //gourmand-nav-def-link
        wp.customize( 'nav-def-link-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-link-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-link' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search,' +

                		'header#gourmand-header div.gourmand-menu-wrapper > ul > li,' +
                		'header#gourmand-header div.gourmand-menu-wrapper > ul > li a,' +

                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-link-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-link-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-link' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search,' +

                		'header#gourmand-header div.gourmand-menu-wrapper > ul > li,' +
                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li a,' +

                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-link-h
        wp.customize( 'nav-def-link-h-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-link-h-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-link-h' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:hover,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:focus,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:active,' +

                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:hover,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:focus,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:active,' +

                		'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper span,' +
                		'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper a,' +

                		'header#gourmand-header div.gourmand-menu-wrapper > ul > li:hover > a,' +

                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-link-h-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-link-h-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-link-h' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:hover,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:focus,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:active,' +

                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:hover,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:focus,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:active,' +

                		'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper span,' +
                		'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper a,' +

                        'header#gourmand-header div.gourmand-menu-wrapper > ul > li:hover > a,' +

                        'body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a:hover{' +
                        'color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });

        //gourmand-nav-def-decor
        wp.customize( 'nav-def-decor-color' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = newval;
                    var transp      = parseInt( wp.customize.instance( 'nav-def-decor-transp' ).get() ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-decor' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-wrapper + div.gourmand-menu-phone-wrapper,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse + div.gourmand-menu-phone-wrapper,' +
                		'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search + div.gourmand-menu-phone-wrapper{' +
                        'border-color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
        wp.customize( 'nav-def-decor-transp' , function( value ){
            value.bind(function( newval ){
                if( !jQuery( 'header#gourmand-header div.gourmand-header' ).hasClass( 'nav-over-banner' ) ){
                    var hex         = wp.customize.instance( 'nav-def-decor-color' ).get();
                    var transp      = parseInt( newval ) / 100;
                    var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                    jQuery( 'style#gourmand-nav-def-decor' ).html(
                        'header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-wrapper + div.gourmand-menu-phone-wrapper,' +
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse + div.gourmand-menu-phone-wrapper,' +
                        'header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search + div.gourmand-menu-phone-wrapper{' +
                        'border-color: ' + rgba + ';' +
                        '}'
                    );
                }
            });
        });
    }

    {   // Footer

        // Footer Dark Sidebar
        wp.customize( 'footer-dark-sidebar-bkg-color' , function( value ){
            value.bind(function( newval ){
                jQuery( 'style#gourmand-footer-dark-sidebar-bkg' ).html(
                    'aside.footer-dark-sidebar,' +
                    'body.footer-social-links.small-social-links div.footer-social-links{' +
                    'background-color: ' + newval + ';' +
                    '}'
                );
            });
        });
        wp.customize( 'footer-dark-sidebar-space' , function( value ){
            value.bind(function( newval ){
                var space = parseInt( newval );
                jQuery( 'style#gourmand-footer-dark-sidebar-space' ).html(
                    'aside.footer-dark-sidebar .container{' +
                    'padding-top: ' + space + 'px;' +
                    'padding-bottom: ' + space + 'px;' +
                    '}'
                );
            });
        });
        wp.customize( 'footer-dark-sidebar-widgets-space' , function( value ){
            value.bind(function( newval ){
                var space = parseInt( newval );
                jQuery( 'style#gourmand-footer-dark-sidebar-widgets-space' ).html(
                    'footer div.widgets-row .widget{' +
                    'padding-top: ' + space + 'px;' +
                    'padding-bottom: ' + space + 'px;' +
                    '}'
                );

                var gourmand_widget_masonry = false;

                // header and foorter sidebars with masonry
                gourmand_images.loaded( 'aside .widgets-row', function(){
                    setTimeout(function(){
                        jQuery( 'aside .widgets-row' ).masonry();
                        gourmand_widget_masonry = true;
                    }, 1000 );

                    // reset masonry on resize
                    jQuery(window).resize(function(){
                        setTimeout(function(){
                            jQuery( 'aside .widgets-row' ).masonry();
                        }, 1000 );
                    });
                });
            });
        });

        // Footer Copyright
        wp.customize( 'copyright-color' , function( value ){
            value.bind(function( newval ){
                var hex         = newval;
                var transp      = parseInt( wp.customize.instance( 'copyright-transp' ).get() ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright' ).html(
                    'div.footer-copyright p{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });
        wp.customize( 'copyright-transp' , function( value ){
            value.bind(function( newval ){
                var hex         = wp.customize.instance( 'copyright-color' ).get();
                var transp      = parseInt( newval ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright' ).html(
                    'div.footer-copyright p{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });

        //gourmand-copyright-link
        wp.customize( 'copyright-link-color' , function( value ){
            value.bind(function( newval ){
                var hex         = newval;
                var transp      = parseInt( wp.customize.instance( 'copyright-link-transp' ).get() ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright-link' ).html(
                    'div.footer-copyright p a{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });
        wp.customize( 'copyright-link-transp' , function( value ){
            value.bind(function( newval ){
                var hex         = wp.customize.instance( 'copyright-link-color' ).get();
                var transp      = parseInt( newval ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright-link' ).html(
                    'div.footer-copyright p a{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });

        //gourmand-copyright-h-link
        wp.customize( 'copyright-link-h-color' , function( value ){
            value.bind(function( newval ){
                var hex         = newval;
                var transp      = parseInt( wp.customize.instance( 'copyright-link-h-transp' ).get() ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright-h-link' ).html(
                    'div.footer-copyright p a:hover{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });
        wp.customize( 'copyright-link-h-transp' , function( value ){
            value.bind(function( newval ){
                var hex         = wp.customize.instance( 'copyright-link-h-color' ).get();
                var transp      = parseInt( newval ) / 100;
                var rgba        = 'rgba( ' + gourmand_hex2rgb( hex ) + ', ' + transp + ' )';

                jQuery( 'style#gourmand-copyright-h-link' ).html(
                    'div.footer-copyright p a:hover{' +
                    'color: ' + rgba + ';' +
                    '}'
                );
            });
        });

        //gourmand-copyright-bkg
        wp.customize( 'copyright-bkg-color' , function( value ){
            value.bind(function( newval ){
                jQuery( 'style#gourmand-copyright-bkg' ).html(
                    'div.footer-copyright{' +
                    'background-color: ' + newval + ';' +
                    '}'
                );
            });
        });
    }
})(jQuery);
