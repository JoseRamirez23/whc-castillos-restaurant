<?php

	/**
	 *	Customize Panel - Layouts. Layouts Panel include next Sections:
	 *
	 *	Default
	 *	Front Page
	 *	Blog
	 *	Archives
	 *	Single Post
	 *	Single Page
	 *
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_layout_fields( $slug, $obj )
	{

		$layout 	= 'layout';
		$sidebar	= 'sidebar';

		$sidebars 	= apply_filters( 'gourmand_sidebars_list', array(
			'default'		=> __( 'Default Sidebar', 'gourmand' ),
			'front-page'	=> __( 'Front Page Sidebar', 'gourmand' ),
			'blog'			=> __( 'Blog Sidebar', 'gourmand' ),
			'archives'		=> __( 'Archives Sidebar', 'gourmand' ),
			'post'			=> __( 'Post Sidebar', 'gourmand' ),
			'page'			=> __( 'Page Sidebar', 'gourmand' )
		));

		if( !empty( $slug ) ){
			$layout 	= "{$slug}-layout";
			$sidebar	= "{$slug}-sidebar";
		}

		else{
			$slug = 'default';
		}

		$obj -> add_field( $layout, array(
			'type'		=> 'select',
			'label'		=> __( 'Layout', 'gourmand' ),
			'default'	=> 'without',
			'options'	=> array(
				'left'		=> __( 'Left Sidebar', 'gourmand' ),
				'without'	=> __( 'Without Sidebar', 'gourmand' ),
				'right'		=> __( 'Right Sidebar', 'gourmand' )
			)
		));

		$obj -> add_field( $sidebar, array(
			'type'		=> 'select',
			'label'		=> __( 'Sidebar', 'gourmand' ),
			'default'	=> $slug,
			'options'	=> $sidebars,
			'param' 	=> $layout,
			'callback'	=> function( $obj ){
				$layout = get_theme_mod( $obj -> param );
				return $layout !== 'without';
			}
		));
	}

	function gourmand_customize_panel__layouts( $wp_customize )
	{
		$panel = new gourmand_customize_panel( 'gourmand-layouts', array(
			'title'		=> __( 'Layouts', 'gourmand' ),
			'priority'	=> 50
		), $wp_customize );

			{	// Laouts Sections

				$default = $panel -> add_section( 'gourmand-layout', array(
					'title'	=> __( 'Default', 'gourmand' )
				));

					gourmand_layout_fields( null, $default );


				$front_page = $panel -> add_section( 'gourmand-front-page-layout', array(
					'title'	=> __( 'Front Page', 'gourmand' )
				));

					gourmand_layout_fields( 'front-page', $front_page );


				$blog = $panel -> add_section( 'gourmand-blog-layout', array(
					'title'	=> __( 'Blog', 'gourmand' )
				));

					gourmand_layout_fields( 'blog', $blog );


				$archives = $panel -> add_section( 'gourmand-archives-layout', array(
					'title'	=> __( 'Archives', 'gourmand' )
				));

					gourmand_layout_fields( 'archives', $archives );


				$post = $panel -> add_section( 'gourmand-post-layout', array(
					'title'	=> __( 'Single Post', 'gourmand' )
				));

					gourmand_layout_fields( 'post', $post );


				$page = $panel -> add_section( 'gourmand-page-layout', array(
					'title'	=> __( 'Single Page', 'gourmand' )
				));

					gourmand_layout_fields( 'page', $page );
			}
	}

	add_action( 'customize_register', 'gourmand_customize_panel__layouts' );
?>
