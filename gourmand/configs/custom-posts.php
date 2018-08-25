<?php

	/**
	 *	Custom Posts Configs
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	mythemes
	 *  @since      mythemes 0.0.2
	 *  @version    0.0.1
	 */

	 $cfgs = gourmand_config::merge( (array)gourmand_config::get( 'custom-posts' ), array(
 		'gourmand-food-menu'	=> array(
 		    'singular-title'	=> __( 'Food Menu', 'gourmand' ),
 		    'plural-title'		=> __( 'Food Menus', 'gourmand' ),
 		    'fields' 			=> array( 'title' )
 		),
 	));

	gourmand_config::set( 'custom-posts', $cfgs );
?>
