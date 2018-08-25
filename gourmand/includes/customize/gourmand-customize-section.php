<?php

	/**
	 *  Manage Customize Sections.
	 *
	 *	example of use:
	 *
	 * 	function my_customize_register( $wp_customize ){
	 *
	 *		// example 1: section with parent panel
	 *		$panel = new gourmand_customize_panel( 'panel-slug', array(
	 *			'title'			=> __( 'Panel' ),
	 *			'description'	=> __( 'this is a customize panel.' ),
	 *		), $wp_customize );
	 *
	 *			$section = $panel  -> add_section( 'section-slug-1', array(
	 *				'title'			=> __( 'Section 1' ),
	 *				'description'	=> __( 'this is a customize section into the "Panel".' ),
	 *			));
	 *
	 *				$section -> add_field( 'checkbox-field-slug', array(
	 *					'type'			=> 'checkbox',
	 *					'label'			=> __( 'Checkbox Field' ),
	 *					'description'	=> __( 'this is a checkbox field into the "Section".' )
	 *				));
	 *
	 *
	 *		// example 2: section without parent panel
	 *		$section = new gourmand_customize_section( 'section-slug-2', array(
	 *			'title'			=> __( 'Section 2' ),
	 *			'description'	=> __( 'this is a customize section (without parent panel).' ),
	 *		), $wp_customize );
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

	if( !class_exists( 'gourmand_customize_section' ) ){

		class gourmand_customize_section
		{
			private $api;
			private $section;

			public function __construct( $section, $args, $wp_customize )
			{
				if( !( empty( $section ) || empty( $args ) || empty( $wp_customize ) ) ){
					
					$slug = str_replace( '-', '_', $section );

					if( !apply_filters( "gourmand_unregister_customize_section_{$slug}", false ) ){

						$this -> api 		= $wp_customize;
						$this -> section	= $section;

						$args = wp_parse_args( $args, array(
							'capability' => 'edit_theme_options'
						));

						if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
							$args[ 'active_callback' ] = $args[ 'callback' ];

						$this -> api -> add_section( $section, $args );
					}
				}
			}

			public function add_tab_( $tab, $args )
			{
				if( empty( $this -> api ) || empty( $this -> section ) )
					return new gourmand_customize_tab();

				$args = wp_parse_args( $args, array(
					'section' => $this -> section
				));

				return new gourmand_customize_tab( $tab, $args, $this -> api );
			}

			public function add_field( $id, $args )
			{
				if( empty( $this -> api ) || empty( $this -> section ) )
					return new gourmand_customize_field();

				$args = wp_parse_args( $args, array(
					'section' => $this -> section
				));

				return new gourmand_customize_field( $id, $args, $this -> api );
			}
		}
	}
?>
