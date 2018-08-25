<?php

	/**
	 *  ..
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_html_field' ) ){

		/*
		 * 	$args = array(
		 * 		...
		 *
		 * 		'id'		=> 'HTML DOM Attribute'
		 * 		'class' 	=> 'HTML DOM Attribute',
		 * 		'format' 	=> [ 'across' | 'linear' ],
		 *
		 ****/

		class gourmand_html_field
		{
			private $attr;
			private $input;

			function __construct()
			{
				$this -> attr 	= new gourmand_html_attr();
				$this -> input 	= new gourmand_html_input();
			}

			function get( $args )
			{
				if( isset( $args[ 'format' ] ) && method_exists( $this, $args[ 'format' ] ) ) {
		            $rett = call_user_func_array( array( $this, $args[ 'format' ] ) , array( $args ) );
		        }
		        else{
		            ob_start();
		            print_r( $args );
		            $data = ob_get_clean();

		            $bt = debug_backtrace();
		            $caller = array_shift( $bt );

		            $rett  	= '<pre>' . $caller[ 'file' ] . ' : ' . $caller[ 'line' ];
		            $rett  .= '<br>Not found the field FORMAT : [ ' . esc_attr( $this -> attr -> slug( $args ) ) . ' ]';
		            $rett  .= '<br>' . $data .'</pre>';
		        }

		        return $rett;
			}

			function none( $args )
			{
				if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-field none' );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-' . esc_attr( $args[ 'input' ][ 'type' ] ) );

		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';

		            if( isset( $args[ 'title' ] ) || isset( $args[ 'description' ] ) ){
			            $rett  .= '<div class="mythemes-field-title">';

			            // label
			            if( isset( $args[ 'title' ] ) )
			            	$rett .= '<label ' . $this -> attr -> get( 'for', $args[ 'input' ] ) . '>' . $args[ 'title' ] . '</label>';

			            // hint ( small description )
			            if( isset( $args[ 'description' ] ) )
			            	$rett .= '<small class="mythemes-description">' . $args[ 'description' ] . '</small>';

			            $rett .= '</div>';
		        	}

		            $rett .= '<div class="mythemes-field-input">';
		            $rett .= $this -> input -> get( $args[ 'input' ] );
		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'gourmand' );
		        }

		        return $rett;
			}

			function across( $args )
			{
				return $this -> format( 'across', $args );
			}

			function linear( $args )
			{
				return $this -> format( 'linear', $args );
			}

			function social( $args )
			{
				if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-field social' );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-' . esc_attr( $args[ 'input' ][ 'type' ] ) );

		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';

		            $rett  .= '<div class="mythemes-field-icon">';

		            //- ICON -//
		            if( isset( $args[ 'icon' ] ) ){
		            	$rett .= '<i class="mythemes-icon-' . esc_attr( $args[ 'icon' ] ) . '"></i>';
		            }

		            $rett .= '</div>';

		            $rett .= '<div class="mythemes-field-input">';
		            $rett .= $this -> input -> get( $args[ 'input' ] );
		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'gourmand' );
		        }

		        return $rett;
			}

			private function format( $format, $args )
			{
		        if( isset( $args[ 'input' ] ) ) {

		        	$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-field ' . esc_attr( $format ) );

		        	if( isset( $args[ 'input' ][ 'type' ] ) )
		        		$args 	= apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-' . esc_attr( $args[ 'input' ][ 'type' ] ) );


		            $rett  	= '<div ' . $this -> attr -> get( 'id', $args ) . ' ' . $this -> attr -> get( 'class', $args ) . '>';

		            $rett  .= '<div class="mythemes-field-title">';

		            //- LABEL -//
		            if( isset( $args[ 'title' ] ) ){
		            	$rett .= '<label ' . $this -> attr -> get( 'for', $args[ 'input' ] ) . '>' . $args[ 'title' ] . '</label>';
		            }

		            // - HINT / SMALL DESCRIPTION -//
		            if( isset( $args[ 'description' ] ) ){
		            	$rett .= '<small class="mythemes-description">' . $args[ 'description' ] . '</small>';
		        	}

		            $rett .= '</div>';

		            $rett .= '<div class="mythemes-field-input gourmand-field-wrapper">';

					switch ( $args[ 'input' ][ 'type' ] ) {
						case 'int':
						case 'number':{
							$unit = $this -> attr -> get( 'data-unit', $args[ 'input' ], true );

							$rett .= '<span class="gourmand-field-reset">';
							$rett .= '<a href="javascript:void(null);" onclick="">' . __( 'Reset to Default', 'gourmand' ) . '</a>';
							$rett .= '<span class="gourmand-field-tools">';
							$rett .= $this -> input -> get( $args[ 'input' ] );

							if( !empty( $unit ) )
								$rett .= '<span class="gourmand-field-unit">' . $unit . '</span>';

							$rett .= '</span>';
							$rett .= '</span>';

							break;
						}
						case 'range':{
							$value 	= $this -> attr -> get( 'value', $args[ 'input' ] );
							$min 	= $this -> attr -> get( 'min', $args[ 'input' ] );
							$max 	= $this -> attr -> get( 'max', $args[ 'input' ] );
							$step 	= $this -> attr -> get( 'step', $args[ 'input' ] );
							$unit 	= $this -> attr -> get( 'data-unit', $args[ 'input' ] );
							$deff 	= $this -> attr -> get( 'data-default', $args[ 'input' ] );

							$rett .= '<span class="gourmand-field-reset">';
							$rett .= '<a href="javascript:void(null);" onclick="">' . __( 'Reset to Default', 'gourmand' ) . '</a>';
							$rett .= '<span class="gourmand-field-tools">';
							$rett .= '<input type="number" ' . "{$value} {$min} {$max} {$step} {$deff} {$unit}" . '/>';

							if( !empty( $unit ) )
								$rett .= '<span class="gourmand-field-unit">' .  $this -> attr -> get( 'data-unit', $args[ 'input' ], true ) . '</span>';

							$rett .= '</span>';
							$rett .= '</span>';

							$rett .= $this -> input -> get( $args[ 'input' ] );

							break;
						}
						case 'percent': {
							$value 	= $this -> attr -> get( 'value', $args[ 'input' ] );
							$min 	= $this -> attr -> get( 'min', $args[ 'input' ] );
							$max 	= $this -> attr -> get( 'max', $args[ 'input' ] );
							$step 	= $this -> attr -> get( 'step', $args[ 'input' ] );
							$unit 	= $this -> attr -> get( 'data-unit', $args[ 'input' ] );
							$deff 	= $this -> attr -> get( 'data-default', $args[ 'input' ] );

							$rett .= '<span class="gourmand-field-reset">';
							$rett .= '<a href="javascript:void(null);" onclick="">' . __( 'Reset to Default', 'gourmand' ) . '</a>';
							$rett .= '<span class="gourmand-field-tools">';
							$rett .= '<input type="number" ' . "{$value} {$min} {$max} {$step} {$deff}" . ' data-unit="%"/>';
							$rett .= '<span class="gourmand-field-unit">%</span>';
							$rett .= '</span>';
							$rett .= '</span>';

							$rett .= $this -> input -> get( $args[ 'input' ] );

							break;
						}
						default: {
							$rett .= $this -> input -> get( $args[ 'input' ] );
							break;
						}
					}

		            $rett .= '</div>';

		            $rett .= '<div class="clear"></div>';

		            $rett .= '</div>';
		        }
		        else{
		        	$rett = __( 'Input not found', 'gourmand' );
		        }

		        return $rett;
			}
		}
	}
?>
