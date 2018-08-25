<?php

	/**
	 *	Gourmand Footer Small Social Links
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !gourmand_has_social() )
		return;

	$items = gourmand_config::get( 'social-items' );
?>
	<div id="gourmand-social-links" class="footer-social-links">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">

					<div class="social-links">
						<?php
							foreach( $items as $item ){

								if( $item == 'rss' ){
									$rss = gourmand_mod::get( 'rss' );

									if( gourmand_mod::get( 'display-rss' ) && !empty( $rss ) )
										echo '<a href="' . esc_url( $rss ) . '" class="gourmand-icon-rss" target="_blank"></a>';
								}

								else{
									$url = gourmand_mod::get( $item );

									if( !empty( $url ) )
										echo '<a href="' . esc_url( $url ) . '" class="gourmand-icon-' . esc_attr( $item ) . '" target="_blank"></a>';
								}
							}
						?>
					</div>

				</div>

			</div>
		</div>
	</div>
