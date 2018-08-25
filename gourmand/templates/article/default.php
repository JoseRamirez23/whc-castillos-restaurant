<?php
	/**
	 *	Standard View
	 */
?>

<article <?php post_class( 'standard-view' ); ?>>

	<?php gourmand_template::partial( 'templates/article/meta/categories' ); ?>

	<?php gourmand_template::partial( 'templates/article/title/default' ); ?>

	<?php gourmand_template::partial( 'templates/article/meta/others' ); ?>

	<?php gourmand_template::partial( 'templates/article/thumbnail/default' ); ?>

	<?php gourmand_template::partial( 'templates/article/meta/activity' ); ?>

	<?php gourmand_template::partial( 'templates/article/summary/default' ); ?>

	<div class="clearfix"></div>
</article>
