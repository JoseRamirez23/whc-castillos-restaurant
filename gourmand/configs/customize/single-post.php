<?php

	/**
	 *	Single Post Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'post-categories' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-author' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-date'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-comments'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-views' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-tags'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'post-author-box' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
