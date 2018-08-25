<?php

	/**
	 *	Colors Configs
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'theme-mods' ), array(
		'accent-color'			=> array(
			'default'	=> '#ef4836',
			'sanitize'	=> array( 'gourmand_esc', 'color' )
		)
	));

	gourmand_config::set( 'theme-mods', $cfgs );
?>
