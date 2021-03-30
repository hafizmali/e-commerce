<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
if ( have_comments() || comments_open() ) : ?>
    <div class="comments margin-top-80">
    	<?php if ( have_comments()){ ?>
        	<h5 class="shop-tittle margin-bottom-30"><?php esc_attr_e('COMMENTS','ecoshop'); ?></h5>
        <?php } ?>
        <ul class="media-list padding-left-15">
            <?php  wp_list_comments(array(
                'type' => 'all',
                'short_ping' => true,
                'callback' => 'ecoshop_comment'
            )); ?>
        </ul>
        <div class="clear clearfix"></div>
        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h5 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'ecoshop' ); ?></h5>
                <div class="nav-previous col-sm-6"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'ecoshop' ) ); ?></div>
                <div class="nav-next col-sm-6 text-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'ecoshop' ) ); ?></div>
            </nav>
        <?php endif; ?>
        <!-- Comments Form -->
        <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $fields =  array(
            'author' =>
            '<li class="col-sm-4">
                <label>'.esc_html__('Name','ecoshop').'
            <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'"/>
        </label>
    </li>',
            'email' =>
            '<li class="col-sm-4">
                <label>'.esc_html__('Email','ecoshop').'
            <input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/>
        </label>
    </li>',
            'url' =>
            '<li class="col-sm-4">
                <label>'.esc_html__('Website','ecoshop').'
            <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/>
        </label>
    </li>',
        );
        $args = array(
            'id_form'           => 'commentform',
            'class_form'      => '',
            'id_submit'         => 'submit',
            'class_submit'      => 'btn',
            'name_submit'       => 'submit',
            'title_reply'       => '',
            'title_reply_to'    => '',
            'cancel_reply_link' => '',
            'comment_notes_after' => '',
            'comment_notes_before' => '',
            'label_submit'      => esc_html__( 'SUBMIT COMMENT','ecoshop' ),
            'format'            => 'xhtml',
            'comment_field' =>  '<li class="col-sm-12">
                <label>'.esc_html__('COMMENTS','ecoshop').'
                <textarea id="comment" class="form-control" name="comment" aria-required="true">' .
                '</textarea>
                </label>
                </li>',
            'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        ); ?>
        <?php if ( comments_open() ) : ?>
            <hr>
            <h5 class="shop-tittle margin-top-80" id="postYourComments"><?php esc_attr_e('POST YOUR COMMENTS','ecoshop'); ?></h5>
            <div>
                <ul class="row">
                    <?php comment_form($args); ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- End -->
    </div>
<?php endif; ?>