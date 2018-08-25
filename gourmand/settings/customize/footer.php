<?php

	/**
	 *	Customize Panel - Footer
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_footer_sidebar_fields( $slug, $obj )
	{

		$obj -> add_field( "{$slug}-fluid-width", array(
			'type'		=> 'checkbox',
			'label'		=> __( 'Use fluid Width', 'gourmand' ),
		));

		$obj -> add_field( "{$slug}-nr-columns", array(
			'type'		=> 'select',
			'label'		=> __( 'Number of Columns', 'gourmand' ),
			'options'	=> array(
				1	=> __( '1 Column', 'gourmand' ),
				2	=> __( '2 Columns', 'gourmand' ),
				3	=> __( '3 Columns', 'gourmand' ),
				4	=> __( '4 Columns', 'gourmand' ),
				5	=> __( '5 Columns', 'gourmand' ),
				6	=> __( '6 Columns', 'gourmand' )
			)
		));

		$obj -> add_field( "{$slug}-bkg-color", array(
			'type'		=> 'color',
			'label'		=> __( 'Background Color', 'gourmand' ),
		));

		$obj -> add_field( "{$slug}-space", array(
			'type'		=> 'range',
			'validator'	=> 'absint',
			'label'		=> __( 'Blank Space', 'gourmand' ),
			'attrs'		=> array(
				'min'	=> 30,
				'max'	=> 180,
				'step'	=> 1,
				'unit'	=> 'px'
			)
		));

		$obj -> add_field( "{$slug}-widgets-space", array(
			'type'		=> 'range',
			'validator'	=> 'absint',
			'label'		=> __( 'Widgets Space', 'gourmand' ),
			'attrs'		=> array(
				'min'	=> 10,
				'max'	=> 80,
				'step'	=> 1,
				'unit'	=> 'px'
			)
		));
	}

	function gourmand_customize_panel__footer( $wp_customize )
	{
		$panel = new gourmand_customize_panel( 'gourmand-footer', array(
			'title'		=> __( 'Footer', 'gourmand' ),
			'priority'	=> 65
		), $wp_customize );

			{	// Panel Sections

				$social = $panel -> add_section( 'gourmand-footer-social', array(
					'title' => __( 'Social', 'gourmand' ),
				));

					{	// Social Fields

						$social -> add_field( 'footer-display-social', array(
							'type'			=> 'checkbox',
							'label'			=> __( 'Display Social Links', 'gourmand' ),
							'description'	=> __( 'Enable / disable Social Links in Footer Area.', 'gourmand' )
						));

						$social -> add_field( 'footer-social-size', array(
							'type'			=> 'select',
							'label'			=> __( 'Social Size', 'gourmand' ),
							'description'	=> __( 'The option "Large Size" is recommended to display no more 5 Social Links. The option "Medium Size" is recommended to display no more 10 Social Links. In other cases you can use option "Small Size".', 'gourmand' ),
							'options'		=> array(
								'large'			=> __( 'Large Size', 'gourmand' ),
								'medium'		=> __( 'Medium Size', 'gourmand' ),
								'small'			=> __( 'Small Size', 'gourmand' )
							)
						));
					}

				// Footer Dark Sidebar
				$sidebars = $panel -> add_section( 'gourmand-footer-dark-sidebar', array(
					'title'	=> __( 'Dark Sidebar', 'gourmand' )
				));

					gourmand_footer_sidebar_fields( 'footer-dark-sidebar', $sidebars );


				$copyright = $panel -> add_section( 'gourmand-copyright', array(
					'title'	=> __( 'Copyright', 'gourmand' )
				));

					{	// Copyright Fields

						$copyright -> add_field( 'content-copyright', array(
							'type'		=> 'copyright',
							'label'		=> __( 'Content Copyright', 'gourmand' )
						));

						$copyright = apply_filters( 'gourmand_copyright_settings', $copyright );

						$copyright -> add_field( "copyright-color", array(
							'type'		=> 'color',
							'label'		=> __( 'Copyright Color', 'gourmand' )
						));
						$copyright -> add_field( "copyright-transp", array(
							'type'		=> 'percent',
							'label'		=> __( 'Copyright Transparency', 'gourmand' )
						));
						$copyright -> add_field( "copyright-link-color", array(
							'type'		=> 'color',
							'label'		=> __( 'Copyright Link Color', 'gourmand' )
						));
						$copyright -> add_field( "copyright-link-transp", array(
							'type'		=> 'percent',
							'label'		=> __( 'Copyright Link Transparency', 'gourmand' )
						));
						$copyright -> add_field( "copyright-link-h-color", array(
							'type'		=> 'color',
							'label'		=> __( 'Copyright Link Effect Color', 'gourmand' )
						));
						$copyright -> add_field( "copyright-link-h-transp", array(
							'type'		=> 'percent',
							'label'		=> __( 'Copyright Link Effect Transparency', 'gourmand' )
						));
						$copyright -> add_field( "copyright-bkg-color", array(
							'type'		=> 'color',
							'label'		=> __( 'Copyright Background Color', 'gourmand' )
						));
					}
			}
	}

	add_action( 'customize_register', 'gourmand_customize_panel__footer' );
?>
