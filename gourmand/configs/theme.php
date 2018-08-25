<?php

	/**
	 *	Theme Support and Configs
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */


	//	CUSTOM LOGO
	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'custom-logo' ), array(
		'height'      	=> 78,
		'width'       	=> 518,
		'flex-height' 	=> true,
 		'flex-width'  	=> true,
 		'header-text'	=> array( 'tempo-site-title', 'tempo-site-description' )
	));

	gourmand_config::set( 'custom-logo', $cfgs );


	//	ADDITIONAL THEME SUPPORT
	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'additional-support' ), array(
		// woocommerce
		// mythemes-wizard
	));

	gourmand_config::set( 'additional-support', $cfgs );


 	//	CUSTOM IMAGES SIZE
	//	to do: review
 	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'images-sizes' ), array(
 		'gourmand-860' => array(
 			'width' 	=> 860,
 			'height'	=> 485,
 			'crop' 		=> true
 		),
 		'gourmand-540' => array(
 			'width' 	=> 540,
 			'height'	=> 305,
 			'crop' 		=> true
 		),
 		'gourmand-296' => array(
 			'width' 	=> 296,
 			'height'	=> 170,
 			'crop' 		=> true
 		),
		'gourmand-225' => array(
 			'width' 	=> 225,
 			'height'	=> 225,
 			'crop' 		=> true
 		)
 	));

 	gourmand_config::set( 'images-sizes', $cfgs );


	//	SOCIAL ITEMS
	//	to do: GitLab, Reddit
	$cfgs = gourmand_config::merge( (array)gourmand_config::get( 'social-items' ), array(
		'evernote',			'vimeo', 			'twitter', 			'skype',		'renren',
		'github', 			'rdio', 			'linkedin',			'behance',		'dropbox',
		'flickr', 			'instagram', 		'vkontakte',		'facebook', 	'tumblr',
		'picasa',			'dribbble',			'stumbleupon',		'lastfm', 		'gplus',
		'google-circles', 	'youtube-play', 	'youtube',			'pinterest', 	'smashing',
		'soundcloud', 		'flattr',			'odnoklassniki',	'mixi',			'rss'
	));

	gourmand_config::set( 'social-items', $cfgs );
?>
