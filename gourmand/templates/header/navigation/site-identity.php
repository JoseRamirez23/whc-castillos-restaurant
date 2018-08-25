<?php

	/**
	 *	Header Navigation Section
	 *
	 *  @created    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

    $custom_logo        = gourmand_mod::get( 'logo' );
    $has_custom_logo    = !empty( $custom_logo );

    $site_title         = get_bloginfo( 'name' );
    $site_description   = get_bloginfo( 'description' );

    if ( function_exists( 'the_custom_logo' ) ){
        if( has_custom_logo() ){
            $has_custom_logo = has_custom_logo();
        }
    }

    $classes = '';

    if( !$has_custom_logo ){
        $classes = 'not-has-custom-logo';
    }

    echo '<div class="gourmand-site-identity ' . esc_attr( $classes ) . '">';

    // WordPress Custom Logo
    if ( function_exists( 'the_custom_logo' ) ) {
        $has_custom_logo = has_custom_logo();

        if( $has_custom_logo ){
            echo '<div class="custom-logo-wrapper">';
            the_custom_logo();
            echo '</div>';
        }
    }

    // Gourmand Custom Logo
    else if( $has_custom_logo ){
        echo '<div class="custom-logo-wrapper">';
        echo    '<a class="custom-logo-link" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '">';
        echo        '<img src="' . esc_url( $custom_logo ) . '" alt="' . esc_attr( $site_title . ' - ' . $site_description ) . '" itemprop="logo"/>';
        echo    '</a>';
        echo '</div>';
    }

    // Title and Description
    if( (bool)gourmand_mod::get( 'header_text', 1 ) ){

        echo '<div class="text-wrapper">';

            // Site Title
            if( !empty( $site_title ) ){
                echo '<a class="site-title" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '">';
                bloginfo( 'name' );
                echo '</a>';
            }

            // Site Description
            if( !empty( $site_description ) ){
                echo '<a class="site-description" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( $site_title . ' - ' . $site_description ) . '">';
                bloginfo( 'description' );
                echo '</a>';
            }

        echo '</div>';
    }

    echo '</div>';
?>
