<?php gourmand_template::header( 'page' ); ?>

    <?php global $post; ?>

    <!-- content wrapper -->
    <div id="gourmand-content-wrapper" <?php echo gourmand_page_class( 'single-page' ); ?>>

		<div class="container">
			<div class="row">

				<!-- page section -->
                <div class="col-layout">

					<section id="gourmand-content">
						<div class="gourmand-content">

    						<?php while( have_posts() ) : ?>

                                <?php the_post(); ?>

                                <?php if( apply_filters( 'gourmand_page_antet', true, $post ) ) : ?>

                                    <?php gourmand_template::partial( 'templates/page/title/default' ); ?>

                                    <?php gourmand_template::partial( 'templates/page/subtitle/default' ); ?>

                                    <?php gourmand_template::partial( 'templates/page/thumbnail/default' ); ?>

                                    <?php gourmand_template::partial( 'templates/page/meta/activity' ); ?>

                                <?php endif; ?>

                                <!-- content -->
    							<div <?php post_class(); ?>>

    								<?php the_content(); ?>

    								<div class="clearfix"></div>
    							</div>

                                <?php
                                    wp_link_pages( array(
                                        'before'        => '<div class="gourmand-paged-post"><span class="gourmand-pagination-title">' . __( 'Pages', 'gourmand' ) . ': </span>',
                                        'after'         => '<div class="clearfix"></div></div>',
                                        'link_before'   => '<span class="gourmand-pagination-item">',
                                        'link_after'    => '</span>'
                                    ));
                                ?>

                                <?php gourmand_template::partial( 'templates/page/meta/activity' ); ?>

                                <?php comments_template(); ?>

    						<?php endwhile; ?>

                        </div>
					</section>

                    <?php
                        $layout     = apply_filters( 'gourmand_page_layout', gourmand_mod::get( 'page-layout' ), $post );
                        $sidebar    = apply_filters( 'gourmand_page_sidebar', gourmand_mod::get( 'page-sidebar' ), $post );

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

<?php gourmand_template::footer( 'page' ); ?>
