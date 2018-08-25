<?php

	/**
	 *	Customize Section - Single Post
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__post( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-post', array(
			'title'		=> __( 'Single Post', 'gourmand' ),
			'priority'	=> 45
		), $wp_customize );

			{	// Blog Fields

				$section -> add_field( 'post-categories', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Categories', 'gourmand' ),
					'description'	=> __( 'enable / disable Categories for single post template.', 'gourmand' )
				));
				$section -> add_field( 'post-author', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Author', 'gourmand' ),
					'description'	=> __( 'enable / disable Author for single post template.', 'gourmand' )
				));
				$section -> add_field( 'post-date', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Date / Time', 'gourmand' ),
					'description'	=> __( 'enable / disable Date / Time for single post template.', 'gourmand' )
				));
				$section -> add_field( 'post-comments', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Comments', 'gourmand' ),
					'description'	=> __( 'enable / disable Comments for single post template.', 'gourmand' )
				));
				$section -> add_field( 'post-views', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Nr. Views', 'gourmand' ),
					'description'	=> __( 'enable / disable number of Views for single post template ( install and activate Jetpack Plugin ).', 'gourmand' )
				));

				$section = apply_filters( 'gourmand_single_post_settings', $section );

				$section -> add_field( 'post-tags', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Tags', 'gourmand' ),
					'description'	=> __( 'enable / disable Tags for single post template.', 'gourmand' )
				));
				$section -> add_field( 'post-author-box', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Author Box', 'gourmand' ),
					'description'	=> __( 'enable / disable Author Box for single post template.', 'gourmand' )
				));
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__post' );
?>
