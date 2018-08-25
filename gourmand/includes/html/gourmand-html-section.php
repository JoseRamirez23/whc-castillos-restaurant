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

	if( !class_exists( 'gourmand_html_section' ) ){
		class gourmand_html_section
		{
			private $attr;
			private $column;
			private $notif;

			function __construct()
			{
				$this -> attr 		= new gourmand_html_attr();
				$this -> column 	= new gourmand_html_column();
				$this -> notif 		= new gourmand_html_notification();
			}

			function get( $args )
			{
				$rett = '<div class="mythemes-section" ' . $this -> attr -> get( 'style', $args ) . '>';

				//- SECTION HEADER -//
				$header = $this -> header( $args );

				if( !empty( $header ) ){
					$rett .= '<div class="mythemes-section-header">';
					$rett .= $header;
					$rett .= '</div>';
				}

				//- SECTION CONTENT -//
				$rett .= '<div class="mythemes-section-content">';
				// FILTER
				$rett .= $this -> content( $args );
				$rett .= '</div>';

				$rett .= '</div>';

				return $rett;
			}

			function header( $args )
			{
				$rett = '';

				/* HEADLINE */
	            if( isset( $args[ 'title' ] ) ){
	                $rett .= '<h1 class="mythemes-section-title">' . $args[ 'title' ] . '</h1>';
	            }

	            /* DESCRIPTION */
	            if( isset( $args[ 'description' ] ) ){
	                $rett .= '<p class="mythemes-section-description">' . $args[ 'description' ] . '</p>';
	            }

	            /* NOTIFICATION */
	            $notif = null;

	            if( isset( $args[ 'notification' ] ) && !empty( $args[ 'notification' ] ) && is_array( $args[ 'notification' ] ) ){
					$notif = $this -> notif -> get( $args[ 'notification' ] );
				}

				if( !empty( $notif ) ){
					$rett .= '<div class="notofication-wrapper">' . $notif . '</div>';
				}

	            /* BUTTONS */

		        return $rett;
			}

			function content( $args )
			{
				$rett = gourmand_template::content( $args );

		        /* CONTENT FROM COLUMNS */
		        if( isset( $args[ 'columns' ] ) && !empty( $args[ 'columns' ] ) && is_array( $args[ 'columns' ] ) ){

		        	$rett .= $this -> column -> wrapper( 'before' );

		        	foreach( $args[ 'columns' ] as $index => $args ){
		        		$rett .= $this -> column -> get( $args );
		        	}

		        	$rett .= $this -> column -> wrapper( 'after' );
		        }

		        return $rett;
			}
		}
	}
?>
