<?php
	/**
	 *	Blog Antet
	 */
?>
	<div id="gourmand-breadcrumbs-wrapper" class="antet">

		<div class="container">
			<div class="row">

				<!-- page section -->
				<div class="col-layout">

					<nav class="tempo-navigation">

						<ul class="tempo-menu-list">
							<?php echo gourmand_breadcrumbs::home(); ?>
						</ul>

						<?php
							// Counter
							global $wp_query;
							echo gourmand_breadcrumbs::count( $wp_query );

							// Blog Headline
							echo '<h1 class="breadcrumbs-title">' . get_the_title( absint( get_option( 'page_for_posts' ) ) ) . '</h1>';
						?>

					</nav>

				</div>

			</div>
		</div>

	</div>
