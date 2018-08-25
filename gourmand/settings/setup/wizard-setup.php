<?php

	/**
	 *	This is myThemes Wizard setup action
	 */

	function gourmand_wizard_setup( $wizard )
	{
		/**
		 *	Theme Mod Object
		 *	Allow set, get and remove theme mods settings
		 *	eg:
		 *
		 *	$theme_mod -> set( 'customize-link-setting', $value );
		 *	$theme_mod -> get( 'customize-link-setting', $default ); // $default is optional
		 *	$theme_mod -> remove( 'customize-link-setting' );
		 */

		$theme_mod = $wizard -> wp_theme_mod;


		/**
		 *	Option Object
		 *	Allow update, get and delete options
		 *	eg:
		 *
		 *	$option -> update( 'option-setting', $value );
		 *	$option -> get( 'option-setting', $default ); // $default is optional
		 *	$option -> delete( 'option-setting' );
		 */

		$option = $wizard -> wp_option;


		/**
		 *	Meta Object
		 *	Allow get, set and delete post meta
		 *	eg:
		 *
		 *	$meta -> val( $post_id, 'meta-key' );
		 *	$meta -> get( $post_id, 'meta-key', $default );  // $default is optional
		 *	$meta -> set( $post_id, 'meta-key', $value );
		 *	$meta -> delete( $post_id, 'meta-key' );
		 */

		$meta = $wizard -> wp_meta;


		/**
		 *	Setup
		 */

		$overwrite = (bool)$wizard -> get_setting( 'overwrite-settings' );

		// Get Website Type
		$setup_type 	= 'food-business';
		$website_type 	= esc_attr( $wizard -> get_setting( 'website-type' ) );

		// Business Setup
		if( $website_type == 'business' ){
			$is_not_food_business = (bool)$wizard -> get_setting( 'not-food-business' );

			// Not Food Business Setup
			if( $is_not_food_business )
				$setup_type = 'business';
		}

		// Blog Setup
		else{
			$setup_type = $website_type;

			if( $setup_type == 'blog' ){
				$is_personal_blog = (bool)$wizard -> get_setting( 'personal-blog' );

				// Personal Blog Setup
				if( $is_personal_blog )
					$setup_type = 'personal-blog';
			}
		}

		// Header Navigation Width
		if( $overwrite || !gourmand_mod::is_set( 'nav-width' ) ){

			$width = esc_attr( $wizard -> get_setting( 'content-width' ) );

			if( in_array( $width, array( 'large', 'medium', 'small' ) ) )
				$theme_mod -> set( 'nav-width', esc_attr( $width ) );
		}


		/**
		 *	Business configuration actions
		 */

		if( $setup_type == 'business' || $setup_type == 'food-business' || $setup_type == 'default' ){

			// Tools Email
			$email = gourmand_esc::email( $wizard -> get_setting( 'email' ) );

			if( !empty( $email ) ){
				$theme_mod -> set( 'tools-display-email', true );
				$theme_mod -> set( 'tools-email', $email );
			}

			// Tools Address
			$address = gourmand_esc::text( $wizard -> get_setting( 'address' ) );

			if( !empty( $address ) ){
				$theme_mod -> set( 'tools-display-address', true );
				$theme_mod -> set( 'tools-address', $address );
			}

			// Tools Phone
			$phone = gourmand_esc::text( $wizard -> get_setting( 'phone' ) );

			if( !empty( $phone ) ){
				$width = esc_attr( $wizard -> get_setting( 'content-width' ) );

				if( $width !== 'small' ){
					$theme_mod -> set( 'tools-display-menu-phone', true );
				}
				else{
					$theme_mod -> set( 'tools-display-phone', true );
				}

				$theme_mod -> set( 'tools-phone', $phone );
			}
		}


		/**
		 *	Blog configuration actions
		 */

		if( $setup_type == 'blog' || $setup_type == 'personal-blog' ){

			/**
			 *	Disable not Blog Sections
			 */

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about' ) )
				$theme_mod -> set( 'front-page-content-about', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-daily-dishes' ) )
				$theme_mod -> set( 'front-page-content-daily-dishes', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services' ) )
				$theme_mod -> set( 'front-page-content-services', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-chef-menu' ) )
				$theme_mod -> set( 'front-page-content-chef-menu', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-delivery' ) )
				$theme_mod -> set( 'front-page-content-delivery', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-testimonials' ) )
				$theme_mod -> set( 'front-page-content-testimonials', false );

			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-reservation' ) )
				$theme_mod -> set( 'front-page-content-reservation', false );

			$contact_form_7 		= (bool)$wizard -> get_setting( 'contact-form-7' );
			$create_contact_page 	= (bool)$wizard -> get_setting( 'create-contact-page' );
			$contact_page 			= $wizard -> get_setting( 'contact-page' );

			if( !$contact_form_7 || !$create_contact_page || empty( $contact_page ) ){
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-contact' ) )
					$theme_mod -> set( 'front-page-content-contact', false );
			}

			// Section Features
			// Title
			if( $overwrite || !gourmand_mod::is_set( 'front-page-content-features-title-text' ) )
				$theme_mod -> set( 'front-page-content-features-title-text',
					sprintf( __( 'Theme %1$s', 'gourmand' ),
					'<span class="accent-color">' . __( 'Features', 'gourmand' ) . '</span>'
				));
		}


		switch ( $setup_type ) {
			case 'business' :

				/**
				 *	Disable Not Food Business Sections
				 */

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-daily-dishes' ) )
					$theme_mod -> set( 'front-page-content-daily-dishes', false );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-chef-menu' ) )
					$theme_mod -> set( 'front-page-content-chef-menu', false );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-delivery' ) )
					$theme_mod -> set( 'front-page-content-delivery', false );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-reservation' ) )
					$theme_mod -> set( 'front-page-content-reservation', false );

				/**
				 *	Setup
				 */

				// Accent Color
				if( $overwrite || !gourmand_mod::is_set( 'accent-color' ) )
	 				$theme_mod -> set( 'accent-color', '#21a548' );

	 			// Tools Background Color
				if( $overwrite || !gourmand_mod::is_set( 'tools-bkg-color' ) )
	 				$theme_mod -> set( 'tools-bkg-color', '#001d33' );

	 			// Sections Title Color
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-titles-color' ) )
	 				$theme_mod -> set( 'front-page-content-titles-color', '#002a51' );

	 			// Overwrite Montez Font
				if( class_exists( 'EGF_Register_Options' ) ){
					delete_transient( 'tt_font_theme_options' );

					$fonts = $option -> get( 'tt_font_theme_options', array() );
					$fonts = wp_parse_args( $fonts, EGF_Register_Options::get_option_defaults() );

					if( !gourmand_scripts::font( 'overwrite-montez' ) ){

						if( !is_array( $fonts[ 'overwrite-montez' ] ) )
							$fonts[ 'overwrite-montez' ] = array();

		 				$fonts[ 'overwrite-montez' ][ 'subset' ]			= 'latin,all';
		 				$fonts[ 'overwrite-montez' ][ 'font_id' ]			= 'montserrat';
		 				$fonts[ 'overwrite-montez' ][ 'font_name' ]			= 'Montserrat';
		 				$fonts[ 'overwrite-montez' ][ 'font_weight' ]		= '300';
		 				$fonts[ 'overwrite-montez' ][ 'font_style' ]		= 'normal';
		 				$fonts[ 'overwrite-montez' ][ 'font_weight_style' ] = '300';
		 				$fonts[ 'overwrite-montez' ][ 'stylesheet_url' ]	= 'https://fonts.googleapis.com/css?family=Montserrat:300';

		 				$option -> update( 'tt_font_theme_options', $fonts );

						set_transient( 'tt_font_theme_options', $fonts, 0 );

		 				// Additional Custom CSS
		 				$css_post = wp_get_custom_css_post();
		 				$css = $css_post -> post_content;

		 				if( !empty( $css ) )
		 					$css .= "\n\n";

		 				$css .= "/* GOURMAND CUSTOM CSS */\n";
		 				$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
		 				$css .= "font-size: 26px;\n\t";
		 				$css .= "line-height: 38px;\n";
		 				$css .= "}\n\n";

		 				$css .= "@media (max-width: 991px){\n";
		 				$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
		 				$css .= "font-size: 26px;\n\t";
		 				$css .= "line-height: 38px;\n";
		 				$css .= "}\n";
		 				$css .= "}\n\n";

		 				$css .= "@media (max-width: 768px){\n";
		 				$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
		 				$css .= "font-size: 22px;\n\t";
		 				$css .= "line-height: 34px;\n";
		 				$css .= "}\n";
		 				$css .= "}";

		 				wp_update_custom_css_post( $css );

		 				$theme_mod -> set( 'custom_css', $css );
		 			}
				}

	 			// Fooder Dark Sidebar Background Color
				if( $overwrite || !gourmand_mod::is_set( 'footer-dark-sidebar-bkg-color' ) )
	 				$theme_mod -> set( 'footer-dark-sidebar-bkg-color', '#012641' );

	 			// Copyright Background Color
				if( $overwrite || !gourmand_mod::is_set( 'copyright-bkg-color' ) )
	 				$theme_mod -> set( 'copyright-bkg-color', '#001d33' );

	 			// Header Small Title
				if( $overwrite || !gourmand_mod::is_set( 'header-small-title-text' ) )
	 				$theme_mod -> set( 'header-small-title-text', __( 'WordPress Business Solutions', 'gourmand' ) );

	 			// Header Button
				if( $overwrite || !gourmand_mod::is_set( 'header-btn-1-label' ) )
	 				$theme_mod -> set( 'header-btn-1-label', __( 'See our Services', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'header-btn-1-desc' ) )
	 				$theme_mod -> set( 'header-btn-1-desc', __( 'See our Services', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'header-btn-1-url' ) )
	 				$theme_mod -> set( 'header-btn-1-url', '#gourmand-services-section' );

	 			/**
	 			 *	Section Features
	 			 */

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-features-title-text' ) )
	 				$theme_mod -> set( 'front-page-content-features-title-text', sprintf(
						__( 'What we %1$s', 'gourmand' ),
						'<span class="accent-color">' . __( 'Propose', 'gourmand' ) . '</span>'
					));

	 			/**
	 			 *	Section About
	 			 */

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-title-text' ) )
	 				$theme_mod -> set( 'front-page-content-about-title-text', sprintf(
						__( 'About our %1$s', 'gourmand' ),
						'<span class="accent-color">' . __( 'Business', 'gourmand' ) . '</span>'
					));

	 			// Column 1
	 			// Small Title
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-small-title-text' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-1-small-title-text', __( 'We ensure Quality and Professionalism', 'gourmand' ) );

	 			// Strong Title
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-strong-title-text' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-1-strong-title-text', __( 'Discover our Story', 'gourmand' ) );

	 			// Button
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-btn-label' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-1-btn-label', __( 'Contact Us', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-btn-url' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-1-btn-url', '#gourmand-contact-section' );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-btn-bordered-h-color' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-1-btn-bordered-h-color', '#001d33' );

	 			// Column 2
	 			// Image
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-2-image' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-2-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/about-team.jpg' ) );

	 			// Title
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-2-title-text' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-2-title-text', __( 'About our Team', 'gourmand' ) );

	 			// Column 3:
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-3' ) )
	 				$theme_mod -> set( 'front-page-content-about-col-3', false );

	 			/**
	 			 *	Section Call Action
	 			 */

	 			// SubTitle
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-subtitle-text' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-subtitle-text', __( 'WordPress Business Solutions', 'gourmand' ) );

	 			// Button
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-desc' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-btn-1-desc', __( 'Gourmand - WordPress Business Solutions', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-url' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-btn-1-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-business&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=button' );

				// Media
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-media-nav-url' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-media-nav-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-business&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=image' );


	 			/**
	 			 *	Section Services
	 			 */

	 			// Number of Columns
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-nr-cols' ) )
	 				$theme_mod -> set( 'front-page-content-services-nr-cols', 5 );

	 			// Image Service 1
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-1-image' ) )
	 				$theme_mod -> set( 'front-page-content-services-1-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/not-food/service-1.jpg' ) );

	 			// Title Service 1
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-1-title' ) )
	 				$theme_mod -> set( 'front-page-content-services-1-title', __( 'Service nr. 1', 'gourmand' ) );

	 			// Image Service 2
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-2-image' ) )
	 				$theme_mod -> set( 'front-page-content-services-2-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/not-food/service-2.jpg' ) );

	 			// Title Service 2
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-2-title' ) )
	 				$theme_mod -> set( 'front-page-content-services-2-title', __( 'Service nr. 2', 'gourmand' ) );

	 			// Image Service 3
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-3-image' ) )
	 				$theme_mod -> set( 'front-page-content-services-3-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/not-food/service-3.jpg' ) );

	 			// Title Service 3
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-3-title' ) )
	 				$theme_mod -> set( 'front-page-content-services-3-title', __( 'Service nr. 3', 'gourmand' ) );

	 			// Image Service 4
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-4-image' ) )
	 				$theme_mod -> set( 'front-page-content-services-4-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/not-food/service-4.jpg' ) );

	 			// Title Service 4
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-4-title' ) )
	 				$theme_mod -> set( 'front-page-content-services-4-title', __( 'Service nr. 4', 'gourmand' ) );

	 			// Enable Service 5
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-5' ) )
	 				$theme_mod -> set( 'front-page-content-services-5', true );

	 			// Image Service 5
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-5-image' ) )
	 				$theme_mod -> set( 'front-page-content-services-5-image', esc_url( get_template_directory_uri() . '/assets/skins/default/img/not-food/service-5.jpg' ) );

	 			// Title Service 5
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-5-title' ) )
	 				$theme_mod -> set( 'front-page-content-services-5-title', __( 'Service nr. 5', 'gourmand' ) );

	 			// Description Service 5
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-services-5-desc' ) )
	 				$theme_mod -> set( 'front-page-content-services-5-desc', '<p>' . __( 'Aliquam posuere turpis nec ultrices scelerisque. Nullam fringilla orci odio, quis bibendum metus congue sit amet.', 'gourmand' ) . '</p>' );

	 			/**
	 			 *	Section Testimonials
	 			 */

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-testimonials-1-author-desc' ) )
	 				$theme_mod -> set( 'front-page-content-testimonials-1-author-desc', __( 'Business Coach', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-testimonials-2-author-desc' ) )
	 				$theme_mod -> set( 'front-page-content-testimonials-2-author-desc', __( 'Financial Expert', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-testimonials-3-author-desc' ) )
	 				$theme_mod -> set( 'front-page-content-testimonials-3-author-desc', __( 'Marketing Expert', 'gourmand' ) );

				/**
				 *	Latest News
				 */

				$create_blog_page	= (bool)$wizard -> get_setting( 'create-blog-page' );
				$blog_page			= $wizard -> get_setting( 'blog-page' );

				if( $create_blog_page && !empty( $blog_page ) ){

					// Number of Articles
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-nr-articles' ) )
						$theme_mod -> set( 'front-page-content-latest-news-nr-articles', 8 );

					// Number of Columns
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-nr-cols' ) )
						$theme_mod -> set( 'front-page-content-latest-news-nr-cols', 4 );

					// Title
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-title-text' ) )
						$theme_mod -> set( 'front-page-content-latest-news-title-text', sprintf(
							__( 'Our latest %1$s', 'gourmand' ),
							'<span class="accent-color">' . __( 'Projects', 'gourmand' ) . '</span>'
						));

					// SubTitle
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-subtitle-text' ) )
						$theme_mod -> set( 'front-page-content-latest-news-subtitle-text', __( 'Portfolio', 'gourmand' ) );

					// Description
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-desc-text' ) )
						$theme_mod -> set( 'front-page-content-latest-news-desc-text', '<p><em>' . __( 'Take a look at our works, sketch and projects, you can find something interesting for you.', 'gourmand' ) . '</em></p>' );

					// Description Max Width
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-desc-max-width' ) )
						$theme_mod -> set( 'front-page-content-latest-news-desc-max-width', 430 );

					// Blog
					if( $overwrite || !gourmand_mod::is_set( 'blog-articles' ) )
						$theme_mod -> set( 'blog-article', __( 'Project', 'gourmand' ) );

					if( $overwrite || !gourmand_mod::is_set( 'blog-articles' ) )
						$theme_mod -> set( 'blog-articles', __( 'Projects', 'gourmand' ) );

					if( $overwrite || !gourmand_mod::is_set( 'blog-author' ) )
						$theme_mod -> set( 'blog-author', false );

					if( $overwrite || !gourmand_mod::is_set( 'blog-date' ) )
						$theme_mod -> set( 'blog-date', false );

					if( $overwrite || !gourmand_mod::is_set( 'blog-comments' ) )
						$theme_mod -> set( 'blog-comments', false );

					if( $overwrite || !gourmand_mod::is_set( 'blog-views' ) )
						$theme_mod -> set( 'blog-views', false );

					if( $overwrite || !gourmand_mod::is_set( 'blog-share' ) )
						$theme_mod -> set( 'blog-share', false );

					// Single Post
					if( $overwrite || !gourmand_mod::is_set( 'post-author' ) )
						$theme_mod -> set( 'post-author', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-date' ) )
						$theme_mod -> set( 'post-date', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-comments' ) )
						$theme_mod -> set( 'post-comments', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-views' ) )
						$theme_mod -> set( 'post-views', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-share' ) )
						$theme_mod -> set( 'post-share', true );

					if( $overwrite || !gourmand_mod::is_set( 'post-tags' ) )
						$theme_mod -> set( 'post-tags', true );

					if( $overwrite || !gourmand_mod::is_set( 'post-author-box' ) )
						$theme_mod -> set( 'post-author-box', false );
				}

				else{
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news' ) )
						$theme_mod -> set( 'front-page-content-latest-news', false );
				}

				break;

			case 'food-business' :
				/**
				 *	Disable Not Food Business Section
				 */

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-features' ) )
					$theme_mod -> set( 'front-page-content-features', false );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-contact' ) )
					$theme_mod -> set( 'front-page-content-contact', false );

				// Currency Position
				if( $overwrite || !gourmand_mod::is_set( 'dish-currency' ) ){
					$currency = $wizard -> get_setting( 'dish-currency' );

					$theme_mod -> set( 'dish-currency', esc_attr( $currency ) );
				}

				if( $overwrite || !gourmand_mod::is_set( 'currency-before' ) ){
					$currency_before = (bool)$wizard -> get_setting( 'currency-before' );

					$theme_mod -> set( 'currency-before', $currency_before );
				}

				/**
				 *	About Section
				 */

				// Button
				// Label
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-btn-label' ) )
					$theme_mod -> set( 'front-page-content-about-col-1-btn-label', __( 'Discover Chef Menu', 'gourmand' ) );

				// Url
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-about-col-1-btn-url' ) )
					$theme_mod -> set( 'front-page-content-about-col-1-btn-url', '#gourmand-chef-menu-section' );

				$create_blog_page	= (bool)$wizard -> get_setting( 'create-blog-page' );
				$blog_page			= $wizard -> get_setting( 'blog-page' );

				if( !$create_blog_page || empty( $blog_page ) ){
					if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news' ) )
						$theme_mod -> set( 'front-page-content-latest-news', false );
				}

				break;

			case 'personal-blog' :
				// Accent Color
				if( $overwrite || !gourmand_mod::is_set( 'accent-color' ) )
					$theme_mod -> set( 'accent-color', '#28a6af' );

				// Overwrite Montez Font
				if( class_exists( 'EGF_Register_Options' ) ){
					delete_transient( 'tt_font_theme_options' );

					$fonts = $option -> get( 'tt_font_theme_options', array() );
					$fonts = wp_parse_args( $fonts, EGF_Register_Options::get_option_defaults() );

					if( !gourmand_scripts::font( 'overwrite-montez' ) ){

						if( !is_array( $fonts[ 'overwrite-montez' ] ) )
							$fonts[ 'overwrite-montez' ] = array();

						$fonts[ 'overwrite-montez' ][ 'subset' ]			= 'latin,all';
						$fonts[ 'overwrite-montez' ][ 'font_id' ]			= 'alice';
						$fonts[ 'overwrite-montez' ][ 'font_name' ]			= 'Alice';
						$fonts[ 'overwrite-montez' ][ 'font_weight' ]		= '400';
						$fonts[ 'overwrite-montez' ][ 'font_style' ]		= 'normal';
						$fonts[ 'overwrite-montez' ][ 'font_weight_style' ] = 'regular';
						$fonts[ 'overwrite-montez' ][ 'stylesheet_url' ]	= 'https://fonts.googleapis.com/css?family=Alice:regular';

						$option -> update( 'tt_font_theme_options', $fonts );

						set_transient( 'tt_font_theme_options', $fonts, 0 );

						// Additional Custom CSS
						$css_post = wp_get_custom_css_post();
						$css = $css_post -> post_content;

						if( !empty( $css ) )
							$css .= "\n\n";

						$css .= "/* GOURMAND CUSTOM CSS */\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 26px;\n\t";
						$css .= "line-height: 38px;\n";
						$css .= "}\n\n";

						$css .= "@media (max-width: 991px){\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 26px;\n\t";
						$css .= "line-height: 38px;\n";
						$css .= "}\n";
						$css .= "}\n\n";

						$css .= "@media (max-width: 768px){\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 22px;\n\t";
						$css .= "line-height: 34px;\n";
						$css .= "}\n";
						$css .= "}";

						wp_update_custom_css_post( $css );

						$theme_mod -> set( 'custom_css', $css );
					}
				}

				// Set website title with author Display Name
				$author_name = (bool)$wizard -> get_setting( 'author-name' );

				if( $author_name ){
					$display_name = get_the_author_meta( 'display_name', get_current_user_id() );
					$theme_mod -> set( 'blogname', $display_name );
					$option -> update( 'blogname', $display_name );
				}

				// Header Small Title
				if( $overwrite || !gourmand_mod::is_set( 'header-small-title-text' ) )
	 				$theme_mod -> set( 'header-small-title-text', __( 'WordPress Blog Solutions', 'gourmand' ) );


				/**
	 			 *	Section Call Action
	 			 */

	 			// SubTitle
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-subtitle-text' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-subtitle-text', __( 'WordPress Blog Solutions', 'gourmand' ) );

	 			// Button
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-desc' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-btn-1-desc', __( 'Gourmand - WordPress Blog Solutions', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-url' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-btn-1-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-personal-blog&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=button' );

				// Media
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-media-nav-url' ) )
	 				$theme_mod -> set( 'front-page-content-call-action-media-nav-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-personal-blog&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=image' );

				// Section Latest News
				// Title
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-title-text' ) )
					$theme_mod -> set( 'front-page-content-latest-news-title-text', sprintf(
						__( 'Blog %1$s', 'gourmand' ),
						'<span class="accent-color">' . __( 'News', 'gourmand' ) . '</span>'
					));

				// Disable Author
				$post_author = (bool)$wizard -> get_setting( 'post-author' );

				if( $post_author ){
					if( $overwrite || !gourmand_mod::is_set( 'blog-author' ) )
						$theme_mod -> set( 'blog-author', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-author' ) )
						$theme_mod -> set( 'post-author', false );

					if( $overwrite || !gourmand_mod::is_set( 'post-author-box' ) )
						$theme_mod -> set( 'post-author-box', false );
				}
				break;

			case 'blog' :
				// Accent Color
				if( $overwrite || !gourmand_mod::is_set( 'accent-color' ) )
					$theme_mod -> set( 'accent-color', '#2a6fd6' );

				// Overwrite Montez Font
				if( class_exists( 'EGF_Register_Options' ) ){
					delete_transient( 'tt_font_theme_options' );

					$fonts = $option -> get( 'tt_font_theme_options', array() );
					$fonts = wp_parse_args( $fonts, EGF_Register_Options::get_option_defaults() );

					if( !gourmand_scripts::font( 'overwrite-montez' ) ){

						if( !is_array( $fonts[ 'overwrite-montez' ] ) )
							$fonts[ 'overwrite-montez' ] = array();

						$fonts[ 'overwrite-montez' ][ 'subset' ]			= 'latin,all';
						$fonts[ 'overwrite-montez' ][ 'font_id' ]			= 'playfair_display';
						$fonts[ 'overwrite-montez' ][ 'font_name' ]			= 'Playfair Display';
						$fonts[ 'overwrite-montez' ][ 'font_weight' ]		= '400';
						$fonts[ 'overwrite-montez' ][ 'font_style' ]		= 'normal';
						$fonts[ 'overwrite-montez' ][ 'font_weight_style' ] = 'regular';
						$fonts[ 'overwrite-montez' ][ 'stylesheet_url' ]	= 'https://fonts.googleapis.com/css?family=Playfair+Display:regular';

						$option -> update( 'tt_font_theme_options', $fonts );

						set_transient( 'tt_font_theme_options', $fonts, 0 );

						// Additional Custom CSS
						$css_post = wp_get_custom_css_post();
						$css = $css_post -> post_content;

						if( !empty( $css ) )
							$css .= "\n\n";

						$css .= "/* GOURMAND CUSTOM CSS */\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 26px;\n\t";
						$css .= "line-height: 38px;\n";
						$css .= "}\n\n";

						$css .= "@media (max-width: 991px){\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 26px;\n\t";
						$css .= "line-height: 38px;\n";
						$css .= "}\n";
						$css .= "}\n\n";

						$css .= "@media (max-width: 768px){\n";
						$css .= "div.gourmand-site-identity div.text-wrapper a.site-title{\n\t";
						$css .= "font-size: 22px;\n\t";
						$css .= "line-height: 34px;\n";
						$css .= "}\n";
						$css .= "}";

						wp_update_custom_css_post( $css );

						$theme_mod -> set( 'custom_css', $css );
					}
				}

				// Header Small Title
				if( $overwrite || !gourmand_mod::is_set( 'header-small-title-text' ) )
					$theme_mod -> set( 'header-small-title-text', __( 'WordPress News Solutions', 'gourmand' ) );

				// Sections Titles Color
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-titles-color' ) )
					$theme_mod -> set( 'front-page-content-titles-color', '#000000' );

				// Section Features
				// Number of Columns
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-features-nr-cols' ) )
					$theme_mod -> set( 'front-page-content-features-nr-cols', 3 );

				/**
				 *	Section Call Action
				 */

				// SubTitle
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-subtitle-text' ) )
					$theme_mod -> set( 'front-page-content-call-action-subtitle-text', __( 'WordPress News Solutions', 'gourmand' ) );

				// Button
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-desc' ) )
					$theme_mod -> set( 'front-page-content-call-action-btn-1-desc', __( 'Gourmand - WordPress News Solutions', 'gourmand' ) );

				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-btn-1-url' ) )
					$theme_mod -> set( 'front-page-content-call-action-btn-1-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-news&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=button' );

				// Media
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-call-action-media-nav-url' ) )
					$theme_mod -> set( 'front-page-content-call-action-media-nav-url', 'http://mythem.es/item/gourmand/?utm_source=gourmand-news&utm_medium=customer-website&utm_campaign=analiza-tema&utm_content=image' );

				// Section Latest News
				// Title
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-title-text' ) )
					$theme_mod -> set( 'front-page-content-latest-news-title-text', sprintf(
						__( 'News %1$s', 'gourmand' ),
						'<span class="accent-color">' . __( 'Magazine', 'gourmand' ) . '</span>'
					));

				// Number of Articles
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-nr-articles' ) )
					$theme_mod -> set( 'front-page-content-latest-news-nr-articles', 8 );

				// Columns
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-nr-cols' ) )
					$theme_mod -> set( 'front-page-content-latest-news-nr-cols', 4 );

				// Display Articles by Categories

				// Display Newsletter Subscribe Form

				// Disable Contact Section
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-contact' ) )
					$theme_mod -> set( 'front-page-content-contact', false );

				// Blog Right Sidebar
				if( $overwrite || !gourmand_mod::is_set( 'blog-layout' ) )
					$theme_mod -> set( 'blog-layout', 'right' );

				// Archives Right Sidebar
				if( $overwrite || !gourmand_mod::is_set( 'archives-layout' ) )
					$theme_mod -> set( 'archives-layout', 'right' );

				break;
			default:
				if( $overwrite || !gourmand_mod::is_set( 'front-page-content-latest-news-title-text' ) )
					$theme_mod -> set( 'front-page-content-latest-news-title-text', sprintf(
						__( 'Blog %1$s', 'gourmand' ),
						'<span class="accent-color">' . __( 'News', 'gourmand' ) . '</span>'
					));
				break;
		}

		// Social Share
		$social_share = (bool)$wizard -> get_setting( 'social-share' );

		if( $social_share ){
			if( $overwrite || !gourmand_mod::is_set( 'blog-share' ) )
				$theme_mod -> set( 'blog-share', true );

			if( $overwrite || !gourmand_mod::is_set( 'post-share' ) )
				$theme_mod -> set( 'post-share', true );
		}


		/**
		 *	Create Pages
		 */

		$pages = array();

		// Create Front Page and Blog Page
		$show_on_front = $option -> get( 'show_on_front' );

		if( 'page' !== $show_on_front ){

			$is_static_front_page = (bool)$wizard -> get_setting( 'static-front-page' );

			if( $is_static_front_page ){
				$option -> update( 'show_on_front', 'page' );
				$theme_mod -> set( 'show_on_front', 'page' );

				// Front Page
				$create_front_page 	= (bool)$wizard -> get_setting( 'create-front-page' );
				$front_page 		= $wizard -> get_setting( 'front-page' );

				if(  $create_front_page && !empty( $front_page ) ){
					$front_page_id = $wizard -> insert_post(array(
						'post_title' => esc_html( $wizard -> get_setting( 'front-page' ) )
					));

					if ( !empty( $front_page_id ) ) {
						$option -> update( 'page_on_front', $front_page_id );

						$p = get_post( $front_page_id );
					}

					array_push( $pages, $front_page_id );
				}

				// Blog Page
				$create_blog_page 	= (bool)$wizard -> get_setting( 'create-blog-page' );
				$blog_page 			= $wizard -> get_setting( 'blog-page' );

				if( $create_blog_page && !empty( $blog_page ) ){
					$blog_page_id = $wizard -> insert_post(array(
						'post_title' => esc_html( $blog_page )
					));

					if ( ! empty( $blog_page_id ) ) {
						$option -> update( 'page_for_posts', $blog_page_id );

						$p = get_post( $blog_page_id );
					}

					array_push( $pages, $blog_page_id );
				}
			}
		}

		// Create Contact Page
		$contact_form_7 		= (bool)$wizard -> get_setting( 'contact-form-7' );
		$create_contact_page 	= (bool)$wizard -> get_setting( 'create-contact-page' );
		$contact_page 			= $wizard -> get_setting( 'contact-page' );

		if( $contact_form_7 && $create_contact_page && !empty( $contact_page ) ){

			$form_id = gourmand_wpcf7_contact_page();

			$content =

			"<h2>Get in touch with us, write us an e-mail!</h2>\n\n" .
			"<p>If you have a purpose or you want to alert us about an issues in our theme then please contact us.\n" .
			"You can use this contact form or you can contact us Through our Social Networks.</p>\n\n\n";

			if( $form_id > 0 ){
				$content .= "[contact-form-7 id=\"{$form_id}\" title=\"" . __( 'Contact - Page', 'gourmand' ) . "\"]";
			}

			// Page
			$contact_page_id = $wizard -> insert_post(array(
				'post_title' 	=> esc_html( $wizard -> get_setting( 'contact-page' ) ),
				'post_content'	=> $content
			));

			$p = get_post( $contact_page_id );

			array_push( $pages, $contact_page_id );
		}


		/**
		 *	Create Navigation Menu
		 */

		if( count( $pages ) ){
			$menu_name = __( 'Gourmand Header Menu', 'gourmand' );
			$menu_exists = wp_get_nav_menu_object( $menu_name );

			if( !$menu_exists ){
				$menu_id = wp_create_nav_menu( $menu_name );

				foreach( $pages as $index => $page_id ){

					$page = get_post( absint( $page_id ) );

					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title' 	=> $page -> post_title,
						'menu-item-classes' => $page -> slug,
						'menu-item-url' 	=> get_permalink( $page -> ID ),
						'menu-item-status'	=> 'publish'
					));
				}

				$locations = get_nav_menu_locations();
				$locations[ 'gourmand-header' ] = $menu_id;

				set_theme_mod( 'nav_menu_locations', $locations );
			}
	 	}


		/**
		 *	Social Items
		 */

		// Header Social Items
		if( (bool)$wizard -> get_setting( 'header-social-links' ) ){
			$theme_mod -> set( 'tools-display-social', true );
		}

		// Footer Social Items
		if( (bool)$wizard -> get_setting( 'footer-display-social' ) ){
			$theme_mod -> set( 'footer-display-social', true );
		}

		// Footer Social Links Size
		$size = esc_attr( $wizard -> get_setting( 'footer-social-size' ) );

		if( $size !== 'medium' ){
			$theme_mod -> set( 'footer-social-size', $size );
		}

		// Set Soacial Links
		$facebook = $wizard -> get_setting( 'facebook' );

		if( !empty( $facebook ) ){
			$theme_mod -> set( 'facebook', esc_url( $wizard -> get_setting( 'facebook' ) ) );
		}

		$twitter = $wizard -> get_setting( 'twitter' );

		if( !empty( $twitter ) ){
			$theme_mod -> set( 'twitter', esc_url( $wizard -> get_setting( 'twitter' ) ) );
		}

		$instagram = $wizard -> get_setting( 'instagram' );

		if( !empty( $instagram ) ){
			$theme_mod -> set( 'instagram', esc_url( $wizard -> get_setting( 'instagram' ) ) );
		}

		// RSS
		if( (bool)$wizard -> get_setting( 'rss-link' ) ){
			$theme_mod -> set( 'display-rss', true );
			$rss = esc_url( $wizard -> get_setting( 'rss' ) );
			$theme_mod -> set( 'rss', esc_url( $rss ) );
		}

		else{
			$theme_mod -> set( 'display-rss', false );
		}

		// Set Content Copyright
		$copyright = $wizard -> get_setting( 'content-copyright' );

		if( !empty( $copyright ) ){
			$theme_mod -> set( 'content-copyright', gourmand_esc::copyright( $wizard -> get_setting( 'content-copyright' ) ) );
		}


		/**
		 *	Create Contact Form 7 Plugin
		 */

		if( $contact_form_7 ){

			// Book A Table / Reservation Section
			$book_a_table_id = gourmand_wpcf7_book_a_table();

			if( $book_a_table_id && ( $overwrite || !gourmand_mod::is_set( 'front-page-content-reservation-form' ) ) )
				$theme_mod -> set( 'front-page-content-reservation-form', absint( $book_a_table_id ) );

			// Contact Section
			$contact_id = gourmand_wpcf7_contact();

			if( $contact_id && ( $overwrite || !gourmand_mod::is_set( 'front-page-content-contact-form' ) ) )
				$theme_mod -> set( 'front-page-content-contact-form', absint( $contact_id ) );
		}


		/**
		 *	Create a Demo Food Menu
		 */

		if( (class_exists( 'gourmand_light' ) || class_exists( 'gourmand_pro' ) ) && $theme_mod -> get( 'gourmand-build-demo-food-menu', true ) ){
			$data = array(
				1 => array(
					'title' 	=> __( 'Breakfast', 'gourmand' ),
					'dishes'	=> array(
						1 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/breakfast/breakfast-dish-1.png',
							'title' 		=> __( 'Title 1', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 1', 'gourmand' ),
							'price'			=> 2.45,
							'daily-dish'	=> true
						),
						2 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/breakfast/breakfast-dish-2.png',
							'title' 		=> __( 'Title 2', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 2', 'gourmand' ),
							'price'			=> 2.89,
							'daily-dish'	=> true
						),
						3 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/breakfast/breakfast-dish-3.png',
							'title' 		=> __( 'Title 3', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 3', 'gourmand' ),
							'price'			=> 2.76
						),
					)
				),
				2 => array(
					'title' 	=> __( 'Lunch', 'gourmand' ),
					'dishes'	=> array(
						1 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/lunch/lunch-dish-1.png',
							'title' 		=> __( 'Title 1', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 1', 'gourmand' ),
							'price'			=> 4.65,
							'daily-dish'	=> true
						),
						2 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/lunch/lunch-dish-2.png',
							'title' 		=> __( 'Title 2', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 2', 'gourmand' ),
							'price'			=> 5.18,
						),
						3 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/lunch/lunch-dish-3.png',
							'title' 		=> __( 'Title 3', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 3', 'gourmand' ),
							'price'			=> 4.89,
							'daily-dish'	=> true,
						),
					)
				),
				3 => array(
					'title' 	=> __( 'Dinner', 'gourmand' ),
					'dishes'	=> array(
						1 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/dinner/dinner-dish-1.png',
							'title' 		=> __( 'Title 1', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 1', 'gourmand' ),
							'price'			=> 8.33,
						),
						2 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/dinner/dinner-dish-2.png',
							'title' 		=> __( 'Title 2', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 2', 'gourmand' ),
							'price'			=> 7.75,
							'daily-dish'	=> true
						),
						3 => array(
							'image'			=> get_template_directory_uri() . '/assets/skins/default/img/dishes/dinner/dinner-dish-3.png',
							'title' 		=> __( 'Title 3', 'gourmand' ),
							'desc'			=> __( 'Dish description for dish title 3', 'gourmand' ),
							'price'			=> 8.24,
							'daily-dish'	=> true
						),
					)
				)
			);

			$food_menu_id = $wizard -> insert_post(array(
				'post_title' => __( 'Demo Food Menu', 'gourmand' ),
				'post_type'  => 'gourmand-food-menu'
			));

			$meta -> set( absint( $food_menu_id ), 'gourmand-dishes', json_encode( $data ) );

			$theme_mod -> set( 'front-page-content-chef-menu-1-food-menu', absint( $food_menu_id ) );
			$theme_mod -> set( 'gourmand-build-demo-food-menu', false );
		}


		/**
	 	 *	Adding Additional Action to Setup
	 	 */

		do_action( 'gourmand_after_wizard_setup' );

		echo '<p class="setup-console">' . esc_html__( 'Successful setup !', 'gourmand' ) . '</p>';

		$theme_mod -> set( 'gourmand-recommended-actions', false );
	}

	add_action( 'mythemes_wizard_setup', 'gourmand_wizard_setup' );
?>
