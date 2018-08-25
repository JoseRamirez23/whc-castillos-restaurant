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
            'gourmand-860',			// 860,
            'gourmand-540',			// 540,
            'gourmand-296',			// 296,
		),
		array(
			'alt'	=> esc_attr( get_the_title( $post ) )
		));

        /**
         *  Thumbnail Caption
         */

        $caption = isset( $thumbnail -> post_excerpt ) ? strip_tags( $thumbnail -> post_excerpt ) : null;

        if( !empty( $caption ) ){
            echo '<span class="flex-container valign-bottom">';
            echo '<span class="caption-wrapper flex-item left">' . esc_html( $caption ) . '</span>';
            echo '</span>';
        }

    echo '</div>';
    echo '</div>';
?>
