<?php

	/**
	 *	Tools Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'tools-bkg-color' => array(
			'default' 	=> '#252525',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'tools-display-email' 			=> array(
			'default' 	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'tools-email'					=> array(
			'default' 	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'email' )
		),
		'tools-email-url'				=> array(
			'default' 	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'url' )
		),
		'tools-display-address'			=> array(
			'default' 	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'tools-address'					=> array(
			'default'	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'text' )
		),
		'tools-address-url'				=> array(
			'default'	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'url' )
		),
		'tools-display-phone'			=> array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'tools-display-menu-phone'		=> array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'tools-phone'					=> array(
			'default' 	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'text' )
		),
		'tools-call-phone'				=> array(
			'default' 	=> null,
			'sanitize'	=> array( 'gourmand_esc', 'text' )
		),
		'tools-display-social' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
