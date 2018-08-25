<?php

	/**
	 *  Manage Customize Panels.
	 *
	 *	example of use:
	 *
	 * 	function my_customize_register( $wp_customize ){
	 *
	 *		$panel = new gourmand_customize_panel( 'panel-slug', array(
	 *			'title'			=> __( 'Panel' ),
	 *			'description'	=> __( 'this is a customize panel.' ),
	 *		), $wp_customize );
	 *
	 *			$section = $panel  -> add_section( 'section-slug', array(
	 *				'title'			=> __( 'Section' ),
	 *				'description'	=> __( 'this is a customize section into the "Panel".' ),
	 *			));
	 *
	 *				$section -> add_field( 'checkbox-field-slug', array(
	 *					'type'			=> 'checkbox',
	 *					'label'			=> __( 'Checkbox Field' ),
	 *					'description'	=> __( 'this is a checkbox field into the "Section".' )
	 *				));
	 *
	 *				$section -> add_field( 'text-field-slug', array(
	 *					'type'			=> 'text',
	 *					'label'			=> __( 'Text Field' ),
	 *					'description'	=> __( 'this is a text field into the "Section".' ),
	 *					'default'		=> __( 'my text value' )
	 *				));
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

	if( !class_exists( 'gourmand_customize_panel' ) ){

		class gourmand_customize_panel
		{
			private $api;
			private $panel;

			public function __construct( $panel, $args, $wp_customize )
			{
				$slug = str_replace( '-', '_', $panel );

				if( !apply_filters( "gourmand_unregister_customize_panel_{$slug}", false ) ){

					$this -> api 	= $wp_customize;
					$this -> panel	= $panel;

					$args = wp_parse_args( $args, array(
						'capability' => 'edit_theme_options'
					));

					if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
						$args[ 'active_callback' ] = $args[ 'callback' ];

					$this -> api -> add_panel( $panel, $args );
				}
			}

			public function add_section( $section, $args )
			{
				if( empty( $this -> api ) || empty( $this -> panel ) )
					return new gourmand_customize_section();

				$args = wp_parse_args( $args, array(
					'panel' => $this -> panel
				));

				return new gourmand_customize_section( $section, $args, $this -> api );
			}
		}
	}
?>
