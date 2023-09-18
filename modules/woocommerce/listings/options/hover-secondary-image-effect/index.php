<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Trendz_Woo_Listing_Option_Hover_Secondary_Image_Effect' ) ) {

    class Trendz_Woo_Listing_Option_Hover_Secondary_Image_Effect extends Trendz_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-hover-secondary-image-effect';
            $this->option_name          = esc_html__('Hover Secondary Image Effect', 'trendz');
            $this->option_default_value = 'product-hover-secimage-fade';
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_value_prefix  = 'product-hover-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'trendz_woo_custom_product_template_hover_options', array( $this, 'woo_custom_product_template_hover_options'), 15, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_hover_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'hover';
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
                'product-hover-secimage-fade'         => esc_html__('Fade', 'trendz'),
                'product-hover-secimage-zoomin'       => esc_html__('Zoom In', 'trendz'),
                'product-hover-secimage-zoomout'      => esc_html__('Zoom Out', 'trendz'),
                'product-hover-secimage-zoomoutup'    => esc_html__('Zoom Out Up', 'trendz'),
                'product-hover-secimage-zoomoutdown'  => esc_html__('Zoom Out Down', 'trendz'),
                'product-hover-secimage-zoomoutleft'  => esc_html__('Zoom Out Left', 'trendz'),
                'product-hover-secimage-zoomoutright' => esc_html__('Zoom Out Right', 'trendz'),
                'product-hover-secimage-pushup'       => esc_html__('Push Up', 'trendz'),
                'product-hover-secimage-pushdown'     => esc_html__('Push Down', 'trendz'),
                'product-hover-secimage-pushleft'     => esc_html__('Push Left', 'trendz'),
                'product-hover-secimage-pushright'    => esc_html__('Push Right', 'trendz'),
                'product-hover-secimage-slideup'      => esc_html__('Slide Up', 'trendz'),
                'product-hover-secimage-slidedown'    => esc_html__('Slide Down', 'trendz'),
                'product-hover-secimage-slideleft'    => esc_html__('Slide Left', 'trendz'),
                'product-hover-secimage-slideright'   => esc_html__('Slide Right', 'trendz'),
                'product-hover-secimage-hingeup'      => esc_html__('Hinge Up', 'trendz'),
                'product-hover-secimage-hingedown'    => esc_html__('Hinge Down', 'trendz'),
                'product-hover-secimage-hingeleft'    => esc_html__('Hinge Left', 'trendz'),
                'product-hover-secimage-hingeright'   => esc_html__('Hinge Right', 'trendz'),
                'product-hover-secimage-foldup'       => esc_html__('Fold Up', 'trendz'),
                'product-hover-secimage-folddown'     => esc_html__('Fold Down', 'trendz'),
                'product-hover-secimage-foldleft'     => esc_html__('Fold Left', 'trendz'),
                'product-hover-secimage-foldright'    => esc_html__('Fold Right', 'trendz'),
                'product-hover-secimage-fliphoriz'    => esc_html__('Flip Horizontal', 'trendz'),
                'product-hover-secimage-flipvert'     => esc_html__('Flip Vertical', 'trendz')
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('trendz_woo_listing_option_hover_secondary_image_effect') ) {
	function trendz_woo_listing_option_hover_secondary_image_effect() {
		return Trendz_Woo_Listing_Option_Hover_Secondary_Image_Effect::instance();
	}
}

trendz_woo_listing_option_hover_secondary_image_effect();