<?php

	/**
	 *	Loop
	 */

?>

	<div class="gourmand-loop standard-view">
		<?php while( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php gourmand_template::partial( 'templates/article/default', apply_filters( 'gourmand_blog_view', null ) ); ?>

		<?php endwhile; ?>
	</div>
