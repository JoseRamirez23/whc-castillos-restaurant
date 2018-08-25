<?php
	if( !class_exists( 'gourmand_image' ) ){
		class gourmand_image
		{
			public static function picture( $thumbnail_id, $sizes, $args = array() )
			{
				$thumbnail          = get_post( absint( $thumbnail_id ) );
				$has_post_thumbnail = isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

				if( !$has_post_thumbnail )
					return;

				$args = wp_parse_args( $args, array(
					'alt'	=> null,
					'class'	=> null
				));

				$attachment	= self::attachment( $thumbnail -> ID, $sizes[ 0 ] );
				$src 		= esc_url( $attachment[ 'src' ] );

				$picture = '<picture>';

				foreach( $sizes as $index => $size ){
					if( isset( $sizes[ $index + 1 ] ) ){
						$media 	= self::attachment( $thumbnail -> ID, $size );
						$min	= self::attachment( $thumbnail -> ID, $sizes[ $index + 1 ] );
						$picture .= '<source media="(min-width: ' . absint( $min[ 'width' ] + 1 ) . 'px)" srcset="' . esc_url( $media[ 'src' ] ) . '">';
					}
				}

				$index 	= count( $sizes ) - 1;
				$media 	= self::attachment( $thumbnail -> ID, $sizes[ $index ] );
				$picture .= '<source media="(min-width: 1px)" srcset="' . esc_url( $media[ 'src' ] ) . '">';

				$picture .= '<img src="' . esc_url( $src ) . '" class="' . esc_attr( $args[ 'class' ] ) . '" alt="' . esc_attr( $args[ 'alt' ] ) . '"/>';
				$picture .= '</picture>';

				return $picture;
			}

			public static function header( $attachment_id, $args )
			{
				$thumbnail = get_post( absint( $attachment_id ) );

				if( !wp_attachment_is( 'image', $thumbnail ) )
					return;

				$args = wp_parse_args( $args, array(
					'alt' 	=> null,
					'class'	=> null
				));

				$sizes = apply_filters( 'gourmand_images_sizes_src', array(
					'gourmand-header',		// 2560,
			 		'gourmand-1680',		// 1680,
					'gourmand-1440',		// 1440,
					'gourmand-1280',		// 1280,
					'gourmand-1024',		// 1024,
					'gourmand-860',			// 860,
					'gourmand-540',			// 540,
					'gourmand-296',			// 296,
				));

				$attachment	= self::attachment( $thumbnail -> ID, 'gourmand-header' );

				$src 		= esc_url( $attachment[ 'src' ] );
				$width		= absint( $attachment[ 'width' ] );
				$srcset 	= "{$src} {$width}w, ";

				foreach( $sizes as $size ){
					$attachment	= self::attachment( $thumbnail -> ID, $size );
					$_src 	 	= esc_url( $attachment[ 'src' ] );
					$_width 	= absint( $attachment[ 'width' ] );

					$srcset .= esc_url( $_src ) . " {$_width}w, ";
				}

				return '<img src="' . esc_url( $src ) . '" class="' . esc_attr( $args[ 'class' ] ) . '" alt="' . esc_attr( $args[ 'alt' ] ) . '" srcset="' . $srcset . '" sizes="(max-width: 2560px) 100vw, 2560px"/>';
			}

			public static function attachment( $id, $size )
			{
				$args = wp_get_attachment_image_src( $id, $size );

				$rett = array(
					'src'	=> null,
					'width'	=> null
				);

				if( isset( $args[ 0 ] ) && esc_url( $args[ 0 ] ) )
					$rett[ 'src' ] = esc_url( $args[ 0 ] );

				if( isset( $args[ 1 ] ) && esc_url( $args[ 1 ] ) )
					$rett[ 'width' ] = absint( $args[ 1 ] );

				return $rett;
			}
		}
	}
?>
