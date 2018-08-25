			<footer id="gourmand-footer">

				<?php

					/**
					 *	Footer Sections
					 */

					 $sections 	= (array)gourmand_config::get( "footer-sections" );
					 $sections 	= apply_filters( "gourmand_template_load_sections_footer", $sections );

					 foreach( $sections as $section => $args )
						 gourmand_template::partial( "templates/footer/sections/{$section}" );
				?>

				<?php if( gourmand_mod::get( 'scroll-top' ) ) : ?>

					<div class="gourmand-scroll-top">
						<a href="javascript:void(null);">
							<i class="gourmand-icon-up-open-mini"></i>
						</a>
					</div>

				<?php endif; ?>

			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>
</html>
