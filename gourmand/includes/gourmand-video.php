<?php
	if( !class_exists( 'gourmand_video' ) ){
		class gourmand_video
		{
			public static function is_uploaded( $id )
			{
				if( !absint( $id ) )
					return false;

				$media = get_post( absint( $id ) );

				return isset( $media -> ID ) && wp_attachment_is( 'video', $media );
			}

			public static function embed( $id )
			{
				global $wp_embed;

				$video 		= get_post( absint( $id ) );
				$shortcode 	= $wp_embed -> run_shortcode( "[embed]{$video->guid}[/embed]" );

		    	/**
		    	 *	Embed HTML5 Video
		    	 */

		    	if( preg_match( "/^\[video/", $shortcode ) ){
		    		$data 	= pathinfo( $video -> guid );
		    		$ext 	= 'mp4';
					$type 	= null;

		    		if( isset( $data[ 'extension' ] ) )
		    			$type = 'video/' . esc_attr( $data[ 'extension' ] );

					if( isset( $video -> post_mime_type ) && !empty( $video -> post_mime_type ) )
						$type = $video -> post_mime_type;

					if( empty( $type ) )
						$type = 'video/mp4';

					?>
                        <div class="gourmand-video-wrapper">
    						<video class="gourmand-video-embed" controls>
    							<source src="<?php echo esc_url( $video -> guid ); ?>" type="<?php echo esc_attr( $type ); ?>"/>
    						</video>
                        </div>
		    		<?php

				}

		    	/**
		    	 *	Embed Shortcode
		    	 */

		    	else{

                    ?>
                        <div class="gourmand-video-wrapper">
                            <?php echo $wp_embed -> run_shortcode( "[embed]{$video->guid}[/embed]" ); ?>
                        </div>
                    <?php
		    	}
			}

			public static function url( $url )
			{
				global $wp_embed;

				echo '<div class="gourmand-video-wrapper">';
				echo $wp_embed -> run_shortcode( "[embed]{$url}[/embed]" );
				echo '</div>';
			}
		}
	}
?>
