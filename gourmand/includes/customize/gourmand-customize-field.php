<?php

	/**
	 *  Manage Customize Fields.
	 *
	 *	example of use:
	 *
	 * 	function my_customize_register( $wp_customize ){
	 *
	 *		$section = new gourmand_customize_section( 'section-slug', array(
	 *			'title'			=> __( 'Section' ),
	 *			'description'	=> __( 'this is a customize section.' ),
	 *		), $wp_customize );
	 *
	 *			$section -> add_field( 'checkbox-field-slug', array(
	 *				'type'			=> 'checkbox',
	 *				'label'			=> __( 'Checkbox Field' ),
	 *				'description'	=> __( 'this is a checkbox field into the "Section".' )
	 *			));
	 *
	 *			$section -> add_field( 'text-field-slug', array(
	 *				'type'			=> 'text',
	 *				'label'			=> __( 'Text Field' ),
	 *				'description'	=> __( 'this is a text field into the "Section".' ),
	 *				'default'		=> __( 'my text value' )
	 *			));
	 *	}
	 *
	 *	add_action( 'customize_register', 'my_customize_register' );
	 *
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_field' ) ){

		class gourmand_customize_field
		{
			private $api;
			private $id;

			private $control;
			private $setting;

			public function __construct( $id = null, $args = null, $wp_customize = null )
			{
				if( !( empty( $id ) || empty( $args ) || empty( $wp_customize ) ) ){

					$slug = str_replace( '-', '_', $id );

					if( !apply_filters( "gourmand_unregister_customize_field_{$slug}", false ) ){

						$args		= array_merge( $args, (array)gourmand_esc::setting( $id, null, $args ) );
						$args		= array_merge( $args, array(
							'input_attrs' => gourmand_customize_attrs::get( $args )
						));

						$setting = new gourmand_customize_setting( $wp_customize );
						$setting -> add( $id, $args );

						$control = new gourmand_customize_control( $wp_customize );
						$control -> add( $id, $args );
					}
				}
			}

			public function get( $args )
			{
				if( isset( $args[ 'type' ] ) &&  $args[ 'type' ] == 'get' )
					return;

				$args = wp_parse_args( $args, array(
					'capability' => 'edit_theme_options'
				));

				if( method_exists( $this, $args[ 'type' ] ) )
					$args = call_user_func_array( array( $this, $args[ 'type' ] ), array( $args ) );

				return $args;
			}

			/**
			 *	Generate full field args for next type of fields:
			 *
			 *	number
			 *	int
			 *	natural
			 *	range
			 *	percent
			 *	upload
			 */

			public function editor( $args )
			{
				$args[ 'attrs' ] = gourmand_customize_attrs::get( $args );

				return $args;
			}

			public function number( $args )
			{
				$args = wp_parse_args( $args, array(
					'input_attrs' => gourmand_customize_attrs::get( $args )
				));

				return $args;
			}

			public function integer( $args )
			{
				return $this -> number( $args );
			}

			public function natural( $args )
			{
				return $this -> number( $args );
			}

			public function range( $args )
			{
				return $this -> number( $args );
			}

			public function percent( $args )
			{
				return $this -> number( $args );
			}
		}
	}
?>
