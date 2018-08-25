<?php

	/**
	 *  Uploader Control.
	 *
	 *	Multiple Settings:
	 *
	 *	image src
	 *	attachment id
	 *
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_uploader_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_uploader_control extends gourmand_wp_customize_control
		{
			public $id;
			public $title;
			public $args;
			public $type = 'uploader';

			public function __construct( $manager, $id, $args = array() )
			{
				if( isset( $manager -> status ) && $manager -> status == 'empty' )
					return;

				parent::__construct( $manager, $id, $args );

				$this -> id 	= $id;
				$this -> args 	= $args;
			}

			public function render_content()
			{
				if( $this -> type == 'uploader' ){
					gourmand_customize_template_field::uploader( $this -> id, $this -> args, $this );
				}
			}
		}
	}
?>
