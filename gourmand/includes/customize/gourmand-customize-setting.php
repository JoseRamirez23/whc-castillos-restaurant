<?php

	/**
	 *  Manage Customize Settings.
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_setting' ) ){

		class gourmand_customize_setting
		{
			private $api;

			public function __construct( $wp_customize = null, $id = null, $args = null )
			{
				if( isset( $args[ 'type' ] ) && $args[ 'type' ] == '__construct' )
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
				if( isset( $args[ 'type' ] ) && ( $args[ 'type' ] == 'get' || $args[ 'type' ] == 'get' ) )
					return;


				$settings = array(
					$id => $id
				);

				if( !empty( $wp_customize ) )
					$this -> api = $wp_customize;

				if( isset( $args[ 'type' ] ) && method_exists( $this, $args[ 'type' ] ) )
					$settings = call_user_func_array( array( $this, $args[ 'type' ] ), array( $id, $args ) );

				return $settings;
			}

			public function get( $id, $args )
			{
				$args = wp_parse_args( $args, array(
					'gourmand-not-add-setting' => true
				));

				return $this -> add( $id, $args );
			}

			/**
			 *	Customize fields Settings:
			 *
			 *	child_tab
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
			 *	Multiple Settings (adding dynamically)
			 */

			public function child_tab( $id, $args )
			{
				$setting = array(
					'transport'		=> 'refresh',
					'capability'	=> 'edit_theme_options',
					'fields'		=> array(

					)
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				//if( isset( $args[ 'priority' ] ) )
					//$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function checkbox( $id, $args )
			{
				$setting = array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'gourmand_sanitize_logic',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function logic( $id, $args )
			{
				$setting = array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'gourmand_sanitize_logic',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function url( $id, $args )
			{
				$setting = array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'esc_url_raw',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function number( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'gourmand_sanitize_numeric',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function integer( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'intval',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function natural( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function range( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'gourmand_sanitize_numeric',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function percent( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'gourmand_sanitize_percent',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function email( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => array( 'gourmand_esc', 'email' ),
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function text( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'sanitize_text_field',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function textarea( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'esc_textarea',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function copyright( $id, $args )
			{
				$setting = array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'gourmand_sanitize_copyright',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function editor( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => array( 'gourmand_esc', 'editor' ),
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'attrs' ] ) && isset( $args[ 'attrs' ][ 'break' ] ) && $args[ 'attrs' ][ 'break' ] )
					$setting[ 'sanitize_callback' ] = array( 'gourmand_esc', 'editor_break' );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			public function select( $id, $args )
			{
				$setting = array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'esc_attr',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			/**
			 *	Multiple Settings:
			 *
			 *	image src
			 *	attachment id
			 */

			public function uploader( $id, $args )
			{
				$setting = array(
					'transport'		=> 'refresh',
					'capability'	=> 'edit_theme_options',
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				// Attachment Id Setting
				$attachment_id = "{$id}-id";

				/**
				 *	Media SRC
				 */

				$uploader_src = wp_parse_args( $setting, array(
					'sanitize_callback' => 'esc_url_raw',
				));

				$__args = $args;

				if( isset( $__args[ 'default' ] ) )
					unset( $__args[ 'default' ] );

				if( isset( $args[ 'default' ] ) && !is_array( $args[ 'default' ] ) )
					$__args[ 'default' ] = $args[ 'default' ];


				if( isset( $__args[ 'sanitize' ] ) )
					unset( $__args[ 'sanitize' ] );

				$uploader_src = gourmand_esc::setting( $id, $uploader_src, $__args );


				/**
				 *	Attachment ID
				 */

				$uploader_id = wp_parse_args( $setting, array(
					'sanitize_callback' => 'absint',
				));

				$__args = $args;

				if( isset( $__args[ 'sanitize' ] ) )
					unset( $__args[ 'sanitize' ] );

				$uploader_id = gourmand_esc::setting( $attachment_id, $uploader_id, $__args );

				if( !(isset( $args[ 'gourmand-not-add-setting' ] ) && $args[ 'gourmand-not-add-setting' ] ) ){
					$this -> api -> add_setting( $id, $uploader_src );
					$this -> api -> add_setting( $attachment_id, $uploader_id );
				}

				return array(
					$id  			=> $id,
					$attachment_id	=> $attachment_id
				);
			}

			public function color( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color',
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'sanitize' ] ) )
					unset( $args[ 'sanitize' ] );

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			// to do

			// color
			// transparency

			public function rgba( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					//'sanitize_callback' => array( 'gourmand_validator', 'rgba' ),
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				//if( isset( $args[ 'default' ] ) )
					//$setting[ 'default' ] = gourmand_validator::rgba( $args[ 'default' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !(isset( $args[ 'gourmand-not-add-setting' ] ) && $args[ 'gourmand-not-add-setting' ] ) ){
					//$this -> api -> add_setting( $setting_id_image_src, 	$image_src );
					//$this -> api -> add_setting( $setting_id_attachment_id, $attachment_id );
				}

				return $setting;
			}

			// to do

			// style
			// zoom
			// lat
			// lng
			// Marker Style
			// Marker Title
			// Marker Description

			public function gmap( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					//'sanitize_callback' => array( 'gourmand_validator', 'gmap' ),
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				//if( isset( $args[ 'default' ] ) )
					//$setting[ 'default' ] = gourmand_validator::gmap( $args[ 'default' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !(isset( $args[ 'gourmand-not-add-setting' ] ) && $args[ 'gourmand-not-add-setting' ] ) ){
					//$this -> api -> add_setting( $setting_id_image_src, 	$image_src );
					//$this -> api -> add_setting( $setting_id_attachment_id, $attachment_id );
				}

				return $setting;
			}

			// to do

			// font family
			// font subsets

			public function font( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					//'sanitize_callback' => array( 'gourmand_validator', 'font' ),
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				//if( isset( $args[ 'default' ] ) )
					//$setting[ 'default' ] = gourmand_validator::font( $args[ 'default' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				if( !(isset( $args[ 'gourmand-not-add-setting' ] ) && $args[ 'gourmand-not-add-setting' ] ) ){
					//$this -> api -> add_setting( $setting_id_image_src, 	$image_src );
					//$this -> api -> add_setting( $setting_id_attachment_id, $attachment_id );
				}

				return $setting;
			}

			// to do

			public function icon( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'esc_attr',
					'capability'        => 'edit_theme_options'
				);

				$setting = gourmand_esc::setting( $id, $setting, $args );

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = esc_attr( $args[ 'transport' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				$this -> api -> add_setting( $id, $setting );

				return array(
					$id => $id
				);
			}

			// to do

			public function slide( $id, $args )
			{
				$setting = array(
					'transport'         => 'postMessage',
					//'sanitize_callback' => array( 'gourmand_validator', 'slide' ),
					'capability'        => 'edit_theme_options'
				);

				if( isset( $args[ 'transport' ] ) )
					$setting[ 'transport' ] = $args[ 'transport' ];

				//if( isset( $args[ 'default' ] ) )
					//$setting[ 'default' ] = gourmand_validator::slide( $args[ 'default' ] );

				if( isset( $args[ 'priority' ] ) )
					$setting[ 'priority' ] = absint( $args[ 'priority' ] );

				return $setting;
			}
		}
	}
?>
