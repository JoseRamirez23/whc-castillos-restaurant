<?php

	/**
	 *	Site Identity
	 */
?>

	<style type="text/css" id="gourmand-site-identity-top-space">
	<?php if( gourmand_mod::is_set( 'top-space' ) ) : ?>
		div.gourmand-site-identity div.custom-logo-wrapper a,
		div.gourmand-site-identity div.text-wrapper a:first-child{
			margin-top: <?php echo intval( gourmand_mod::get( 'top-space' ) ); ?>px;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-site-identity-left-space">
	<?php if( gourmand_mod::is_set( 'left-space' ) ) : ?>
		div.gourmand-site-identity > div:first-child a{
			margin-left: <?php echo absint( gourmand_mod::get( 'left-space' ) ); ?>px;
		}
	<?php endif; ?>
	</style>

<?php
	/**
	 *	Tools Background Color
	 */
?>
	<style type="text/css" id="gourmand-tools-bkg-color">
	<?php if( gourmand_mod::is_set( 'tools-bkg-color' ) ) : ?>
		.header-topper{
			background: <?php echo gourmand_mod::get( 'tools-bkg-color' ); ?>
		}
	<?php endif; ?>
	</style>
<?php

	/**
	 *	Accent Color
	 */
?>

	<style type="text/css" id="gourmand-accent-color">
	<?php if( gourmand_mod::is_set( 'accent-color' ) ) : ?>

		/**
		 *	Color
		 */

		a,
		a:visited,
		.accent-color,
		body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li.current-menu-item > a,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.current-menu-item > a,
		ol.gourmand-comments-list li header cite a:hover,
		.button.empty-btn,
		.btn.empty-btn,
		button.empty-btn,
		input[type="button"].empty-btn,
		input[type="submit"].empty-btn,
		input[type="reset"].empty-btn,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor:hover > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item:hover > a,
		.gourmand-section.gourmand-dishes .cols.sync-time .item-col.active-now div.header strong,
		.gourmand-section.gourmand-dishes .item-col ul.item-menu li.dish span.price,
		.gourmand-section.testimonials .content-inner .testimonial-wrapper span.rank,
		.gourmand-section.testimonials .content-inner .testimonial-identity cite a:hover,
		.gourmand-section.latest-news article h3.title a:hover,
		div.gourmand-author h4.gourmand-author-name a:hover,
		.header-partial #gourmand-header-wrapper a.button.btn-1.empty-btn,
		.header-partial #gourmand-header-wrapper a.button.btn-2.empty-btn,
		.header-partial #gourmand-header-wrapper a.button.btn-3.empty-btn{
			color: <?php echo gourmand_mod::get( 'accent-color' ); ?>;
		}

		/**
		 *	Background Color
		 */
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover,
		ol.gourmand-comments-list li header cite span.author-tag,
		.button,
		button,
		.btn,
		input[type="button"],
		input[type="submit"],
		input[type="reset"],
		.header-topper .business-tools a i,
		.accent-bkg,
		.gourmand-section.gourmand-dishes .item-col ul.item-menu li.dish span.daily-dish,
		.gourmand-section.gourmand-dishes .slick-dots li.slick-active button,
		.gourmand-section.testimonials .slick-dots li.slick-active button,
		.gourmand-section.latest-news article div.thumbnail-wrapper a.thumbnail-read-more:hover,
		.gourmand-section.latest-news article div.thumbnail-wrapper:hover a.thumbnail-read-more,
		.standard-view article div.meta.activity a.comments,
		body.single .header-partial #gourmand-header-wrapper div.meta.activity a.comments,
		body.page .header-partial #gourmand-header-wrapper div.meta.activity a.comments,
		body.single div.meta.activity a.comments,
		body.page div.meta.activity a.comments{
			background: <?php echo gourmand_mod::get( 'accent-color' ); ?>;
		}

		/**
		 *	Background Color Important
		 */
		.mejs-controls .mejs-time-rail .mejs-time-current{
			background: <?php echo gourmand_mod::get( 'accent-color' ); ?> !important;
		}

		/**
 		 *	Border Color
 		 */
		.button.small.empty-btn,
		.btn.small.empty-btn,
		.button.large.empty-btn,
		.button.empty-btn,
 		button.small.empty-btn,
 		input[type="button"].small.empty-btn,
 		input[type="submit"].small.empty-btn,
 		input[type="reset"].small.empty-btn,
		button.large.empty-btn,
		input[type="button"].large.empty-btn,
		input[type="submit"].large.empty-btn,
		input[type="reset"].large.empty-btn,
		button.empty-btn,
		input[type="button"].empty-btn,
		input[type="submit"].empty-btn,
		input[type="reset"].empty-btn,
		.header-partial #gourmand-header-wrapper a.button.btn-1.empty-btn,
		.header-partial #gourmand-header-wrapper a.button.btn-2.empty-btn,
		.header-partial #gourmand-header-wrapper a.button.btn-3.empty-btn{
			border-color: <?php echo gourmand_mod::get( 'accent-color' ); ?>;
		}

		/**
		 *	Box Shadow
		 */

		<?php
			$rgb  	= gourmand_hex2rgb( gourmand_mod::get( 'accent-color' ) );
			$rgba	= "rgba( {$rgb}, 0.3 )";
		?>
		.btn, .button, button, input[type="button"], input[type="submit"], input[type="reset"]{
			-webkit-box-shadow: 0px 6px 24px <?php echo esc_attr( $rgba ); ?>;
			   -mox-box-shadow: 0px 6px 24px <?php echo esc_attr( $rgba ); ?>;
					box-shadow: 0px 6px 24px <?php echo esc_attr( $rgba ); ?>;
		}

		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover{
			-webkit-box-shadow: 0 3px 14px <?php echo esc_attr( $rgba ); ?>;
			   -mox-box-shadow: 0 3px 14px <?php echo esc_attr( $rgba ); ?>;
					box-shadow: 0 3px 14px <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

<?php

	/**
	 *	Default Navigation Background Color
	 */
?>
	<?php $classes = apply_filters( 'gourmand_nav_classes', null ); ?>

	<style type="text/css" id="gourmand-nav-def-bkg">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-bkg-color' ) || gourmand_mod::is_set( 'nav-def-bkg-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-bkg-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-bkg-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>

		header#gourmand-header div.gourmand-header nav.header-navigation,
		body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation{
			background-color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

<?php

	/**
	 *	Default Navigation Site Identity Appearance
	 *	- Site Title
	 *	- Tagline
	 */
?>

	<style type="text/css" id="gourmand-nav-def-site-title">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-site-title-color' ) || gourmand_mod::is_set( 'nav-def-site-title-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-site-title-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-site-title-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.gourmand-site-identity div.text-wrapper a.site-title{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-nav-def-site-title-h">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-site-title-h-color' ) || gourmand_mod::is_set( 'nav-def-site-title-h-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-site-title-h-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-site-title-h-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.gourmand-site-identity div.text-wrapper a.site-title:hover{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-nav-def-tagline">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-tagline-color' ) || gourmand_mod::is_set( 'nav-def-tagline-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-tagline-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-tagline-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.gourmand-site-identity div.text-wrapper a.site-description{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-nav-def-tagline-h">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-tagline-h-color' ) || gourmand_mod::is_set( 'nav-def-tagline-h-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-tagline-h-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-tagline-h-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.gourmand-site-identity div.text-wrapper a.site-description:hover{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

<?php

	/**
	 *	Default Navigation Menu Appearance
	 */
?>

	<style type="text/css" id="gourmand-nav-def-current-link">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-current-link-color' ) || gourmand_mod::is_set( 'nav-def-current-link-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-current-link-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-current-link-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-ancestor:hover > a,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li.current-menu-item:hover > a,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.current-menu-item > a{
			color: <?php echo esc_attr( $rgba ); ?>;
		}

		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children span,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover,
		body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation form.gourmand-search-form button[type="submit"]{
			background-color: <?php echo esc_attr( $rgba ); ?>;
		}

		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children > span,
		body div.nav-collapse.gourmand-navigation-wrapper.collapse-submenu nav ul li.menu-item-has-children.collapse-children > span:hover{
			-webkit-box-shadow: 0 3px 14px <?php echo esc_attr( "rgba( {$rgb}, 0.3 )" ); ?>;
			-moz-box-shadow: 0 3px 14px <?php echo esc_attr( "rgba( {$rgb}, 0.3 )" ); ?>;
			box-shadow: 0 3px 14px <?php echo esc_attr( "rgba( {$rgb}, 0.3 )" ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-nav-def-link">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-link-color' ) || gourmand_mod::is_set( 'nav-def-link-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-link-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-link-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search,

		header#gourmand-header div.gourmand-menu-wrapper > ul > li,
		header#gourmand-header div.gourmand-menu-wrapper > ul > li a,

		body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-nav-def-link-h">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-link-h-color' ) || gourmand_mod::is_set( 'nav-def-link-h-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-link-h-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-link-h-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:hover,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:focus,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse:active,

		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:hover,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:focus,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search:active,

		header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper span,
		header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-phone-wrapper a,

		header#gourmand-header div.gourmand-menu-wrapper > ul > li:hover > a,

		body div.nav-collapse.gourmand-navigation-wrapper nav.gourmand-navigation ul li a:hover{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

<?php

	/**
	 *	Default Navigation Decoration Color
	 */
?>

	<style type="text/css" id="gourmand-nav-def-decor">
	<?php if( empty( $classes ) && ( gourmand_mod::is_set( 'nav-def-decor-color' ) || gourmand_mod::is_set( 'nav-def-decor-transp' ) ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'nav-def-decor-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'nav-def-decor-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		header#gourmand-header div.gourmand-navs-wrapper div.gourmand-menu-wrapper + div.gourmand-menu-phone-wrapper,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-collapse + div.gourmand-menu-phone-wrapper,
		header#gourmand-header div.gourmand-navs-wrapper button.gourmand-btn-search + div.gourmand-menu-phone-wrapper{
			border-color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

<?php
	/**
	 *	Footer Dark Sidebar
	 */
?>
	<style type="text/css" id="gourmand-footer-dark-sidebar-bkg">
	<?php if( gourmand_mod::is_set( 'footer-dark-sidebar-bkg-color' ) ) : ?>
		aside.footer-dark-sidebar,
		body.footer-social-links.small-social-links div.footer-social-links{
 			background-color: <?php echo gourmand_mod::get( 'footer-dark-sidebar-bkg-color' ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-footer-dark-sidebar-space">
	<?php if( gourmand_mod::is_set( 'footer-dark-sidebar-space' ) ) : ?>
		<?php $space = gourmand_mod::get( 'footer-dark-sidebar-space' ); ?>
		aside.footer-dark-sidebar .container{
			padding-top: <?php echo absint( $space ); ?>px;
			padding-bottom: <?php echo absint( $space ); ?>px;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-footer-dark-sidebar-widgets-space">
	<?php if( gourmand_mod::is_set( 'footer-dark-sidebar-widgets-space' ) ) : ?>
		<?php $space = gourmand_mod::get( 'footer-dark-sidebar-widgets-space' ); ?>
		footer div.widgets-row .widget{
			padding-top: <?php echo absint( $space ); ?>px;
			padding-bottom: <?php echo absint( $space ); ?>px;
		}
	<?php endif; ?>
	</style>

<?php

	/**
	 *	Footer Appearance
	 *	- Text Color
	 *	- Link Color
	 *	- Background Color
	 */
?>

	<style type="text/css" id="gourmand-copyright">
	<?php if( gourmand_mod::is_set( 'copyright-color' ) || gourmand_mod::is_set( 'copyright-transp' ) ) : ?>
	<?php
		$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'copyright-color' ) );
		$transp = number_format( floatval( gourmand_mod::get( 'copyright-transp' ) / 100 ), 2 );
		$rgba	= "rgba( {$rgb}, {$transp} )";
	?>
		div.footer-copyright p{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-copyright-link">
	<?php if( gourmand_mod::is_set( 'copyright-link-color' ) || gourmand_mod::is_set( 'copyright-link-transp' ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'copyright-link-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'copyright-link-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.footer-copyright p a{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-copyright-h-link">
	<?php if( gourmand_mod::is_set( 'copyright-link-h-color' ) || gourmand_mod::is_set( 'copyright-link-h-transp' ) ) : ?>
		<?php
			$rgb 	= gourmand_hex2rgb( gourmand_mod::get( 'copyright-link-h-color' ) );
			$transp = number_format( floatval( gourmand_mod::get( 'copyright-link-h-transp' ) / 100 ), 2 );
			$rgba	= "rgba( {$rgb}, {$transp} )";
		?>
		div.footer-copyright p a:hover{
			color: <?php echo esc_attr( $rgba ); ?>;
		}
	<?php endif; ?>
	</style>

	<style type="text/css" id="gourmand-copyright-bkg">
	<?php if( gourmand_mod::is_set( 'copyright-bkg-color' ) ) : ?>
		div.footer-copyright{
			background-color: <?php echo gourmand_mod::get( 'copyright-bkg-color' ); ?>;
		}
	<?php endif; ?>
	</style>


<?php

	/**
	 *	Custom Style
	 */

	do_action( 'gourmand_custom_style' );
?>
