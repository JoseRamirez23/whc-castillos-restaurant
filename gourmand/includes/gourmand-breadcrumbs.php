<?php

	/**
	 *	Breadcrumbs
	 */

	if( !class_exists( 'gourmand_breadcrumbs' ) ){

		class gourmand_breadcrumbs
		{
			static function home()
		    {
				// esc_attr( tempo_options::get( 'breadcrumbs-home-description' ) )
				// ' . tempo_options::get( 'breadcrumbs-home-text' ) . '
		        $rett  = '<li id="home-text">';
		        $rett .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . __( 'Home', 'gourmand' )  . '">';
		        $rett .= '<i class="gourmand-icon-home-5"></i> <span>' . __( 'Home', 'gourmand' )  . '</span>';
		        $rett .= '</a>';
		        $rett .= '</li>';

		        return $rett;
		    }

		    static function categories( $c_id )
			{
				$rett = '';

				$c = get_category( $c_id );

				if( isset( $c -> category_parent ) && $c -> category_parent > 0 ){
					$rett .= self::categories( $c -> category_parent );
				}

				$category_link = get_category_link( $c -> term_id );

				if( is_wp_error( $category_link ) ){
					return '';
				}

				if( !is_category( $c -> term_id ) ){
					$rett .= '<li>';
					$rett .= '<a href="' . esc_url( $category_link ) . '" title="' . sprintf( __( 'See articles from category - %1$s' , 'gourmand' ), esc_attr( $c -> name ) ) . '">' . $c -> name . '</a>';
					$rett .= '</li>';
				}

				return $rett;
			}

			static function terms( $t_id, $tax )
			{
				$rett = '';

				$t = get_term( $t_id );

				if( isset( $t -> parent ) && $t -> parent > 0 ){
					$rett .= self::terms( $t -> parent, $tax );
				}

				$link = get_term_link( $t -> term_id );

				if( is_wp_error( $link ) ){
					return '';
				}

				if( is_tax( $tax, $t -> term_id ) ){
					$rett .= '<li>' . esc_html( $t -> name ) . '</li>';
				}
				else{
					$rett .= '<li>';
					$rett .= '<a href="' . esc_url( $link ) . '" title="' . sprintf( __( 'See articles from - %1$s' , 'gourmand' ), esc_attr( $t -> name ) ) . '">' . esc_html( $t -> name ) . '</a>';
					$rett .= '</li>';
				}

				return $rett;
			}

			static function pages( $p )
			{
		        $rett = '';

		        if( isset( $p -> post_parent ) && $p -> post_parent > 0 ){
		            $parent = get_post( $p -> post_parent );
		            $rett .= self::pages( $parent );
		        }

		        if( !is_page( $p -> ID  ) ){
		            $rett .= '<li>';
		            $rett .= '<a href="' . esc_url( get_permalink( $p ) ) . '" title="' . esc_attr( get_the_title( $p ) ) . '">' .  get_the_title( $p ) . '</a>';
		            $rett .= '</li>';
		        }

		        return $rett;
		    }

			static function count( $query )
			{
				$query = apply_filters( 'gourmand_breadcrumbs_counter_query', $query );

				$label = sprintf( __( 'One %1$s', 'gourmand' ), gourmand_mod::get( 'blog-article' ) );

				if( absint( $query -> found_posts ) !== 1 )
					$label = sprintf( __( '%1$s %2$s', 'gourmand' ), number_format_i18n( $query -> found_posts ), gourmand_mod::get( 'blog-articles' ) );

				if( is_search() ){
					$label = __( 'One Result', 'gourmand' );

					if( absint( $query -> found_posts ) !== 1 )
						$label = sprintf( __( '%1$s Results', 'gourmand' ), number_format_i18n( $query -> found_posts ) );
				}

				return '<span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( $query -> found_posts ) . '</span>' ) . '</span>';
			}
		}
	}
?>
