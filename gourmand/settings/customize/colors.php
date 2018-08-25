<?php

	/**
	 *	Customize Section - Colors
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__colors( $wp_customize )
	{

		//	remove un used default fields
		$wp_customize -> add_setting( 'header_textcolor' );
		$wp_customize -> add_control( 'header_textcolor', array(
			'theme_supports' => false
		));


		$section = new gourmand_customize_section( 'colors', array(
			'title'		=> __( 'Colors', 'gourmand' ),
			'priority'	=> 10
		), $wp_customize );

			{	// Colors Fields

				$section -> add_field( 'accent-color', array(
					'type'			=> 'color',
					'label'			=> __( 'Accent Color', 'gourmand' )
				));

			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__colors' );
?>
