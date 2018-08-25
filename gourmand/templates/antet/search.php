<?php
	/**
	 *	Search Antet
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
							global $wp_query, $post;

							// Counter
							echo gourmand_breadcrumbs::count( $wp_query );

							// Author Avatar and Headline
							echo '<h1 class="breadcrumbs-title">' . esc_html__( 'Search Result', 'gourmand' ) . '</h1>';
						?>

					</nav>

				</div>

			</div>
		</div>

	</div>
