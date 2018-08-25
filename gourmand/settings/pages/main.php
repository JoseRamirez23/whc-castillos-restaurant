<?php

	/**
	 *	Main Page Settings
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	include_once get_template_directory() . '/settings/pages/about.php';

	//	Pages Enqueue Script
	function gourmand_appearance_page__enqueue_scripts( $hook )
	{
		if( $hook == 'appearance_page_gourmand-about' || $hook == 'themes.php' ){
			wp_enqueue_script( 'plugin-install' );
			wp_enqueue_script( 'updates' );
			wp_enqueue_script( 'gourmand-install-plugin', get_template_directory_uri() . '/assets/theme/js/install-plugin.js', array( 'jquery' ), '0.0.1', true );
		}
	}

	add_action( 'admin_enqueue_scripts', 'gourmand_appearance_page__enqueue_scripts' );
?>
