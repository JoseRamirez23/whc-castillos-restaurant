<style type="text/css" id="hyphens">
    <?php if( gourmand_mod::is_set( 'website-auto-hyphens' ) ) : ?>

        <?php if( gourmand_mod::get( 'website-auto-hyphens' ) ) : ?>
            *{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

		<?php do_action( 'gourmand_header_case_1_auto_hyphens' ); ?>

        <?php if( gourmand_mod::is_set( 'headings-auto-hyphens' ) && gourmand_mod::get( 'headings-auto-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php else : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>

        <?php if( gourmand_mod::is_set( 'content-auto-hyphens' ) && gourmand_mod::get( 'content-auto-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( gourmand_mod::is_set( 'headings-auto-hyphens' ) && gourmand_mod::get( 'headings-auto-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>

        <?php else : ?>
            .hentry{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>


    <?php else : ?>

        <?php do_action( 'gourmand_header_case_2_auto_hyphens' ); ?>

        <?php if( gourmand_mod::is_set( 'headings-auto-hyphens' ) && gourmand_mod::get( 'headings-auto-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( gourmand_mod::is_set( 'content-auto-hyphens' ) && gourmand_mod::get( 'content-auto-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( gourmand_mod::is_set( 'headings-auto-hyphens' ) && gourmand_mod::get( 'headings-auto-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
</style>
