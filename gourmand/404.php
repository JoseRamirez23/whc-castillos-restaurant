<?php gourmand_template::header(); ?>

	<!-- antet wrapper -->
	<?php if( apply_filters( 'gourmand_404_antet', true ) ) : ?>

		<!-- content wrapper -->
		<div id="gourmand-content-wrapper" <?php echo gourmand_page_class( 'template-404' ); ?>>

			<div class="container">
				<div class="row">

					<div class="col-layout">

						<section id="gourmand-content">
							<div class="gourmand-content">

								<?php gourmand_template::partial( 'templates/antet/404' ); ?>

							</div>
						</section>

					</div>

				</div>
			</div>

		</div><!-- end wrapper -->

	<?php endif; ?>

<?php gourmand_template::footer(); ?>
