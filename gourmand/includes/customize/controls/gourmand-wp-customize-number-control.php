<?php

	/**
	 *  Number Control.
	 *
	 *	Control Type:
	 *
	 *	number
	 *	integer
	 *	natural
	 *	range
	 *	percent
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_number_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_number_control extends gourmand_wp_customize_control
		{
			public $type;
			public $args;

			public function __construct( $manager, $id, $args = array() )
			{
				if( isset( $manager -> status ) && $manager -> status == 'empty' )
					return;

				parent::__construct( $manager, $id, $args );

				$this -> args = $args;
			}

			public function render_content()
			{
				switch( $this -> type ){
					case 'integer' : {
						gourmand_customize_template_field::integer( null, $this -> args, $this );
						break;
					}
					case 'natural' : {
						gourmand_customize_template_field::natural( null, $this -> args, $this );
						break;
					}
					case 'percent' : {
						gourmand_customize_template_field::percent( null, $this -> args, $this );
						break;
					}
					case 'range' : {
						gourmand_customize_template_field::range( null, $this -> args, $this );
						break;
					}
					default : {
						gourmand_customize_template_field::number( null, $this -> args, $this );
					}
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
