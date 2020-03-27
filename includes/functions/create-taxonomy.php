<?php
// Create Taxonomy
function increase_create_taxonomy() {
	
	register_taxonomy( 'increase_buildings', array( 'increase_apartments' ),
		array(
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'            => array(
				'slug' => __( 'buildings' , 'increase' ),
			),
			'labels'            => array(
				'name'              => _x( 'Buildings', 'taxonomy general name' ),
				'singular_name'     => _x( 'Building', 'taxonomy singular name' ),
			),
		)
	
	);
	
	register_taxonomy( 'increase_rooms', array( 'increase_apartments' ),
		array(
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'            => array(
				'slug' => __( 'rooms' , 'increase' ),
			),
			'labels'            => array(
				'name'              => _x( 'Rooms', 'taxonomy general name' ),
				'singular_name'     => _x( 'Room', 'taxonomy singular name' ),
			),
		)
	
	);
	
}

add_action( 'init', 'increase_create_taxonomy', 0 );