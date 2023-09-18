<?php

if( ! function_exists('trendz_event_breadcrumb_title') ) {
    function trendz_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'trendz' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'trendz_breadcrumb_title', 'trendz_event_breadcrumb_title', 20, 1 );
}

?>