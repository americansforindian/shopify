<?php
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'trendz_after_main_css', 'sidebar_style' );
function sidebar_style() {
    wp_enqueue_style( 'trendz-secondary', get_theme_file_uri('/modules/sidebar/assets/css/sidebar.css'), false, TRENDZ_THEME_VERSION, 'all');
}

if( !function_exists( 'trendz_check_sidebar_has_active_widgets' ) ) {
	function trendz_check_sidebar_has_active_widgets() {

		$active_items = 0;
		$active_sidebars = trendz_get_active_sidebars();
		if(is_array($active_sidebars) && !empty($active_sidebars)) {
			foreach( $active_sidebars as $active_sidebar ) {
				if( is_active_sidebar( $active_sidebar ) ) {
					$active_items++;
				}
			}
		}

		if($active_items > 0) {
			return true;
		}

		return false;

	}
}

if( !function_exists( 'trendz_get_primary_classes' ) ) {
	function trendz_get_primary_classes() {
		$default = 'page-with-sidebar with-right-sidebar';
		if(trendz_check_sidebar_has_active_widgets()) {
			return apply_filters( 'trendz_primary_classes', $default );
		} else {
			return 'content-full-width';
		}
	}
}

if( !function_exists( 'trendz_get_secondary_classes' ) ) {
	function trendz_get_secondary_classes() {
		$default = 'secondary-sidebar secondary-has-right-sidebar';
		if(trendz_check_sidebar_has_active_widgets()) {
			return apply_filters( 'trendz_secondary_classes', $default );
		} else {
			return '';
		}
	}
}

if( !function_exists( 'trendz_get_active_sidebars' ) ) {
	function trendz_get_active_sidebars() {
		return apply_filters( 'trendz_active_sidebars', array( 'trendz-standard-sidebar-1' ) );
	}
}

add_action( 'widgets_init', 'trendz_sidebars' );
function trendz_sidebars() {
	$sidebars = array(
		'name'          => esc_html__( 'Standard Sidebar', 'trendz' ),
		'id'            => 'trendz-standard-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);

	if( !empty( $sidebars ) ) {
		register_sidebar( $sidebars );
	}
}

add_action( 'after_switch_theme', 'trendz_update_default_widgets' );
function trendz_update_default_widgets() {

	// Add widgets programmatically

	$sidebars_widgets = get_option('sidebars_widgets');
    if(isset($sidebars_widgets['trendz-standard-sidebar-1']) && !empty($sidebars_widgets['trendz-standard-sidebar-1'])) {
        return;
    }

	$sidebars_widgets['trendz-standard-sidebar-1'] = array (
		'search-1',
		'recent-posts-1',
		'recent-comments-1',
		'archives-1',
		'categories-1',
	);
	update_option('sidebars_widgets', $sidebars_widgets);

	$search_widget_content[1]['title'] = esc_html__( 'Search', 'trendz' );
	update_option( 'widget_search', $search_widget_content );

	$rp_widget_content[1]['title'] = esc_html__( 'Recent Posts', 'trendz' );
	update_option( 'widget_recent-posts', $rp_widget_content );

	$rc_widget_content[1]['title'] = esc_html__( 'Recent Comments', 'trendz' );
	update_option( 'widget_recent-comments', $rc_widget_content );

	$archives_widget_content[1]['title'] = esc_html__( 'Archives', 'trendz' );
	update_option( 'widget_archives', $archives_widget_content );

	$categories_widget_content[1]['title'] = esc_html__( 'Categories', 'trendz' );
	$categories_widget_content[1]['hierarchical'] = 1;
	update_option( 'widget_categories', $categories_widget_content );

}