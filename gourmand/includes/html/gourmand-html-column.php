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

	if( !class_exists( 'gourmand_html_column' ) ){
		class gourmand_html_column
		{
			private $layout = array(
                'sm'    => 12,
                'md'    => 8,
                'lg'    => 9
            );

			protected $wrapper = array(
				'before' 	=> '<div class="mythemes-columns-wrapper">',
				'after' 	=> '<div class="clear clearfix"></div></div>'
			);

			public $notif;
			public $box;

			function __construct()
			{
				$this -> notif 	= new gourmand_html_notification();
				$this -> box 	= new gourmand_html_box();
			}

			function get( $args )
			{
				$args = wp_parse_args( (array) $args, array(
	                'layout' => $this -> layout
            	));

            	$l = $args[ 'layout' ];

				$rett = '';

				$classes  	 = 'mythemes-column';
				$classes   	.= isset( $l[ 'lg' ] ) ? ' lg-' . $l[ 'lg' ] : ' lg-12';
				$classes 	.= isset( $l[ 'md' ] ) ? ' md-' . $l[ 'md' ] : ' md-12';
				$classes 	.= isset( $l[ 'sm' ] ) ? ' sm-' . $l[ 'sm' ] : ' sm-12';

				if( !empty( $args ) ){

					$rett .= '<div class="' . esc_attr( $classes ) . '">';

					// HEADER
					$header = $this -> header( $args );

					if( !empty( $header ) ){
						$rett .= '<div class="mythemes-column-header">';
						$rett .= $header;
						$rett .= '</div>';
					}

					// CONTENT
					$rett .= '<div class="mythemes-column-content">';
					$rett .= $this -> content( $args );
					$rett .= '</div>';

					$rett .= '</div>';
				}

				return $rett;
			}

			function wrapper( $key )
			{
				return isset( $this -> wrapper[ $key ] ) ? $this -> wrapper[ $key ] : null;
			}

			function header( $args )
			{
				$rett = '';

				// TITLE
				if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ){
					$rett .= '<h2>' . esc_html( $args[ 'title' ] ) . '</h2>';
				}

				// DESCRIPTION
				if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ){
					$rett .= '<p>' . esc_html( $args[ 'description' ] ) . '</p>';
				}

				// NOTIFICATION
				$notif = null;

	            if( isset( $args[ 'notification' ] ) && !empty( $args[ 'notification' ] ) && is_array( $args[ 'notification' ] ) ){
					$notif = $this -> notif -> get( $args[ 'notification' ] );
				}

				if( !empty( $notif ) ){
					$rett .= '<div class="notofication-wrapper">' . $notif . '</div>';
				}

				// BUTTONS

				return $rett;
			}

			function content( $args )
			{
				$rett = gourmand_template::content( $args );

				// BOXES
				if( isset( $args[ 'boxes' ] ) && !empty( $args[ 'boxes' ] ) && is_array( $args[ 'boxes' ] ) ){
					$boxes = $args[ 'boxes' ];

					foreach( $boxes as $index => $args ){
						$rett .= $this -> box -> get( $args );
					}
				}

				return $rett;
			}
		}
	}
?>
