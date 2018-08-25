<?php

	/**
	 *	Additional Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'gallery-style' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'scroll-aside' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'scroll-top' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'website-auto-hyphens' => array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'headings-auto-hyphens' => array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'content-auto-hyphens' => array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
