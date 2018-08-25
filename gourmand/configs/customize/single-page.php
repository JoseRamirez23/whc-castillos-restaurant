<?php

	/**
	 *	Single Page Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'page-antet-alignment' => array(
			'default'	=> 'left',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'page-comments'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'page-views'	=> array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
