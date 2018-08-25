<?php

	/**
	 *  Gourmand General Control.
	 *
	 *	This control extends basic WordPress control class and it is used to
	 *	define additional keys in parent control. Keys $params and $param are
	 *	used as active_callback's functions args. This feature is useful if
	 * 	the controls / fields are generated dinamicaly
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_control' ) ){
		if( class_exists( 'WP_Customize_Control' ) ){

			class gourmand_wp_customize_control extends WP_Customize_Control
			{
				public $params;
				public $param;

				public function __construct( $manager, $id, $args = array() )
				{
					if( isset( $manager -> status ) && $manager -> status == 'empty' )
						return;

					$this -> params = isset( $args[ 'params' ] ) ? $args[ 'params' ] : array();
					$this -> param 	= isset( $args[ 'param' ] ) ? $args[ 'param' ] : null;

					parent::__construct( $manager, $id, $args );
				}

				public function to_json() {
					parent::to_json();
				}
			}
		}
	}
?>
