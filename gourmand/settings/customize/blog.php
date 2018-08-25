<?php

	/**
	 *	Customize Section - Blog
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__blog( $wp_customize )
	{
		$section = new gourmand_customize_section( 'gourmand-blog', array(
			'title'		=> __( 'Blog', 'gourmand' ),
			'priority'	=> 40
		), $wp_customize );

			{	// Blog Fields

				$section -> add_field( 'blog-article', array(
					'type'			=> 'text',
					'transport'		=> 'refresh',
					'label'			=> __( 'Word "Article"', 'gourmand' )
				));

				$section -> add_field( 'blog-articles', array(
					'type'			=> 'text',
					'transport'		=> 'refresh',
					'label'			=> __( 'Word "Articles"', 'gourmand' )
				));

				$section -> add_field( 'blog-categories', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Categories', 'gourmand' ),
					'description'	=> __( 'enable / disable Categories for blog and archives templates.', 'gourmand' )
				));

				$section -> add_field( 'blog-author', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Author', 'gourmand' ),
					'description'	=> __( 'enable / disable Author for blog and archives templates.', 'gourmand' )
				));

				$section -> add_field( 'blog-date', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Date / Time', 'gourmand' ),
					'description'	=> __( 'enable / disable Date / Time for blog and archives templates.', 'gourmand' )
				));

				$section -> add_field( 'blog-comments', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Comments', 'gourmand' ),
					'description'	=> __( 'enable / disable number of Comments for blog and archives templates.', 'gourmand' )
				));

				$section -> add_field( 'blog-views', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Nr. Views', 'gourmand' ),
					'description'	=> __( 'enable / disable number of views for blog and archives templates ( install and activate Jetpack Plugin ).', 'gourmand' )
				));

				$section = apply_filters( 'gourmand_blog_settings', $section );

				$section -> add_field( 'blog-excerpt', array(
					'type'			=> 'checkbox',
					'label'			=> __( 'Display Excerpt', 'gourmand' ),
					'description'	=> __( 'enable / disable the excerpt instead of the full content for blog and archives templates.', 'gourmand' )
				));
			}
	}

	add_action( 'customize_register', 'gourmand_customize_section__blog' );
?>
