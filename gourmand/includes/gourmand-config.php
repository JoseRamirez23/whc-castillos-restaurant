<?php

	/**
	 *  Config Tools Class.
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

	if( !class_exists( 'gourmand_config' ) ){

		class gourmand_config
		{

			private static $cfgs = array();

			public static function set( $key, $value )
			{
				self::$cfgs[ $key ] = $value;
			}

			public static function get( $key )
			{
				$rett = null;

				if( isset( self::$cfgs[ $key ] ) )
					$rett = self::$cfgs[ $key ];

				return $rett;
			}

			static function sort( $settings )
			{
				foreach( $settings as $slug => $args ){
					if( (string)$slug === 'advanced' || (string)$slug === 'appearance' ){
						$settings[ $slug ] = self::sort( self::sksort( $args, 'priority', true ) );
					}

					if( (string)$slug === 'sections' && is_array( $settings[ $slug ] ) ){
						$settings[ $slug ] = self::sort( self::sksort( $args, 'priority', true ) );
					}

					if( (string)$slug === 'fields' && is_array( $settings[ $slug ] )  ){
						$settings[ $slug ] = self::sksort( $args, 'priority', true );
					}

					if( (string)$slug === 'fonts' ){
						$settings[ $slug ] = self::sksort( $args, 'priority', true );
					}
				}

				return $settings;
			}

			static function sksort( $array, $subkey = "id", $sort_ascending = false )
			{
				$temp_array = array();

				if( count( $array ) )
					$temp_array[ key( $array ) ] = array_shift( $array );

				foreach( $array as $key => $val ){

					$offset = 0;
					$found  = false;

					foreach( $temp_array as $tmp_key => $tmp_val ){

						if( !is_array( $tmp_val ) )
							continue;

						if( !isset( $val[ $subkey ] ) )
							$val[ $subkey ] = $array[ $key ][ $subkey ] = 10;

						if( !isset( $tmp_val[ $subkey ] ) )
							$tmp_val[ $subkey ] = $temp_array[ $tmp_key ][ $subkey ] = 10;

						if( !$found && strtolower( $val[ $subkey ] ) > strtolower( $tmp_val[ $subkey ] ) ){
							$temp_array = array_merge( (array)array_slice( $temp_array, 0, $offset ), array( $key => $val ), array_slice( $temp_array, $offset ) );
							$found = true;
						}

						$offset++;
					}

					if( !$found )
						$temp_array = array_merge( $temp_array, array( $key => $val ) );
				}

				if ( $sort_ascending ){
					$array = array_reverse( $temp_array );
				}

				else{
					$array = $temp_array;
				}

				return $array;
			}

			static function merge( $ex_args, $new_args )
			{
				$merged = $ex_args;

				foreach ( $new_args as $key => & $value ){

					if ( is_array( $value ) && isset ( $merged[ $key ] ) && is_array( $merged[ $key ] ) ){
						$merged[ $key ] = self::merge( $merged[ $key ], $value );
					}

					else{
						$merged[ $key ] = $value;
					}
				}

				return self::sort( $merged );
			}

			static function optimize( $settings )
			{
				$rett = array();

				foreach( $settings as $slug => $args ){
					if( (string)$slug === 'fields' && is_array( $args ) ){
						foreach( $args as $index => $field ){

							if( isset( $field[ 'input' ] ) && isset( $field[ 'input' ][ 'name' ] ) ){
								$rett[ $field[ 'input' ][ 'name' ] ] = $field;
							}

							else{
								$rett[ $index ] = $field;
							}
						}
					}

					else if( is_array( $args ) ){
						$rett = array_merge( $rett, self::optimize( $args ) );
					}
				}

				return $rett;
			}
		}
	}
?>
