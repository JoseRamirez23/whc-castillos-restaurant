<?php

	/**
	 *	Site Identity Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'top-space' => array(
			'default'	=> 0,
			'sanitize'	=> array( 'gourmand_esc', 'int' )
		),
		'left-space' => array(
			'default'	=> 0,
			'sanitize'	=> array( 'gourmand_esc', 'natural' )
		),
		'dish-currency' => array(
			'default'	=> '$',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'currency-before' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
