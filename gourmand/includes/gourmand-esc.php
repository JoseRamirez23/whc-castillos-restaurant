<?php

	/**
	 *  Escape Settings Class.
	 *
	 *	Multiple Settings (adding dynamically)
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_esc' ) ){

		class gourmand_esc
		{
			public static $cols 	= array( 2, 3, 4, 5 );
			public static $figures	= array( 'rounded', 'circled', 'squared' ); // to do: figs
			public static $ranks	= array( 0, 1, 2, 3, 4, 5 );

			public static function setting( $id, $setting, $args )
			{
				if( isset( $setting[ 'sanitize_callback' ] ) && $setting[ 'sanitize_callback' ] == array( 'gourmand_esc', 'setting' ) ||
					isset( $args[ 'sanitize' ] ) && $args[ 'sanitize' ] == array( 'gourmand_esc', 'setting' ) )
					return;

				$mods = (array)gourmand_config::get( 'theme-mods' );

				if( isset( $mods[ $id ] ) && isset( $mods[ $id ][ 'default' ] ) ){

					if( isset( $setting[ 'sanitize_callback' ] ) && is_callable( $setting[ 'sanitize_callback' ] ) ){
						$setting[ 'default' ] = call_user_func_array( $setting[ 'sanitize_callback' ], array( $mods[ $id ][ 'default' ] ) );
					}

					if( isset( $args[ 'sanitize' ] ) && is_callable( $args[ 'sanitize' ] ) ){
						$setting[ 'default' ] = call_user_func_array( $args[ 'sanitize' ], array( $mods[ $id ][ 'default' ] ) );
					}

					if( isset( $mods[ $id ] ) &&  isset( $mods[ $id ][ 'sanitize' ] ) && is_callable( $mods[ $id ][ 'sanitize' ] ) ){
						$setting[ 'default' ] = call_user_func_array( $mods[ $id ][ 'sanitize' ], array( $mods[ $id ][ 'default' ] ) );
					}
				}

				if( isset( $mods[ $id ] ) &&  isset( $mods[ $id ][ 'sanitize' ] ) && is_callable( $mods[ $id ][ 'sanitize' ] ) ){
					$setting[ 'sanitize_callback' ] = $mods[ $id ][ 'sanitize' ];
				}

				else if( isset( $args[ 'sanitize' ] ) && is_callable( $args[ 'sanitize' ] ) ){
					$setting[ 'sanitize_callback' ] = $args[ 'sanitize' ];
				}

				return $setting;
			}

			public static function email( $value )
			{
				$rett = null;

				if( is_email( $value ) )
					$rett = $value;

				return $rett;
			}

			public static function url( $value )
			{
				return esc_url( $value );
			}

			public static function attr( $value )
			{
				return esc_attr( $value );
			}

			public static function figures( $value ) // to do: fig
			{
				$value = esc_attr( $value );

				return in_array( $value, self::$figures ) ? $value : self::$figures[ 0 ];
			}


			// to do: numeric_min
			public static function numeric( $value )
			{
				return is_numeric( $value ) ? $value + 0 : 0;
			}

			public static function real( $value )
			{
				return floatval( $value );
			}

			public static function int( $value )
			{
				return intval( $value );
			}

			public static function natural( $value )
			{
				return absint( $value );
			}

			public static function cols( $value ) // to do: col
			{
				$value = absint( $value );

				return in_array( $value, self::$cols ) ? $value : self::$cols[ 0 ];
			}

			public static function rank( $value )
			{
				$value = absint( $value );

				return in_array( $value, self::$ranks ) ? $value : 0;
			}

			// to do: percent_min
			public static function percent( $value )
			{
				$value = absint( $value );

				return ( 0 <= $value && $value <= 100 ) ? $value : 100;
			}

			public static function color( $value )
			{
				return sanitize_hex_color( $value );
			}

			public static function text( $value )
			{
				return sanitize_text_field( $value );
			}

			public static function textarea( $value )
			{
				return sanitize_textarea_field( $value );
			}

			public static function copyright( $value )
			{
				return wp_kses( $value, array(
					'a' => array(
						'href'  => array(),
						'label' => array(),
						'class' => array(),
						'id'    => array()
					),
					'br'        => array(),
					'em'        => array(),
					'strong'    => array(),
					'span'      => array()
				));
			}

			public static function logic( $value )
			{
				return absint( $value ) ? true : false;
			}


			public static function desc( $value )
			{
				return wp_kses( $value, array(
					'a' => array(
						'href'  => array(),
						'label' => array(),
						'class' => array(),
						'id'    => array()
					),
					'em'        => array(),
					'strong'    => array(),
					'span'      => array()
				));
			}

			public static function editor( $value )
			{
				return wp_kses( $value, array(
					'em'        => array(),
					'strong'    => array(),
					'span'      => array(
						'class' => array(),
						'style' => array()
					)
				));
			}

			public static function editor_break( $value )
			{
				return wp_kses( $value, array(
					'p' 		=> array(),
					'em'        => array(),
					'strong'    => array(),
					'span'      => array(
						'class' => array(),
						'style' => array()
					)
				));
			}

			public static function time( $value )
			{
				$time = esc_attr( date( esc_attr( get_option( 'time_format' ) ), strtotime( $value ) ) );

				if( empty( $value ) )
					$time = null;

				return $time;
			}

			public static function nr_sidebars( $nr )
			{
				return in_array( absint( $nr ), array( 1, 2, 3, 4, 5, 6 ) ) ? absint( $nr ) : 4;
			}
		}
	}
?>
