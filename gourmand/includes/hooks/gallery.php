<?php

	/**
	 *	Init Gallery
	 */

    add_filter( 'post_gallery', array( 'gourmand_gallery',  'shortcode' ), 10, 2 );


	function gourmand_admin_media()
	{
		if( function_exists( 'get_current_screen' ) ){
			if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
                return;

			wp_enqueue_script( 'gourmand-gallery-settings',  get_template_directory_uri() . '/assets/theme/js/gallery.js', array( 'media-views' ), '0.1', true );
		}
	}

	add_action( 'wp_enqueue_media', 'gourmand_admin_media' );

	function gourmand_admin_settings()
	{
		if( function_exists( 'get_current_screen' ) ){

			if (  ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
				return;
			?>
				<script type="text/html" id="tmpl-gourmand-gallery-settings">
					<label class="gourmand-gallery-settings">
						<span><?php esc_html_e( 'Style', 'gourmand' ); ?></span>
						<select class="type" name="style" data-setting="style">
						<?php
							$options = array(
								'default'		=> __( 'Default', 'gourmand' ),
								'services'		=> __( 'Services', 'gourmand' ),
								'features'		=> __( 'Features', 'gourmand' ),
								'story'			=> __( 'Story', 'gourmand' ),
								'portfolio'		=> __( 'Portfolio', 'gourmand' )
							);

							foreach ( $options as $value => $name ) { ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, 'default' ); ?>>
									<?php echo esc_html( $name ); ?>
								</option>
						<?php } ?>
						</select>
					</label>
				</script>
			<?php
		}
	}

	add_action( 'print_media_templates', 'gourmand_admin_settings' );

	function gourmand_gallery_script( $attr )
	{
		if( $attr[ 'style' ] == 'portfolio' || $attr[ 'style' ] == 'services' || $attr[ 'style' ] == 'features' && $attr[ 'style' ] == 'story' ){
			wp_enqueue_script( 'gourmand-gallery-smartphoto',  get_template_directory_uri() . '/assets/skins/default/js/smartphoto.min.js', array( 'jquery' ), '0.0.2', true );
			wp_enqueue_script( 'gourmand-gallery-init-smartphoto',  get_template_directory_uri() . '/assets/skins/default/js/init-smartphoto.js', array( 'jquery' ), '0.0.2', true );
		}
	}

	add_action( 'gourmand_gallery_script', 'gourmand_gallery_script' );


	// Gallery Item
	function gourmand_gallery_item( $gallery_item, $thumbnail, $attr  )
	{
		/**
		 *	Gallery Style Portfolio
		 */

		if( $attr[ 'style' ] == 'portfolio' ){

			$url	= esc_url( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url' ) );
			$target	= esc_attr( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url_target' ) );

			// Picture
			$picture = '';

			if( $attr[ 'columns' ] == 1 ){
				$picture = gourmand_image::picture( $thumbnail -> ID, array(
					'gourmand-860',	// 860,
					'gourmand-540',	// 540,
					'gourmand-296',	// 296,
				),
				array(
					'alt'	=> esc_attr( get_the_title( $thumbnail ) )
				));
			}

			else if( $attr[ 'columns' ] == 2 ){
				$picture = gourmand_image::picture( $thumbnail -> ID, array(
					'gourmand-540',	// 540,
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
			$gallery_item .= '<div class="gourmand-gallery-item-inner">';
			$gallery_item .= '<div class="thumbnail-side">';
			$gallery_item .= '<div class="thumbnail-wrapper">';
			$gallery_item .= $picture;
			$gallery_item .= '</div>';
			$gallery_item .= '</div>';

			$gallery_item .= '<figcaption class="content-side">';
			$gallery_item .= '<div class="content-wrapper">';

			if( !empty( $url ) ){
				$gallery_item .= '<a href="' . esc_url( $url ) . '" class="flex-container valign-bottom" title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
				$gallery_item .= '<i class="gourmand-icon-link-2"></i>';
				$gallery_item .= '<span class="flex-item align-left">';

				if( !empty( $thumbnail -> post_title ) )
					$gallery_item .= '<span class="title">' . get_the_title( $thumbnail ) . '</span>';

				$excerpt = strip_tags( $thumbnail -> post_excerpt );

				if( !empty( $excerpt ) )
					$gallery_item .= '<span class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</span>';

				$gallery_item .= '</span>';
				$gallery_item .= '</a>';
			}

			else{
				$large = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-1024' );
				$small = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-296' );

				$gallery_item .= '<a href="' . esc_url( $large[ 0 ] ) . '" class="flex-container valign-bottom js-smartPhoto" data-caption="' . esc_attr( get_the_title( $thumbnail ) ) . '" data-id="gallery-item-' . absint( $thumbnail -> ID ) . '" data-group="gallery-item">';
				$gallery_item .= '<img src="' . esc_url( $small[ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '" class="hidden"/>';
				$gallery_item .= '<i class="gourmand-icon-eye-3"></i>';
				$gallery_item .= '<span class="flex-item align-left">';

				if( !empty( $thumbnail -> post_title ) )
					$gallery_item .= '<span class="title">' . get_the_title( $thumbnail ) . '</span>';

				$excerpt = strip_tags( $thumbnail -> post_excerpt );

				if( !empty( $excerpt ) )
					$gallery_item .= '<span class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</span>';

				$gallery_item .= '</span>';
				$gallery_item .= '</a>';
			}

			$gallery_item .= '</div>';
			$gallery_item .= '</figcaption>';
			$gallery_item .= '</div>';
			$gallery_item .= '</figure>';
		}

		/**
		 *	Gallery Style Services
		 */

		if( $attr[ 'style' ] == 'services' ){

			$url		= esc_url( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url' ) );
			$target		= esc_attr( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url_target' ) );

			// Picture
			$picture 	= gourmand_image::picture( $thumbnail -> ID, array(
				'gourmand-225',	// 225,
			),
			array(
				'alt'	=> esc_attr( get_the_title( $thumbnail ) )
			));

			$gallery_item  = '<figure class="gourmand-gallery-item">';
			$gallery_item .= '<div class="thumbnail-wrapper">';

			$gallery_item .= $picture;

			if( !empty( $url ) ){
				$gallery_item .= '<a href="' . esc_url( $url ) . '" title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
				$gallery_item .= '<i class="gourmand-icon-link-2"></i>';
				$gallery_item .= '</a>';
			}

			else{
				$large = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-1024' );
				$small = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-296' );

				$gallery_item .= '<a href="' . esc_url( $large[ 0 ] ) . '" class="js-smartPhoto" data-caption="' . esc_attr( get_the_title( $thumbnail ) ) . '" data-id="gallery-item-' . absint( $thumbnail -> ID ) . '" data-group="gallery-item">';
				$gallery_item .= '<img src="' . esc_url( $small[ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '" class="hidden"/>';
				$gallery_item .= '<i class="gourmand-icon-eye-3"></i>';
				$gallery_item .= '</a>';
			}

			$gallery_item .= '</div>';

			$gallery_item .= '<figcaption>';
			$gallery_item .= '<div class="content">';

			if( !empty( $thumbnail -> post_title ) ){

				$gallery_item .= '<h3 class="title">';

				if( !empty( $url ) ){
					$gallery_item .= '<a href="' . esc_url( $url ) . '"  title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
					$gallery_item .= get_the_title( $thumbnail );
					$gallery_item .= '</a>';
				}

				else{
					$gallery_item .= get_the_title( $thumbnail );
				}

				$gallery_item .= '</h3>';
			}

			$excerpt = strip_tags( $thumbnail -> post_excerpt );

			if( !empty( $excerpt ) ){
				$gallery_item .= '<p class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</p>';
			}

			$gallery_item .= '</div>';
			$gallery_item .= '</figcaption>';
			$gallery_item .= '</figure>';
		}

		/**
		 *	Gallery Style Features
		 */

		if( $attr[ 'style' ] == 'features' ){

			$url		= esc_url( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url' ) );
			$target		= esc_attr( gourmand_meta::val( $thumbnail -> ID, '_gpurmand_gallery_url_target' ) );

			// Picture
			$picture 	= gourmand_image::picture( $thumbnail -> ID, array(
				'gourmand-225',	// 225,
			),
			array(
				'alt'	=> esc_attr( get_the_title( $thumbnail ) )
			));

			$gallery_item  = '<figure class="gourmand-gallery-item">';
			$gallery_item .= '<div class="thumbnail-side">';
			$gallery_item .= '<div class="thumbnail-wrapper">';

			$gallery_item .= $picture;

			if( !empty( $url ) ){
				$gallery_item .= '<a href="' . esc_url( $url ) . '"  title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
				$gallery_item .= '<i class="gourmand-icon-link-2"></i>';
				$gallery_item .= '</a>';
			}
			else{
				$large = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-1024' );
				$small = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-296' );

				$gallery_item .= '<a href="' . esc_url( $large[ 0 ] ) . '" class="js-smartPhoto" data-caption="' . esc_attr( get_the_title( $thumbnail ) ) . '" data-id="gallery-item-' . absint( $thumbnail -> ID ) . '" data-group="gallery-item">';
				$gallery_item .= '<img src="' . esc_url( $small[ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '" class="hidden"/>';
				$gallery_item .= '<i class="gourmand-icon-eye-3"></i>';
				$gallery_item .= '</a>';
			}

			$gallery_item .= '</div>';
			$gallery_item .= '</div>';

			$gallery_item .= '<figcaption class="content-side">';
			$gallery_item .= '<div class="content-wrapper">';

			if( !empty( $thumbnail -> post_title ) ){

				$gallery_item .= '<h3 class="title">';

				if( !empty( $url ) ){
					$gallery_item .= '<a href="' . esc_url( $url ) . '"  title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
					$gallery_item .= get_the_title( $thumbnail );
					$gallery_item .= '</a>';
				}

				else{
					$gallery_item .= get_the_title( $thumbnail );
				}

				$gallery_item .= '</h3>';
			}

			$excerpt = strip_tags( $thumbnail -> post_excerpt );

			if( !empty( $excerpt ) )
				$gallery_item .= '<p class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</p>';

			$gallery_item .= '</div>';
			$gallery_item .= '</figcaption>';
			$gallery_item .= '</figure>';
		}

		/**
		 *	Gallery Style Story
		 */

		if( $attr[ 'style' ] == 'story' ){

			$url		= esc_url( gourmand_meta::val( $thumbnail -> ID, '_gourmand_gallery_url' ) );
			$target		= esc_attr( gourmand_meta::val( $thumbnail -> ID, '_gpurmand_gallery_url_target' ) );

			// Picture
			$picture 	= gourmand_image::picture( $thumbnail -> ID, array(
				'gourmand-225',	// 225,
			),
			array(
				'alt'	=> esc_attr( get_the_title( $thumbnail ) )
			));

			$gallery_item  = '<figure class="gourmand-gallery-item">';
			$gallery_item .= '<div class="thumbnail-side">';
			$gallery_item .= '<div class="thumbnail-wrapper">';

			$gallery_item .= $picture;

			if( !empty( $url ) ){
				$gallery_item .= '<a href="' . esc_url( $url ) . '"  title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
				$gallery_item .= '<i class="gourmand-icon-link-2"></i>';
				$gallery_item .= '</a>';
			}
			else{
				$large = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-1024' );
				$small = wp_get_attachment_image_src( $thumbnail -> ID , 'gourmand-296' );

				$gallery_item .= '<a href="' . esc_url( $large[ 0 ] ) . '" class="js-smartPhoto" data-caption="' . esc_attr( get_the_title( $thumbnail ) ) . '" data-id="gallery-item-' . absint( $thumbnail -> ID ) . '" data-group="gallery-item">';
				$gallery_item .= '<img src="' . esc_url( $small[ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '" class="hidden"/>';
				$gallery_item .= '<i class="gourmand-icon-eye-3"></i>';
				$gallery_item .= '</a>';
			}

			$gallery_item .= '</div>';
			$gallery_item .= '</div>';

			$gallery_item .= '<figcaption class="content-side">';
			$gallery_item .= '<div class="content-wrapper">';

			if( !empty( $thumbnail -> post_title ) ){

				$gallery_item .= '<h3 class="title">';

				if( !empty( $url ) ){
					$gallery_item .= '<a href="' . esc_url( $url ) . '"  title="' . esc_attr( get_the_title( $thumbnail ) ) . '" target="' . esc_attr( $target ) . '">';
					$gallery_item .= get_the_title( $thumbnail );
					$gallery_item .= '</a>';
				}

				else{
					$gallery_item .= get_the_title( $thumbnail );
				}

				$gallery_item .= '</h3>';
			}

			$excerpt = strip_tags( $thumbnail -> post_excerpt );

			if( !empty( $excerpt ) )
				$gallery_item .= '<p class="caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</p>';

			$gallery_item .= '</div>';
			$gallery_item .= '</figcaption>';
			$gallery_item .= '</figure>';
		}

		return $gallery_item;
	}

	add_filter( 'gourmand_gallery_item', 'gourmand_gallery_item', 10, 3 );
?>
