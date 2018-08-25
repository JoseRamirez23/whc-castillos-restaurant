<?php
	if( !class_exists( 'gourmand_modules' ) ){
		class gourmand_modules
		{
			static function get( $module = null )
			{
				$rett = array();
				$cfgs = (array)gourmand_config::get( 'modules' );

				if( empty( $module ) )
					$rett = $cfgs;

				if( isset( $cfgs[ $module ] ) )
					$rett = $cfgs[ $module ];

				return $rett;
			}

			static function set( $module, $args )
			{
				$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'modules' ), array(
					$module => $args
				));

				gourmand_config::set( 'modules', $cfgs );
			}
		}
	}
?>
