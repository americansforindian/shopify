<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Trendz_Woo_Listing_Option_Show_Offer_Percentage' ) ) {

    class Trendz_Woo_Listing_Option_Show_Offer_Percentage extends Trendz_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-show-offer-percentage';
            $this->option_name          = esc_html__('Show Product Offer Percentage', 'trendz');
            $this->option_type          = array ( 'html', 'class', 'value-css' );
            $this->option_default_value = '';
            $this->option_value_prefix  = '';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'trendz_woo_custom_product_template_common_options', array( $this, 'woo_custom_product_template_common_options'), 80, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_common_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'common';
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
                ''        => esc_html__('None', 'trendz'),
                'thumb'   => esc_html__('Thumb', 'trendz'),
                'content' => esc_html__('Content', 'trendz'),
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('trendz_woo_listing_option_show_offer_percentage') ) {
	function trendz_woo_listing_option_show_offer_percentage() {
		return Trendz_Woo_Listing_Option_Show_Offer_Percentage::instance();
	}
}

trendz_woo_listing_option_show_offer_percentage();