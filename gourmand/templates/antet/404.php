<?php

	/**
	 *	404 Antet
	 */
?>

<div id="gourmand-breadcrumbs-wrapper" class="antet">

	<div class="container">
		<div class="row">

			<!-- page section -->
			<div class="col-layout">

				<h1><?php echo number_format_i18n( 404 ); ?></h1>
				<h2><?php esc_html_e( 'Resource not found', 'gourmand' ); ?></h2>
				<p><?php esc_html_e( 'We apologize but this page, post or resource does not exist or can not be found.', 'gourmand' ) ?></p>

				<div class="search-form">
					<?php get_search_form(); ?>
				</div>

			</div>

		</div>
	</div>

</div>
