<?php

	/**
	 *	Gourmand Recommended Plugins Configs
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'plugins' ), array(
		'mythemes-wizard'	=> array(
			'name'					=> __( 'myThemes Wizard', 'gourmand' ),
			'short_description'		=> __( 'With myThemes Wizard you can build a custom setup for each WordPress Theme and Plugin. Inspired from WooCommerce Plugin Setup. This is a GPL 2 WordPress plugin.', 'gourmand' ),
			'version'				=> '0.0.1',
			'url'					=> 'http://mythem.es/item/mythemes-wizard/',
			'author'				=> '<a href="http://mythem.es/" target="_blank">' . __( 'myThem.es', 'gourmand' ) . '</a>',
			'banners'				=> array(),
			'icons'					=> array(),
			'data'					=> array(
				'success'	=> __( 'Starting wizard Setup ..', 'gourmand' ),
				'redirect'  => esc_url( admin_url( 'index.php?page=mythemes-wizard' ) )
			)
		),
		'gourmand-light'	=> array(
			'name'					=> __( 'Gourmand Light', 'gourmand' ),
			'short_description'		=> __( 'This is a GPL 2 WordPress plugin. This plugin extend Gourmand free WordPress theme Core Features with many extra features and also Front Page Custom Sections.', 'gourmand' ),
			'version'				=> '0.0.1',
			'url'					=> 'http://mythem.es/item/gourmand/',
			'author'				=> '<a href="http://mythem.es/" target="_blank">' . __( 'myThem.es', 'gourmand' ) . '</a>',
			'banners'				=> array(),
			'icons'					=> array()
		),
		'contact-form-7'	=> array(),
		'easy-google-fonts'	=> array(),
		'loco-translate'	=> array()
	));

	gourmand_config::set( 'plugins', $cfgs );
?>
