<?php

    /**
     *  Add Options to Easy Google Fonts Customize Panel
     */

    function gourmand_font_get_option_parameters( $options )
	{
        $fonts = array(
            'overwrite-montez' => array(
                'priority'      => 10,
                'name' 			=> 'overwrite-montez',
                'title' 		=> __( 'Overwrite - Montez', 'gourmand' ),
                'description'   => __( 'Overwrite "Montez" Font. This font is used by default for Front Page Custom Section Headlines.', 'gourmand' ),
                'type' 			=> 'font',
                'section' 		=> 'default',
                'tab' 			=> 'theme-typography',
                'transport' 	=> 'postMessage',
                'since' 		=> 1.0,
                'properties' 	=> array(
                    'selector' 		=> '.cursive, div.gourmand-site-identity a.site-title, .daily-dishes li.dish span.price, .chef-menu li.dish span.price, .grid-view article .meta.top a.author',
                    'force_styles' 	=> null
                )
            ),
            'overwrite-quicksand' => array(
                'priority'      => 30,
                'name' 			=> 'overwrite-quicksand',
                'title' 		=> __( 'Overwrite - Quicksand',  'gourmand' ),
                'description'   => __( 'Overwrite "Quicksand" Font. This font is used by default for Headlines - H1 .. H6.', 'gourmand' ),
                'type' 			=> 'font',
                'section' 		=> 'default',
                'tab' 			=> 'theme-typography',
                'transport' 	=> 'postMessage',
                'since' 		=> 1.0,
                'properties' 	=> array(
                    'selector' 		=> 'h1, h2, h3, h4, h5, h6, blockquote cite, .section-subtitle, ol.gourmand-comments-list li header cite, ol.gourmand-comments-list li header cite a, .gourmand-section.daily-dishes li.dish strong, .gourmand-section.chef-menu li.dish strong, .gourmand-section.daily-dishes li.header strong, .gourmand-section.chef-menu li.header strong, .gourmand-section.services strong, .testimonial-identity cite',
                    'force_styles' 	=> null
                )
            ),
            'overwrite-open-sans' => array(
                'priority'      => 20,
                'name' 			=> 'overwrite-open-sans',
                'title' 		=> __( 'Overwrite - Open Sans', 'gourmand' ),
                'description'   => __( 'Overwrite "Open Sans" Font. This font is used by default for rest of Website Content.', 'gourmand' ),
                'type' 			=> 'font',
                'section' 		=> 'default',
                'tab' 			=> 'theme-typography',
                'transport' 	=> 'postMessage',
                'since' 		=> 1.0,
                'properties' 	=> array(
                    'selector' 		=> 'html, body, div.comment-respond h3.comment-reply-title small a',
                    'force_styles' 	=> null
                )
            )
		);

        return array_merge( $fonts, $options );
    }

    add_filter( 'tt_font_get_option_parameters', 'gourmand_font_get_option_parameters' );
?>
