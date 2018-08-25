<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */

if( !class_exists( 'gourmand_upsell' ) ){
	final class gourmand_upsell {

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance -> setup_actions();
			}

			return $instance;
		}

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __construct() {}

		/**
		 * Sets up initial actions.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function setup_actions() {

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'sections' ) );

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		}

		/**
		 * Sets up the customizer sections.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $manager
		 * @return void
		 */
		public function sections( $manager ) {

			// Register custom section types.
			$manager -> register_section_type( 'gourmand_customize_pro_section' );

			// Register sections.
			$manager -> add_section( new gourmand_customize_pro_section( $manager, 'pro-section', array(
				'title'		=> esc_html__( 'Gourmand Pro', 'gourmand' ),
				'desc'		=> esc_html__( 'full compatible with current version', 'gourmand' ),
				'pro_text'	=> esc_html__( 'Go PRO', 'gourmand' ),
				'pro_url'	=> 'http://mythem.es/item/gourmand/?utm_source=gourmand-go-pro&amp;utm_medium=customize&amp;utm_campaign=analiza-tema&amp;utm_content=button',
				'priority'	=> 200
			)));
		}

		/**
		 * Loads theme customizer CSS.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */

		public function enqueue_control_scripts(){
			wp_enqueue_script( 'customize-pro-section', trailingslashit( get_template_directory_uri() ) . 'assets/theme/js/customize-pro-section.js', array( 'customize-controls' ) );
			wp_enqueue_style( 'customize-pro-section', trailingslashit( get_template_directory_uri() ) . 'assets/theme/css/customize-pro-section.css', null, '0.0.14' );
		}
	}
}
