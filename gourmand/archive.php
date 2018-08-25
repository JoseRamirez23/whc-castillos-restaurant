<?php gourmand_template::header(); ?>

	<!-- antet wrapper -->
	<?php
		if( apply_filters( 'gourmand_archive_antet', true ) )
			gourmand_template::partial( 'templates/antet/archive' );
	?>

	<!-- content wrapper -->
	<div id="gourmand-content-wrapper" <?php echo gourmand_page_class( 'blog' ); ?>>

		<div class="container">
			<div class="row">

                <!-- page section -->
                <div class="col-layout">

    				<section id="gourmand-content">
						<div class="gourmand-content">

							<?php
								// WordPress Loop
								gourmand_template::partial( 'templates/loop', apply_filters( 'gourmand_loop', null ) );

								// WordPress Pagination Loop
								gourmand_template::partial( 'templates/pagination', apply_filters( 'gourmand_pagination', null ) );
							?>

						</div>
					</section>

					<?php
						$layout		= gourmand_mod::get( 'archives-layout' );
						$sidebar	= gourmand_mod::get( 'archives-sidebar' );

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

<?php gourmand_template::footer(); ?>
