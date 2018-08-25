<?php

	/**
	 *  Plugin Tools Class.
	 *
	 *	Multiple Settings (adding dynamically)
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_plugin' ) ){

		class gourmand_plugin
		{
			public static function info( $slug )
			{
				include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

				$rett = get_transient( 'gourmand_plugin_info_' . $slug );

				if ( false === $rett ) {
					$rett = (array)plugins_api(
						'plugin_information', array(
							'slug'   => $slug,
							'fields' => array(
								'versions'			=> false,
								'downloaded'        => false,
								'rating'            => false,
								'description'       => false,
								'donate_link'       => false,
								'tags'              => false,
								'sections'          => false,
								'added'             => false,
								'last_updated'      => false,
								'compatibility'     => false,
								'tested'            => false,
								'requires'          => false,
								'downloadlink'      => false,
								'homepage'          => true,
								'short_description' => true,
								'banners'			=> true,
								'icons'             => true,
							),
						)
					);
					set_transient( 'gourmand_plugin_info_' . $slug, $rett, 30 * MINUTE_IN_SECONDS );
				}

				return $rett;
			}

			public static function file( $slug )
			{
				$rett 	= '';
				$path 	= ABSPATH . 'wp-content/plugins/';

				$file_1	= $slug . '/index.php';
				$file_2	= $slug . '/wp-' . $slug . '.php';
				$file_3	= $slug . '/' . $slug . '.php';
				$file_4	= $slug . '/loco.php';

				$file 	= $file_1;

				if( is_file( $path . $file_4 ) )
					$file = $file_4;

				if( is_file( $path . $file_3 ) )
					$file = $file_3;

				if( is_file( $path . $file_2 ) )
					$file = $file_2;

				if( is_file( $path . $file ) )
					$rett = $file;

				return $rett;
			}

			public static function is_installed( $slug )
			{
				$rett = false;

				$file = self::file( $slug );

				if( $file = self::file( $slug ) && !empty( $file ) )
					$rett = true;

				return $rett;
			}

			public static function is_active( $slug )
			{
				return is_plugin_active( self::file( $slug ) );
			}

			public static function install_url( $slug )
			{
				return wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'from'   => 'import',
							'plugin' => $slug,
						),
						network_admin_url( 'update.php' )
					),
					'install-plugin_' . $slug
				);
			}

			public static function activate_url( $slug )
			{
				$rett 	= '';
				$path 	= ABSPATH . 'wp-content/plugins/';
				$file 	= self::file( $slug );

				if( is_file( $path . $file ) ){
					$rett = add_query_arg(
						array(
							'action'        => 'activate',
							'plugin'        => rawurlencode( $file ),
							'plugin_status' => 'all',
							'paged'         => '1',
							'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $file ),
						), network_admin_url( 'plugins.php' )
					);
				}

				return $rett;
			}

			public static function attrs( $slug, $info = array() )
			{
				$plugin 	= wp_parse_args( $info, self::info( $slug ) );

				$url 		= self::install_url( $slug );
				$classes	= 'mythemes-btn small gourmand-plugin-action install-plugin';
				$label		= __( 'Install & Activate', 'gourmand' );

				$installing = __( 'Installing ..', 'gourmand' );
				$activate	= __( 'Activate', 'gourmand' );
				$activating = __( 'Activating ..', 'gourmand' );
				$i_failed	= __( 'Install Failed', 'gourmand' );
				$a_failed	= __( 'Activation Failed', 'gourmand' );
				$success	= isset( $plugin[ 'data' ][ 'success' ] ) ? $plugin[ 'data' ][ 'success' ] : __( 'Success', 'gourmand' );

				if( self::is_installed( $slug ) ){
					$url 		= self::activate_url( $slug );
					$classes 	= 'mythemes-btn small gourmand-plugin-action activate-plugin';
					$label 		= $activate;
				}

				if( isset( $plugin[ 'errors' ] ) ){

					if( empty( $info ) )
						return;

					$plugin = $info;

					if( !self::is_installed( $slug ) ){
						$classes	= 'mythemes-btn small';
						$url 		= $info[ 'url' ];
					}
				}

				$data  = '';
				$data .= 'data-slug="' . esc_attr( $slug ) . '" ';
				$data .= 'data-success="' . esc_attr( $success ) . '" ';
				$data .= 'data-installing="' . esc_attr( $installing ) . '" ';
				$data .= 'data-activate="' . esc_attr( $activate ) . '" ';
				$data .= 'data-activating="' . esc_attr( $activating) . '" ';
				$data .= 'data-install-faild="' . esc_attr( $i_failed ) . '" ';
				$data .= 'data-activate-faild="' . esc_attr( $a_failed ) . '"';

				if( isset( $plugin[ 'data' ][ 'redirect' ] ) )
					$data .= ' data-redirect="' . esc_url( $plugin[ 'data' ][ 'redirect' ] ) . '"';

				return array(
					'url' 		=> $url,
					'data'		=> $data,
					'label'		=> $label,
					'classes'	=> $classes
				);
			}

			public static function card( $slug, $info = array() )
			{
				if( self::is_active( $slug ) )
					return;

				$rett 		= '';
				$plugin 	= wp_parse_args( $info, self::info( $slug ) );
				$attrs 		= self::attrs( $slug, $info );

				$url 		= $attrs[ 'url' ];
				$data 		= $attrs[ 'data' ];
				$label 		= $attrs[ 'label' ];
				$classes 	= $attrs[ 'classes' ];

				$rett .= '<div class="plugin-card-wrapper">';
				$rett .= '<div class="plugin-card ' . esc_attr( $slug ) . '">';
				$rett .= '<div class="banner-wrapper">';
				if( isset( $plugin['banners']['low'] ) && esc_url( $plugin['banners']['low'] ) )
					$rett .= '<img src="' . esc_url( $plugin['banners']['low'] ) . '" title="' . esc_attr( $plugin['name'] ) . '"/>';

				$rett .= '</div>';
				$rett .= '<div class="plugin-content">';
				$rett .= '<div class="plugin-identity">';

				if( isset( $plugin['banners']['low'] ) && esc_url( $plugin['icons']['1x'] ) )
					$rett .= '<img src="' . esc_url( $plugin['icons']['1x'] ) . '" title="' . esc_attr( $plugin['name'] ) . '"/>';

				$rett .= '<div class="plugin-details">';
				$rett .= '<strong>' . esc_html( $plugin['name'] ) . '</strong>';
				$rett .= '<span>' . sprintf( __( 'By %1$s Version - %2$s', 'gourmand' ), $plugin['author'], esc_attr( $plugin['version'] ) ) . '</span>';
				$rett .= '</div>';
				$rett .= '</div>';
				$rett .= '<p class="plugin-description">' . esc_html( $plugin['short_description'] ) . '</p>';
				$rett .= '<div class="plugin-action">';
				$rett .= '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $classes ) . '" ' . $data . '><span>' . esc_html( $label ) . '</span></a>';
				$rett .= '</div>';
				$rett .= '</div>';
				$rett .= '</div>';
				$rett .= '</div>';

				return $rett;
			}
		}
	}
