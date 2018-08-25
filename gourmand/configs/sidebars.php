<?php

    /**
     *  Sidebars - config file
     */

    $cfgs = gourmand_config::merge( (array)gourmand_config::get( 'sidebars' ), array(


        /**
         *
         *  Content Sidebars
         *  Main Sidebar        - is used by default for next templates: Blog, Archives, Author, Categories, Tags and Search Results.
         *  Front Page Sidebar  - is used by default for Front Page template.
         *  Single Sidebar      - is used by default for single post template.
         *  Page Sidebar        - is used by default for page template.
         */

        'content' => array(
            'default' => array(
                'id'            => 'default',
                'name'          => __( 'Default Sidebar' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'front-page' => array(
                'id'            => 'front-page',
                'name'          => __( 'Front Page - Default Sidebar' , 'gourmand' ),
                'description'   => __( 'Front Page Sidebar - is used by default for Front Page template.' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
			'blog' => array(
                'id'            => 'blog',
                'name'          => __( 'Blog - Default Sidebar' , 'gourmand' ),
                'description'   => __( 'Default Blog Sidebar - is used by default for Blog template.' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
			'archives' => array(
                'id'            => 'archives',
                'name'          => __( 'Archives - Default Sidebar' , 'gourmand' ),
                'description'   => __( 'Default Archives Sidebar - is used by default for next templates: Archives, Author, Categories, Tags and Search Results.' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'post' => array(
                'id'            => 'post',
                'name'          => __( 'Single Post - Default Sidebar' , 'gourmand' ),
                'description'   => __( 'Default Single Post Sidebar - is used by default for single post template.' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'page' => array(
                'id'            => 'page',
                'name'          => __( 'Page - Default Sidebar' , 'gourmand' ),
                'description'   => __( 'Page Sidebar - is used by default for page template.' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            )
        ),

        /**
         *
         *  Footer Sidebars
         */

        'footer' => array(
            'footer-dark' => array(
                'id'            => 'footer-dark',
                'name'          => __( 'Footer Dark Sidebar' , 'gourmand' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>'
            )
        )
    ));

	/**
	 *	WooCommerce Sidebars
	 */

	// ....

	gourmand_config::set( 'sidebars', $cfgs );
?>
