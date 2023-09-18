<?php
/**
 * Listing Options - Icons Group - Icons
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Trendz_Woo_Listing_Option_Thumb_Iconsgroup_Icons' ) ) {

    class Trendz_Woo_Listing_Option_Thumb_Iconsgroup_Icons extends Trendz_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

            $this->option_slug          = 'product-thumb-iconsgroup-icons';
            $this->option_name          = esc_html__('Icons Group - Icons', 'trendz');
            $this->option_type          = array ( 'html', 'value-css' );
            $this->option_default_value = '';
            $this->option_value_prefix  = '';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'trendz_woo_custom_product_template_thumb_options', array( $this, 'woo_custom_product_template_thumb_options'), 20, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_thumb_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'thumb';
        }

        /**
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'cart'      => esc_html__('Cart', 'trendz'),
                'wishlist'  => esc_html__('Wishlist', 'trendz'),
                'compare'   => esc_html__('Compare', 'trendz'),
                'quickview' => esc_html__('Quick View', 'trendz')
            );
            $settings['class']      = 'chosen';
            $settings['attributes'] = array( 'multiple' => 'multiple' );
            $settings['default']    =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('trendz_woo_listing_option_thumb_iconsgroup_icons') ) {
	function trendz_woo_listing_option_thumb_iconsgroup_icons() {
		return Trendz_Woo_Listing_Option_Thumb_Iconsgroup_Icons::instance();
	}
}

trendz_woo_listing_option_thumb_iconsgroup_icons();