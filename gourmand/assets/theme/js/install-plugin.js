jQuery(function(){

    function gourmand_plugin_disable_button( button )
    {
        if( jQuery( button ).hasClass( 'activate-plugin' ) || jQuery( button ).hasClass( 'install-plugin' ) ){
            jQuery( button ).removeClass( 'activate-plugin' );
            jQuery( button ).removeClass( 'install-plugin' );

            if( !jQuery( button ).hasClass( 'gourmand-plugin-disable' ) )
                jQuery( button ).addClass( 'gourmand-plugin-disable' );
        }
    }

    function gourmand_install_activate_plugin( button, slug )
    {
        wp.updates.installPlugin({
            slug        : slug,
            beforeSend  : function () {
                gourmand_plugin_disable_button( button );

                var installing = jQuery( button ).attr('data-installing');

                jQuery( button ).find( 'span' ).html( installing );
            },
            success     : function( response ){

                // ACTIVATE
                gourmand_activate_plugin( button, response.activateUrl );
            },
            error : function( response ){
                console.log( 'INSTALL PLUGIN ERROR' );
                console.log( response );

                var faild = jQuery( button ).attr('data-install-faild');

                jQuery( button ).find( 'span' ).html( faild );
            }
        });
    }

    function gourmand_activate_plugin( button, url )
    {
        jQuery.ajax({
            async       : true,
            type        : 'GET',
            url         : url,
            beforeSend  : function(){
                gourmand_plugin_disable_button( button );

                var activating = jQuery( button ).attr('data-activating');

                jQuery( button ).find( 'span' ).html( activating );
            },
            success     : function( response ){
                var success = jQuery( button ).attr('data-success');

                jQuery( button ).find( 'span' ).html( success );

                var redirect = jQuery( button ).attr( 'data-redirect' );

                if( redirect.length ){
                    location.href = redirect;
                }

                else{
                    location.reload();
                }
            },
            error       : function( response ){
                console.log( 'ACTIVATE PLUGIN ERROR' );
                console.log( response );

                var faild = jQuery( button ).attr('data-activate-faild');

                jQuery( button ).find( 'span' ).html( faild );
            }
        });
    }

    jQuery( 'a.gourmand-plugin-action:not(.gourmand-plugin-disable)' ).click(function( e ){

        e.preventDefault();

        /**
         *  Exclude multiple Actions
         */

        // to do: add browser store
        if( !(jQuery( this ).hasClass( 'install-plugin' ) || jQuery( this ).hasClass( 'activate-plugin' )) )
            return;

        var

        slug    = jQuery( this ).attr( 'data-slug' ),
        url     = jQuery( this ).attr( 'href' ),
        button  = jQuery( this );

        // INSTALL & ACTIVATE RECOMENDED PLUGINS
        if( jQuery( this ).hasClass( 'install-plugin' ) ){
            gourmand_install_activate_plugin( button, slug );
        }

        // ACTIVATE RECOMENDED PLUGINS
        if( jQuery( this ).hasClass( 'activate-plugin' ) ){
            gourmand_activate_plugin( button, url );
        }
    });
});

// Tabs Switcher
jQuery(function(){
	jQuery( 'section.about-tabs div.tabs-navigation nav ul li a' ).on( 'click', function(){
		var action = jQuery( this ).attr( 'data-action' );

		if( !jQuery( this ).parent( 'li' ).hasClass( 'current' ) ){
            jQuery( 'section.about-tabs div.tabs-navigation nav ul li' ).removeClass( 'current' );
			jQuery( this ).parent( 'li' ).addClass( 'current' );

			jQuery( 'section.about-tabs div.tabs-content div.tabs-item' ).removeClass( 'current' );
			jQuery( 'section.about-tabs div.tabs-content div.tabs-item' + action ).addClass( 'current' );
		}
	});
});
