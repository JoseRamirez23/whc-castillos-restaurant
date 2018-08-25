<?php

	if( !class_exists( 'gourmand_mod' ) ){

		class gourmand_mod
		{
			public static function get( $name, $default = null )
			{
				$esc = self::esc( $name );

				if( is_null( $default ) )
					$default = self::def( $name );

				$val = get_theme_mod( $name, $default );

				if( is_callable( $esc ) )
					$val = call_user_func_array( $esc, array( $val ) );

				return $val;
			}

			public static function def( $name )
			{
				$default 	= null;
				$theme_mods = gourmand_config::get( 'theme-mods' );

				if( isset( $theme_mods[ $name ] ) && isset( $theme_mods[ $name ][ 'default' ] ) )
					$default = $theme_mods[ $name ][ 'default' ];

				return $default;
			}

			public static function esc( $name )
			{
				$esc 		= null;
				$theme_mods = gourmand_config::get( 'theme-mods' );

				if( isset( $theme_mods[ $name ] ) && isset( $theme_mods[ $name ][ 'sanitize' ] ) )
					$esc = $theme_mods[ $name ][ 'sanitize' ];

				return $esc;
			}

			public static function pack( $prefix, $args, $display = false )
			{
				$pack = array();

				if( !empty( $args ) ){
					foreach( $args as $key => $value ){

						if( is_bool( $value ) ){
							$name = $key;

							if( $value ){
								$pack[ $name ] = self::is_set( "{$prefix}-{$name}" ) ? self::get( "{$prefix}-{$name}" ) : null;
							}

							else{
								$pack[ $name ] = self::get( "{$prefix}-{$name}" );
							}
						}

						else if( is_array( $value ) ){
							$one_is_set = false;
							$_pack 		= array();
							$__pack 	= array();

							foreach( $value as $k => $v ){
								$name 			= $v;
								$_pack[ $name ] = null;

								if( is_bool( $v ) ){
									unset( $_pack[ $v ] );
									$name 			= $k;
									$_pack[ $name ] = null;

									if( $v ){
										if( self::is_set( "{$prefix}-{$name}" ) ){
											$one_is_set = true;
											$_pack[ $name ] = self::get( "{$prefix}-{$name}" );
										}
									}

									else{
										$one_is_set = true;
										$_pack[ $name ] = self::get( "{$prefix}-{$name}" );
									}
								}

								$__pack[ $name ] = self::get( "{$prefix}-{$name}" );
							}

							if( $one_is_set ){
								$pack = array_merge( $pack, $__pack );
							}

							else{
								$pack = array_merge( $pack, $_pack );
							}
						}

						else{
							$name = $value;
							$pack[ $name ] = self::get( "{$prefix}-{$name}" );
						}
					}

					if( $display )
						$pack[ 'display' ] = self::get( $prefix );
				}

				return $pack;
			}

			public static function set( $name, $val )
			{
				$esc = self::esc( $name );

				if( is_callable( $esc ) )
					$val = call_user_func_array( $esc, array( $val ) );

				set_theme_mod( $name, $val );
			}

			static function is_set( $name )
			{
				$is_set = true;
				$def 	= self::def( $name );
				$val 	= self::get( $name, $def );

				if( $val == $def )
					$is_set = false;

				return $is_set;
			}

			public static function remove( $name )
			{
				remove_theme_mod( $name );
			}
		}
	}
?>
