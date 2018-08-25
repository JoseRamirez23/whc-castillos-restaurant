<?php

    $display = is_single() && gourmand_mod::get( 'post-comments' ) || is_page() && gourmand_mod::get( 'page-comments' );

    if( !$display )
        return;

    if( comments_open() ){

        if( is_user_logged_in() ){
            echo '<div id="comments" class="gourmand-comments-wrapper user-logged-in">';
        }
        else{
            echo '<div id="comments" class="gourmand-comments-wrapper user-not-logged-in">';
        }

        if ( post_password_required() ){
            echo '<p class="nopassword">';
            esc_html_e( 'This post is password protected. Enter the password to view any comments.' , 'gourmand' );
            echo '</p>';
            echo '</div>';
            return;
        }

        if( apply_filters( 'gourmand_custom_comments', false ) ){

            /**
             *  To customize your comments you can use filter
             *  gourmand_custom_comments
             */

            return;

        }

        /* IF EXISTS WORDPRESS COMMENTS */
        else if ( have_comments() ) {
            $nr = absint( get_comments_number() );

            echo '<div class="gourmand-comments-list-wrapper have-comments">';
            echo '<h3 class="gourmand-comments-title">';
            echo '<i class="gourmand-icon-chat-empty"></i>';
            esc_html_e( 'Comments', 'gourmand' );
            echo '</h3>';

            echo '<ol class="gourmand-comments-list">';

            wp_list_comments( array(
                'callback' => array( 'gourmand_comments' , 'classic' ),
                'style' => 'ul'
            ));

            echo '</ol>';
            echo '</div>';

            $args = array(
                'echo'      => false,
                'prev_text' => sprintf( __( '%1$s Prev' , 'gourmand' ) , '<i class="gourmand-icon-left-open-1"></i>' ),
                'next_text' => sprintf( __( 'Next %1$s' , 'gourmand' ) , '<i class="gourmand-icon-right-open-1"></i>' )
            );

            $pgn = paginate_comments_links( $args );

            /* WORDPRESS PAGINATION FOR COMMENTS */
            if( !empty( $pgn ) ){
                echo '<div class="pagination aligncenter comments">';
                echo '<nav class="gourmand-nav-inline">';
                echo $pgn;
                echo '</nav>';
                echo '</div>';
            }
        }

        if ( !have_comments() ) {

            /**
             *  If not found comments load custom template
             *  ../templates/comments/no-comments.php
             */

             echo '<div class="gourmand-comments-list-wrapper">';
             echo '<h3 class="gourmand-comments-title">';
             echo '<i class="gourmand-icon-info"></i>';
             esc_html_e( 'There are currently no comments.', 'gourmand' );
             echo '</h3>';

            //gourmand_get_template_part( 'templates/comments/no-comments' );
        }

        /* FORM SUBMIT COMMENTS */
        $commenter = wp_get_current_commenter();

        $name   = gourmand_esc::text( $commenter[ 'comment_author' ] ) ? gourmand_esc::text( $commenter[ 'comment_author' ] ) : null;
        $email  = gourmand_esc::email( $commenter[ 'comment_author_email' ] ) ? gourmand_esc::email( $commenter[ 'comment_author_email' ] ) : null;
        $web    = gourmand_esc::url( $commenter[ 'comment_author_url' ] ) ? gourmand_esc::url( $commenter[ 'comment_author_url' ] ) : null;

        /* FIELDS */
        $fields =  array(
            'author' => '<div class="field">'.
                        '<p class="comment-form-author input"><input class="required" value="' . gourmand_esc::text( $name ) . '" placeholder="' . __( 'Name (Required)', 'gourmand' ) . '" id="author" name="author" type="text" size="30"/></p>',
            'email'  => '<p class="comment-form-email input"><input class="required" value="' . gourmand_esc::email( $email ) . '" placeholder="' . __( 'Email (Required)', 'gourmand' ) . '" id="email" name="email" type="text" size="30" /></p>',
            'url'    => '<p class="comment-form-url input"><input value="' . gourmand_esc::url( $web ) . '" placeholder="' . __( 'Website URL', 'gourmand' ) . '" id="url" name="url" type="text" size="30"/></p><div class="clear clearfix"></div></div>'
        );

        $text = '';

        if ( !have_comments() ) {
            $text  = '<div class="textarea"><p class="comment-form-comment textarea">';
            $text .= '<textarea id="comment" name="comment" cols="45" rows="10" aria-required="true" placeholder="' . __( 'Be first! Add your comment here...', 'gourmand' ) . '"></textarea>';
            $text .= '</p></div>';
        }
        else{
            $text  = '<div class="textarea"><p class="comment-form-comment textarea">';
            $text .= '<textarea id="comment" name="comment" cols="45" rows="10" aria-required="true" placeholder="' . __( 'Add your comment here...', 'gourmand' ) . '"></textarea>';
            $text .= '</p></div>';
        }

        $args = array(
            'title_reply'           => '',
            'comment_notes_after'   => '',
            'comment_notes_before'  => '',
            'logged_in_as'          => '',
            'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
            'comment_field'         => $text,
            'label_submit'          => __( 'Submit Comment' , 'gourmand' )
        );

        echo '<div class="gourmand-comments">';
        comment_form( $args );
        echo '<div class="clearfix"></div>';
        echo '</div>';

        echo '</div>';
    }
?>
