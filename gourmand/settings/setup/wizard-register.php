<?php

	/**
	 *	This is myThemes Wizard register action
	 */

	function gourmand_wizard_register( $wizard )
	{
		// Welcome Message
		$step = $wizard -> add_step( 'welcome', array(
			'type'	=> 'zero',
			'title'	=> __( 'Welcome to Gourmand setup Wizard', 'gourmand' ),
		));

			{	// Step 0

				$step -> add_field( 'thanks-message', array(
					'type'		=> 'html',
					'content'	=>
						'<p>' . __( 'Thank you for choosing Gourmand WordPress Themes your choice is greatly appreciated! This quick setup wizard will help you configure the basic settings. It\'s completely optional and shouldn\'t take longer than five minutes.', 'gourmand' ) . '</p>' .
						'<p>' . __( 'Is very important to finish Setup. Between First and Last step the Wizard just collect settings and on last step, by click button Setup, the wizard apply settings and dependencies.', 'gourmand' ) . '</p>' .
						'<p>' . __( 'No time right now? If you don\'t want to go through the wizard, you can skip and return to the WordPress dashboard. Come back anytime if you change your mind!', 'gourmand' ) . '</p>'
				));
			}

		// Website
		$step = $wizard -> add_step( 'website', array(
			'title'	=> __( 'Setup Website', 'gourmand' )
		));

			{	// Step 1

				$step -> add_field( 'website-type', array(
					'type'		=> 'select',
					'label'		=> __( 'Website Type', 'gourmand' ),
					'ajax'		=> true,
					'default'	=> 'business',
					'options'	=> array(
						'default'	=> __( 'Default', 'gourmand' ),
						'business'	=> __( 'Business', 'gourmand' ),
						'blog'		=> __( 'Blog', 'gourmand' )
					)
				));

					{	// Website Type Hint's

						$step -> add_field( 'business-hint', array(
							'type'		=> 'hint',
							'content'	=> __( 'Business option mean you will have a Starter Page with some general business details like: About Us, Daily Dishes (Food Business), Chef Menu (Food Business), Services, Contact Us and other Sections.', 'gourmand' ),
							'callback'	=> function( $wizard ){
								return 'business' == $wizard -> get_setting( 'website-type' );
							}
						));

						$step -> add_field( 'blog-hint', array(
							'type'		=> 'hint',
							'content'	=> __( 'Blog option mean you will have the Blog Articles on your Starter Page.', 'gourmand' ),
							'callback'	=> function( $wizard ){
								return 'blog' == $wizard -> get_setting( 'website-type' );
							}
						));
					}

					$step -> add_field( 'not-food-business', array(
						 'type'			=> 'checkbox',
						 'label'		=> __( 'Not Food Business', 'gourmand' ),
						 'description'	=> __( 'On your Starter Page by default will displayed not Food Sections.', 'gourmand' ),
						 'ajax'			=> true,
						 'callback'		=> function( $wizard ){
							 return 'business' == $wizard -> get_setting( 'website-type' );
						 }
					));

					$step -> add_field( 'personal-blog', array(
						'type'			=> 'checkbox',
						'label'			=> __( 'Personal Blog', 'gourmand' ),
						'description'	=> __( 'this option by default will disable author and author details from Blog Articles and Single Article.', 'gourmand' ),
						'ajax'			=> true,
						'callback'		=> function( $wizard ){
							return 'blog' == $wizard -> get_setting( 'website-type' );
						}
					));

					// Content Width
					$step -> add_field( 'content-width', array(
						'type'			=> 'select',
						'label'			=> __( 'Header Navigation Width', 'gourmand' ),
						'description'	=> __( 'choose the width for the header navigation.', 'gourmand' ),
						'default'		=> function( $wizard ){
							$width = 'large';

							if( 'blog' == $wizard -> get_setting( 'website-type' ) ){
								$width = 'medium';

								if( (bool)$wizard -> get_setting( 'personal-blog' ) )
									$width = 'small';
							}

							return $width;
						},
						'options'		=> array(
							'large'			=> __( 'Large ( 1630px )', 'gourmand' ),
							'medium'		=> __( 'Medium ( 1320px )', 'gourmand' ),
							'small'			=> __( 'Small ( 890px )', 'gourmand' )
						)
					));

					{	// Business Tools

						// E-mail Address
						$step -> add_field( 'email', array(
							'type'			=> 'text',
							'label'			=> __( 'Contact E-Mail', 'gourmand' ),
							'callback'		=> function( $wizard ){
								return 'blog' !== $wizard -> get_setting( 'website-type' );
							}
						));

						// Address
						$step -> add_field( 'address', array(
							'type'			=> 'text',
							'label'			=> __( 'Contact Address', 'gourmand' ),
							'callback'		=> function( $wizard ){
								return 'blog' !== $wizard -> get_setting( 'website-type' );
							}
						));

						// Phone Number
						$step -> add_field( 'phone', array(
							'type'			=> 'text',
							'label'			=> __( 'Contact Phone', 'gourmand' ),
							'description'	=> __( 'eg: + (0) 989 987 345', 'gourmand' ),
							'callback'		=> function( $wizard ){
								return 'blog'!== $wizard -> get_setting( 'website-type' );
							}
						));
					}

					{	// Food Business relative Settings

						// Dish Currency
						$step -> add_field( 'dish-currency', array(
							'type'			=> 'text',
							'label'			=> __( 'Dish Currency', 'gourmand' ),
							'description'	=> __( 'The Currency will be displayed in Chef Menu Section near price.', 'gourmand' ),
							'default'		=> gourmand_mod::get( 'dish-currency' ),
							'callback'		=> function( $wizard ){
								return 'blog' !== $wizard -> get_setting( 'website-type' ) && !$wizard -> get_setting( 'not-food-business' );
							}
						));

						// Currency
						$step -> add_field( 'currency-before', array(
							'type'			=> 'checkbox',
							'label'			=> __( 'Display Currency First', 'gourmand' ),
							'description'	=> __( 'display currency before price.', 'gourmand' ),
							'default'		=> (bool)gourmand_mod::get( 'currency-before' ),
							'callback'		=> function( $wizard ){
								return 'blog' !== $wizard -> get_setting( 'website-type' ) && !$wizard -> get_setting( 'not-food-business' );
							}
						));
					}

					{	// Personal Blog relative Settings

						$step -> add_field( 'author-name', array(
							'type'			=> 'checkbox',
							'label'			=> __( 'Site Identity Author Name', 'gourmand' ),
							'description'	=> __( 'overwrite Website Title with author Display Name ( on Edit User details ).', 'gourmand' ),
							'callback'		=> function( $wizard ){
								return $wizard -> get_setting( 'personal-blog' ) && 'blog' == $wizard -> get_setting( 'website-type' );
							}
						));

						$step -> add_field( 'post-author', array(
							'type'			=> 'checkbox',
							'label'			=> __( 'Disable post Author', 'gourmand' ),
							'description'	=> __( 'disable Author details from Bold and Single Posts.', 'gourmand' ),
							'default'		=> true,
							'callback'		=> function( $wizard ){
								return $wizard -> get_setting( 'personal-blog' ) && 'blog' == $wizard -> get_setting( 'website-type' );
							}
						));
					}
			}

		// Pages
		$step = $wizard -> add_step( 'pages', array(
			'title'		=> __( 'Setup Pages', 'gourmand' ),
		));

			{	// Step 2

				$step -> add_field( 'static-front-page', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Static Front Page', 'gourmand' ),
					'description'	=> __( 'Website Starter Page - first page will see your customers. This will be a static page where you can add details about your business.', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> function( $wizard ){
						return absint( 'blog' !== $wizard -> get_setting( 'website-type' ) );
					},
					'callback' 		=> function( $wizard ){
						return 'page' !== $wizard -> wp_option -> get( 'show_on_front' );
					}
				));

				$step -> add_field( 'create-front-page', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Create Starter Page', 'gourmand' ),
					'description'	=> __( 'Website Starter Page - first page will see your customers. This will be a static page where you can add details about your business', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> function( $wizard ){
						$is_page_on_front = 'page' == $wizard -> wp_option -> get( 'show_on_front' );

						return $wizard -> get_setting( 'static-front-page' ) && !$is_page_on_front;
					},
					'callback'		=> function( $wizard ){
						$is_page_on_front = 'page' == $wizard -> wp_option -> get( 'show_on_front' );

						return $wizard -> get_setting( 'static-front-page' ) && !$is_page_on_front;
					}
				));

				$step -> add_field( 'front-page', array(
					'type'			=> 'text',
					'description'	=> __( 'Choose your Starter Page Title', 'gourmand' ),
					'default'		=> __( 'Home', 'gourmand' ),
					'classes'		=> 'padding-left-32',
					'callback'		=> function( $wizard ){
						$is_page_on_front 	= 'page' == $wizard -> wp_option -> get( 'show_on_front' );
						$create_front_page	= (bool)$wizard -> get_setting( 'create-front-page' );

						return $wizard -> get_setting( 'static-front-page' ) && $create_front_page && !$is_page_on_front;
					}
				));

				$step -> add_field( 'create-blog-page', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Create Blog Page', 'gourmand' ),
					'description'	=> __( 'Website dedicated Blog Page - here customers can see Blog Posts.', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> function( $wizard ){
						$is_page_on_front	= 'page' == $wizard -> wp_option -> get( 'show_on_front' );

						return $wizard -> get_setting( 'static-front-page' ) && !$is_page_on_front;
					},
					'callback'		=> function( $wizard ){
						$is_page_on_front	= 'page' == $wizard -> wp_option -> get( 'show_on_front' );

						return $wizard -> get_setting( 'static-front-page' ) && !$is_page_on_front;
					}
				));

				$step -> add_field( 'blog-page', array(
					'type'			=> 'text',
					'description'	=> __( 'Choose your Blog Title. You can use Blog to diplay the Projects, Culinary Stories, Articles or Others.', 'gourmand' ),
					'default'		=> function( $wizard ){
						$page = __( 'Blog', 'gourmand' );

						if( (bool)$wizard -> get_setting( 'create-blog-page' ) && (bool)$wizard -> get_setting( 'static-front-page' ) ){
							if( 'business' == $wizard -> get_setting( 'website-type' ) ){
								$page = __( 'Stories', 'gourmand' );

								if( (bool)$wizard -> get_setting( 'not-food-business' ) ){
									$page = __( 'Projects', 'gourmand' );
								}
							}
						}

						return $page;
					},
					'classes'		=> 'padding-left-32',
					'callback'		=> function( $wizard ){
						return (bool)$wizard -> get_setting( 'create-blog-page' ) && (bool)$wizard -> get_setting( 'static-front-page' );
					}
				));

				$step -> add_field( 'social-share', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Social Sharing Links', 'gourmand' ),
					'description'	=> __( 'enable / disable Social Sharing Links for Single Post and Blog Articles. Require to Install and Activate Gourmand Light Plugin or Gourmand PRO Version.', 'gourmand' ),
					'default'		=> true,
					'ajax'			=> true,
					'callback'		=> function( $wizard ){
						return 'blog' == $wizard -> get_setting( 'website-type' ) || $wizard -> get_setting( 'create-blog-page' );
					}
				));

				$step -> add_field( 'create-contact-page', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Create Contact Page', 'gourmand' ),
					'description'	=> __( 'here customers can write you an e-mail', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> true,
				));

				$step -> add_field( 'contact-page', array(
					'type'			=> 'text',
					'description'	=> __( 'Choose your Contact Title', 'gourmand' ),
					'default'		=> __( 'Contact', 'gourmand' ),
					'classes'		=> 'padding-left-32',
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'create-contact-page' );
					}
				));
			}

		// Social Links
		$step = $wizard -> add_step( 'social-links', array(
			'title'			=> __( 'Social Links', 'gourmand' ),
			'description'	=> __( 'here you can setup your social links of the some most popular networks. For more others please visit: Admin Dashboard &rsaquo; Appearance &rsaquo; Customize &rsaquo; Social Links.', 'gourmand' )
		));

			{	// Step 3

				// Header Social Links
				$step -> add_field( 'header-social-links', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Header Social Links', 'gourmand' ),
					'description'	=> __( 'enable / disable Social Networks Links from Header ', 'gourmand' ),
					'ajax'			=> true,
				));

				// Footer Social Links Size
				$step -> add_field( 'footer-display-social', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Footer Social Links', 'gourmand' ),
					'description'	=> __( 'enable / disable Footer Social Networks Links', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> true,
				));

				$step -> add_field( 'footer-social-size', array(
					'type'			=> 'select',
					'label'			=> __( 'Footer Social Links Size', 'gourmand' ),
					'description'	=> __( 'The option "Large Size" is recommended to display no more 5 Social Links. The option "Medium Size" is recommended to display no more 10 Social Links. In other cases you can use option "Small Size".', 'gourmand' ),
					'default'		=> 'medium',
					'options'		=> array(
						'large'			=> __( 'Large Size', 'gourmand' ),
						'medium'		=> __( 'Medium Size', 'gourmand' ),
						'small'			=> __( 'Small Size', 'gourmand' )
					),
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'footer-display-social' );
					}
				));

				$step -> add_field( 'facebook', array(
					'type'			=> 'url',
					'label'			=> __( 'Facebook', 'gourmand' ),
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'footer-display-social' ) || $wizard -> get_setting( 'header-social-links' );
					}
				));

				$step -> add_field( 'twitter', array(
					'type'			=> 'url',
					'label'			=> __( 'Twitter', 'gourmand' ),
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'footer-display-social' ) || $wizard -> get_setting( 'header-social-links' );
					}
				));

				$step -> add_field( 'instagram', array(
					'type'			=> 'url',
					'label'			=> __( 'Instagram', 'gourmand' ),
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'footer-display-social' ) || $wizard -> get_setting( 'header-social-links' );
					}
				));

				$step -> add_field( 'rss-link', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display RSS', 'gourmand' ),
					'ajax'			=> true,
					'default'		=> true,
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'footer-display-social' ) || $wizard -> get_setting( 'header-social-links' );
					}
				));

				$step -> add_field( 'rss', array(
					'type'			=> 'url',
					'label'			=> __( 'RSS', 'gourmand' ),
					'default'		=> esc_url( get_bloginfo( 'rss2_url' ) ),
					'callback'		=> function( $wizard ){
						return $wizard -> get_setting( 'rss-link' ) && ( $wizard -> get_setting( 'footer-display-social' ) || $wizard -> get_setting( 'header-social-links' ) );
					}
				));
			}

		// Content Copyright
		$step = $wizard -> add_step( 'content-copyright', array(
			'title'		=> __( 'Content Copyright', 'gourmand' ),
		));

			{	//	Step 4

				$step -> add_field( 'content-copyright', array(
					'type'			=> 'textarea',
					'description'	=> __( 'here you can change your content copyright. In our PRO version you have full control over the copyright.', 'gourmand' ),
					'default'		=> gourmand_mod::get( 'content-copyright' )
				));

				$step -> add_field( 'overwrite-settings', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Overwrite Current Settings', 'gourmand' ),
					'description'	=> __( 'disable - if you tried manually setup your website, but still you decide to use the wizard method and want to keep the existing settings.', 'gourmand' ),
					'default'		=> true
				));

			}

		// Recommended Plugin
		$step = $wizard -> add_step( 'recommended-plugins', array(
			'type'		=> 'setup',
			'title'		=> __( 'Install &amp; Activate Recommended Plugins', 'gourmand' )
		));

			{	// Step 5

				$step -> add_field( 'gourmand-light', array(
					'type'			=> 'plugin',
					'default'		=> true
				));

				$step -> add_field( 'contact-form-7', array(
					'type'			=> 'plugin',
					'default'		=> true
				));

				$step -> add_field( 'easy-google-fonts', array(
					'type'			=> 'plugin',
					'default'		=> true
				));

				$step -> add_field( 'loco-translate', array(
					'type'			=> 'plugin',
					'default'		=> true
				));
			}
	}

	add_action( 'mythemes_wizard_register', 'gourmand_wizard_register' );
?>
