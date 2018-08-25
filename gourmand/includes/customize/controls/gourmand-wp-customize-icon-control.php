<?php

	/**
	 *  Icon Control (fontello).
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_icon_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_icon_control extends gourmand_wp_customize_control
		{
			public $fields;
			public $title;
			public $type = 'icon';

			public function __construct( $manager, $id, $args = array() )
			{
				if( isset( $manager -> status ) && $manager -> status == 'empty' )
					return;
			}

			public function render_content()
			{
				if( $this -> type == 'icon' ){
					?>
						<!-- here will be content -->
					<?php
				}
			}
		}
	}
?>
