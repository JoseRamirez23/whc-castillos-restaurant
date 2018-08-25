<?php

	/**
	 *  Manage Customize Tabs.
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
	 *			// first Tab
	 *			$tab_1 = $section -> add_tab_( 'tab-1-slug', array(
	 *				'title'			=> __( 'Tab 1' ),
	 *				'description'	=> __( 'this is a Tab.' ),
	 *			));
	 *
	 *				$tab_1 -> add_field( 'checkbox-field-slug', array(
	 *					'type'			=> 'checkbox',
	 *					'label'			=> __( 'Tab 1 checkbox Field' ),
	 *					'description'	=> __( 'this is a checkbox field into the "Tab 1".' )
	 *				));
	 *
	 *			// second Tab
	 *			$tab_2 = $section -> add_tab_( 'tab-2-slug', array(
	 *				'title'			=> __( 'Tab 2' ),
	 *				'description'	=> __( 'this is a Tab.' ),
	 *			));
	 *
	 *				$tab_2 -> add_field( 'text-field-slug', array(
	 *					'type'			=> 'text',
	 *					'label'			=> __( 'Tab 2 text Field' ),
	 *					'description'	=> __( 'this is a text field into the "Tab 2".' ),
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

	if( !class_exists( 'gourmand_customize_tab' ) ){

		class gourmand_customize_tab
		{
			private $api;
			private $tab;
			private $args;

			private $fields 	= array();
			private $settings 	= array();

			public function __construct( $tab = null, $args = null, $wp_customize = null )
			{
				if( !( empty( $tab ) || empty( $args ) || empty( $wp_customize ) ) ){

					$slug = str_replace( '-', '_', $tab );

					if( !apply_filters( "gourmand_unregister_customize_tab_{$slug}", false ) ){

						$this -> api 	= $wp_customize;
						$this -> tab 	= $tab;
						$this -> args 	= $args;
					}
				}
			}

			public function add_field( $id, $args )
			{
				if( empty( $this -> api ) || empty( $this -> tab ) )
					return;

				$slug = str_replace( '-', '_', $id );

				if( !apply_filters( "gourmand_unregister_customize_field_{$slug}", false ) ){

					$setting	= new gourmand_customize_setting( $this -> api );
					$field		= new gourmand_customize_field();
					$args		= array_merge( $args, (array)gourmand_esc::setting( $id, null, $args ) );
					$args		= array_merge( $args, array(
						'input_attrs' => gourmand_customize_attrs::get( $args )
					));

					$this -> fields[ $id ] = $field -> get( $args );
					$this -> settings = array_merge( $this -> settings, $setting -> add( $id, $args ) );
				}
			}

			public function add_tab_( $tab, $args )
			{
				if( empty( $this -> api ) || empty( $this -> tab ) )
					return new gourmand_customize_child_tab();

				return new gourmand_customize_child_tab( $tab, $args, $this );
			}

			public function fields( $path, $id, $args )
			{
				$fields = & $this -> fields;

				foreach( $path as $key ){
					if( isset( $fields[ $key ][ 'fields' ] ) )
						$fields = & $fields[ $key ][ 'fields' ];
				}

				$fields[ $id ] = $args;

				unset( $fields );
			}

			public function settings( $setting )
			{
				$this -> settings = array_merge( $this -> settings, $setting );
			}

			public function api()
			{
				return $this -> api;
			}

			public function __destruct()
			{
				if( empty( $this -> api ) || empty( $this -> tab ) )
					return;

				if( isset( $this -> args[ 'callback' ] ) && is_callable( $this -> args[ 'callback' ] ) )
					$this -> args[ 'active_callback' ] = $this -> args[ 'callback' ];

				new gourmand_customize_control( $this -> api, $this -> tab, wp_parse_args( $this -> args, array(
					'settings'	=> $this -> settings,
					'fields'	=> $this -> fields,
					'type'		=> 'tab'
				)));
			}
		}
	}
?>
