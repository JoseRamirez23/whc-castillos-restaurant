<?php

	/**
	 *	Copyright Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	// Footer Sections
	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'footer-sections' ), array(
		'social' 			=> array(
			'priority'	=> 20,
		),
		'dark-sidebar' 		=> array(
			'priority'	=> 30,
		),
		'copyright'			=> array(
			'priority'	=> 40,
		),
	));

 	gourmand_config::set( 'footer-sections', gourmand_config::sksort( $cfgs, 'priority', true ) );

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		// Footer Social
		'footer-display-social'	=> array(
			'default'	=> true,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'footer-social-size' 	=> array(
			'default'	=> 'medium',
			'sanitize'	=> array( 'gourmand_esc', 'attr' ) // to do: size
		),

		// Footer Dark Sidebar
		'footer-dark-sidebar-fluid-width' => array(
			'default'	=> false,
			'sanitize'	=> array( 'gourmand_esc', 'logic' )
		),
		'footer-dark-sidebar-nr-columns' => array(
			'default'	=> 4,
			'sanitize'	=> array( 'gourmand_esc', 'nr_sidebars' )
		),
		'footer-dark-sidebar-bkg-color'	=> array(
			'default'	=> '#202020',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'footer-dark-sidebar-space' => array(
			'default'	=> 40,
			'sanitize'	=> array( 'gourmand_esc', 'natural' )
		),
		'footer-dark-sidebar-widgets-space' => array(
			'default'	=> 20,
			'sanitize'	=> array( 'gourmand_esc', 'natural' )
		),

		// Copyright
		'content-copyright'		=> array(
			'default' 	=> sprintf( __( 'Copyright &copy; %1$s.' , 'gourmand' ), date( 'Y' ) ),
			'sanitize'	=> array( 'gourmand_esc', 'copyright' )
		),
		'author-copyright' 		=> array(
			'default' 	=> sprintf( __( ' Powered by %1$s. Designed by %2$s.', 'gourmand' ), '<a href="https://wordpress.org/" title="WordPress">WordPress</a>', '<a href="https://mythem.es/item/gourmand/" title="myThem.es">myThem.es</a>' ),
			'sanitize'	=> array( 'gourmand_esc', 'copyright' )
		),
		'copyright-color' => array(
			'default' 	=> '#acacac',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'copyright-transp' => array(
			'default' 	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'copyright-link-color' => array(
			'default' 	=> '#ffffff',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'copyright-link-transp' => array(
			'default' 	=> 90,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'copyright-link-h-color' => array(
			'default' 	=> '#ffffff',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
		'copyright-link-h-transp' => array(
			'default' 	=> 100,
			'sanitize'	=> array( 'gourmand_esc', 'percent' )
		),
		'copyright-bkg-color' => array(
			'default' 	=> '#252525',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		),
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
