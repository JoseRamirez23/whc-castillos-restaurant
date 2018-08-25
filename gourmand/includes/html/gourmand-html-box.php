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
	 
	if( !class_exists( 'gourmand_html_box' ) ){
		class gourmand_html_box
		{
			private $attr;

			function __construct()
			{
				$this -> attr 	= new gourmand_html_attr();
				$this -> field 	= new gourmand_html_field();
			}

			function get( $args )
		    {
				$rett = '';

				if( !empty( $args ) ){

					$args = apply_filters( 'gourmand_html_attr__class', $args, 'mythemes-box' );

			        $rett  = '<div ';
			        $rett .= $this -> attr -> get( 'id', 	$args ) . ' ';
			        $rett .= $this -> attr -> get( 'class', $args ) . ' ';
			        $rett .= $this -> attr -> get( 'style', $args ) . ' ';
			        $rett .= '>';

			        //- BOX HEADER -//
			        // FILTRU
			        $header = $this -> header( $args );

			        if( !empty( $header ) ){
				        $rett .= '<div class="mythemes-box-header">';
				        $rett .= $header;
				        $rett .= '</div>';
			    	}

			        //- BOX CONTENT -//
			        $rett .= '<div class="mythemes-box-content">';

			        // FILTRU
			        $rett .= $this -> content( $args );

			        $rett .= '</div>';
			        $rett .= '</div>';
				}

		        return $rett;
		    }

			function header( $args )
		    {
		        $rett = '';

	            if( isset( $args[ 'title' ] ) ){
	                $rett .= '<h3>' . esc_html( $args[ 'title' ] ) . '</h3>';
	            }

	            if( isset( $args[ 'description' ] ) ){
	                $rett .= '<small>' . esc_html( $args[ 'description' ] ) . '</small>';
	            }

		        return $rett;
		    }

		    function content( $args )
		    {
		        $rett = gourmand_template::content( $args );

		        if( isset( $args[ 'fields' ] ) && !empty( $args[ 'fields' ] ) && is_array( $args[ 'fields' ] ) ){
		        	foreach( $args[ 'fields' ] as $index => $args ){
		        		$rett .= $this -> field -> get( $args );
		        	}
		        }

		        return $rett;
		    }
		}
	}
?>
