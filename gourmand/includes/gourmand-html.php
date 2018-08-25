<?php

	/**
	 *  HTML Autoload and Elements
	 *
	 *	Multiple Settings (adding dynamically)
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_html' ) ){

		function gourmand_autoload_html( $class_name )
		{
		    if( preg_match( "/^gourmand_html_/", $class_name ) ){
		        $class_file = str_replace( '_', '-', $class_name );
		        $class_path  = get_template_directory() . '/includes/html/' . $class_file . '.php';

		        if( is_file( $class_path ) )
		            include_once  $class_path;
		    }
		}

		spl_autoload_register( 'gourmand_autoload_html' );

		class gourmand_html
		{
			static $attr;
			static function attr( $type, $args )
			{
				$attr = new gourmand_html_attr();

				return $attr -> get( $type, $args );
			}

			static $input;
			static function input( $args )
			{
				$input = new gourmand_html_input();

				return $input -> get( $args );
			}

			static $field;
			static function field( $args )
			{
				$field = new gourmand_html_field();

				return $field -> get( $args );
			}

			static $notification;
			static function notification( $args )
			{
				$notification = new gourmand_html_notification();

				return $notification -> get( $args );
			}

			static $box;
			static function box( $args )
			{
				$box = new gourmand_html_box();

				return $box -> get( $args );
			}

			static $column;
			static function column( $args )
			{
				$column = new gourmand_html_column();

				return $column -> get( $args );
			}

			static $section;
			static function section( $args )
			{
				$section = new gourmand_html_section();

				return $section -> get( $args );
			}

			static $domain;
			static function domain( $item, $pages )
			{
				$domain = new gourmand_html_domain();

				$domain -> get( $item, $pages );
			}
		}

		gourmand_html::$attr 			= new gourmand_html_attr();
		gourmand_html::$input 			= new gourmand_html_input();
		gourmand_html::$field 			= new gourmand_html_field();
		gourmand_html::$notification 	= new gourmand_html_notification();
		gourmand_html::$box 			= new gourmand_html_box();
		gourmand_html::$column 			= new gourmand_html_column();
		gourmand_html::$section 		= new gourmand_html_section();
		gourmand_html::$domain 			= new gourmand_html_domain();
	}
?>
