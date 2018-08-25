<?php

	/**
	 *  Slide Control (image chooser).
	 *	to do: rename to - Gourmand_WP_Customize_Select_Image_Control
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_slide_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_slide_control extends gourmand_wp_customize_control
		{
			public $fields;
			public $title;
			public $type = 'slide';

			public function __construct( $manager, $id, $args = array() )
			{
				if( isset( $manager -> status ) && $manager -> status == 'empty' )
					return;
			}

			public function render_content()
			{
				if( $this -> type == 'slide' ){
					?>
						<!-- here will be content -->
					<?php
				}
			}
		}
	}
?>
