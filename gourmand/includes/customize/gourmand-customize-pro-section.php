<?php
/**
 * Pro customizer section.
 *
 * @since  1.0.0
 * @access public
 */

if( !class_exists( 'gourmand_customize_pro_section' ) ){
	class gourmand_customize_pro_section extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $type = 'pro-section';

		/**
		 * Section Description.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $desc = '';

		/**
		 * Custom button text to output.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $pro_text = '';

		/**
		 * Custom pro button URL.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $pro_url = '';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function json() {
			$json = parent::json();

			$json['desc']		= $this -> desc;
			$json['pro_text']	= $this -> pro_text;
			$json['pro_url']	= esc_url( $this -> pro_url );

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
					
					{{ data.title }}

					<# if ( data.desc ) { #>
						<small>{{ data.desc }}</small>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}
