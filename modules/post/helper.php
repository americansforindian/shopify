<?php

if( !function_exists('trendz_single_post_params_default') ) {
    function trendz_single_post_params_default() {
        $params = array(
            'enable_title'   		 => 0,
            'enable_image_lightbox'  => 0,
            'enable_disqus_comments' => 0,
            'post_disqus_shortname'  => '',
            'post_dynamic_elements'  => array( 'content', 'author_bio', 'comment_box', 'navigation', 'related_posts' ),
            'post_commentlist_style' => 'rounded'
        );

        return $params;
    }
}

if( !function_exists('trendz_single_post_misc_default') ) {
    function trendz_single_post_misc_default() {
        $params = array(
            'enable_related_article'=> 0,
            'rposts_title'   		=> esc_html__('Related Posts', 'trendz'),
            'rposts_column'         => 'one-third-column',
            'rposts_count'          => 3,
            'rposts_excerpt'        => 0,
            'rposts_excerpt_length' => 18,
            'rposts_carousel'       => 0,
            'rposts_carousel_nav'   => ''
        );

        return $params;
    }
}

if( !function_exists('trendz_single_post_params') ) {
    function trendz_single_post_params() {
        $params = trendz_single_post_params_default();
        return apply_filters( 'trendz_single_post_params', $params );
    }
}

add_action( 'trendz_after_main_css', 'post_style' );
function post_style() {
    if( is_singular('post') || is_attachment() ) {
        wp_enqueue_style( 'trendz-post', get_theme_file_uri('/modules/post/assets/css/post.css'), false, TRENDZ_THEME_VERSION, 'all');

        $post_style = trendz_get_single_post_style( get_the_ID() );
        if ( file_exists( get_theme_file_path('/modules/post/templates/'.$post_style.'/assets/css/post-'.$post_style.'.css') ) ) {
            wp_enqueue_style( 'trendz-post-'.$post_style, get_theme_file_uri('/modules/post/templates/'.$post_style.'/assets/css/post-'.$post_style.'.css'), false, TRENDZ_THEME_VERSION, 'all');
        }
    }
}

if( !function_exists('trendz_get_single_post_style') ) {
	function trendz_get_single_post_style( $post_id ) {
		return apply_filters( 'trendz_single_post_style', 'minimal', $post_id );
	}
}

if( !function_exists('trendz_breadcrumb_template_part') ) {
    function trendz_breadcrumb_template_part($args, $post_id) {
        $post_style = trendz_get_single_post_style( get_the_ID() );
        if(is_single($post_id) && $post_style == 'simple') {
           return;
        } else{
            echo trendz_html_output($args);
        }
    }
    add_filter( 'trendz_breadcrumb_get_template_part', 'trendz_breadcrumb_template_part', 10, 2 );
}

if( ! function_exists( 'trendz_breadcrumb_header_wrapper_classes' )  ) {
	function trendz_breadcrumb_header_wrapper_classes($classes) {
        $post_id = get_the_ID();
        $post_style = trendz_get_single_post_style( $post_id );
        if(is_single($post_id) && $post_style == 'simple') {
            array_push($classes, 'wdt-no-breadcrumb');
        }
        return $classes;
	}
	add_filter( 'trendz_header_wrapper_classes', 'trendz_breadcrumb_header_wrapper_classes', 10, 1 );
}

add_action( 'trendz_after_main_css', 'trendz_single_post_enqueue_css' );
if( !function_exists( 'trendz_single_post_enqueue_css' ) ) {
    function trendz_single_post_enqueue_css() {

        wp_enqueue_style( 'trendz-magnific-popup', get_theme_file_uri('/modules/post/assets/css/magnific-popup.css'), false, TRENDZ_THEME_VERSION, 'all');
    }
}

add_action( 'trendz_before_enqueue_js', 'trendz_single_post_enqueue_js' );
if( !function_exists( 'trendz_single_post_enqueue_js' ) ) {
    function trendz_single_post_enqueue_js() {

        wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('/modules/post/assets/js/jquery.magnific-popup.js'), array(), false, true);
    }
}

add_filter('post_class', 'trendz_single_set_post_class', 10, 3);
if( !function_exists('trendz_single_set_post_class') ) {
    function trendz_single_set_post_class( $classes, $class, $post_id ) {

        if( is_singular('post') || is_attachment() ) {
        	$classes[] = 'blog-single-entry';
        	$classes[] = 'post-'.trendz_get_single_post_style( $post_id );
        }

        return $classes;
    }
}