<?php

	/**
	 *	Gourmand Footer Dark Sidebar
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	$nr = gourmand_mod::get( 'footer-dark-sidebar-nr-columns' );

	if( !is_active_sidebar( 'footer-dark' ) )
 		return;

	$classes = 'fixed-width-cols-' . absint( $nr );

	if( gourmand_mod::get( 'footer-dark-sidebar-fluid-width' ) )
		$classes = '';
?>
	<aside id="gourmand-dark-sidebar" class="footer-dark-sidebar">
		<div class="container <?php echo esc_attr( $classes ); ?>">
			<div class="row">

				<div class="col-lg-12">
					<div class="widgets-row cols-<?php echo absint( $nr ); ?>">

						<?php dynamic_sidebar( 'footer-dark' ); ?>

					</div>
				</div>

			</div>
		</div>
	</aside>
