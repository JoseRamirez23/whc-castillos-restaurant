<?php

	/**
	 *	Default Article Title
	 */

	global $post;
?>

	<h2 class="title">

		<?php if( !empty( $post -> post_title ) ) : ?>

			<a href="<?php echo esc_url( get_permalink( $post ) ); ?>" title="<?php echo esc_attr( strip_tags( get_the_title( $post ) ) ); ?>"><?php the_title(); ?></a>

		<?php else : ?>

			<a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php esc_html_e( 'Read more about ..' , 'gourmand' ) ?></a>

		<?php endif; ?>

	</h2>
