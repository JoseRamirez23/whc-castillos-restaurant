<?php

	if( !class_exists( 'gourmand_scripts' ) ){

		class gourmand_scripts
		{
			public static function modules()
	        {
	            $modules = (array)gourmand_config::get( 'modules' );

	            if( !empty( $modules ) ){

	                foreach( $modules as $module => $cfgs ){
	                    if( !isset( $cfgs[ 'require' ] ) )
	                        continue;

	                    foreach( $cfgs[ 'require' ] as $key => $uri ){

	                        if( $key == 'style' ){
	                            wp_register_style( "gourmand-{$module}", $uri , null, '0.0.1', true );
	                            wp_enqueue_style( "gourmand-{$module}" );
	                            continue;
	                        }

	                        if( $key == 'module' ){
	                            wp_register_script( "gourmand-{$module}", $uri, null, '0.0.1', true );
	                            wp_localize_script( "gourmand-{$module}", $module, array(
	                                'args' => isset( $cfgs[ 'args' ] ) ? (array)$cfgs[ 'args' ] : array()
	                            ));
	                            wp_enqueue_script( "gourmand-{$module}" );
	                            continue;
	                        }

	                        wp_register_script( "gourmand-{$module}-{$key}", $uri, null, '0.0.1', true );
	                        wp_enqueue_script( "gourmand-{$module}-{$key}" );
	                    }
	                }
	            }
	        }

			public static function font( $font_name )
			{
				$rett = false;

				if( class_exists( 'EGF_Register_Options' ) ){

					$fonts = (array)get_option( 'tt_font_theme_options' );

					global $wp_customize;

					// Fetch options and transients.
					$transient       = isset( $wp_customize ) ? false : true;
					$options         = EGF_Register_Options::get_options( $transient );

					if( isset( $options[ $font_name ] ) && isset( $options[ $font_name ][ 'font_name' ] ) && strlen( $options[ $font_name ][ 'font_name' ] ) )
						$rett = true;
				}

				return $rett;
			}

			public static function frontend()
			{
				$montez    	= 'Montez';
				$open_sans	= 'Open+Sans:400,600';
				$quicksand	= 'Quicksand:300,400,500,700';

				if( !self::font( 'overwrite-montez' ) )
					wp_register_style( 'montez',           			'//fonts.googleapis.com/css?family=' . esc_attr( $montez ), null, '0.0.2' );

				if( !self::font( 'overwrite-open-sans' ) )
					wp_register_style( 'open-sans',           		'//fonts.googleapis.com/css?family=' . esc_attr( $open_sans ), null, '0.0.2' );

				if( !self::font( 'overwrite-quicksand' ) )
					wp_register_style( 'quicksand',           		'//fonts.googleapis.com/css?family=' . esc_attr( $quicksand ), null, '0.0.2' );

				wp_register_style( 'bootstrap',					get_template_directory_uri() . '/assets/skins/default/css/bootstrap.min.css', null, '0.0.2' );
				wp_register_style( 'gourmand-reset',			get_template_directory_uri() . '/assets/skins/default/css/reset.min.css', null, '0.0.3' );

				wp_register_style( 'gourmand-form',				get_template_directory_uri() . '/assets/skins/default/css/form.min.css', null, '0.0.2' );
				wp_register_style( 'gourmand-blog',				get_template_directory_uri() . '/assets/skins/default/css/blog.min.css', null, '0.0.3' );

				wp_register_style( 'gourmand-article',			get_template_directory_uri() . '/assets/skins/default/css/article.min.css', null, '0.0.14' );
				wp_register_style( 'gourmand-single',			get_template_directory_uri() . '/assets/skins/default/css/single.min.css', null, '0.0.14' );

				wp_register_style( 'gourmand-header',			get_template_directory_uri() . '/assets/skins/default/css/header.min.css', null, '0.0.2' );
				wp_register_style( 'gourmand-nav',				get_template_directory_uri() . '/assets/skins/default/css/nav.min.css', null, '0.0.3' );
				wp_register_style( 'gourmand-collapse-menu',	get_template_directory_uri() . '/assets/skins/default/css/collapse-menu.min.css', null, '0.0.2' );
				wp_register_style( 'gourmand-sections',			get_template_directory_uri() . '/assets/skins/default/css/sections.min.css', null, '0.0.14' );
				wp_register_style( 'gourmand-comments',			get_template_directory_uri() . '/assets/skins/default/css/comments.min.css', null, '0.0.3' );
				wp_register_style( 'gourmand-footer',			get_template_directory_uri() . '/assets/skins/default/css/footer.min.css', null, '0.0.3' );
				wp_register_style( 'gourmand-sidebar',			get_template_directory_uri() . '/assets/skins/default/css/sidebar.min.css', null, '0.0.3' );
				wp_register_style( 'gourmand-smartphoto', 		get_template_directory_uri() . '/assets/skins/default/css/smartphoto.min.css', null, '0.0.2' );

				if( !self::font( 'overwrite-montez' ) )
					wp_register_style( 'gourmand-montez',			get_template_directory_uri() . '/assets/skins/default/css/montez.min.css', null, '0.0.2' );

				if( !self::font( 'overwrite-open-sans' ) )
					wp_register_style( 'gourmand-open-sans',		get_template_directory_uri() . '/assets/skins/default/css/open-sans.min.css', null, '0.0.2' );

				if( !self::font( 'overwrite-quicksand' ) )
					wp_register_style( 'gourmand-quicksand',		get_template_directory_uri() . '/assets/skins/default/css/quicksand.min.css', null, '0.0.2' );

				wp_register_style( 'gourmand-gallery',			get_template_directory_uri() . '/assets/skins/default/css/gallery.min.css', null, '0.0.2' );

				wp_register_style( 'gourmand-slick',			get_template_directory_uri() . '/assets/theme/css/slick.css', null, '0.0.2' );
				wp_register_style( 'gourmand-slick-theme',		get_template_directory_uri() . '/assets/theme/css/slick-theme.css', null, '0.0.2' );
				wp_register_style( 'gourmand-fontello',			get_template_directory_uri() . '/assets/theme/css/fontello.min.css', null, '0.0.2' );


				$dependency = array(
					'montez',
					'open-sans',
					'quicksand',

					'bootstrap',
					'gourmand-reset',

					'gourmand-form',
					'gourmand-blog',
					'gourmand-article',
					'gourmand-single',
					'gourmand-header',
					'gourmand-nav',
					'gourmand-collapse-menu',
					'gourmand-sections',
					'gourmand-comments',
					'gourmand-footer',
					'gourmand-sidebar',

					'gourmand-montez',
					'gourmand-open-sans',
					'gourmand-quicksand',

					'gourmand-gallery',

					'gourmand-slick',
					'gourmand-slick-theme',
					'gourmand-fontello',
					'gourmand-smartphoto'
				);

				if( self::font( 'overwrite-montez' ) ){
					$k = array_keys( $dependency, 'montez' );
					unset( $dependency[ $k[ 0 ] ] );

					$k = array_keys( $dependency, 'gourmand-montez' );
					unset( $dependency[ $k[ 0 ] ] );
				}

				if( self::font( 'overwrite-open-sans' ) ){
					$k = array_keys( $dependency, 'open-sans' );
					unset( $dependency[ $k[ 0 ] ] );

					$k = array_keys( $dependency, 'gourmand-open-sans' );
					unset( $dependency[ $k[ 0 ] ] );
				}

				if( self::font( 'overwrite-quicksand' ) ){
					$k = array_keys( $dependency, 'quicksand' );
					unset( $dependency[ $k[ 0 ] ] );

					$k = array_keys( $dependency, 'gourmand-quicksand' );
					unset( $dependency[ $k[ 0 ] ] );
				}

				$dependency = apply_filters( 'gourmand_styles_dependency', $dependency );

				/* MAIN STYLE */
				wp_enqueue_style( 'gourmand-style',				get_template_directory_uri() . '/style.css', $dependency, '0.0.11' );

				// Load the Internet Explorer specific stylesheet.
				wp_enqueue_style( 'gourmand-ie', 				get_template_directory_uri() . '/assets/skins/default/css/ie.min.css', null, '0.0.1' );
				wp_style_add_data( 'gourmand-ie', 'conditional', 'IE' );


				/**
				 *	Enqueue Scripts
				 */

				// Load the Internet Explorer 9 specific scripts.
				wp_enqueue_script( 'respond', 					get_template_directory_uri() . '/assets/skins/default/js/respond.min.js', null, '0.0.1' );
				wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

				wp_enqueue_script( 'html5shiv', 				get_template_directory_uri() . '/assets/skins/default/js/html5shiv.js', null, '0.0.1' );
				wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

				/* REGISTER SCRIPTS */
				/* JS FILES */
				wp_register_script( 'bootstrap', 				get_template_directory_uri() . '/assets/skins/default/js/bootstrap.min.js', array( 'jquery' ), '0.0.1', true );
				wp_enqueue_script( 'bootstrap' );

				wp_enqueue_script( 'waypoints', 				get_template_directory_uri() . '/assets/skins/default/js/waypoints.min.js', null , '0.0.1', true );
				wp_enqueue_script( 'jquery-counterup', 			get_template_directory_uri() . '/assets/skins/default/js/jquery.counterup.min.js', null , '0.0.1', true );

				wp_register_script( 'gourmand-slick', 			get_template_directory_uri() . '/assets/theme/js/slick.js', null, '0.0.1', true );
				wp_enqueue_script( 'gourmand-slick' );

				wp_register_script( 'gourmand-functions', 		get_template_directory_uri() . '/assets/skins/default/js/functions.js', array( 'gourmand-slick', 'masonry' ) , '0.0.1', true );
				wp_enqueue_script( 'gourmand-functions' );

				wp_register_script( 'gourmand-smartphoto',  		get_template_directory_uri() . '/assets/skins/default/js/smartphoto.min.js', array( 'jquery' ), '0.0.1', true );
				wp_enqueue_script( 'gourmand-smartphoto' );

				wp_register_script( 'gourmand-init-smartphoto',  get_template_directory_uri() . '/assets/skins/default/js/init-smartphoto.js', array( 'jquery' ), '0.0.1', true );
				wp_enqueue_script( 'gourmand-init-smartphoto' );

				if( gourmand_mod::get( 'scroll-aside' ) ){
					wp_register_script( 'gourmand-aside-scroll', 		get_template_directory_uri() . '/assets/skins/default/js/aside-scroll.js', array( 'jquery' ), '0.0.1', true );
					wp_enqueue_script( 'gourmand-aside-scroll' );
				}

				/* INCLUDE FOR REPLY COMMENTS */
				if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
						wp_enqueue_script( 'comment-reply' );
			}

			public static function backend( $hook )
			{
				wp_register_style( 'gourmand-admin-menu',						get_template_directory_uri() . '/assets/theme/css/menu.min.css', null, '0.0.1' );
				wp_enqueue_style( 'gourmand-admin-menu' );

				if( $hook == 'widgets.php' ){
	                wp_register_style( 'gourmand-admin-customize',				get_template_directory_uri() . '/assets/theme/css/customizer.min.css', null, '0.0.3' );
	                wp_register_style( 'gourmand-fontello',						get_template_directory_uri() . '/assets/theme/css/fontello.min.css', null, '0.0.3' );

	                wp_enqueue_style( 'gourmand-admin-customizer' );
	                wp_enqueue_style( 'gourmand-fontello' );
	            }

				if( $hook == 'appearance_page_gourmand-about' ){
					wp_register_style( 'gourmand-slick',						get_template_directory_uri() . '/assets/theme/css/slick.css', null, '0.0.2' );
					wp_register_style( 'gourmand-slick-theme',					get_template_directory_uri() . '/assets/theme/css/slick-theme.css', null, '0.0.2' );

					wp_enqueue_style( 'gourmand-slick' );
					wp_enqueue_style( 'gourmand-slick-theme' );

					wp_register_script( 'gourmand-slick',						get_template_directory_uri() . '/assets/theme/js/slick.js', null, '0.0.1', true );
					wp_register_script( 'gourmand-slick-init',					get_template_directory_uri() . '/assets/theme/js/slick-init.js', null, '0.0.1', true );

					wp_enqueue_script( 'gourmand-slick' );
					wp_enqueue_script( 'gourmand-slick-init' );
				}

	            if( $hook == 'appearance_page_gourmand-about' || $hook == 'post-new.php' || $hook == 'post.php' ){

					wp_enqueue_media();

		            $font = 'Roboto:400,500&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic';

		            wp_register_style( 'roboto',         						'//fonts.googleapis.com/css?family=' . esc_attr( $font ), null, null );

		            //wp_enqueue_script( 'gourmand-admin-html',                  get_template_directory_uri() . '/media/admin/js/tempo.html.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-draggable' ), $ver );

					wp_enqueue_script( 'gourmand-customize-fields',				get_template_directory_uri() . '/assets/theme/js/customize-fields.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-draggable' ), '0.0.1' );
					wp_register_script( 'gourmand-admin-uploader',				get_template_directory_uri() . '/assets/theme/js/uploader.js', null, '0.0.1', true );


		            wp_register_style( 'gourmand-admin-page',					get_template_directory_uri() . '/assets/theme/css/page.min.css', null, '0.0.14' );
		            wp_register_style( 'gourmand-admin-box',					get_template_directory_uri() . '/assets/theme/css/box.min.css', null, '0.0.3' );
		            wp_register_style( 'gourmand-admin-additional',				get_template_directory_uri() . '/assets/theme/css/additional.min.css', null, '0.0.3' );
		            wp_register_style( 'gourmand-admin-fields',					get_template_directory_uri() . '/assets/theme/css/fields.min.css', null, '0.0.3' );
		            wp_register_style( 'gourmand-fontello',						get_template_directory_uri() . '/assets/theme/css/fontello.min.css', null, '0.0.3' );

		            wp_enqueue_style( 'gourmand-admin-google-font-1' );
		            wp_enqueue_style( 'gourmand-admin-page' );
		            wp_enqueue_style( 'gourmand-admin-box' );
		            wp_enqueue_style( 'gourmand-admin-additional' );
		            wp_enqueue_style( 'gourmand-admin-fields' );

					wp_enqueue_style( 'wp-color-picker' );

		            wp_enqueue_style( 'gourmand-fontello' );
				}
			}

			public static function admin_footer()
			{
				/**
				 *  Modules
				 */

				self::modules();
			}

			public static function footer()
			{
				/**
				 *  Modules
				 */

				self::modules();
			}
		}
	}
?>
