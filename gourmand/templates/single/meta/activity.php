<?php
    global $post;

    $show_comments  = gourmand_mod::get( 'post-comments' );
    $show_views     = gourmand_mod::get( 'post-views' );

    if( !( $show_comments && $post -> comment_status == 'open' || $show_views && function_exists( 'stats_get_csv' ) ) )
        return;

    echo '<div class="meta activity">';

        // comments
        if( $post -> comment_status == 'open' && $show_comments ) {
            $nr = get_comments_number( $post -> ID );

            echo '<a class="activity-item comments" href="' . esc_url( get_comments_link( $post -> ID ) ) . '">';
            echo '<i class="gourmand-icon-chat-empty"></i> ' . apply_filters( 'gardener_nr_comments', '<span>' . number_format_i18n( absint( $nr ) ) . '</span>', $post );
            echo '</a>';
        }

        // number of views ( support with jetpack plugin )
        if( function_exists( 'stats_get_csv' ) && $show_views ) {

            $args = array(
                'days'      => -1,
                'post_id'   => $post -> ID,
            );

            $result = stats_get_csv( 'postviews', $args );
            $views  = $result[ 0 ][ 'views' ];

            echo '<span class="activity-item views">';
            echo '<i class="gourmand-icon-eye-4"></i> ' . number_format_i18n( absint( $views ) );
            echo '</span>';
        }

    echo '</div>';
?>
