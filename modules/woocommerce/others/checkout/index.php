<?php

/**
 * WooCommerce - Checkout Core Class
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Trendz_Shop_Others_Checkout' ) ) {

    class Trendz_Shop_Others_Checkout {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            // Load Modules
                $this->load_modules();

        }


        /*
        Module Paths
        */

            function module_dir_path() {

                if( trendz_is_file_in_theme( __FILE__ ) ) {
                    return TRENDZ_MODULE_DIR . '/woocommerce/others/checkout/';
                } else {
                    return trailingslashit( plugin_dir_path( __FILE__ ) );
                }

            }

            function module_dir_url() {

                if( trendz_is_file_in_theme( __FILE__ ) ) {
                    return TRENDZ_MODULE_URI . '/woocommerce/others/checkout/';
                } else {
                    return trailingslashit( plugin_dir_url( __FILE__ ) );
                }

            }

        /**
         * Load Modules
         */
            function load_modules() {

                // Includes
                include_once $this->module_dir_path(). 'includes/index.php';

            }

    }

}

if( !function_exists('trendz_shop_others_checkout') ) {
	function trendz_shop_others_checkout() {
        $reflection = new ReflectionClass('Trendz_Shop_Others_Checkout');
        return $reflection->newInstanceWithoutConstructor();
	}
}

Trendz_Shop_Others_Checkout::instance();