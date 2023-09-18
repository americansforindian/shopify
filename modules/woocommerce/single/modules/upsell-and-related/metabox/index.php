<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Trendz_Shop_Metabox_Single_Upsell_Related' ) ) {
    class Trendz_Shop_Metabox_Single_Upsell_Related {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

			add_filter( 'trendz_shop_product_custom_settings', array( $this, 'trendz_shop_product_custom_settings' ), 10 );

		}

        function trendz_shop_product_custom_settings( $options ) {

			$ct_dependency      = array ();
			$upsell_dependency  = array ( 'show-upsell', '==', 'true');
			$related_dependency = array ( 'show-related', '==', 'true');
			if( function_exists('trendz_shop_single_module_custom_template') ) {
				$ct_dependency['dependency'] 	= array ( 'product-template', '!=', 'custom-template');
				$upsell_dependency 				= array ( 'product-template|show-upsell', '!=|==', 'custom-template|true');
				$related_dependency 			= array ( 'product-template|show-related', '!=|==', 'custom-template|true');
			}

			$product_options = array (

				array_merge (
					array(
						'id'         => 'show-upsell',
						'type'       => 'select',
						'title'      => esc_html__('Show Upsell Products', 'trendz'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-upsell' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
							'true'         => esc_html__( 'Show', 'trendz'),
							null           => esc_html__( 'Hide', 'trendz'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'upsell-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Column', 'trendz'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
						1              => esc_html__( 'One Column', 'trendz' ),
						2              => esc_html__( 'Two Columns', 'trendz' ),
						3              => esc_html__( 'Three Columns', 'trendz' ),
						4              => esc_html__( 'Four Columns', 'trendz' ),
					),
					'dependency' => $upsell_dependency
				),

				array(
					'id'         => 'upsell-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Limit', 'trendz'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
						1              => esc_html__( 'One', 'trendz' ),
						2              => esc_html__( 'Two', 'trendz' ),
						3              => esc_html__( 'Three', 'trendz' ),
						4              => esc_html__( 'Four', 'trendz' ),
						5              => esc_html__( 'Five', 'trendz' ),
						6              => esc_html__( 'Six', 'trendz' ),
						7              => esc_html__( 'Seven', 'trendz' ),
						8              => esc_html__( 'Eight', 'trendz' ),
						9              => esc_html__( 'Nine', 'trendz' ),
						10              => esc_html__( 'Ten', 'trendz' ),
					),
					'dependency' => $upsell_dependency
				),

				array_merge (
					array(
						'id'         => 'show-related',
						'type'       => 'select',
						'title'      => esc_html__('Show Related Products', 'trendz'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-related' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
							'true'         => esc_html__( 'Show', 'trendz'),
							null           => esc_html__( 'Hide', 'trendz'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'related-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Column', 'trendz'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
						2              => esc_html__( 'Two Columns', 'trendz' ),
						3              => esc_html__( 'Three Columns', 'trendz' ),
						4              => esc_html__( 'Four Columns', 'trendz' ),
					),
					'dependency' => $related_dependency
				),

				array(
					'id'         => 'related-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Limit', 'trendz'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'trendz' ),
						1              => esc_html__( 'One', 'trendz' ),
						2              => esc_html__( 'Two', 'trendz' ),
						3              => esc_html__( 'Three', 'trendz' ),
						4              => esc_html__( 'Four', 'trendz' ),
						5              => esc_html__( 'Five', 'trendz' ),
						6              => esc_html__( 'Six', 'trendz' ),
						7              => esc_html__( 'Seven', 'trendz' ),
						8              => esc_html__( 'Eight', 'trendz' ),
						9              => esc_html__( 'Nine', 'trendz' ),
						10              => esc_html__( 'Ten', 'trendz' ),
					),
					'dependency' => $related_dependency
				)

			);

			$options = array_merge( $options, $product_options );

			return $options;

		}

    }
}

Trendz_Shop_Metabox_Single_Upsell_Related::instance();