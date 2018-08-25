<?php

    /**
     *  The template for displaying the header
     *
     *  @creaded    october 11, 2017
     *  @updated    october 11, 2017
     *
     *  @package 	Gourmand
     *  @since      Gourmand 0.0.2
     *  @version    0.0.1
     */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class( esc_attr( apply_filters( 'gourmand_body_class', null ) ) ); ?>>

        <?php
            // This template is used from plugins
            gourmand_template::partial( 'templates/body/prepend' );

            // Collapsed Header Navigation
			gourmand_template::partial( 'templates/header/navigation/collapsed-menu' );
        ?>

        <div class="gourmand-website-wrapper">

            <header id="gourmand-header">

                <?php
                    // Header Topper
					gourmand_template::partial( 'templates/header/topper' );
                ?>

                <div class="gourmand-header <?php echo esc_attr( apply_filters( 'gourmand_nav_classes', null ) ); ?>">

                    <?php
                        // Header Navigation
    					gourmand_template::partial( 'templates/header/navigation' );

                        // Header Banner
                        gourmand_template::partial( 'templates/header/banner' );
                    ?>

                </div>

            </header>
