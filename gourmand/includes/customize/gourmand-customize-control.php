<?php

	/**
	 *  Manage Customize Controls.
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_control' ) ){

		class gourmand_customize_control
		{
			private $api;

			public function __construct( $wp_customize = null, $id = null, $args = null )
			{
				if( isset( $args[ 'type' ] ) &&  $args[ 'type' ] == '__construct' )
					return;


				if( !empty( $wp_customize ) )
					$this -> api = $wp_customize;

				if( !( empty( $id ) || empty( $args ) || empty( $wp_customize ) ) ){
					$this -> api = $wp_customize;

					if( isset( $args[ 'type' ] ) && method_exists( $this, $args[ 'type' ] ) )
						call_user_func_array( array( $this, $args[ 'type' ] ), array( $id, $args ) );
				}
			}

			public function add( $id, $args, $wp_customize = null )
			{
				if( isset( $args[ 'type' ] ) &&  $args[ 'type' ] == 'add' )
					return;


				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> isset( $args[ 'type' ] ) ? $args[ 'type' ] : null
				);

				if( !empty( $wp_customize ) )
					$this -> api = $wp_customize;

				if( isset( $args[ 'type' ] ) && method_exists( $this, $args[ 'type' ] ) )
					$control = call_user_func_array( array( $this, $args[ 'type' ] ), array( $id, $args ) );

				return $control;
			}


			/**
			 *	Customize fields Controls:
			 *
			 *	checkbox
			 *	logic
			 *	url
			 *	integer
			 *	number
			 *	range
			 *	percent
			 *	text
			 *	textarea
			 *	copyright
			 *	select
			 *	upload
			 *	color
			 *	rgba
			 *	gmap
			 *	font
			 *	icon
			 *	slide
			 */

			/**
			 *	Multiple Settings Control (adding dynamically)
			 */

			public function tab( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $args[ 'settings' ],
					'fields'	=> $args[ 'fields' ],
					'type'		=> 'tab'
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'title' ] ) )
					$control[ 'title' ] = $args[ 'title' ];

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_tab_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function checkbox( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> 'checkbox'
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function logic( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> 'checkbox'
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function url( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> 'url'
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function number( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'number',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_number_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function integer( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'integer',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_number_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function natural( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'natural',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_number_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function range( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'range',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_number_control( $this -> api, $id, $control ) );

				return $control;
			}

			// float range

			public function percent( $id, $args )
			{
				if( !isset( $args[ 'attrs' ] ) )
					$args[ 'attrs' ] = array();

				$args[ 'attrs' ] = wp_parse_args( $args[ 'attrs' ], array(
					'min'	=> 0,
					'max'	=> 100,
					'step'	=> 1,
					'unit'	=> '%'
				));

				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'percent',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_number_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function email( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'email',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function text( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'text',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function textarea( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'textarea',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function copyright( $id, $args )
			{
				$control = array(
					'section'		=> $args[ 'section' ],
					'settings'		=> $id,
					'type'			=> 'textarea',
					'input_attrs'	=> gourmand_customize_attrs::get( $args )
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function select( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> 'select',
					'choices'	=> array(
					)
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				if( !empty( $args[ 'options' ] ) )
					$control[ 'choices' ] = (array)$args[ 'options' ];

				$this -> api -> add_control( new gourmand_wp_customize_control( $this -> api, $id, $control ) );

				return $control;
			}

			/**
			 *	Multiple Settings Control:
			 *
			 *	image src
	 		 *	attachment id
			 */

			public function uploader( $id, $args )
			{
				$setting 	= new gourmand_customize_setting();
				$field 		= new gourmand_customize_field();

				$control = wp_parse_args( array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $setting -> get( $id, $args ),
					'type'		=> 'uploader'
				), $field -> get( $args ) );

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				$this -> api -> add_control( new gourmand_wp_customize_uploader_control( $this -> api, $id, $control ) );

				return $control;
			}

			public function color( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'type'		=> 'color'
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				if( !empty( $args[ 'default' ] ) ){
					$control[ 'defaultValue' ] = gourmand_esc::color( $args[ 'default' ] );
				}

				$this -> api -> add_control( new WP_Customize_Color_Control( $this -> api, $id, $control ) );

				return $control;
			}

			// color
			// transparency

			public function rgba( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					//'settings'	=> $args[ 'settings' ],
					'settings'	=> $id
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				return $control;
			}

			// style
			// zoom
			// lat
			// lng
			// Marker Icon
			// Marker Title
			// Marker Description

			public function gmap( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					//'settings'	=> $args[ 'settings' ],
					'settings'	=> $id
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				return $control;
			}

			// font family
			// font subsets
			// font size

			public function font( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					//'settings'	=> $args[ 'settings' ],
					'settings'	=> $id
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				return $control;
			}

			public function icon( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'choices'	=> array(

					)
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				if( !empty( $args[ 'options' ] ) )
					$control[ 'choices' ] = (array)$args[ 'options' ];

				return $control;
			}

			public function slide( $id, $args )
			{
				$control = array(
					'section'	=> $args[ 'section' ],
					'settings'	=> $id,
					'choices'	=> array(

					)
				);

				if( isset( $args[ 'callback' ] ) && is_callable( $args[ 'callback' ] ) )
					$control[ 'active_callback' ] = $args[ 'callback' ];

				if( isset( $args[ 'params' ] ) && is_array( $args[ 'params' ] ) )
					$control[ 'params' ] = (array)$args[ 'params' ];

				if( isset( $args[ 'param' ] ) )
					$control[ 'param' ] = esc_attr( $args[ 'param' ] );

				if( isset( $args[ 'priority' ] ) )
					$control[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !empty( $args[ 'label' ] ) )
					$control[ 'label' ] = esc_attr( $args[ 'label' ] );

				if( !empty( $args[ 'description' ] ) )
					$control[ 'description' ] = $args[ 'description' ];

				if( !empty( $args[ 'options' ] ) )
					$control[ 'choices' ] = (array)$args[ 'options' ];

				return $control;
			}
		}
	}
?>
