<?php
add_action( 'trendz_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'trendz-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, TRENDZ_THEME_VERSION, 'all');
}

add_action( 'trendz_footer', 'footer_content' );
function footer_content() {
    trendz_template_part( 'content', 'content', 'footer' );
}