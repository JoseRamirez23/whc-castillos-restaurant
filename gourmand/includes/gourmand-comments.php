<?php

	if( !class_exists( 'gourmand_comments' ) ){

		class gourmand_comments
		{
			/* DUSQUSE */
			/* FACEBOOK */
			/* WORDPRESS */
			static function classic( $comment, $args, $depth )
		    {
		        global $post;

				$file = get_stylesheet_directory() . '/assets/skins/default/img/default-avatar.png';
				$avatar = get_stylesheet_directory_uri() . '/assets/skins/default/img/default-avatar.png';

				if( !file_exists( $file ) )
		        	$avatar = get_template_directory_uri() . '/assets/skins/default/img/default-avatar.png';

		        switch ( $comment -> comment_type ) {
		            case '' : {
		                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
		                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
		                echo '<header>';
		                echo get_avatar( $comment -> comment_author_email , 80, $avatar );
		                echo '<span class="tempo-comment-meta">';

		                comment_reply_link( array_merge( $args , array(
		                    'reply_text'    => __( 'Reply', 'gourmand' ),
		                    'before'        => '<span class="comment-replay">',
		                    'after'         => '</span>',
		                    'depth'         => (int)$depth
		                )));

		                echo '<cite>';

						echo '<span class="author-wrapper">';
		                echo get_comment_author_link( $comment -> comment_ID );
						echo '</span>';

						if( $comment -> user_id == $post -> post_author ){
		                    echo '<span class="author-tag">' . esc_html( 'Author' , 'gourmand' ) . '</span>';
		                }

		                echo '</cite>';

		                echo '<time datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
						echo '<span class="tempo-comment-date">' . get_comment_date( esc_attr( get_option( 'date_format' ) ), $comment -> comment_ID ) . '</span>';
		                echo '<span class="tempo-comment-time">' . get_comment_date( esc_attr( get_option( 'time_format' ) ), $comment -> comment_ID ) . '</span>';
		                echo '</time>';

		                echo '</span>';
		                echo '</header>';

		                echo '<div class="comment-quote">';

		                if ( $comment -> comment_approved == '0' ) {
		                    echo '<em class="comment-awaiting-moderation">';
		                    esc_html_e( 'Your comment is awaiting moderation.' , 'gourmand' );
		                    echo '</em>';
		                }

		                echo get_comment_text();

		                echo '</div>';

		                echo '</div>';
		                break;
		            }
		            default : {
		                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
		                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
		                echo '<header>';
		                echo '<span class="tempo-comment-meta">';
		                echo '<cite>';
		                echo get_comment_author_link( $comment -> comment_ID );
		                echo '</cite>';
		                echo '<time datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
		                echo sprintf( __( 'Posted on %1$s %2$s', 'gourmand' ), '<span class="tempo-comment-time">' . get_comment_date( esc_attr( get_option( 'time_format' ) ), absint( $comment -> comment_ID ) ) . '</span>', '<span class="tempo-comment-date">' . get_comment_date( esc_attr( get_option( 'date_format' ) ) , $comment -> comment_ID ) . '</span>' );
		                echo '</time>';

		                echo '</span>';
		                echo '<div class="clear clearfix"></div>';
		                echo '</header>';

		                echo '<div class="comment-quote">';
		                echo get_comment_text();
		                echo '</div>';

		                echo '</div>';
		                break;
		            }
		        }
		    }
		}

	}
?>
