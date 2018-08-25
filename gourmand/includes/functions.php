<?php

	/**
	 *  Customize Function Actions and Filters
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	/**
	 *	Unregister Customize Panel, Section, Tabs and Fields
	 */

	function gourmand_unregister_customize( $unregister = true )
	{
		return true;
	}

	function gourmand_unregister_customize_panel( $slug )
	{
		$slug = esc_attr( str_replace( '-', '_', $slug ) );

		remove_filter( "gourmand_unregister_customize_panel_{$slug}" );
		add_filter( "gourmand_unregister_customize_panel_{$slug}", 'gourmand_unregister_customize', 0 );
	}

	function gourmand_unregister_customize_section( $slug )
	{
		$slug = esc_attr( str_replace( '-', '_', $slug ) );

		add_filter( "gourmand_unregister_customize_section_{$slug}", 'gourmand_unregister_customize', 0 );
	}

	function gourmand_unregister_customize_tab( $slug )
	{
		$slug = esc_attr( str_replace( '-', '_', $slug ) );

		add_filter( "gourmand_unregister_customize_tab_{$slug}", 'gourmand_unregister_customize', 0 );
	}

	function gourmand_unregister_customize_field( $slug )
	{
		$slug = esc_attr( str_replace( '-', '_', $slug ) );

		add_filter( "gourmand_unregister_customize_field_{$slug}", 'gourmand_unregister_customize', 0 );
	}

	/**
 	 *	Sanitize / Validators
 	 */

	function gourmand_sanitize( $value, $method, $args = array(), $min = null, $max = null )
	{
		if( $method == 'gourmand_sanitize' || isset( $args[ 'sanitize' ] ) && $args[ 'sanitize' ] == 'gourmand_sanitize'  )
			return;


		if( is_callable( $method ) )
			$value = call_user_func_array( $method, array( $value ) );

		if( isset( $args[ 'sanitize' ] ) && is_callable( $args[ 'sanitize' ] ) )
			$value = call_user_func_array( $args[ 'sanitize' ], array( $value ) );

		return  $value;
	}

	/**
	 *	Min Max Sanitize
	 */

	function gourmand_mm_sanitize( $value, $method, $args = array(), $min = null, $max = null )
	{
		$value 	= gourmand_sanitize( $value, $method, $args );
		$attrs	= gourmand_customize_attrs::get( $args );

		if( isset( $attrs[ 'min' ] ) )
			$min = $attrs[ 'min' ];

		if( isset( $attrs[ 'max' ] ) )
			$max = $attrs[ 'max' ];

		if( !is_null( $min ) )
			$value = $min <= $value ? $value : $min;

		if( !is_null( $max ) )
			$value = $value <= $max ? $value : $max;

		return $value;
	}

	/**
	 *	Sanitize Settings with default or defined sanitize
	 */

	function gourmand_sanitize_setting( $id, $setting, $args )
	{
		if( isset( $setting[ 'sanitize_callback' ] ) && $setting[ 'sanitize_callback' ] == 'gourmand_sanitize_setting' ||
			isset( $args[ 'sanitize' ] ) && $args[ 'sanitize' ] == 'gourmand_sanitize_setting'  )
			return;

		$mods = (array)gourmand_config::get( 'theme-mods' );

		if( isset( $mods[ $id ] ) && isset( $mods[ $id ][ 'default' ] ) ){
			if( isset( $setting[ 'sanitize_callback' ] ) && is_callable( $setting[ 'sanitize_callback' ] ) ){
				$setting[ 'default' ] = call_user_func_array( $setting[ 'sanitize_callback' ], array( $mods[ $id ][ 'default' ] ) );
			}

			if( isset( $args[ 'sanitize' ] ) && is_callable( $args[ 'sanitize' ] ) ){
				$setting[ 'default' ] = call_user_func_array( $args[ 'sanitize' ], array( $mods[ $id ][ 'default' ] ) );
			}

			if( isset( $mods[ $id ] ) &&  isset( $mods[ $id ][ 'sanitize' ] ) && is_callable( $mods[ $id ][ 'sanitize' ] ) ){
				$setting[ 'default' ] = call_user_func_array( $mods[ $id ][ 'sanitize' ], array( $mods[ $id ][ 'default' ] ) );
			}
		}

		if( isset( $mods[ $id ] ) &&  isset( $mods[ $id ][ 'sanitize' ] ) && is_callable( $mods[ $id ][ 'sanitize' ] ) ){
			$setting[ 'sanitize_callback' ] = $mods[ $id ][ 'sanitize' ];
		}

		else if( isset( $args[ 'sanitize' ] ) && is_callable( $args[ 'sanitize' ] ) ){
			$setting[ 'sanitize_callback' ] = $args[ 'sanitize' ];
		}

		return $setting;
	}

	function gourmand_sanitize_numeric( $value, $min = 0 )
	{
		return is_numeric( $value ) ? $value + 0 : $min;
	}

	function gourmand_sanitize_percent( $value, $min = 0 )
	{
		$value = absint( $value );

		return $value <= 100 ? $value : $min;
	}

	function gourmand_sanitize_copyright( $value )
	{
		return wp_kses( $value, array(
			'a' => array(
				'href'  => array(),
				'label' => array(),
				'class' => array(),
				'id'    => array()
			),
			'br'        => array(),
			'em'        => array(),
			'strong'    => array(),
			'span'      => array()
		));
	}

	function gourmand_sanitize_logic( $value )
	{
		return absint( $value ) ? true : false;
	}

	/**
	 *	Get All Posts by post_type // transient
	 */

	function gourmand_options_posts( $post_type = 'post', $first_as_label = null )
	{
		global $wpdb;

		$options = wp_cache_get( "gourmand_options_{$post_type}", 'posts' );

		if ( !is_array( $options ) || empty( $options ) ) {
			$posts = $wpdb -> get_results( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = '{$post_type}'" );

			$options = array();

			foreach( $posts as $post ){
				if( is_object( $post ) );
					$options[ $post -> ID ] = $post -> post_title;
			}

			wp_cache_add( "gourmand_options_{$post_type}", $options, 'posts' );
		}

		if( is_null( $first_as_label ) )
			$first_as_label = __( ' - Choose from List - ', 'gourmand' );

		return array( 0 => $first_as_label ) + $options;
	}

	// Articles Counter Function
	function gourmand_articles_counter( $nr, $text )
	{
		echo '<small>';
		echo '<span class="counter-wrapper accent-bkg">';
		echo sprintf( $text, '<span class="counter">' . number_format_i18n( $nr ) . '</span>' );
		echo '</span>';
		echo '</small>';
	}

	/**
	 *	Page Classes
	 */

	function gourmand_page_class( $classes = null )
	{
		$classes = apply_filters( 'gourmand_page_class', $classes );

		return 'class="' . esc_attr( trim( "gourmand-page {$classes}" ) ) . '"';
	}


	/**
	 *  Categories
	 */

	function gourmand_post_categories( $post_id, $asc = true )
	{
		$categories = get_the_category( absint( $post_id ) );
		$cats       = array();
		$rett 		= array();
		$return 	= array();
		$args 		= array(
			'categories' 	=> array(),
			'rett' 			=> array()
		);

		// convert to array
		if( empty( $categories ) )
			return array();

		foreach ( $categories as $i => $cat ){
			if( $cat -> parent == 0 ){
				$cats[] = $cat;
				unset( $categories[ $i ] );
			}
		}

		if( empty( $cats ) ){
			foreach ( $categories as $cat )
				$return[] = (array)$cat;

			$return = gourmand_config::sksort( $return, 'term_id', $asc );
		}

		// level 0 and existing childs
		foreach ( $cats as $j => $cat ){
			if( in_array( $cat, $args[ 'rett' ] ) )
				continue;

			$args[ 'rett' ][ ] 	= $cat;
			$args 				= gourmand_child_categories_array( $cat, $args );
		}

		// level not 0 without parents
		foreach ( $args[ 'categories' ] as $cat )
			$args[ 'rett' ][] = $cat;

		foreach ( $args[ 'rett' ] as $cat ){
			if( !in_array( (array)$cat, $return ) )
				$return[] = (array)$cat;
		}

		return $return;
	}

	function gourmand_the_post_categories( $post_id, $sep = null )
	{
		$categories = gourmand_post_categories( $post_id );

		$i = 0;

		foreach( $categories as $c ){
			$category_link = get_category_link( $c[ 'term_id' ] );

			if( $i++ )
				echo $sep;

			if( is_wp_error( $category_link ) )
				continue;

			echo '<a href="' . esc_url( $category_link ) . '" class="category tempo-category-' . absint( $c[ 'term_id' ] ) . '" title="' . esc_attr( sprintf( __( 'See articles from category - %1$s' , 'gourmand' ), esc_attr( $c[ 'name' ] ) ) ) . '">' . esc_html( $c[ 'name' ] ) . '</a>';
		}
	}

	function gourmand_child_categories_array( $cat, $args )
	{
		$categories = get_categories( array( 'parent' => $cat -> term_id ) );

		if( !empty( $categories ) ){

			foreach( $categories as $c ){

				if( in_array( $c, $args[ 'rett' ] ) )
					continue;

				$link = esc_url( get_term_link( $c -> term_id, 'category' ) );

				if ( is_wp_error( $link ) )
					continue;

				if( in_array( $c, $args[ 'categories' ] ) ){
					$args[ 'rett' ][ ]	= $c;
					$key 				= array_search( $c, $args[ 'categories' ] ); unset( $args[ 'categories' ][ $key ] );
					$args 	 			= gourmand_child_categories_array( $c, $args );
				}
			}
		}

		return $args;
	}

	function gourmand_child_categories( $cat )
	{
		$categories = get_categories( array( 'parent' => $cat ) );
		$rett = '';

		if( !empty( $categories ) ){

			$rett .= '<ul class="tempo-childs-categories">';

			foreach( $categories as $c ){

				$link = esc_url( get_term_link( $c -> term_id , 'category' ) );

				if ( is_wp_error( $link ) )
					continue;

				$classes = 'category tempo-category-' . absint( $c -> term_id );

				if( gourmand_options::is_set( 'category-' . $c -> term_id ) )
					$classes .= ' is-set-color';


				$rett .= '<li>';
				$rett .= '<a href="' . esc_url( $link ) . '" rel="category">' . $c -> name . ' <span class="' . esc_attr( $classes ) . '">' . absint( $c -> count ) . '</span></a>';

				$rett .= gourmand_child_categories( $c -> term_id );

				$rett .= '</li>';
			}

			$rett .= '</ul>';
		}

		return $rett;
	}

	function gourmand_ver2natural( $ver = null )
	{
		if( empty( $ver ) ){
			$theme = wp_get_theme();
			$ver = $theme -> get( 'Version' );
		}

		$v = explode( '.', $ver );
		$c = count( $v ) - 1;

		$natural = 0;

		foreach( $v as $i => $n ){
			$natural += $n * pow( 1000, $c );
			$c--;
		}

		return $natural;
	}

	function gourmand_hex2rgb( $hex )
	{
		$hex = str_replace( "#", "", $hex );

		if( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}

		$rgb = array( $r, $g, $b );
		return implode( ",", $rgb );
	}

	function gourmand_body_classes( $classes )
	{
		$size = gourmand_mod::get( 'footer-social-size' );

		// Social Size
		if( gourmand_has_social() && gourmand_mod::get( 'footer-display-social' ) )
			$classes .= " footer-social-links {$size}-social-links";

		if( is_active_sidebar( 'footer-dark' ) )
			$classes .= " has-footer-dark-sidebar";

		// Navigation Width
		$nav_width = esc_attr( gourmand_mod::get( 'nav-width' ) );
		$classes .= " {$nav_width}-navigation";

		// Layout Class
		// for WordPress template - front-page.php
		if( is_page() && is_front_page() ){
			$layout = esc_attr( gourmand_mod::get( 'front-page-layout' ) );
			$classes .= " {$layout}-sidebar";
		}

		// for WordPress template - index.php OR front-page.php
		else if( is_home() ){
			$layout = esc_attr( gourmand_mod::get( 'blog-layout' ) );
			$classes .= " {$layout}-sidebar";
	 	}

		// for WordPress templates - single.php OR page.php
		else if( is_singular() ){
			global $post;

			$post_type = $post -> post_type;

			$layout = esc_attr( apply_filters( 'gourmand_page_layout', gourmand_mod::get( "{$post_type}-layout" ), $post ) );
			$classes .= " {$layout}-sidebar";

			if( is_page() ){
				$alignment = esc_attr( apply_filters( 'gourmand_page_antet_alignment', gourmand_mod::get( 'page-antet-alignment' ), $post ) );
				$classes .= " page-antet-alignment-{$alignment}";
			}
		}

		// for WordPress template - 404.php
	 	else if( is_404() ){
			$classes .= ' without-sidebar';
	 	}

		// for WordPress template - archive.php
	 	else{
			$layout = esc_attr( gourmand_mod::get( 'archives-layout' ) );
			$classes .= " {$layout}-sidebar";
	 	}


		return esc_attr( trim( $classes ) );
	}

	add_filter( 'gourmand_body_class', 'gourmand_body_classes', 10 );

	function gourmand_has_social()
	{
		$items 	= gourmand_config::get( 'social-items' );
		$rss	= esc_url( gourmand_mod::get( 'rss' ) );
		$has	= gourmand_mod::get( 'display-rss' ) && !empty( $rss );

		foreach( $items as $item ){

			if( $item == 'rss' )
				continue;

			$url = gourmand_mod::get( $item );
			$has = $has || !empty( $url );
		}

		return $has;
	}
?>
