<?php

	/**
	 *	Customize Section - Site Identity
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__site_identity( $wp_customize )
	{
		$section = new gourmand_customize_section( 'title_tagline', array(
			'title'		=> __( 'Site Identity', 'gourmand' ),
			'priority'	=> 5
		), $wp_customize );

			{	// Site Identity Fields

				$section = apply_filters( 'gourmand_site_identity_section', $section );

				$section -> add_field( 'top-space', array(
					'type'			=> 'range',
					'label'			=> __( 'Top Space', 'gourmand' ),
					'attrs'			=> array(
						'min'	=> -100,
						'max'	=>  100,
						'step'	=>  1,
						'unit'	=> 'px'
					)
				));

				$section -> add_field( 'left-space', array(
					'type'			=> 'range',
					'label'			=> __( 'Left Space', 'gourmand' ),
					'default'		=> 0,
					'attrs'			=> array(
						'min'	=> 0,
						'max'	=> 100,
						'step'	=> 1,
						'unit'	=> 'px'
					)
				));

				$section = apply_filters( 'gourmand_after_site_identity_section', $section );
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__site_identity' );
?>
