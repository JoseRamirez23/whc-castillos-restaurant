<?php
	/**
	 *	Categories Meta
	 */

	global $post;
?>

<?php if( has_category( null, $post ) && gourmand_mod::get( 'post-categories' ) ) : ?>

	<div class="meta categories">

		<?php gourmand_the_post_categories( $post -> ID, null ) ?>

	</div>

<?php endif; ?>
