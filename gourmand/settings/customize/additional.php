<?php
	/**
	 *	Additional Section
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__additional( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-additional', array(
			'title'		=> __( 'Additioanl', 'gourmand' ),
			'priority'	=> 55
		), $wp_customize );

			{	// Additional Fields

				$section -> add_field( 'gallery-style', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Gallery Style', 'gourmand' ),
					'description'	=> __( 'enable / disable additional Gallery Styles.', 'gourmand' )
				));

				$section -> add_field( 'scroll-aside', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Scroll Aside', 'gourmand' ),
					'description'	=> __( 'enable / disable the scrolling of the aside content if the main content is biggest.', 'gourmand' )
				));

				$section -> add_field( 'scroll-top', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Scroll to Top', 'gourmand' ),
					'description'	=> __( 'enable / disable scroll to Top Action Button.', 'gourmand' )
				));

				$section -> add_field( 'website-auto-hyphens', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Website Auto Hyphens', 'gourmand' ),
					'description'	=> __( 'enable / disable Auto Hyphens for all website content. This option can be overwritten by options below.', 'gourmand' )
				));

				$section = apply_filters( 'gourmand_customize_header_auto_hyphens', $section );

				$section -> add_field( 'headings-auto-hyphens', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Headings Auto Hyphens', 'gourmand' ),
					'description'	=> __( 'enable / disable Auto Hyphens for Headings', 'gourmand' )
				));

				$section -> add_field( 'content-auto-hyphens', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Content Auto Hyphens', 'gourmand' ),
					'description'	=> __( 'enable / disable Auto Hyphens for Post / Page content Text', 'gourmand' )
				));
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__additional' );
?>
