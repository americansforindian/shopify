<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Trendz WordPress theme
 */

function trendz_tgmpa_plugins_register() {

	// Get array of recommended plugins.
	$plugins_list = array(
        array(
            'name'               => esc_html__('Trendz Plus', 'trendz'),
            'slug'               => 'trendz-plus',
            'source'             => TRENDZ_MODULE_DIR . '/plugins/trendz-plus.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Trendz Pro', 'trendz'),
            'slug'               => 'trendz-pro',
            'source'             => TRENDZ_MODULE_DIR . '/plugins/trendz-pro.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'trendz'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'trendz'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => TRENDZ_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Portfolio', 'trendz'),
            'slug'               => 'wedesigntech-portfolio',
            'source'             => TRENDZ_MODULE_DIR . '/plugins/wedesigntech-portfolio.zip',
            'required'           => false,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('WooCommerce', 'trendz'),
            'slug'     => 'woocommerce',
            'required' => true,
        ),
        array(
            'name'               => esc_html__('Trendz Shop', 'trendz'),
            'slug'               => 'trendz-shop',
            'source'             => TRENDZ_MODULE_DIR . '/plugins/trendz-shop.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Wishlist', 'trendz'),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Compare', 'trendz'),
            'slug'     => 'yith-woocommerce-compare',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'trendz'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Unyson', 'trendz'),
            'slug'     => 'unyson',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('FOX - Currency Switcher Professional for WooCommerce', 'trendz'),
            'slug'     => 'woocommerce-currency-switcher',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Variation Swatches for WooCommerce', 'trendz'),
            'slug'     => 'woo-variation-swatches',
            'required' => false,
        )
	);

	$plugins = apply_filters('trendz_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'trendz_theme',
		'domain'       => 'trendz',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'trendz_tgmpa_plugins_register' );