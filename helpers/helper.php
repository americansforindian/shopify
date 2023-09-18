<?php
if ( ! function_exists( 'trendz_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 */
	function trendz_template_part( $module, $template, $slug = '', $params = array() ) {
		echo trendz_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'trendz_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 */
	function trendz_get_template_part( $module, $template, $slug = '', $params = array() ) {

		$file_path = '';
		$html      =  '';

		$template_path = TRENDZ_MODULE_DIR . '/' . $module;
		$temp_path = $template_path . '/' . $template;

		if ( ! empty( $temp_path ) ) {
			if ( ! empty( $slug ) ) {
				$file_path = "{$temp_path}-{$slug}.php";
				if ( ! file_exists( $file_path ) ) {
					$file_path = $temp_path . '.php';
				}
			} else {
				$file_path = $temp_path . '.php';
			}
		}

		$file_path = apply_filters( 'trendz_get_template_plugin_part', $file_path, $module, $template, $slug);

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		if ( $file_path && file_exists( $file_path ) ) {
			ob_start();
			include( $file_path );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'trendz_get_page_id' ) ) {
	function trendz_get_page_id() {

		$page_id = get_queried_object_id();

		if( is_archive() || is_search() || is_404() || ( is_front_page() && is_home() ) ) {
			$page_id = -1;
		}

		return $page_id;
	}
}

/* Convert hexdec color string to rgb(a) string */
if ( ! function_exists( 'trendz_hex2rgba' ) ) {
	function trendz_hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		if(empty($color)) {
			return $default;
		}

		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		$rgb =  array_map('hexdec', $hex);

		if($opacity){
			if(abs($opacity) > 1) {
				$opacity = 1.0;
			}
			$output = implode(",",$rgb).','.$opacity;
		} else {
			$output = implode(",",$rgb);
		}

		return $output;

	}
}

if ( ! function_exists( 'trendz_html_output' ) ) {
	function trendz_html_output( $html ) {
		return apply_filters( 'trendz_html_output', $html );
	}
}


if ( ! function_exists( 'trendz_theme_defaults' ) ) {
	/**
	 * Function to load default values
	 */
	function trendz_theme_defaults() {

		$defaults = array (
			'primary_color' => '#000000',
			'primary_color_rgb' => trendz_hex2rgba('#000000', false),
			'secondary_color' => '#e9dfcb',
			'secondary_color_rgb' => trendz_hex2rgba('#e9dfcb', false),
			'tertiary_color' => '#d1c2bb',
			'tertiary_color_rgb' => trendz_hex2rgba('#d1c2bb', false),
			'body_bg_color' => '#ffffff',
			'body_bg_color_rgb' => trendz_hex2rgba('#ffffff', false),
			'body_text_color' => '#000000',
			'body_text_color_rgb' => trendz_hex2rgba('#000000', false),
			'headalt_color' => '#000000',
			'headalt_color_rgb' => trendz_hex2rgba('#000000', false),
			'link_color' => '#000000',
			'link_color_rgb' => trendz_hex2rgba('#000000', false),
			'link_hover_color' => '#565e41',
			'link_hover_color_rgb' => trendz_hex2rgba('#565e41', false),
			'border_color' => '#bfbfbf',
			'border_color_rgb' => trendz_hex2rgba('#bfbfbf', false),
			'accent_text_color' => '#ffffff',
			'accent_text_color_rgb' => trendz_hex2rgba('#ffffff', false),

			'body_typo' => array (
				'font-family' => "Work Sans",
				'font-fallback' => '"Work Sans", sans-serif',
				'font-weight' => 300,
				'fs-desktop' => 16,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.6,
				'lh-desktop-unit' => ''
			),
			'h1_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 60,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'h2_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 50,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'h3_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 36,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'h4_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 30,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'h5_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 24,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'h6_typo' => array (
				'font-family' => "Lato",
				'font-fallback' => '"Lato", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 20,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),
			'extra_typo' => array (
				'font-family' => "Kaushan Script",
				'font-fallback' => '"Kaushan Script", cursive',
				'font-weight' => 400,
				'fs-desktop' => 18,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.3,
				'lh-desktop-unit' => ''
			),

		);

		return $defaults;

	}
}