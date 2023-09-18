<div id="comments" class="comments-area">
<?php
    if ( have_comments() ) {
        echo '<h3>';
            comments_number(esc_html__('No Comments','trendz'), esc_html__('Comments ( 1 )','trendz'), esc_html__('Comments ( % )','trendz') );
        echo '</h3>';

        the_comments_navigation();

        echo '<ul class="commentlist">';
            wp_list_comments( array( 'avatar_size' => 50 ) );
        echo '</ul>';

        the_comments_navigation();
    }

    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
        echo '<p class="nocomments">';
            esc_html_e( 'Comments are closed.','trendz');
        echo '</p>';
    }

    comment_form( apply_filters('trendz_comment_form_args', array() ) );?>
</div>