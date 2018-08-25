<?php

	/**
	 *	Header Menu - config file
	 */

	$cfgs = array_merge( (array)gourmand_config::get( 'menus' ), array(
		'gourmand-header'	=> __( 'Header Menu', 'gourmand' )
	));

	gourmand_config::set( 'menus', $cfgs );
?>
