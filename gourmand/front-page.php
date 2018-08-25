<?php gourmand_template::header( 'front-page' ); ?>

    <!-- content wrapper -->
    <div id="gourmand-content-wrapper" <?php echo gourmand_page_class( apply_filters( 'gourmand_front_page_class', 'front-page' ) ); ?>>

        <?php
            if( get_option( 'show_on_front' ) == 'page' ){

                // Front Page Content
                gourmand_template::partial( apply_filters( 'gourmand_front_page_content', "templates/content/default" ) );

            }else if( have_posts() ) {
                ?>
                    <div class="container">
                        <div class="row">

                            <!-- page section -->
                            <div class="col-layout">

                                <section id="gourmand-content">
                                    <div class="gourmand-content">

                                        <?php
                                            // WordPress Loop
                                            gourmand_template::partial( 'templates/loop', esc_attr( apply_filters( 'gourmand_loop', null ) ) );

                                            // WordPress Pagination Loop
                                            gourmand_template::partial( 'templates/pagination', esc_attr( apply_filters( 'gourmand_pagination', null ) ) );
                                        ?>

                                    </div>
                                </section>

                                <?php
                                    $layout     = gourmand_mod::get( 'blog-layout' );
                                    $sidebar    = gourmand_mod::get( 'blog-sidebar' );

                                    if( $layout == 'left' || $layout == 'right' ){
                                ?>
                                        <aside id="gourmand-sidebar">
                                            <div class="gourmand-sidebar">

                                                <?php
                                                    if ( dynamic_sidebar( esc_attr( $sidebar ) ) ){

                                                    }
                                                ?>

                                            </div>
                                        </aside>
                                <?php
                                    }
                                ?>

                            </div>

                        </div>
                    </div>
                <?php
            }else{
                ?>
                    <div class="container">
                        <div class="row">

                            <!-- page section -->
                            <div class="col-layout">

                                <section id="gourmand-content">
                                    <div class="gourmand-content">

                                        <h2><?php echo esc_html( apply_filters( 'gourmand_not_found_message', __( 'Resource not found', 'gourmand' ) ) ); ?></h2>

                                        <p><?php echo esc_html( apply_filters( 'gourmand_not_found_description', __( 'We apologize but this page, post or resource does not exist or can not be found.', 'gourmand' ) ) ); ?></p>

                                    </div>
                                </section>

                                <?php
                                    $layout     = gourmand_mod::get( 'blog-layout' );
                                    $sidebar    = gourmand_mod::get( 'blog-sidebar' );

                                    if( $layout == 'left' || $layout == 'right' ){
                                ?>
                                        <aside id="gourmand-sidebar">
                                            <div class="gourmand-sidebar">

                                                <?php
                                                    if ( dynamic_sidebar( esc_attr( $sidebar ) ) ){

                                                    }
                                                ?>

                                            </div>
                                        </aside>
                                <?php
                                    }
                                ?>

                            </div>

                        </div>
                    </div>
                <?php
            }
        ?>

    </div><!-- end wrapper -->

<?php gourmand_template::footer( 'front-page' ); ?>
