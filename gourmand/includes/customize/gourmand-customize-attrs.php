<?php

	/**
	 *  Get the fields Attributes for Customize Controls and Settings.
	 *	these methods not are used directly.
	 *
	 *	Next fields comes with additional attributes:
	 *
	 *	number
	 *	int
	 *	natural
	 *	range
	 *	percent
	 *
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_customize_attrs' ) ){

		class gourmand_customize_attrs
		{
			public static function get( $args )
			{
				if( isset( $args[ 'type' ] ) &&  $args[ 'type' ] == 'get' )
					return;

				$attrs = array();

				if( isset( $args[ 'attrs' ] ) && is_array( $args[ 'attrs' ] ) && !empty( $args[ 'attrs' ] ) )
					foreach( $args[ 'attrs' ] as $attr => $value ){
						$attrs[ esc_attr( $attr ) ] = esc_attr( $value );
					}

				if( isset( $args[ 'type' ] ) && method_exists( 'gourmand_customize_attrs', $args[ 'type' ] ) )
					$attrs = call_user_func_array( array( 'gourmand_customize_attrs', $args[ 'type' ] ), array( $args ) );

				return $attrs;
			}

			public static function editor( $args )
			{
				if( !isset( $args[ 'attrs' ] ) )
					$args[ 'attrs' ] = array();

				return wp_parse_args( $args[ 'attrs' ], array(
					'aligns'	=> true,
					'accent'	=> true,
					'break'		=> true,
					'style'		=> 1
				));
			}

			public static function number( $args )
			{
				$__attrs 	= isset( $args[ 'attrs' ] ) ? (array) $args[ 'attrs' ] : array();
				$_attrs 	= isset( $args[ 'input_attrs' ] ) ? (array) $args[ 'input_attrs' ] : array();

				$attrs  	= array();

				if( empty( $__attrs ) )
					$__attrs = $_attrs;

				if( !empty( $__attrs ) ){
					if( isset( $__attrs[ 'min' ] ) )
						$attrs[ 'min' ] = gourmand_sanitize( $__attrs[ 'min' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'max' ] ) )
						$attrs[ 'max' ] = gourmand_sanitize( $__attrs[ 'max' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'step' ] ) )
						$attrs[ 'step' ] = gourmand_sanitize( $__attrs[ 'step' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'unit' ] ) && !empty( $__attrs[ 'unit' ] ) )
						$attrs[ 'data-unit' ] = esc_attr( $__attrs[ 'unit' ] );
				}

				if( isset( $args[ 'default' ] ) )
					$attrs[ 'data-default' ] = gourmand_sanitize( $args[ 'default' ], 'gourmand_sanitize_numeric', $args );

				return $attrs;
			}

			public static function integer( $args )
			{
				$__attrs 	= isset( $args[ 'attrs' ] ) ? (array) $args[ 'attrs' ] : array();
				$_attrs 	= isset( $args[ 'input_attrs' ] ) ? (array) $args[ 'input_attrs' ] : array();

				$attrs  	= array();

				if( empty( $__attrs ) )
					$__attrs = $_attrs;

				if( !empty( $__attrs ) ){
					if( isset( $__attrs[ 'min' ] ) )
						$attrs[ 'min' ] = intval( $__attrs[ 'min' ] );

					if( isset( $__attrs[ 'max' ] ) )
						$attrs[ 'max' ] = intval( $__attrs[ 'max' ] );

					if( isset( $__attrs[ 'step' ] ) )
						$attrs[ 'step' ] = intval( $__attrs[ 'step' ] );

					if( isset( $__attrs[ 'unit' ] ) && !empty( $__attrs[ 'unit' ] ) )
						$attrs[ 'data-unit' ] = esc_attr( $__attrs[ 'unit' ] );
				}

				if( isset( $args[ 'default' ] ) )
					$attrs[ 'data-default' ] = intval( $args[ 'default' ] );

				return $attrs;
			}

			public static function natural( $args )
			{
				$__attrs 	= isset( $args[ 'attrs' ] ) ? (array) $args[ 'attrs' ] : array();
				$_attrs 	= isset( $args[ 'input_attrs' ] ) ? (array) $args[ 'input_attrs' ] : array();

				$attrs  	= array();

				if( empty( $__attrs ) )
					$__attrs = $_attrs;

				if( !empty( $__attrs ) ){
					if( isset( $__attrs[ 'min' ] ) )
						$attrs[ 'min' ] = absint( $__attrs[ 'min' ] );

					if( isset( $__attrs[ 'max' ] ) )
						$attrs[ 'max' ] = absint( $__attrs[ 'max' ] );

					if( isset( $__attrs[ 'step' ] ) )
						$attrs[ 'step' ] = absint( $__attrs[ 'step' ] );

					if( isset( $__attrs[ 'unit' ] ) && !empty( $__attrs[ 'unit' ] ) )
						$attrs[ 'data-unit' ] = esc_attr( $__attrs[ 'unit' ] );
				}

				if( isset( $args[ 'default' ] ) )
					$attrs[ 'data-default' ] = absint( $args[ 'default' ] );

				return $attrs;
			}

			public static function range( $args )
			{
				$__attrs 	= isset( $args[ 'attrs' ] ) ? (array) $args[ 'attrs' ] : array();
				$_attrs 	= isset( $args[ 'input_attrs' ] ) ? (array) $args[ 'input_attrs' ] : array();

				$attrs  	= array();

				if( empty( $__attrs ) )
					$__attrs = $_attrs;

				if( !empty( $__attrs ) ){
					if( isset( $__attrs[ 'min' ] ) )
						$attrs[ 'min' ] = gourmand_sanitize( $__attrs[ 'min' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'max' ] ) )
						$attrs[ 'max' ] = gourmand_sanitize( $__attrs[ 'max' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'step' ] ) )
						$attrs[ 'step' ] = gourmand_sanitize( $__attrs[ 'step' ], 'gourmand_sanitize_numeric', $args );

					if( isset( $__attrs[ 'unit' ] ) && !empty( $__attrs[ 'unit' ] ) )
						$attrs[ 'data-unit' ] = esc_attr( $__attrs[ 'unit' ] );
				}

				if( isset( $args[ 'default' ] ) )
					$attrs[ 'data-default' ] = gourmand_sanitize( $args[ 'default' ], 'gourmand_sanitize_numeric', $args );

				return $attrs;
			}

			public static function percent( $args )
			{
				$__attrs 	= isset( $args[ 'attrs' ] ) ? (array) $args[ 'attrs' ] : array();
				$_attrs 	= isset( $args[ 'input_attrs' ] ) ? (array) $args[ 'input_attrs' ] : array();

				$attrs  	= array(
					'min'		=> 0,
					'max'		=> 100,
					'step'		=> 1,
					'data-unit' => '%'
				);

				if( empty( $__attrs ) )
					$__attrs = $_attrs;

				if( !empty( $__attrs ) ){
					if( isset( $__attrs[ 'min' ] ) )
						$attrs[ 'min' ] = gourmand_sanitize_percent( $__attrs[ 'min' ] );

					if( isset( $__attrs[ 'max' ] ) )
						$attrs[ 'max' ] = gourmand_sanitize_percent( $__attrs[ 'max' ] );

					if( isset( $__attrs[ 'step' ] ) )
						$attrs[ 'step' ] = gourmand_sanitize_percent( $__attrs[ 'step' ] );

					if( isset( $__attrs[ 'unit' ] ) && !empty( $__attrs[ 'unit' ] ) ){
						$attrs[ 'data-unit' ] = esc_attr( $__attrs[ 'unit' ] );
					}
				}

				if( isset( $args[ 'default' ] ) )
					$attrs[ 'data-default' ] = gourmand_sanitize_percent( $args[ 'default' ] );

				return $attrs;
			}
		}
	}
?>
