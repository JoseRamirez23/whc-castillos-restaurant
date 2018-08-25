<?php

	/**
	 *  ..
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

    if( !class_exists( 'gourmand_html_page' ) ){
        class gourmand_html_page
        {
            private $page = array();
            private $section;

            function __construct( $slug, $args )
            {
                $this -> args       = (array)$args;
                $this -> slug       = $slug;
                $this -> section    = new gourmand_html_section();
            }

            public function get()
            {
                if( !isset( $_GET ) || !isset( $_GET[ 'page' ] ) ){
                    wp_die( 'Invalid page name', 'gourmand' );
                    return;
                }

                echo '<div class="mythemes-page">';

                echo $this -> header();
                echo $this -> notifications();
                echo $this -> content();

                echo '</div>';
            }

            public function header()
            {
                $rett  = '';

                $rett .= '<div class="mythemes-page-header">';
                $rett .= '<div class="mythemes-topper"></div>';
                $rett .= '<div class="mythemes-middle mythemes-columns-wrapper">';


                $rett .= '<div class="mythemes-column lg-3 md-4 sm-4">';

                $uri_title = esc_url( gourmand_core::author( 'uri-title' ) );

                if( !empty( $uri_title ) ){
                    $rett .= '<h1 class="mythemes-brand"><a href="' . esc_url( $uri_title ) . '" title="' . esc_attr( gourmand_core::author( 'name' ) .' - ' . gourmand_core::author( 'description' ) ) . '" target="_blank">' . gourmand_core::author( 'name' ) . '</a></h1>';
                }
                else{
                    $rett .= '<h1 class="mythemes-brand">' . gourmand_core::author( 'name' ) . '</h1>';
                }

                $rett .= '</div>';

                $rett .= '<div class="mythemes-column lg-9 md-8 sm-8">';
                $rett .= '<nav class="mythemes-nav">';

                $contact = esc_url_raw( gourmand_core::author( 'contact' ) );

                if( !empty( $contact ) ){
                    $rett .= '<ul class="mythemes-list mythemes-inline">';
                    $rett .= '<li>';
                    $rett .= '<a href="' . esc_url( $contact ) .'" title="' .esc_attr( gourmand_core::author( 'name' ) . ' - ' . __( 'Contact US', 'gourmand' ) ) . '" target="_blank">' . __( 'Contact US', 'gourmand' ) . '</a>';
                    $rett .= '</li>';
                    $rett .= '</ul>';
                }

                $uri = esc_url( gourmand_core::theme( 'premium-header' ) );

                if( !gourmand_core::is_active_premium() && !empty( $uri ) ){
                    $rett .= '<ul class="mythemes-list mythemes-inline special-nav">';

                    $rett .= '<li>';
                    $rett .= '<a href="' . esc_url( $uri ) . '" class="mythemes-upgrade" title="' . esc_attr( sprintf( __( '%1$s - Upgrade %2$s to Premium', 'gourmand' ), gourmand_core::author( 'name' ), gourmand_core::theme( 'Name' ) ) ) . '"><i class="mythemes-icon-publish"></i> <span>' . __( 'Upgrade to Premium', 'gourmand' ) . '</span></a>';
                    $rett .= '</li>';

                    $rett .= '</ul>';
                }

                $rett .= '</nav>';
                $rett .= '</div>';

                $rett .= '<div class="clear clearfix"></div>';
                $rett .= '</div>';
                $rett .= '<div class="mythemes-poor"></div>';
                $rett .= '</div>';


                /* BLANK SPACE */
                $rett .= '<div class="mythemes-blank">';

                $description = esc_url( gourmand_core::author( 'uri-description' ) );

                if( !empty( $description ) ){
                    $rett .= '<span class="mythemes-author-description">';
                    $rett .= '<a href="' . esc_url( $description ) . '" title="' . esc_attr( gourmand_core::author( 'name' ) .' - ' . gourmand_core::author( 'description' ) ) . '" target="_blank">' . gourmand_core::author( 'description' ) . '</a>';
                    $rett .= '</span>';
                }

                $version = esc_url( gourmand_core::theme( 'uri-version' ) );

                if( !empty( $version ) ){
                    $rett .= '<a href="' . esc_url( $version ) . '" title="' . esc_attr( gourmand_core::theme( 'description' ) ) . '" target="_blank">' . sprintf( __( '%1$s - free version ( %2$s )', 'gourmand' ), '<strong>' . gourmand_core::theme( 'Name' ) . '</strong>',  gourmand_core::theme( 'Version' ) ) . '</a>';
                }
                else{
                    $rett .= sprintf( __( '%1$s - free version ( %2$s )', 'gourmand' ), '<strong>' . gourmand_core::theme( 'Name' ) . '</strong>',  gourmand_core::theme( 'Version' ) );
                }

                $rett .= '</div>';

                return $rett;
            }

            public function notifications()
            {
                $rett = '';

                /**
                 *  Notification Update
                 */
                if( isset( $_GET[ 'options-updated' ] ) && $_GET[ 'options-updated' ] == 'true' ){
                    $rett = gourmand_html::notification( array(
                        'type'          => 'success',
                        'class'         => 'mythemes-admin-page-notification',
                        'description'   => __( 'Options are updated successfully !' , 'gourmand' )
                    ));
                }

                /**
                 *  Reset Notification
                 */
                else if( isset( $_GET[ 'options-reset' ] ) && $_GET[ 'options-reset' ] == 'true' ){
                    $rett = gourmand_html::notification( array(
                        'type'          => 'notify',
                        'class'         => 'mythemes-admin-page-notification',
                        'description'   => __( 'Options are reset successfully !' , 'gourmand' )
                    ));
                }

                /**
                 *  Undefined Notification
                 */
                if( isset( $_GET[ 'notification' ] ) && !empty( $_GET[ 'notification' ] ) ){
                    $rett .= gourmand_html::notification( array(
                        'type'          => 'wrong',
                        'class'         => 'mythemes-admin-page-notification',
                        'description'   => urldecode( esc_html( $_GET[ 'notification' ] ) )
                    ));
                }

                $notifications = apply_filters( 'gourmand_admin_page_notifications', null, $this );

                if( !empty( $notifications ) ){
                    $rett .= $notifications;
                }

                return $rett;
            }

            public function content()
            {
                $rett = '';

                $rett .= '<div class="mythemes-page-content">';

                /**
                 *  Admin Prepend Page Content
                 */
                $rett .= apply_filters( 'gourmand_admin_prepend_page_content', null, $this );

                /**
                 *  Get content from template file
                 */
                $rett .= gourmand_template::content( $this -> args );

                /**
                 *  Generate fields, boxes, columns and sections from config args
                 */
                if( isset( $this -> args[ 'sections' ] ) && !empty( $this -> args[ 'sections' ] ) && is_array( $this -> args[ 'sections' ] ) ){
                    $sections = $this -> args[ 'sections' ];

                    foreach( $sections as $index => $args ){
                        $rett .= $this -> section -> get( $args );
                    }
                }

                /**
                 *  Admin Append Page Content
                 */
                $rett .= apply_filters( 'gourmand_admin_append_page_content', null, $this );

                $rett .= '</div>';

                return $rett;
            }
        }
    }
?>
