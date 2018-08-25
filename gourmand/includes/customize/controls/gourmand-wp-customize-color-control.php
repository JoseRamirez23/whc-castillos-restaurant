<?php

	/**
	 *  (?) Color Control (hex).
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_color_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_color_control extends gourmand_wp_customize_control
		{
			public $id;
			public $args;

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
				if( $this -> type == 'color' ){
					gourmand_customize_template_field::color( null, $this -> args, $this );
				}
			}

			public function get_input_attrs( $setting_key = null )
			{
				$rett = '';

				if( isset( $this -> args[ 'input_attrs' ] ) && is_array( $this -> args[ 'input_attrs' ] ) && !empty( $this -> args[ 'input_attrs' ] ) )
					foreach ( $this -> args[ 'input_attrs' ] as $attr => $value ) {
						$rett .= $attr . '="' . esc_attr( $value ) . '" ';
					}

				return $rett;
			}
		}
	}
?>
