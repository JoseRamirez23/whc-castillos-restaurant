<?php
	/**
	 *	Category Antet
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

							<?php echo gourmand_breadcrumbs::categories( absint( get_query_var( 'cat' ) ) ); ?>
						</ul>

						<?php
							global $wp_query;

							$c = get_category( absint( get_query_var( 'cat' ) ) );

							if( !empty( $c ) && !is_wp_error( $c )  && is_category( $c -> term_id ) ){
								$headline		= single_cat_title( null, false );
								$description	= esc_html( $c -> description );
							}

							// Counter
							echo gourmand_breadcrumbs::count( $wp_query );

							// Gategory Headline
							if( !empty( $headline ) )
								echo '<h1 class="breadcrumbs-title">' . esc_html( $headline ) . '</h1>';

							// Category Description OR Counter
							if( !empty( $description ) )
								echo '<p class="breadcrumbs-description">' . esc_html( $description ) . '</p>';

						?>

					</nav>

				</div>

			</div>
		</div>

	</div>
