<?php

	/**
	 *	Pagination
	 */

    $args = array(
        'mid_size'  => 2,
        'prev_text' => '<i class="gourmand-icon-left-open-1"></i>',
        'next_text' => '<i class="gourmand-icon-right-open-1"></i>'
    );

    $pagination = get_the_posts_pagination( $args );

    if( empty( $pagination ) )
        return;
?>

    <div class="gourmand-pagination">
        <?php the_posts_pagination( $args ); ?>
    </div>
