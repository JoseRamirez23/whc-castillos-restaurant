<?php

	/**
	 *	Default Article Title
	 */

	global $post;

	if( apply_filters( 'gourmand_display_title', true, $post ) ){
		?>
			<h1 class="title">

				<?php if( !empty( $post -> post_title ) ) : ?>

					<?php the_title(); ?>

				<?php else : ?>

					<?php esc_html_e( 'Read more about ..' , 'gourmand' ) ?>

				<?php endif; ?>

			</h1>

		<?php
	}

	/**
	 *	Here can be added SubTitle or / and a Description
	 */

	do_action( 'gourmand_after_title', $post );
?>
