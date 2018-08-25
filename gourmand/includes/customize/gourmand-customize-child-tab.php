<?php

	/**
	 *  Manage Customize Child Tabs.
	 *
	 *	example of use:
	 *
	 * 	function my_customize_register( $wp_customize ){
	 *
	 *		$section = new gourmand_customize_section( 'section-slug', array(
	 *			'title'			=> __( 'Section Title' ),
	 *			'description'	=> __( 'this is a customize section.' ),
	 *		), $wp_customize );
	 *
	 *			$tab = $section -> add_tab_( 'tab-slug-lv-0', array(
	 *				'title'			=> __( 'Tab (level 0)' ),
	 *				'description'	=> __( 'this is a level 0 Tab.' ),
	 *			));
	 *
	 *				$child_tab = $tab -> add_tab_( 'tab-slug-lv-1', array(
	 *					'title'			=> __( 'Child Tab (level 1)' ),
	 *					'description'	=> __( 'this is a level 1 Tab. A child tab of "Tab (level 0)".' ),
	 *				));
	 *
	 *					$child_tab -> add_field( 'checkbox-field-slug', array(
	 *						'type'			=> 'checkbox',
	 *						'label'			=> __( 'Child Tab checkbox Field' ),
	 *						'description'	=> __( 'this is a checkbox field into the "Child Tab (level 1)".' )
	 *					));
	 *
	 *					$child_tab -> add_field( 'text-field-slug', array(
	 *						'type'			=> 'text',
	 *						'label'			=> __( 'Child Tab text Field' ),
	 *						'description'	=> __( 'this is a text field into the "Child Tab (level 1)".' ),
	 *						'default'		=> __( 'my text value' )
	 *					));
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

	if( !class_exists( 'gourmand_customize_child_tab' ) ){

		class gourmand_customize_child_tab
		{
			private $obj;
			private $tab;
			private $args;
			private $path;

			public function __construct( $tab = null, $args = array(), $obj = null , $path = array() )
			{
				if( !( empty( $tab ) || empty( $args ) || empty( $obj ) ) ){

					$slug = str_replace( '-', '_', $tab );

					if( !apply_filters( "gourmand_unregister_customize_tab_{$slug}", false ) ){

						$this -> obj	= $obj;
						$this -> tab 	= $tab;
						$this -> args	= $args;
						$this -> path	= $path;

						$this -> add( $tab, $args );

						array_push( $this -> path, $tab );
					}
				}
			}

			public function add( $tab, $args )
			{
				if( empty( $this -> obj ) || empty( $this -> tab ) )
					return;

				$args = wp_parse_args( $args, array(
					'type'		=> 'child_tab',
					'fields'	=> array(
					)
				));

				$setting = new gourmand_customize_setting( $this -> obj -> api() );

				$this -> obj -> fields( $this -> path, $tab, $args );
				$this -> obj -> settings( $setting -> add( $tab, $args ) );
			}

			public function add_tab_( $tab, $args )
			{
				if( empty( $this -> obj ) || empty( $this -> tab ) )
					return new gourmand_customize_child_tab();

				return new gourmand_customize_child_tab( $tab, $args, $this -> obj, $this -> path );
			}

			public function add_field( $id, $args )
			{
				if( empty( $this -> obj ) || empty( $this -> tab ) )
					return;

				$slug = str_replace( '-', '_', $id );

				if( !apply_filters( "gourmand_unregister_customize_field_{$slug}", false ) ){

					$setting	= new gourmand_customize_setting( $this -> obj -> api() );
					$field		= new gourmand_customize_field();

					$args		= array_merge( $args, (array)gourmand_esc::setting( $id, null, $args ) );
					$args		= array_merge( $args, array(
						'input_attrs' => gourmand_customize_attrs::get( $args )
					));

					$this -> obj -> fields( $this -> path, $id, $field -> get( $args ) );
					$this -> obj -> settings( $setting -> add( $id, $args ) );
				}
			}
		}
	}
?>
