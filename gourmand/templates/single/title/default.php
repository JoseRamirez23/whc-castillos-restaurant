<?php

	/**
	 *	Default Article Title
	 */

	global $post;
?>
	<h1 class="title">

		<?php if( !empty( $post -> post_title ) ) : ?>

			<?php the_title(); ?>

		<?php else : ?>

			<?php esc_html_e( 'Read more about ..' , 'gourmand' ) ?>

		<?php endif; ?>

	</h1>
