<?php

	/**
	 *	Article Summary | Excerpt OR Content
	 */

	global $post;

    $more_label     = __( 'Read More %1$s' , 'gourmand' );
    $more_icon      = apply_filters( 'gourmand_read_more_visible_icon', null );
    $more_icon_sm   = apply_filters( 'gourmand_read_more_hidden_icon', '<i class="gourmand-icon-right-open-3"></i>' );

    $more  = '<span class="hidden-xs">' . trim( sprintf( esc_html( $more_label ), $more_icon ) ) . '</span>';
    $more .= '<span>' . $more_icon_sm . '</span>';

    if( !empty( $post -> post_excerpt ) || gourmand_mod::get( 'blog-excerpt' ) ){

		echo '<div class="summary">';

        the_excerpt();

        echo '<a href="' . esc_url( get_permalink( $post -> ID ) ) . '" class="more-link">';
        echo $more;
        echo '</a>';

		echo '<div class="clear clearfix"></div>';
		echo '</div>';
    }
    else{
		echo '<div class="post-content">';

        the_content( $more );

		echo '<div class="clear clearfix"></div>';
		echo '</div>';
    }
?>
