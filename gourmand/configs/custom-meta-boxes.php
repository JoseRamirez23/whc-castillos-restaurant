<?php

	/**
	 *	Custom Meta Boxes Configs
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	mythemes
	 *  @since      mythemes 0.0.2
	 *  @version    0.0.1
	 */

	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'custom-meta-boxes' ), array(
		'gourmand-food-menu' => array(
			'gourmand-dishes-manager' => array(
				'title' 	=> __( 'Dishes Manager', 'gourmand' ),
			    'context' 	=> 'normal',
			    'priority' 	=> 'high',
				'args' 		=> null,
			)
		)
	));

	gourmand_config::set( 'custom-meta-boxes', $cfgs );
?>
