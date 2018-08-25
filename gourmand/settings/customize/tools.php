<?php

	/**
	 *	Customize Section - Tooper / Tools
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__tools( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-tools', array(
			'title'		=> __( 'Tools', 'gourmand' ),
			'priority'	=> 20
		), $wp_customize );

			{	// Tools Fields

				$section -> add_field( 'tools-bkg-color', array(
					'type'			=> 'color',
					'label'			=> __( 'Tools Background Color', 'gourmand' )
				));

				$section -> add_field( 'tools-display-email', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Dispaly E-mail', 'gourmand' )
				));

				$section -> add_field( 'tools-email', array(
					'type'			=> 'email',
					'label'			=> __( 'E-Mail', 'gourmand' )
				));

				$section -> add_field( 'tools-email-url', array(
					'type'			=> 'url',
					'label'			=> __( 'E-Mail Url', 'gourmand' ),
					'description'	=> __( 'You can use an URL to redirect customers to a special page / section with more Contact details.', 'gourmand' )
				));

				$section -> add_field( 'tools-display-address', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Dispaly Address', 'gourmand' )
				));

				$section -> add_field( 'tools-address', array(
					'type'			=> 'text',
					'label'			=> __( 'Address', 'gourmand' )
				));

				$section -> add_field( 'tools-address-url', array(
					'type'			=> 'text',
					'label'			=> __( 'Address Url', 'gourmand' ),
					'description'	=> __( 'You can use an URL to redirect customers to a special page / section with more details about your business.', 'gourmand' )
				));

				$section -> add_field( 'tools-display-phone', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Dispaly Phone Number', 'gourmand' )
				));

				$section -> add_field( 'tools-display-menu-phone', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Dispaly Menu Phone Number', 'gourmand' ),
					'description'	=> __( 'Enable / disable Phone Number in a line with the Header Menu', 'gourmand' )
				));

				$section -> add_field( 'tools-phone', array(
					'type'			=> 'text',
					'label'			=> __( 'Phone Number', 'gourmand' )
				));

				$section -> add_field( 'tools-call-phone', array(
					'type'			=> 'text',
					'label'			=> __( 'Call Action Phone Number', 'gourmand' ),
					'description'	=> __( 'eg: +123411456788 this will be used as link action for click to call directly from customer smart device', 'gourmand' )
				));

				$section -> add_field( 'tools-display-social', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Dispaly Social Links', 'gourmand' ),
					'description'	=> __( 'to edit Social Links go to: Social Links Panel ( Customizer )', 'gourmand' )
				));

				$section = apply_filters( 'gourmand_customize_section__tools', $section );
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__tools' );
?>
