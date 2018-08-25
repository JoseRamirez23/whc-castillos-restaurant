<?php

	/**
	 *	Article Thumbnail List
	 */


    global $post;

	$thumbnail          = get_post( get_post_thumbnail_id( $post ) );
    $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

    if( !$has_post_thumbnail )
        return;

    echo '<div class="thumbnail-wrapper">';
    echo '<div class="image-wrapper overflow-wrapper">';

		// picture responsive image
		echo gourmand_image::picture( $thumbnail -> ID, array(
			'gourmand-860',		// 860,
			'gourmand-540',		// 540,
			'gourmand-296',		// 296,
		),
		array(
			'alt'	=> esc_attr( get_the_title( $post ) )
		));

	    /**
	     *  Thumbnail Permalink ( go to single post )
	     */

	    echo '<a href="' . esc_url( get_permalink( $post ) ) . '" class="flex-container valign-bottom" title="' . esc_attr( strip_tags( get_the_title( $post ) ) ) . '">';

		    /**
		     *  Thumbnail Caption
		     */

	    	$caption = isset( $thumbnail -> post_excerpt ) ? strip_tags( $thumbnail -> post_excerpt ) : null;

		    if( !empty( $caption ) )
		        echo '<span class="caption-wrapper flex-item left">' . esc_html( $caption ) . '</span>';

	    echo '</a>';


    echo '</div>';
    echo '</div>';
?>
