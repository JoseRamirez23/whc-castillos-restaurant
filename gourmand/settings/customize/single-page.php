<?php

	/**
	 *	Customize Section - Single Page
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__page( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-page', array(
			'title'		=> __( 'Single Page', 'gourmand' ),
			'priority'	=> 45
		), $wp_customize );

			{	// Page Fields

				$section -> add_field( 'page-antet-alignment', array(
					'type'			=> 'select',
					'label'			=> __( 'Alignment', 'gourmand' ),
					'description'	=> __( 'Choose the alignment for the Title and Additional Elements around of Title.', 'gourmand' ),
					'options'		=> array(
						'left'		=> __( 'Align Left', 'gourmand' ),
						'center'	=> __( 'Align Center', 'gourmand' ),
						'right'		=> __( 'Align Right', 'gourmand' )
					)
				));
				$section -> add_field( 'page-comments', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Comments', 'gourmand' ),
					'description'	=> __( 'enable / disable Comments for page template.', 'gourmand' )
				));
				$section -> add_field( 'page-views', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Nr. Views', 'gourmand' ),
					'description'	=> __( 'enable / disable number of Views for page template ( install and activate Jetpack Plugin ).', 'gourmand' )
				));

				$section = apply_filters( 'gourmand_single_page_settings', $section );
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__page' );
?>
