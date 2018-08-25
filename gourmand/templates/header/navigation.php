<?php
	/**
	 *	Header Navigation Section
	 *
	 *  @created    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */
?>

<nav id="gourmand-header-navigation" class="header-navigation <?php echo gourmand_mod::get( 'tools-display-menu-phone' ) ? 'with-menu-phone' : 'without-menu-phone'; ?>">
	<div class="container">
		<div class="row">

			<div class="nav-col-3">
				<?php gourmand_template::partial( 'templates/header/navigation/site-identity' ); ?>
			</div>

			<div class="nav-col-9">
				<?php gourmand_template::partial( 'templates/header/navigation/menu' ); ?>
			</div>

			<?php gourmand_template::partial( 'templates/header/navigation/bottom-delimiter' ); ?>

		</div>
	</div>
</nav>
