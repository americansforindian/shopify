<?php

/**
 * Product single template option
 **/

if( ! function_exists( 'trendz_shop_woo_product_single_template_option' ) ) {

	function trendz_shop_woo_product_single_template_option() {

		if(is_singular('product')) {

			if( function_exists( 'trendz_shop_woo_product_single_custom_template_option' ) ) {
				return trendz_shop_woo_product_single_custom_template_option();
			} else {
				return 'woo-default';
			}

		}

		return false;

	}

}