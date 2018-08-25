<?php

	/**
	 *  Tab Control.
	 *
	 *	Multiple Settings (adding dynamically)
	 *
	 *  @creaded    october 11, 2017
	 *  @updated    october 11, 2017
	 *
	 *  @package 	Gourmand
	 *  @since      Gourmand 0.0.2
	 *  @version    0.0.1
	 */

	if( !class_exists( 'gourmand_wp_customize_tab_control' ) && class_exists( 'gourmand_wp_customize_control' ) ){

		class gourmand_wp_customize_tab_control extends gourmand_wp_customize_control
		{
			public $title;
			public $description;
			public $fields;
			public $type = 'tab';
			public $args;

			public function __construct( $manager, $id, $args = array() )
			{
				if( isset( $manager -> status ) && $manager -> status == 'empty' )
					return;

				parent::__construct( $manager, $id, $args );

				$this -> fields = isset( $args[ 'fields' ] ) ? (array)$args[ 'fields' ] : array();
			}

			public function render_content()
			{
				if( $this -> type == 'tab' ){

					if( !is_array( $this -> fields ) || empty( $this -> fields ) )
						return;

					?>
						<div class="gourmand-tab collapsed">
							<div class="gourmand-tab-head">
								<?php if( !empty( $this -> title ) ) : ?>
									<span class="customize-control-title"><?php echo esc_html( $this -> title ); ?></span>
								<?php endif; ?>
							</div>

							<div class="gourmand-tab-content" style="display: none;">

								<?php if( !empty( $this -> description ) ) : ?>
									<span class="customize-control-description"><?php echo gourmand_esc::desc( $this -> description ); ?></span>
								<?php endif; ?>

								<ul>
									<?php
										foreach( $this -> fields as $id => $args ){
											gourmand_customize_template_field::render( $id, $args, $this );
										}
									?>
								</ul>
								<div class="clear clearfix"></div>
							</div>
							<div class="clear clearfix"></div>
						</div>
					<?php
				}
			}

			//public function enqueue()
			//{
				/*wp_enqueue_media();

				wp_register_script( 'gourmand-uploader', get_template_directory_uri() . '/assets/theme/js/uploader.js', array( 'jquery' ), '0.0.1', true );
				wp_enqueue_script( 'gourmand-uploader' );

				wp_register_script( 'gourmand-customize-fields', get_template_directory_uri() . '/assets/theme/js/customize-fields.js', array( 'gourmand-uploader' ), '0.0.1', true );
				wp_enqueue_script( 'gourmand-customize-fields' );

				wp_register_style( 'gourmand-customize', get_template_directory_uri() . '/assets/theme/css/customize.css', null, '0.0.1', false );
				wp_enqueue_style( 'gourmand-customize' );*/
			//}

			public function get_input_attrs( $setting_key )
			{
				$rett = '';

				if( isset( $this -> fields[ $setting_key ] ) && isset( $this -> fields[ $setting_key ][ 'input_attrs' ] ) )
					foreach ( $this -> fields[ $setting_key ][ 'input_attrs' ] as $attr => $value ) {
						$rett .= $attr . '="' . esc_attr( $value ) . '" ';
					}

				return $rett;
			}
		}
	}
?>
