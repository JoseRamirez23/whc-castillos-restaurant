<?php

	/**
	 *	Customize Section - Navigation
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__navigation( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-navigation', array(
			'title'			=> __( 'Navigation', 'gourmand' ),
			'description'	=> __( 'Here are appearance options for Header Navigation Elements like WebSite Identity and Menu.', 'gourmand' ),
			'priority'		=> 25
		), $wp_customize );

			$section -> add_field( 'nav-width', array(
				'type'		=> 'select',
				'label' 	=> __( 'Navigation Width', 'gourmand' ),
				'options'	=> array(
					'large'		=> __( 'Large ( 1630px )', 'gourmand' ),
					'medium'	=> __( 'Medium ( 1320px )', 'gourmand' ),
					'small'		=> __( 'Small ( 890px )', 'gourmand' )
				)
			));

			$default = $section -> add_tab_( 'gourmand-nav-def', array(
				'title'			=> __( 'Default Navigation', 'gourmand' ),
				'description'	=> __( 'Here are appearance options for Header Navigation Elements on Light Background', 'gourmand' )
			));

				{	// Default Navigation Tabs and Fields

					$default -> add_field( 'nav-def-bkg-color', array(
						'type'	=> 'color',
						'label' => __( 'Background Color', 'gourmand' )
					));

					$default -> add_field( 'nav-def-bkg-transp', array(
						'type'	=> 'percent',
						'label' => __( 'Background Transp', 'gourmand' )
					));

					$default -> add_field( 'nav-def-decor-color', array(
						'type'			=> 'color',
						'label' 		=> __( 'Decorations Color', 'gourmand' ),
						'description'	=> __( 'Decorations are the separators between Menu and others Elements', 'gourmand' )
					));

					$default -> add_field( 'nav-def-decor-transp', array(
						'type'	=> 'percent',
						'label' => __( 'Decorations Transparency', 'gourmand' )
					));

					$site_identity = $default -> add_tab_( 'nav-def-site-identity', array(
						'title' => __( 'Site Identity', 'gourmand' )
					));

					{	// Site Identity Tabs and Fields

						$site_title = $site_identity -> add_tab_( 'nav-def-site-title', array(
							'title' 		=> __( 'Site Title', 'gourmand' ),
							'description' 	=> __( 'WebSite Title', 'gourmand' )
						));

						{
							$site_title -> add_field( 'nav-def-site-title-color', array(
								'type'			=> 'color',
								'label' 		=> __( 'Color', 'gourmand' )
							));

							$site_title -> add_field( 'nav-def-site-title-transp', array(
								'type'			=> 'percent',
								'label' 		=> __( 'Transparency', 'gourmand' )
							));

							$site_title -> add_field( 'nav-def-site-title-h-color', array(
								'type'			=> 'color',
								'label' 		=> __( 'Effect Color', 'gourmand' ),
								'description'	=> __( 'the Color when the mouse cursor is over the WebSite Title', 'gourmand' )
							));

							$site_title -> add_field( 'nav-def-site-title-h-transp', array(
								'type'			=> 'percent',
								'label' 		=> __( 'Effect Transparency', 'gourmand' ),
								'description'	=> __( 'the Transparency when the mouse cursor is over the WebSite Title', 'gourmand' )
							));
						}

						$tagline = $site_identity -> add_tab_( 'nav-def-tagline', array(
							'title' 		=> __( 'Tagline', 'gourmand' ),
							'description' 	=> __( 'WebSite Description', 'gourmand' ),
						));

						{
							$tagline -> add_field( 'nav-def-tagline-color', array(
								'type'			=> 'color',
								'label' 		=> __( 'Color', 'gourmand' )
							));

							$tagline -> add_field( 'nav-def-tagline-transp', array(
								'type'			=> 'percent',
								'label' 		=> __( 'Transparency', 'gourmand' )
							));

							$tagline -> add_field( 'nav-def-tagline-h-color', array(
								'type'			=> 'color',
								'label' 		=> __( 'Effect Color', 'gourmand' ),
								'description'	=> __( 'the Color when the mouse cursor is over the WebSite Description', 'gourmand' )
							));

							$tagline -> add_field( 'nav-def-tagline-h-transp', array(
								'type'			=> 'percent',
								'label' 		=> __( 'Effect Transparency', 'gourmand' ),
								'description'	=> __( 'the Transparency when the mouse cursor is over the WebSite Description', 'gourmand' )
							));
						}

					}

					$menu = $default -> add_tab_( 'nav-def-menu', array(
						'title' => __( 'Menu', 'gourmand' )
					));

					{
						$menu -> add_field( 'nav-def-link-color', array(
							'type'			=> 'color',
							'label' 		=> __( 'Link Color', 'gourmand' )
						));

						$menu -> add_field( 'nav-def-link-transp', array(
							'type'			=> 'percent',
							'label' 		=> __( 'Link Transparency', 'gourmand' )
						));

						$menu -> add_field( 'nav-def-link-h-color', array(
							'type'			=> 'color',
							'label' 		=> __( 'Link Effect Color', 'gourmand' ),
							'description'	=> __( 'the Color when the mouse cursor is over the Menu Link', 'gourmand' )
						));

						$menu -> add_field( 'nav-def-link-h-transp', array(
							'type'			=> 'percent',
							'label' 		=> __( 'Link Effect Transparency', 'gourmand' ),
							'description'	=> __( 'the Transparency when the mouse cursor is over the Menu Link', 'gourmand' )
						));

						$menu -> add_field( 'nav-def-current-link-color', array(
							'type'			=> 'color',
							'label' 		=> __( 'Current Link Color', 'gourmand' )
						));

						$menu -> add_field( 'nav-def-current-link-transp', array(
							'type'			=> 'percent',
							'label' 		=> __( 'Current Link Transparency', 'gourmand' )
						));
					}
				}

			$section = apply_filters( 'gourmand_navigation_section', $section );
	}

	add_action( 'customize_register', 'gourmand_customize_section__navigation' );
?>
