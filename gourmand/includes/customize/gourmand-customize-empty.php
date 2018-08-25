<?php

	/**
	 *  Empty Customize
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_empty' ) ){

		class gourmand_customize_empty
		{
			public $status = 'empty';

			public function __construct(){}

			public function add_panel( $id, $args = array() ){}

			public function add_section( $id, $args = array() ){}

			public function add_setting( $id, $args = array() ){}

			public function add_control( $obj ){}
		}
	}

?>
