<?php

	/**
	 *	List View Article Top Meta
	 */


    global $post;

    $display_author = gourmand_mod::get( 'blog-author' );
    $display_time   = gourmand_mod::get( 'blog-date' );
    $display_meta   = $display_author || $display_time;

    if( !$display_meta )
        return;
?>

<div class="meta others">

    <?php
        // author
		if( $display_author ){
			$name   = get_the_author_meta( 'display_name' , $post -> post_author );

			echo '<a class="author" href="' . esc_url( get_author_posts_url( $post -> post_author ) ) . '" title="' . sprintf( esc_attr__( 'Posted by %1$s' , 'gourmand' ) , esc_attr( $name ) ) . '">';
			echo get_avatar( $post -> post_author, 50, get_template_directory_uri() . '/assets/skins/default/img/default-avatar.png' ). ' ' . esc_html( get_the_author_meta( 'display_name', $post -> post_author ) );
			echo '</a>';
		}

        // time
		if( $display_time ){
	        $y      = esc_attr( get_post_time( 'Y', false, $post ) );
	        $m      = esc_attr( get_post_time( 'm', false, $post ) );
	        $d      = esc_attr( get_post_time( 'd', false, $post ) );
	        $dtime  = get_post_time( 'Y-m-d', false, $post );
	        $ptime  = get_post_time( esc_attr( get_option( 'date_format' ) ), false , $post, true );

	        echo '<a class="date" href="' . esc_url( get_day_link( $y , $m , $d ) )  . '" title="' . sprintf( esc_attr__( 'posted on %1$s', 'gourmand' ), esc_attr( $ptime ) ) . '"><i class="gourmand-icon-calendar-empty"></i> <time datetime="' . esc_attr( $dtime ) . '">' . esc_html( $ptime ) . '</time></a>';
		}
    ?>

</div>
