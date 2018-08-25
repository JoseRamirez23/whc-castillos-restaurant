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

	if( !class_exists( 'gourmand_html_domain' ) ){

		class gourmand_html_domain
		{
            private $pages  = array();
            private $domain = null;

			public function get( $domain, $pages )
			{
                $this -> pages  = (array)$pages;
                $this -> domain = $domain;

                add_action( 'admin_menu', array( $this, 'register' ) );
			}

			public function register()
            {
                if( !apply_filters( 'gourmand_domain_register', false, $this -> domain, $this -> pages ) ){
                    foreach( $this -> pages as $page_slug => $args ){

                        if( isset( $args[ 'menu' ] ) ) {
                            $menu           = $args[ 'menu' ];
                            $page           = new gourmand_html_page( $page_slug, $args );
                            $callback       = array( $page, 'get' );

							deb::e( $menu );

                            add_theme_page(
                                $menu[ 'title' ]            // PAGE TITLE
                                , $menu[ 'title' ]          // MENU TITLE
                                , 'edit_theme_options'      // CAPABILITY
                                , $page_slug                // PAGE SLUG
                                , $callback                 // CALLBACK FUNCTION
                            );
                        }
                    }
                }
            }
		}
	}
?>
