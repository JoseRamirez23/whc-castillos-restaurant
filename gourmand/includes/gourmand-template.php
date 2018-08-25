<?php

	if( !class_exists( 'gourmand_template' ) ){

		class gourmand_template
		{
			/**
			 *	Get Content From Args
			 */

			public static function content( $args )
			{
				$rett = '';

				if( isset( $args[ 'template' ] ) && !empty( $args[ 'template' ] ) ){
					ob_start();

					if( is_array( $args[ 'template' ] ) && count( $args[ 'template' ] ) == 2 ){
						gourmand_template::partial( $args[ 'template' ][ 0 ], $args[ 'template' ][ 1 ] );
					}
					else{
						gourmand_template::partial( $args[ 'template' ] );
					}

					$rett .= ob_get_clean();
				}

				if( isset( $args[ 'content' ] ) && !empty( $args[ 'content' ] ) )
					$rett .= $args[ 'content' ];

				return $rett;
			}

			/**
			 *  Gourmand get Header with check action
			 *  you can overwrite the template from child themes and also
			 *  from plugins by using the action 'gourmand_template_header'
			 */

			public static function header( $name = null )
			{
				if( !apply_filters( 'gourmand_template_header', false, $name  ) )
					get_header( $name );
			}

			/**
			 *  Gourmand get Sidebar with check action
			 *  you can overwrite the template from child themes and also
			 *  from plugins by using the action 'gourmand_template_sidebar'
			 */

			public static function sidebar( $name = null )
			{
				if( !apply_filters( 'gourmand_template_sidebar', false, $name  ) )
					get_sidebar( $name );
			}

			/**
			 *  Gourmand get Template with check action
			 *  you can overwrite the template from child themes and also
			 *  from plugins by using the action 'gourmand_template_partial'
			 */

			public static function partial( $slug, $name = null )
 			{
				if( !apply_filters( 'gourmand_template_partial', false, $slug, $name  ) )
					get_template_part( $slug, $name );
 			}

			/**
			 *  Gourmand get Footer with check action
			 *  you can overwrite the template from child themes and also
			 *  from plugins by using the action 'gourmand_template_footer'
			 */

			public static function footer( $name = null )
			{
				if( !apply_filters( 'gourmand_template_footer', false, $name  ) )
					get_footer( $name );
			}
		}
	}
?>
