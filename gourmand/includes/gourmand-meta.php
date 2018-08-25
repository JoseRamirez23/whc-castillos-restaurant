<?php

	/**
	 *  Gourmand Post Meta
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

	if( !class_exists( 'gourmand_meta' ) ){

		class gourmand_meta
		{
		    static function val( $post_id, $metakey )
		    {
		        return get_post_meta( $post_id , $metakey , true );
		    }

		    static function get( $post_id, $metakey, $default = null )
		    {
				$meta = get_post_meta( $post_id , $metakey );
				$rett = $default;

				if( isset( $meta[ 0 ] ) )
					$rett = $meta[ 0 ];

		        return $rett;
		    }

		    static function set( $post_id, $metakey, $value )
		    {
	            add_post_meta( $post_id , $metakey , $value, true );
	            update_post_meta( $post_id , $metakey , $value );
		    }


		    static function delete( $post_id, $metakey )
		    {
		        delete_post_meta( $post_id, $metakey );
		    }
		}
	}
?>
