<?php gourmand_template::header( 'post' ); ?>

    <!-- antet wrapper -->

    <?php global $post; ?>

    <!-- content wrapper -->
    <div id="gourmand-content-wrapper" <?php echo gourmand_page_class( 'single-post' ); ?>>

		<div class="container">
			<div class="row">

                <!-- page section -->
                <div class="col-layout">

    				<section id="gourmand-content">
                        <div class="gourmand-content">

    						<?php while( have_posts() ) : ?>

    							<?php the_post(); ?>

                                <?php if( apply_filters( 'gourmand_single_antet', true, $post ) ) : ?>

                                    <?php gourmand_template::partial( 'templates/single/meta/categories' ); ?>

                                    <?php gourmand_template::partial( 'templates/single/title/default' ); ?>

                                    <?php gourmand_template::partial( 'templates/single/meta/others' ); ?>

                                    <?php gourmand_template::partial( 'templates/single/thumbnail/default' ); ?>

                                    <?php gourmand_template::partial( 'templates/single/meta/activity' ); ?>

                                <?php endif; ?>

    							<div <?php post_class(); ?>>

    								<?php the_content(); ?>

    								<div class="clearfix"></div>
    							</div>

                                <?php gourmand_template::partial( 'templates/single/terms/tags' ); ?>

                                <?php gourmand_template::partial( 'templates/single/meta/activity' ); ?>

                                <?php gourmand_template::partial( 'templates/single/author' ); ?>

                                <?php comments_template(); ?>

    						<?php endwhile; ?>

                        </div>
    				</section>

                    <?php
                        $layout     = apply_filters( 'gourmand_post_layout', gourmand_mod::get( 'post-layout' ), $post );
                        $sidebar    = apply_filters( 'gourmand_post_sidebar', gourmand_mod::get( 'post-sidebar' ), $post );

                        if( $layout == 'left' || $layout == 'right' ){
                    ?>
                            <aside id="gourmand-sidebar">
                                <div class="gourmand-sidebar">

                                    <?php
                                        if ( dynamic_sidebar( esc_attr( $sidebar ) ) ){

                                        }
                                    ?>

                                </div>
                            </aside>
                    <?php
                        }
                    ?>

                </div>

			</div>
		</div>

    </div><!-- end content wrapper  -->

<?php gourmand_template::footer( 'post' ); ?>
