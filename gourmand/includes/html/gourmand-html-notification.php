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

	if( !class_exists( 'gourmand_html_notification' ) ){
		class gourmand_html_notification
		{
			function __construct()
			{
				$this -> attr = new gourmand_html_attr();
			}

			function get( $args )
			{
				$rett 			= '';
				$type 			= '';
				$title 			= null;
				$description	= null;

				if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ){
					$title = $args[ 'title' ];
				}

				if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ){
					$description = $args[ 'description' ];
				}

				if( !( empty( $title ) && empty( $description ) ) ){

					if( isset( $args[ 'class' ] ) ){
						$args[ 'class' ] .= ' mythemes-notification ';
					}
					else{
						$args[ 'class' ] = 'mythemes-notification ';
					}

					if( isset( $args[ 'type' ] ) && !empty( $args[ 'type' ] ) ){
						$args[ 'class' ] .= in_array( $args[ 'type' ] , array( 'notify', 'success', 'wrong', 'error' ) ) ? $args[ 'type' ] : 'notify';
					}

					if( isset( $args[ 'wrapper' ] ) ){
						$classes = isset( $args[ 'align' ] ) ? esc_attr( $args[ 'align' ] ) : 'center';
						$rett .= '<div class="mythemes-notification-wrapper ' . esc_attr( $classes ) . '">';
					}

					$rett .= '<div ' . $this -> attr -> get( 'class', $args ) . ' ' . $this -> attr -> get( 'style', $args ) . '>';

					if( !empty( $title ) ){
						$rett .= '<strong>' . $title . '</strong>';
					}

					if( !empty( $description ) ){
						$rett .= '<p>' . $description . '</p>';
					}

					$rett .= '</div>';

					if( isset( $args[ 'wrapper' ] ) ){
						$rett .= '</div>';
					}
				}

				return $rett;
			}
		}
	}
?>
