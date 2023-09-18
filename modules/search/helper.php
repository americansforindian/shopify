<?php

    add_action('wp_ajax_trendz_search_data_fetch' , 'trendz_search_data_fetch');
	add_action('wp_ajax_nopriv_trendz_search_data_fetch','trendz_search_data_fetch');
	function trendz_search_data_fetch(){

    $search_val = trendz_sanitization($_POST['search_val']);

	$the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => $search_val, 'post_type' => array('post', 'product') ) );
	if( $the_query->have_posts() ) :
		while( $the_query->have_posts() ): $the_query->the_post(); ?>
			<li class="quick_search_data_item">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_post_thumbnail( 'thumbnail', array( 'class' => ' ' ) ); 
						the_title( '<h6>', '</h6>' );
					?>
				</a>
			</li>
		<?php endwhile;
		wp_reset_postdata();

	else:

		echo'<p> No Results Found</p>';

	endif;

	die();
}
