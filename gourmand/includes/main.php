<?php
	/**
	 *	Includes Classes and Functions
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	include_once get_template_directory() . '/includes/functions.php';

	/**
	 *	Autoload Classes
	 *
	 *	Customize:
	 *
	 *		Controls Classes
	 *		Partials Classes
	 *		Manager Classes
	 *
	 *	Core:
	 */

	function gourmand_autoload( $class_name )
	{
		$file_name	= '';
		$class_path	= '';

		/**
		 *	Gourmand Autoload Customize Classes
		 */

		if( preg_match( "/^gourmand([_wp_|_]+)customize_/", $class_name ) ){

			/**
			 *	Autoload Controls Classes
			 */

			if( preg_match( "/^gourmand_wp_customize([0-9a-z_]*)control/", $class_name ) ){
				$file_name	= str_replace( '_', '-', strtolower( $class_name ) );
				$class_path = get_template_directory() . '/includes/customize/controls/' . $file_name . '.php';
			}

			/**
			 *	Autoload Manager Classes
			 *
			 */

			if( empty( $class_path ) && preg_match( "/^gourmand_customize_/", $class_name ) ){
				$file_name	= str_replace( '_', '-', strtolower( $class_name ) );
				$class_path = get_template_directory() . '/includes/customize/' . $file_name . '.php';
			}
		}

		/**
		 *	Gourmand Autoload Core Classes
		 */

		else if( preg_match( "/^gourmand_/", $class_name ) ){
			$file_name	= str_replace( '_', '-', strtolower( $class_name ) );
			$class_path = get_template_directory() . '/includes/' . $file_name . '.php';
		}

		if( !empty( $class_path ) && is_file( $class_path ) ){

			include_once $class_path;
		}
	}

	spl_autoload_register( 'gourmand_autoload' );

	// Hooks
	include_once get_template_directory() . '/includes/hooks/gallery.php';

	// Pro Section
	if( !class_exists( 'gourmand_pro' ) )
		gourmand_upsell::get_instance();
?>
