<?php
	/**
	 *	Tags Antet
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
							$t = get_term_by( 'slug', esc_attr( get_query_var( 'tag' ) ), 'post_tag' );

							if( !empty( $t ) && !is_wp_error( $t ) && is_tag( $t ) ){
								$headline		= single_tag_title( null, false );
								$description	= esc_html( $t -> description );
							}

							// Counter
							global $wp_query;
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
