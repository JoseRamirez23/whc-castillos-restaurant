<?php
	/**
	 *	Author Antet
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

							echo gourmand_breadcrumbs::count( $wp_query );

							// Author Avatar and Headline
							echo '<h1 class="breadcrumbs-title">' . get_avatar( $post -> post_author, 66, get_template_directory_uri() . '/assets/skins/default/img/default-avatar.png' ). ' ' . esc_html( get_the_author_meta( 'display_name', $post -> post_author ) ) . '</h1>';

							//	Author Description
							$description = esc_html( strip_tags( get_the_author_meta( 'description' , $post -> post_author ) ) );

							if( !empty( $description ) )
								echo '<p class="breadcrumbs-description">' . esc_html( $description ) . '</p>';
						?>

					</nav>

				</div>

			</div>
		</div>

	</div>
