<?php
	/**
	 *	Header Topper Section
	 *
	 *  @created    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */
?>

<?php
	$email 		= gourmand_mod::get( 'tools-display-email' );
	$address 	= gourmand_mod::get( 'tools-display-address' );
	$phone 		= gourmand_mod::get( 'tools-display-phone' );
	$social 	= gourmand_mod::get( 'tools-display-social' );

	if( $email || $address || $phone || $social ) :
?>
	<div id="gourmand-header-topper" class="header-topper">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">

					<?php if( $email || $address || $phone ) : ?>

						<div class="business-tools">

							<!-- E-mail -->
							<?php if( $email ) : ?>

								<?php $email_url = esc_url( gourmand_mod::get( 'tools-display-email-url' ) ); ?>

								<?php if( !empty( $email_url ) ) : ?>

									<a href="<?php echo esc_url( $email_url ); ?>" class="tools-email with-url">
										<i class="gourmand-icon-mail-alt"></i>
										<span class="tools-item-inner"><?php echo antispambot( gourmand_mod::get( 'tools-email' ) ); ?></span>
									</a>

								<?php else : ?>

									<a href="mailto:<?php echo antispambot( gourmand_mod::get( 'tools-email' ), 1 ); ?>" class="tools-email without-url">
										<i class="gourmand-icon-mail-alt"></i>
										<span class="tools-item-inner"><?php echo antispambot( gourmand_mod::get( 'tools-email' ) ); ?></span>
									</a>

								<?php endif; ?>

							<?php endif; ?>

							<!-- Address -->
							<?php if( $address ) : ?>

								<?php $address_url = esc_url( gourmand_mod::get( 'tools-display-address-url' ) ); ?>

								<?php if( !empty( $address_url ) ) : ?>

									<a href="<?php echo esc_url( $address_url ); ?>" class="tools-address with-url">
										<i class="gourmand-icon-location-2"></i>
										<span class="tools-item-inner"><?php echo esc_html( gourmand_mod::get( 'tools-address' ) ); ?></span>
									</a>

								<?php else : ?>

									<a href="javascript:void(null);" class="tools-address without-url">
										<i class="gourmand-icon-location-2"></i>
										<span class="tools-item-inner"><?php echo esc_html( gourmand_mod::get( 'tools-address' ) ); ?></span>
									</a>

								<?php endif; ?>

							<?php endif; ?>

							<!-- Phone -->
							<?php if( $phone ) : ?>

								<?php $call_phone = esc_attr( gourmand_mod::get( 'tools-call-phone' ) ); ?>

								<?php if( !empty( $call_phone ) ) : ?>

									<a href="tel:<?php echo esc_attr( gourmand_mod::get( 'tools-call-phone' ) ); ?>" class="tools-phone with-url">
										<i class="gourmand-icon-phone"></i>
										<span class="tools-item-inner"><?php echo esc_html( gourmand_mod::get( 'tools-phone' ) ); ?></span>
									</a>

								<?php else : ?>

									<a href="javascript:void(null);" class="tools-phone without-url">
										<i class="gourmand-icon-phone"></i>
										<span class="tools-item-inner"><?php echo esc_attr( gourmand_mod::get( 'tools-phone' ) ); ?></span>
									</a>

								<?php endif; ?>
							<?php endif; ?>

						</div>

					<?php endif; ?>

					<!-- Social Links -->
					<?php if( $social && gourmand_has_social() ) : ?>
						<div class="social-networks">

							<?php
								$items = gourmand_config::get( 'social-items' );

								foreach( $items as $item ){

									// Rss Link
									if( $item == 'rss' ){
										$rss = gourmand_mod::get( 'rss' );

										if( gourmand_mod::get( 'display-rss' ) && !empty( $rss ) )
											echo '<a href="' . esc_url( $rss ) . '" class="gourmand-icon-rss" target="_blank"></a>';
									}

									// Other Social Links
									else{
										$url = gourmand_mod::get( $item );

										if( !empty( $url ) )
											echo '<a href="' . esc_url( $url ) . '" class="gourmand-icon-' . esc_attr( $item ) . '" target="_blank"></a>';
									}
								}
							?>

						</div>
					<?php endif; ?>

				</div>

			</div>
		</div>
	</div>

<?php endif; ?>
