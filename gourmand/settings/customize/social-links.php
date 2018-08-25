<?php

	/**
	 *	Customize Section - Links
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	function gourmand_customize_section__social_links( $wp_customize )
	{
		$social = new gourmand_customize_section( 'gourmand-social-links', array(
			'title'		=> __( 'Social Links', 'gourmand' ),
			'priority'	=> 60
		), $wp_customize );

		{	// Social Fields

			$social -> add_field( 'evernote', array(
				'type'	=> 'url',
				'label'	=> __( 'Evernote', 'gourmand' )
			));

			$social -> add_field( 'vimeo', array(
				'type'	=> 'url',
				'label'	=> __( 'Vimeo', 'gourmand' )
			));

			$social -> add_field( 'twitter', array(
				'type'	=> 'url',
				'label'	=> __( 'Twitter', 'gourmand' )
			));

			$social -> add_field( 'skype', array(
				'type'	=> 'url',
				'label'	=> __( 'Skype', 'gourmand' )
			));

			$social -> add_field( 'renren', array(
				'type'	=> 'url',
				'label'	=> __( 'Renren', 'gourmand' )
			));

			$social -> add_field( 'github', array(
				'type'	=> 'url',
				'label'	=> __( 'Github', 'gourmand' )
			));

			$social -> add_field( 'rdio', array(
				'type'	=> 'url',
				'label'	=> __( 'Rdio', 'gourmand' )
			));

			$social -> add_field( 'linkedin', array(
				'type'	=> 'url',
				'label'	=> __( 'Linkedin', 'gourmand' )
			));

			$social -> add_field( 'behance', array(
				'type'	=> 'url',
				'label'	=> __( 'Behance', 'gourmand' )
			));

			$social -> add_field( 'dropbox', array(
				'type'	=> 'url',
				'label'	=> __( 'Dropbox', 'gourmand' )
			));

			$social -> add_field( 'flickr', array(
				'type'	=> 'url',
				'label'	=> __( 'Flickr', 'gourmand' )
			));

			$social -> add_field( 'instagram', array(
				'type'	=> 'url',
				'label'	=> __( 'Instagram', 'gourmand' )
			));

			$social -> add_field( 'vkontakte', array(
				'type'	=> 'url',
				'label'	=> __( 'Vkontakte', 'gourmand' )
			));

			$social -> add_field( 'facebook', array(
				'type'	=> 'url',
				'label'	=> __( 'Facebook', 'gourmand' )
			));

			$social -> add_field( 'tumblr', array(
				'type'	=> 'url',
				'label'	=> __( 'Tumblr', 'gourmand' )
			));

			$social -> add_field( 'picasa', array(
				'type'	=> 'url',
				'label'	=> __( 'Picasa', 'gourmand' )
			));

			$social -> add_field( 'dribbble', array(
				'type'	=> 'url',
				'label'	=> __( 'Dribbble', 'gourmand' )
			));

			$social -> add_field( 'stumbleupon', array(
				'type'	=> 'url',
				'label'	=> __( 'Stumbleupon', 'gourmand' )
			));

			$social -> add_field( 'lastfm', array(
				'type'	=> 'url',
				'label'	=> __( 'Lastfm', 'gourmand' )
			));

			$social -> add_field( 'gplus', array(
				'type'	=> 'url',
				'label'	=> __( 'Google Plus', 'gourmand' )
			));

			$social -> add_field( 'google-circles', array(
				'type'	=> 'url',
				'label'	=> __( 'Google Circle', 'gourmand' )
			));

			$social -> add_field( 'youtube-play', array(
				'type'	=> 'url',
				'label'	=> __( 'YouTube Play', 'gourmand' )
			));

			$social -> add_field( 'youtube', array(
				'type'	=> 'url',
				'label'	=> __( 'YouTube', 'gourmand' )
			));

			$social -> add_field( 'pinterest', array(
				'type'	=> 'url',
				'label'	=> __( 'Pinterest', 'gourmand' )
			));

			$social -> add_field( 'smashing', array(
				'type'	=> 'url',
				'label'	=> __( 'Smashing', 'gourmand' )
			));

			$social -> add_field( 'soundcloud', array(
				'type'	=> 'url',
				'label'	=> __( 'SoundCloud', 'gourmand' )
			));

			$social -> add_field( 'flattr', array(
				'type'	=> 'url',
				'label'	=> __( 'Flattr', 'gourmand' )
			));

			$social -> add_field( 'odnoklassniki', array(
				'type'	=> 'url',
				'label'	=> __( 'Odnoklassniki', 'gourmand' )
			));

			$social -> add_field( 'mixi', array(
				'type'	=> 'url',
				'label'	=> __( 'Mixi', 'gourmand' )
			));

			$social -> add_field( 'display-rss', array(
				'type'		=> 'checkbox',
				'label'		=> __( 'Display Rss Feed', 'gourmand' ),
				'default'	=> gourmand_mod::def( 'display-rss' )
			));

			$social -> add_field( 'rss', array(
				'type'		=> 'url',
				'label'		=> __( 'Rss', 'gourmand' ),
				'default'	=> gourmand_mod::def( 'rss' )
			));
		}
	}

	add_action( 'customize_register', 'gourmand_customize_section__social_links' );
?>
