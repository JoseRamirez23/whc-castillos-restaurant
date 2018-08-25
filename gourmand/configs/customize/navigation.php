<?php

	/**
	 *	Navigation Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'nav-width'	=> array(
			'default'	=> 'small',
			'sanitize'	=> array( 'gourmand_esc', 'attr' )
		),
		'nav-def-bkg-color'	=> array(
			'default'	=> '#ffffff',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-bkg-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-decor-color' => array(
			'default'	=> '#000000',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-decor-transp' => array(
			'default'	=> 15,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-site-title-color' => array(
			'default'	=> '#333333',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-site-title-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-site-title-h-color' => array(
			'default'	=> '#000000',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-site-title-h-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-tagline-color' => array(
			'default'	=> '#999999',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-tagline-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-tagline-h-color' => array(
			'default'	=> '#666666',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-tagline-h-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-link-color' => array(
			'default'	=> '#39506a',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-link-transp' => array(
			'default'	=> 85,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-link-h-color' => array(
			'default'	=> '#233141',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-link-h-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'nav-def-current-link-color' => array(
			'default'	=> gourmand_mod::get( 'accent-color' ),
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'nav-def-current-link-transp' => array(
			'default'	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
