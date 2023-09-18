<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!-- Entry Categories -->
<div class="entry-categories"><?php
	$cats = wp_get_object_terms($post_ID, 'category');
	if( !empty($cats) ):
		$count = count($cats);
		$out = '';
		foreach( $cats as $key => $term ) {
			$meta  = get_term_meta( $term->term_id, '_trendz_post_category_options', true );
			$color = ( isset( $meta['category-color'] ) && !empty( $meta['category-color'] ) ) ? 'style="color:'.$meta['category-color'].'"' : '';
			$out .= '<a href="'.get_term_link( $term->slug ,'category').'" '.esc_attr($color).'>'.esc_html( $term->name ).'</a>';
			$key += 1;

			if( $key !== $count ){
				$out .= ' ';
			}
		}
		echo "<i class='wdticon-folder'> </i>{$out}";
	endif; ?></div><!-- Entry Categories -->