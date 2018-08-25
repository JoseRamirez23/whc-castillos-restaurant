<?php

	/**
	 *	Customize Main Settings
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	include_once get_template_directory() . '/settings/customize/site-identity.php';
	include_once get_template_directory() . '/settings/customize/typography.php';
	include_once get_template_directory() . '/settings/customize/colors.php';
	include_once get_template_directory() . '/settings/customize/tools.php';
	include_once get_template_directory() . '/settings/customize/navigation.php';
	include_once get_template_directory() . '/settings/customize/blog.php';
	include_once get_template_directory() . '/settings/customize/single-post.php';
	include_once get_template_directory() . '/settings/customize/single-page.php';
	include_once get_template_directory() . '/settings/customize/layouts.php';
	include_once get_template_directory() . '/settings/customize/additional.php';
	include_once get_template_directory() . '/settings/customize/social-links.php';
	include_once get_template_directory() . '/settings/customize/footer.php';

	/**
	 *	Gourmand Customize Register
	 *
	 *	Allow extend Gourmand Customize Settings from plugin or Child Theme
	 *	eg:
	 *
	 *	function my_customize_register( $wp_customize )
	 *	{
	 *		$section = new gourmand_customize_section( 'section-slug', array(
	 *			'title'	=> __( 'Section Title' )
	 *		), $wp_customize);
	 *
	 *			$section -> add_field( 'field-slug-1', array(
	 *				'type'		=> 'checkbox',
	 *				'label'		=> __( 'Field Label 1' )
	 *			));
	 *
	 *			$section -> add_field( 'field-slug-2', array(
	 *				'type'		=> 'text',
	 *				'label'		=> __( 'Field Label 2' )
	 *			));
	 *
	 *			$section -> add_field( 'field-slug-3', array(
	 *				'type'		=> 'number',
	 *				'sanitize'	=> 'absint',
	 *				'label'		=> __( 'Field Label 2' )
	 *			));
 	 *	}
	 *
	 *	gourmand_extends_customize_register()
	 *	{
	 *		add_action( 'customize_register', 'my_customize_register' );
 	 *	}
	 *
	 *	add_action( 'gourmand_customize_register', 'my_customize_register' )
	 */

	//do_action( 'gourmand_customize_register' );


	/**
	 *	Include Customize Preview
	 */

	function gourmand_customize_preview()
	{
		wp_register_script( 'gourmand-customize-preview', get_template_directory_uri() . '/assets/theme/js/customize-preview.js', array( 'jquery', 'customize-preview' ), '0.0.1', true );
		wp_enqueue_script( 'gourmand-customize-preview' );
	}

	add_action( 'customize_preview_init', 'gourmand_customize_preview' );

	/**
	 *	Customize Include Scripts and Styles
	 *
	 */

	function gourmand_customize_enqueue_assets()
	{
		wp_enqueue_media();

		wp_register_script( 'gourmand-uploader', get_template_directory_uri() . '/assets/theme/js/uploader.js', array( 'jquery' ), '0.0.1', true );
		wp_enqueue_script( 'gourmand-uploader' );

		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );

		wp_register_script( 'gourmand-customize-fields', get_template_directory_uri() . '/assets/theme/js/customize-fields.js', array( 'gourmand-uploader', 'wp-color-picker' ), '0.0.1', true );
		wp_enqueue_script( 'gourmand-customize-fields' );

		wp_register_style( 'gourmand-customize', get_template_directory_uri() . '/assets/theme/css/customize.css', null, '0.0.1', false );
		wp_enqueue_style( 'gourmand-customize' );
	}

	add_action( 'customize_controls_print_footer_scripts', 'gourmand_customize_enqueue_assets' );
?>
