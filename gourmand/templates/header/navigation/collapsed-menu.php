<div class="gourmand-navigation-wrapper nav-collapse collapse-submenu <?php echo gourmand_mod::get( 'collapse-submenu' ) ? 'collapse-submenu' : ''; ?>">

    <div class="gourmand-navigation-shadow"></div>

    <!-- TOPPER MENU -->
    <nav class="gourmand-navigation">

        <?php
            if( apply_filters( 'gourmand_mobile_menu_search_box', true ) )
                get_search_form();
        ?>

        <div class="gourmand-menu-content">

            <?php
				// Default Menu
                $args = array(
                    'theme_location'    => 'gourmand-header',
                    'container_class'   => 'gourmand-menu-wrapper',
                    'menu_class'        => 'gourmand-menu-list'
                );

                $location = get_nav_menu_locations();

                if( has_nav_menu( 'gourmand-header' ) ){
                    wp_nav_menu( $args );
                }

				// Accent Menu
				$args = array(
					'theme_location'    => 'gourmand-header-accent',
					'container_class'   => 'gourmand-menu-wrapper',
					'menu_class'        => 'gourmand-menu-list'
				);

				if( has_nav_menu( 'gourmand-header-accent' ) ){
					wp_nav_menu( $args );
				}
            ?>

            <?php //- TO DO: FILTER ACTION -// ?>
        </div>
    </nav>

</div>
