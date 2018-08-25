<?php
    global $post;

	if( has_tag() && gourmand_mod::get( 'post-tags' ) ){
?>
        <div class="meta bottom single">
            <div class="terms tags">
              	<?php the_tags( '' , '' , '' ); ?>
                <div class="clear clearfix"></div>
            </div>
        </div>
<?php
	}
?>
