<?php

	/**
	 *	Gourmand Footer Copyright
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

?>
	<div id="gourmand-copyright" class="footer-copyright">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">

					<p>
						<?php

							/**
							 *
							 *  Content Copyright
							 *  Customer can overwrite Content Copyright from the theme options
							 *
							 *  Appearance / Customize / Footer / Copyright - option "Content Copyright"
							 */
						?>

						<span class="content"><?php echo gourmand_mod::get( 'content-copyright' ); ?></span>

						<?php

							/**
							 *
							 *  Gourmand WordPress Theme Copyright and Credit Link
							 *
							 *  We strongly recommend do not alter, modify, change or / and overwrite this section.
							 *  Also we strongly recommend do not alter, modify, change or / and overwrite the visual
							 *  appearance for this section by using css rules or JavaScript code.
							 *
							 *  Before make some changes to this section please consult
							 *  the license terms of use. Also you can discuss this with
							 *  your law consultant.
							 *
							 *  @link : http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
							 */
						?>

						<span class="author"><?php echo gourmand_mod::get( 'author-copyright' ); ?></span>
					</p>

				</div>

			</div>
		</div>
	</div>
