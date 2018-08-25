<?php

	/**
	 *  Gallery Class.
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_gallery' ) ){

		class gourmand_gallery
		{
			static function shortcode( $rett, $_attr )
			{
		        if( !gourmand_mod::get( 'gallery-style' ) )
		            return null;

				global $post;

		        $attr = shortcode_atts( array(
		            'order'                 => 'ASC',
		            'orderby'               => 'menu_order ID',
		            'id'                    => $post -> ID,
		            'ids'                   => '',
		            'itemtag'               => 'dl',
		            'icontag'               => 'dt',
		            'captiontag'            => 'dd',
		            'columns'               => 3,
		            'size'                  => 'thumbnail',
		            'include'               => '',
		            'exclude'               => '',
		            'style'    				=> 'default'
		        ) , $_attr );

		        $cols 	= $attr[ 'columns' ];
				$style 	= $attr[ 'style' ];
		        $ids 	= array();

		        if( empty( $attr[ 'ids' ] ) ){

		            $id         = intval( $attr[ 'id' ] );
		            $orderby    = $attr[ 'order' ];
		            $order      = $attr[ 'order' ];
		            $inc    	= $attr[ 'include' ];
		            $exclude    = $attr[ 'exclude' ];

		            if ( 'RAND' == $attr[ 'order' ] ) {
		                $orderby = 'none';
		            }

		            if ( !empty( $inc ) ) {
		                $attachments = get_posts( array(
							'include' 			=> $inc,
							'post_status' 		=> 'inherit',
							'post_type' 		=> 'attachment',
							'post_mime_type' 	=> 'image',
							'order' 			=> $order,
							'orderby' 			=> $orderby
						));
		            } elseif ( !empty( $exclude ) ) {
		                $attachments = get_children( array(
							'post_parent'		=> $id,
							'exclude'			=> $exclude,
							'post_status'		=> 'inherit',
							'post_type'			=> 'attachment',
							'post_mime_type' 	=> 'image',
							'order'				=> $order,
							'orderby'			=> $orderby
						));
		            } else {
		                $attachments = get_children( array(
							'post_parent' 		=> $id,
							'post_status' 		=> 'inherit',
							'post_type' 		=> 'attachment',
							'post_mime_type' 	=> 'image',
							'order' 			=> $order,
							'orderby' 			=> $orderby
						));
		            }

		            foreach ( $attachments as $key => $val ) {
		                $ids[ ] = $val -> ID ;
		            }
		        }else{
		            $ids = explode( ',' , $attr[ 'ids' ] );
		        }

				if( !empty( $ids ) )
					do_action( 'gourmand_gallery_script', $attr );

				$classes = esc_attr( 'gourmand-gallery gourmand-gallery-colls-' . absint( $cols ) ) . ' ' . esc_attr( $attr[ 'style' ] );

				$rett  = '<div class="' . esc_attr( trim( $classes ) ) . '">';
				$rett .= '<div class="gourmand-gallery-wrapper">';

		        foreach( $ids as $id ){
		            $thumbnail 		= get_post( $id );
					$is_thumbnail 	= isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

				    if( !$is_thumbnail )
				        continue;

					// Picture
					$picture = '';

					if( $cols == 1 ){
						$picture = gourmand_image::picture( $thumbnail -> ID, array(
							'gourmand-860',	// 860,
							'gourmand-540',	// 540,
							'gourmand-296',	// 296,
						),
						array(
							'alt'	=> esc_attr( get_the_title( $thumbnail ) )
						));
					}

					else if( $cols == 2 ){
						$picture = gourmand_image::picture( $thumbnail -> ID, array(
							'gourmand-296',	// 296,
						),
						array(
							'alt'	=> esc_attr( get_the_title( $thumbnail ) )
						));
					}

					else {
						$picture = gourmand_image::picture( $thumbnail -> ID, array(
							'gourmand-296',	// 296,
						),
						array(
							'alt'	=> esc_attr( get_the_title( $thumbnail ) )
						));
					}

					$gallery_item  = '<figure class="gourmand-gallery-item">';
					$gallery_item .= '<div class="thumbnail-side">';
					$gallery_item .= '<div class="thumbnail-wrapper">';
					$gallery_item .= $picture;
					$gallery_item .= '</div>';
					$gallery_item .= '</div>';

					$gallery_item .= '<figcaption class="content-side">';
					$gallery_item .= '<div class="content-wrapper">';

					if( !empty( $thumbnail -> post_title ) )
						$gallery_item .= '<h3 class="title">' . get_the_title( $thumbnail ) . '</h3>';

					$excerpt = strip_tags( $thumbnail -> post_excerpt );

					if( !empty( $excerpt ) )
						$gallery_item .= '<p class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</p>';

					$gallery_item .= '</div>';
					$gallery_item .= '</figcaption>';
					$gallery_item .= '</figure>';

					// Overwrite Default Style
					$rett .= apply_filters( 'gourmand_gallery_item', $gallery_item, $thumbnail, $attr );
		        }

		        $rett .= '<div class="clear clearfix"></div>';
				$rett .= '</div>';
		        $rett .= '</div>';

		        return $rett;
			}
		}
	}
?>
