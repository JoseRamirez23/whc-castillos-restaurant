<?php

	/**
	 *	Author Box
	 */

	if( gourmand_mod::get( 'post-author-box' ) ){

		global $post;

		echo '<div class="gourmand-author-wrapper">';
		echo '<div class="gourmand-author">';

		$website = esc_url( get_the_author_meta( 'url' , $post -> post_author ) );

		if( !empty( $website ) ){
			echo '<div class="gourmand-author-avatar">';
			echo '<a class="gourmand-website-url" href="' . esc_url( $website ) . '" target="_blank">';
			echo get_avatar( $post -> post_author, 150, get_template_directory_uri() . '/media/img/default-avatar.png' );
			echo '</a>';
			echo '</div>';

			echo '<h4 class="gourmand-author-name">';
			echo '<a class="gourmand-website-url" href="' . esc_url( $website ) . '" target="_blank">' . esc_html( get_the_author_meta( 'display_name', $post -> post_author ) ) . '</a>';
			echo '</h4>';
		}
		else{
			echo '<div class="gourmand-author-avatar">';
			echo '<a class="gourmand-website-url" href="' . esc_url( $website ) . '" target="_blank">';
			echo get_avatar( $post -> post_author, 150, get_template_directory_uri() . '/media/img/default-avatar.png' );
			echo '</a>';
			echo '</div>';

			echo '<h4 class="gourmand-author-name">';
			echo '<a class="gourmand-website-url" href="' . esc_url( get_author_posts_url( $post -> post_author ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $post -> post_author ) ) . '</a>';
			echo '</h4>';
		}

		echo '<p class="gourmand-author-info">';
		echo esc_html( get_the_author_meta( 'description', $post -> post_author ) );
		echo '</p>';

		echo '<div class="clear clearfix"></div>';
		echo '</div>';
		echo '</div>';
	}
?>
