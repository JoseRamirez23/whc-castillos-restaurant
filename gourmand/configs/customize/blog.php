<?php

	/**
	 *	Blog Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'blog-article' => array(
			'default' 	=> __( 'Article', 'gourmand' ),
			'sanitize'	=> array( 'gourmand_esc', 'text' )
		),
		'blog-articles' => array(
			'default' 	=> __( 'Articles', 'gourmand' ),
			'sanitize'	=> array( 'gourmand_esc', 'text' )
		),
		'blog-categories' => array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'blog-author'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'blog-date'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'blog-comments'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'blog-views'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'blog-excerpt'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
