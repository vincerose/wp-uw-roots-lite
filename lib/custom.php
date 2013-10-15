<?php
/**
 * Custom functions
 */
function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'posts_to_pages',
		'from' => 'post',
		'to' => 'page',
		'sortable' => any
	) );
}
add_action( 'p2p_init', 'my_connection_types' );

function remove_gravityforms_style() { 
	wp_dequeue_style('gforms_css');
}
add_action('wp_print_styles', 'remove_gravityforms_style');

