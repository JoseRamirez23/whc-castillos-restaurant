<?php
	/**
	 *	Archive Antet
	 */
?>

	<div id="gourmand-breadcrumbs-wrapper" class="antet">

		<div class="container">
			<div class="row">

				<!-- page section -->
				<div class="col-layout">
					<nav class="tempo-navigation">

						<ul>
							<?php echo gourmand_breadcrumbs::home(); ?>

							<?php
								if ( is_day() ){
									$day    = get_the_date( );
									$m      = get_the_date( 'm' );
									$d      = get_the_date( 'd' );

									$month  = get_the_date( 'F' );
									$year   = get_the_date( 'Y' );
									$FY     = get_the_date( 'F Y' );

									echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( esc_attr__( 'Yearly archives - %1$s' , 'gourmand' ), esc_attr( $year ) ) . '">'  . esc_html( $year ) . '</a></li>';
									echo '<li><a href="' . esc_url( get_month_link( $year, $m ) ) . '" title="' . sprintf( esc_attr__( 'Monthly archives - %1$s' , 'gourmand' ), esc_attr( $FY ) ) . '">'  . esc_html( $month ) . '</a></li>';
									echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( $d ) . '</time></li>';

									$title  = esc_html__( 'Daily Archives' , 'gourmand' );

								}else if ( is_month() ){
									$month  = get_the_date( 'F' );
									$year   = get_the_date( 'Y' );

									echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( esc_attr__( 'Yearly archives - %1$s' , 'gourmand' ), esc_attr( $year ) ) . '">'  . esc_html( $year ) . '</a></li>';
									echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( $month ) . '</time></li>';

									$title  = esc_html__( 'Monthly Archives' , 'gourmand' );

								}else if ( is_year() ){
									$year   = get_the_date( 'Y' );
									echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( $year ) . '</time></li>';

									$title  = esc_html__( 'Yearly Archives' , 'gourmand' );

								}else{
									$year   = esc_html__( 'Archives' , 'gourmand' );
									echo '<li>' . esc_html( $year ) . '</li>';
									$title  = esc_html( $year );
								}
							?>

						</ul>

						<?php //	Archive Counter ?>
						<?php global $wp_query; ?>
						<?php echo gourmand_breadcrumbs::count( $wp_query ); ?>

						<?php //	Archive Headline ?>
						<h1 class="breadcrumbs-title"><?php echo esc_html( $title ); ?></h1>

					</nav>
				</div>

			</div>
		</div>

	</div>
