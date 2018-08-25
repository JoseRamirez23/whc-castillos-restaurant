<?php
	/**
	 *	Load available Front Page Default Sections
	 *
	 *	Front Page WordPress Content
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	global $post;
?>
	<div class="container">
		<div class="row">

			<!-- page section -->
            <div class="col-layout">

				<section id="gourmand-content">
					<div class="gourmand-content">

						<?php while( have_posts() ) : ?>

							<?php the_post(); ?>

							<div <?php post_class(); ?>>

								<?php the_content(); ?>

								<div class="clearfix"></div>
							</div>

						<?php endwhile; ?>

					</div>
				</section>

				<?php
					$layout 	= apply_filters( 'gourmand_front_page_layout', gourmand_mod::get( 'front-page-layout' ), $post );
					$sidebar 	= apply_filters( 'gourmand_front_page_sidebar', gourmand_mod::get( 'front-page-sidebar' ), $post );

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
