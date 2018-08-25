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
		'layout'	=> array(
			'default'	=> 'without',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'sidebar'	=> array(
			'default'	=> 'default',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'front-page-layout'	=> array(
			'default'	=> 'without',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'front-page-sidebar'	=> array(
			'default'	=> 'front-page',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'blog-layout' => array(
			'default'	=> gourmand_mod::get( 'layout' ),
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'blog-sidebar'	=> array(
			'default'	=> 'blog',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'archives-layout' => array(
			'default'	=> gourmand_mod::get( 'layout' ),
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'archives-sidebar'	=> array(
			'default'	=> 'archives',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'post-layout' => array(
			'default'	=> 'without',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'post-sidebar'	=> array(
			'default'	=> 'post',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'page-layout' => array(
			'default'	=> 'without',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'page-sidebar'	=> array(
			'default'	=> 'post',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
