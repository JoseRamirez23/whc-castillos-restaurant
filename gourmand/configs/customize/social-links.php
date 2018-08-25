<?php

	/**
	 *	About Content Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'display-rss' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'rss' => array(
			'default'	=> esc_url( get_bloginfo( 'rss2_url' ) ),
			'sanitize'	=> array( 'gourmand_esc', 'url' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
