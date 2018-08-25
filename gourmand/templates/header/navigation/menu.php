<?php
	/**
	 *	Header Navigation Section - Menu
	 *
	 *  @created    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */
?>

<div class="gourmand-navs-wrapper">
	<div class="gourmand-navs-inner">

	<?php
		/*
			<div class="gourmand-menu-wrapper">
				<ul class="gourmand-menu-list">
					...

				</ul>
			</div>
		 */

		// Default Menu
		$args = array(
			'theme_location'    => 'gourmand-header',
			'container_class'   => 'gourmand-menu-wrapper',
			'menu_class'        => 'gourmand-menu-list'
		);

		if( has_nav_menu( 'gourmand-header' ) ){
			wp_nav_menu( $args );
		}

		// Accent Menu
		$args = array(
			'theme_location'    => 'gourmand-header-accent',
			'container_class'   => 'gourmand-menu-wrapper',
			'menu_class'        => 'gourmand-menu-list'
		);

		if( has_nav_menu( 'gourmand-header-accent' ) ){
			wp_nav_menu( $args );
		}

		// Collapse Menu Button
		if( has_nav_menu( 'gourmand-header-accent' ) || has_nav_menu( 'gourmand-header' ) ){
			echo '<button type="button" class="gourmand-btn-collapse" onclick="javascript:gourmand_collapse_navigation( \'gourmand-navigation-wrapper\' );">';
			echo '<i class="gourmand-icon-menu-1"></i>';
			echo '</button>';
		}

		// Search Form
		if( true ){
			echo '<button type="button" class="gourmand-btn-search">';
			echo '<i class="gourmand-icon-search"></i>';
			echo '</button>';
		}

		// Header Menu Phone Number
		if( gourmand_mod::get( 'tools-display-menu-phone' ) ){
			$call_phone = esc_attr( gourmand_mod::get( 'tools-call-phone' ) );

			echo '<div class="gourmand-menu-phone-wrapper">';

			if( !empty( $call_phone ) ){
				echo '<a href="tel:' . esc_attr( gourmand_mod::get( 'tools-call-phone' ) ) . '" class="tools-phone">';
				echo '<i class="gourmand-icon-mobile-4"></i>';
				echo '<span class="tools-item-inner">' . esc_html( gourmand_mod::get( 'tools-phone' ) ) . '</span>';
				echo '</a>';
			}

			else{
				echo '<a href="javascript:void(null);" class="tools-phone without-url">';
				echo '<i class="gourmand-icon-mobile-4"></i>';
				echo '<span class="tools-item-inner">' . esc_attr( gourmand_mod::get( 'tools-phone' ) ) . '</span>';
				echo '</a>';
			}

			echo '</div>';
		}

		if( true ){
			echo '<div class="gourmand-shadow-wrapper search-form">';
			echo '<div class="gourmand-shadow-inner">';
			echo '<div class="gourmand-shadow"></div>';
			echo '<div class="gourmand-popup">';
			get_search_form();
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	?>

	</div>
</div>
