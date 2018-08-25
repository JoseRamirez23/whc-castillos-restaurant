<?php

	/**
	 *	Gourmand Footer Social Links
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !gourmand_mod::get( 'footer-display-social' ) )
		return;

	$social = gourmand_mod::get( 'footer-social-size' );

	gourmand_template::partial( "templates/footer/sections/social/{$social}" );
?>
