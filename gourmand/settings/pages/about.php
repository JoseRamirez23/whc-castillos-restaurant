<?php
	/**
	 *	About Gourmand - Appearance Page
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	// Add About Page Menu
	function gourmand_appearance_page__about()
	{
		$title = __( 'About Gourmand', 'gourmand' );

		if( (bool)gourmand_mod::get( 'gourmand-recommended-actions', true ) )
			$title = sprintf( __( 'About Gourmand %1$s', 'gourmand' ), '<span class="gourmand-recommended-actions menu-actions"><span class="actions-counter">1</span></span>' );

  		add_theme_page(
 			__( 'About Gourmand', 'gourmand' ),
 			$title,
 			'edit_theme_options',
 			'gourmand-about',
 			'gourmand_appearance_page__about_callback'
 		);
  	}

  	add_action( 'admin_menu', 'gourmand_appearance_page__about' );


	// About Page Callback Function
 	function gourmand_appearance_page__about_callback()
 	{
		/**
		 *	Shortdescription About Theme Gourmand
		 */

		$theme = wp_get_theme();

		echo '<section class="gourmand-section header">';
		echo '<h1 class="theme-name">' . esc_html( apply_filters( 'gourmand_solution_name', $theme -> get( 'Name' ) ) ) . '<sup>v ' . esc_html( $theme -> get( 'Version' ) ) . '</sup></h1>';

		echo '<h2 class="theme-short-desc">' . esc_html__( 'Food, Blog and Business Solutions', 'gourmand' ) .'</h2>';

		echo '<p class="theme-desc">' . esc_html__( 'A lot of ready one click Setup Custom Sections. Not need Code Knowledges to Grow Up your Business.', 'gourmand' ) . '</p>';

		echo '<div class="buttons">';


		echo '<a href="http://mythem.es/item/gourmand/?utm_source=gourmand-details&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=button" class="mythemes-btn"><i class="gourmand-icon-info-circled"></i>' . esc_html__( 'Gourmand Details', 'gourmand' ) . '</a>';
		echo '<a href="http://chooser.mythem.es/gourmand.php/?utm_source=gourmand-demo&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=button" class="mythemes-btn"><i class="gourmand-icon-eye-3"></i>' . esc_html__( 'Preview Demo', 'gourmand' ) . '</a>';

		echo '</div>';


		echo '<div class="gourmand-banner-wrapper">';

		echo '<div class="gourmand-banner">';
		echo '<img src="' . get_template_directory_uri() . '/assets/theme/img/gourmand.jpg" alt="' . esc_attr__( 'Gourmand - WordPress Food Solutions', 'gourmand' ) . '"/>';
		echo '<a href="http://demo.mythem.es/gourmand-food-wordpress/?utm_source=gourmand-food-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=mask-link" title="Demo | Gourmand - WordPress Food Solutions" target="_blank" class="mask">';
		echo '</a>';
		echo '<a href="http://demo.mythem.es/gourmand-food-wordpress/?utm_source=gourmand-food-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=demo-link" title="Demo | Gourmand - WordPress Food Solutions" target="_blank" class="see-demo">' . esc_html__( 'See Demo &rsaquo;', 'gourmand' ) .'</a>';
		echo '</div>';

		echo '<div class="gourmand-banner">';
		echo '<img src="' . get_template_directory_uri() . '/assets/theme/img/blog.jpg" alt="' . esc_attr__( 'Gourmand - WordPress Blog Solutions', 'gourmand' ) . '"/>';
		echo '<a href="http://demo.mythem.es/gourmand-personal-blog/?utm_source=gourmand-blog-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=mask-link" title="Demo | Gourmand - WordPress Blog Solutions" target="_blank" class="mask">';
		echo '</a>';
		echo '<a href="http://demo.mythem.es/gourmand-personal-blog/?utm_source=gourmand-blog-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=demo-link" title="Demo | Gourmand - WordPress Blog Solutions" target="_blank" class="see-demo">' . esc_html__( 'See Demo &rsaquo;', 'gourmand' ) .'</a>';
		echo '</div>';

		echo '<div class="gourmand-banner">';
		echo '<img src="' . get_template_directory_uri() . '/assets/theme/img/business.jpg" alt="' . esc_attr__( 'Gourmand - WordPress Business Solutions', 'gourmand' ) . '"/>';
		echo '<a href="http://demo.mythem.es/gourmand-business/?utm_source=gourmand-business-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=mask-link" title="Demo | Gourmand - WordPress Business Solutions" target="_blank" class="mask">';
		echo '</a>';
		echo '<a href="http://demo.mythem.es/gourmand-business/?utm_source=gourmand-business-banner&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=demo-link" title="Demo | Gourmand - WordPress Business Solutions" target="_blank" class="see-demo">' . esc_html__( 'See Demo &rsaquo;', 'gourmand' ) .'</a>';
		echo '</div>';

		echo '</div>';



		echo '</section>';

		// tabs

		echo '<section class="gourmand-section about-tabs">';

		{	// Navigation

			echo '<div class="tabs-navigation">';
			echo '<nav>';
			echo '<ul>';
			echo '<li class="current"><a href="javascript:void(null);" data-action="#gourmand-getting-started">' . esc_html__( 'Getting Started', 'gourmand' ) . '</a></li>';
			echo '<li><a href="javascript:void(null);" data-action="#gourmand-useful-plugins">' . esc_html__( 'Useful Plugins', 'gourmand' ) . '</a></li>';
			echo '<li><a href="javascript:void(null);" data-action="#gourmand-faq">' . esc_html__( 'FAQ', 'gourmand' ) . '</a></li>';

			if( (bool)apply_filters( 'gourmand_pro_upgrade', true ) )
				echo '<li><a href="javascript:void(null);" data-action="#gourmand-free-vs-pro">' . esc_html__( 'Free VS PRO', 'gourmand' ) . '</a></li>';

			echo '</ul>';
			echo '</nav>';
			echo '</div>';
		}

		{	// Tabs Content
			echo '<div class="tabs-content">';

			{	// Getting Started Tab

				echo '<div class="tabs-item current" id="gourmand-getting-started">';
				echo '<div class="cols cols-2">';


				if( (bool)gourmand_mod::get( 'gourmand-recommended-actions', true ) ){
					// Wizard Setup
					echo '<div class="item-col">';
					echo '<h2>' . esc_html__( 'Setup with Wizard', 'gourmand' ) . '</h2>';
					echo '<p>' . esc_html__( 'This is one of easy and fast way to setup your website. And it really does not matter if you are a beginner or advanced in WordPress Domain.', 'gourmand' ) . '</p>';

					if( gourmand_plugin::is_active( 'mythemes-wizard' ) ){
						echo '<a href="' . esc_url( admin_url( 'index.php?page=mythemes-wizard' ) ) . '" class="mythemes-btn small setup"><i class="gourmand-icon-magic"></i>' . esc_html__( 'Setup Now', 'gourmand' ) . '</a>';
					}

					else{
						$plugins 	= (array)gourmand_config::get( 'plugins' );
						$wizard 	= isset( $plugins[ 'mythemes-wizard' ] ) ? $plugins[ 'mythemes-wizard' ] : array();
						$attrs 		= gourmand_plugin::attrs( 'mythemes-wizard', $wizard );

						$url 		= $attrs[ 'url' ];
						$data 		= $attrs[ 'data' ];
						$label 		= $attrs[ 'label' ];
						$classes 	= $attrs[ 'classes' ];

						echo '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $classes ) . ' setup" ' . $data . '><i class="gourmand-icon-magic"></i><span>' . esc_html__( 'Setup Now', 'gourmand' ) . '</span></a>';
					}

					echo '<p class="recommended-action">' . esc_html__( 'This is a recommended Action !', 'gourmand' ) . '</p>';

					echo '</div>';
				}

				else{
					// No Required Actions
					echo '<div class="item-col">';
					echo '<h2>' . esc_html__( 'No Recommended Actions', 'gourmand' ) . '</h2>';
					echo '<p>' . esc_html__( 'It\'s look like you done all recommended actions. Now you can Go to the Customizer.', 'gourmand' ) . '</p>';
					echo '</div>';
				}

				// Go to Customizer
				echo '<div class="item-col">';
				echo '<h2>' . esc_html__( 'Go to the Customizer', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'gourmand' ) . '</p>';
				echo '<a href="' . esc_url( admin_url( '/customize.php?url=' . urlencode( esc_url( admin_url() ) ) ) ) . '" class="mythemes-btn small customize"><i class="gourmand-icon-sliders"></i>' . esc_html__( 'Customize', 'gourmand' ) . '</a>';
				echo '</div>';

				echo '</div>';
				echo '</div>';
			}

			{	// Useful Plugins Tab

				echo '<div class="tabs-item" id="gourmand-useful-plugins">';

				$plugins 	= gourmand_config::get( 'plugins' );
				$cards 		= '';

				foreach( $plugins as $slug => $details ){
					$cards .= gourmand_plugin::card( esc_attr( $slug ), $details );
				}

				echo '<div class="plugin-cards-wrapper">';

				echo $cards;

				$classes = 'plugin-message';

				if( !empty( $cards ) )
					$classes .= ' hidden';

				echo '<p class="' . esc_attr( $classes ) . '">' . esc_html__( 'All recommended plugins was be successfully Installed and Activated.', 'gourmand' ) . '</p>';

				echo '</div>';

				echo '</div>';
			}

			{	// FAQ Tab

				echo '<div class="tabs-item" id="gourmand-faq">';
				echo '<div class="faq-wrapper">';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'License &amp; Terms of Use', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'Terms of use for the Gourmand WordPress Theme, Gourmand Light Plugin and Gourmand PRO, Copyright 2017 myThem.es.', 'gourmand' ) . '</p>';
				echo '<p>' . esc_html__( 'Gourmand WordPress Theme, Gourmand Light Plugin and Gourmand PRO are distributed under the terms of the GNU GENERAL PUBLIC LICENSE ( GPL 2 License ). All these solutions can be used for unlimited number of websites.', 'gourmand' ) . '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Support', 'gourmand' ) . '</h2>';
				echo '<p>';
				echo sprintf( esc_html__( 'Dears customers we want inform you about our support terms and conditions. We provide support just on our official website through our %1$s or %2$s ( integrated with a ticket system ). Sorry but we cant follow all social channels and in some of cases social channels are not ready to do professional support.', 'gourmand' ),
					'<a href="http://mythem.es/forums/forum/themes/gourmand/" title="' . esc_attr__( 'Gourmand official myThem.es Forum Community', 'gourmand' ) . '" target="_blank">' . esc_html__( 'Forum Community', 'gourmand' ) . '</a>',
					'<a href="http://mythem.es/contact/" title="' . esc_attr__( 'myThem.es Contact', 'gourmand' ) . '" target="_blank">' . esc_html__( 'Contact Form', 'gourmand' ) . '</a>'
				);
				echo '</p>';
				echo '<p>' . esc_html__( 'Priority Support is dedicated just for our PRO Customers. For other type of customers we provide support just if we have time to do that.', 'gourmand' ) . '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Customizations', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'This service is dedicated just for our PRO Customers. We can provide small customizations only if requested customizations are possible to be integrated with our theme. We reserv the right to decide what is possible to be integrated or not.', 'gourmand' ) . '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Feedback &amp; Bug Report', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'Thank you for choosing myThem.es and use one of our WordPress Themes your choice is greatly appreciated!', 'gourmand' ) . '</p>';
				echo '<p>';
				echo sprintf( esc_html__( 'We strive to be the best in this field. Please, help us to increase the theme and plugins quality. You can reporting the bugs and giving us the suggestions - %1$s.', 'gourmand' ),
					'<a href="http://mythem.es/contact/" target="_blank">' . esc_html__( 'Contact US', 'gourmand' ) . '</a>'
				);
				echo '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Discussion &amp; Comments', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'Here you can put your Appreciations and also fast questions ( not technical ). Also you can rank our WordPress theme on wordpress.org. Please not put here question what contain something like "how to ..." or "how I can .. " or "what is need to change ...".', 'gourmand' ) . '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Community &amp; Forum', 'gourmand' ) . '</h2>';
				echo '<p>';
				echo sprintf( esc_html__( '%1$s with Technical Details. Here you can ask all you need without limits. Please remember Professional Support is Dedicated just for our premium customers. If you use our free solutions and need fast and professional help with customizations and integrations you need become one of our premium customer.', 'gourmand' ),
					'<a href="http://mythem.es/forums/forum/themes/gourmand/" title="' . esc_attr__( 'Gourmand official myThem.es Forum Community', 'gourmand' ) . '" target="_blank">' . esc_html__( 'Support', 'gourmand' ) . '</a>'
				);
				echo '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Translate the Theme ( Localization )', 'gourmand' ) . '</h2>';
				echo '<p>' . esc_html__( 'The theme is Translation Ready but not contain the translated files for each language.', 'gourmand' ) . '</p>';
				echo '<p>' . sprintf( esc_html__( 'So, you can translate the theme in your favorite language. We can suggest %1$s. This is a good free tool what will help you translate easy and fast your website in your favorit language. More details about Localization you can find %2$s.', 'gourmand' ),
					'<a href="https://wordpress.org/plugins/loco-translate/" target="_blank">' . esc_html__( 'Loco Translate Plugin', 'gourmand' ) . '</a>',
					'<a href="https://developer.wordpress.org/themes/functionality/localization/#pot-portable-object-template-files" target="_blank">' . esc_html__( 'here', 'gourmand' ) . '</a>'
				);
				echo '</p>';
				echo '</div>';

				echo '<div class="faq-item">';
				echo '<h2>' . esc_html__( 'Customizations with Custom CSS', 'gourmand' ) . '</h2>';
				echo '<p>';
				echo sprintf( esc_html__( 'WordPress comes with a special option what allow customize your website with your own CSS code. To use it go to Admin Dashboard: %1$s.', 'gourmand' ),
					'<strong>' . esc_html__( 'Appearance &rsaquo; Customize &rsaquo; Additional CSS', 'gourmand' ) . '</strong>'
				);
				echo '</p>';
				echo '<p>' . esc_html__( 'You can use it for multiple cases, just is need to add your custom CSS code.', 'gourmand' ) . '</p>';
				echo '</div>';

				echo '</div>';
				echo '</div>';
			}

			// Free VS PRO Tab
			if( (bool)apply_filters( 'gourmand_pro_upgrade', true ) ) {

				echo '<div class="tabs-item" id="gourmand-free-vs-pro">';

				echo '<table class="free-vs-pro">';
				echo '<thead>';
				echo '<tr>';
				echo '<th></th>';
				echo '<th>' . esc_html__( 'Free', 'gourmand' ) . '</th>';
				echo '<th>' . esc_html__( 'PRO', 'gourmand' ) . '</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';

				// 1
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Mobile friendly', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Responsive layout. Works on every device.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 2
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Fully Customizable Colors', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Customize your Accent Color, Header Elements and each Section Elements.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 3
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Custom Header', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Custom Header with Image, Video, Google Map and with special options for each Post and Page.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 4
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Frontpage Sections', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Features, About, Call Action, Services, Chef Menu, Testimonials, Reservation, Latest News and Contact.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 5
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Additional Frontpage Sections', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Additional Sections Daily Dishes and Delivery. Advanced Day, Date and Time Options for Chef Menus ( 10 menus slots ).', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-cancel-7"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 6
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Sync Chef Menu & Daily Dishes', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Synchronize Chef Menu and Daily Dishes Menu by Day, Date and Time', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-cancel-7"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 7
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Section Reordering', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'The ability to reorganize your Frontpage Sections more easily and quickly.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-cancel-7"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 8
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Customizations', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'We provide small customizations for our PRO Customers.', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-cancel-7"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				// 9
				echo '<tr>';
				echo '<td>';
				echo '<h1>' . esc_html__( 'Quality Support', 'gourmand' ) . '</h1>';
				echo '<p>' . esc_html__( 'Forum Community or Contact Form with Ticket System Integrated', 'gourmand' ) . '</p>';
				echo '</td>';
				echo '<td class="status"><i class="gourmand-icon-cancel-7"></i></td>';
				echo '<td class="status"><i class="gourmand-icon-ok-6"></i></td>';
				echo '</tr>';

				echo '</tbody>';
				echo '</table>';


				echo '<div class="upgrade-call-action">';
				echo '<p>'. sprintf( __( 'Upgrade to PRO and get extended core functionality without the risk of loosing any %1s or %2s.', 'gourmand' ), '<strong>' . __( 'data', 'gourmand' ) . '</strong>', '<strong>' . __( 'settings', 'gourmand' ) . '</strong>' ) . '</p>';
				echo '<a href="http://mythem.es/item/gourmand/?utm_source=gourmand-free-vs-pro&amp;utm_medium=about&amp;utm_campaign=analiza-tema&amp;utm_content=button" class="mythemes-btn large" title="' . __( 'myThem.es - Gourmand WordPress Theme', 'gourmand' ) . '">';
				echo '<i class="gourmand-icon-publish"></i> ' . __( 'Upgrade Now to PRO', 'gourmand' );
				echo '<small>' . __( 'full compatible with current version', 'gourmand' ) . '</small>';
				echo '</a>';
				echo '</div>';


				echo '</div>';
			}

			echo '</div>';
		}

		echo '</section>';
 	}

 ?>
