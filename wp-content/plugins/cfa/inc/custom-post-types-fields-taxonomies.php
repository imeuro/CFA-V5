<?php
// Register Custom Post Type


//////////////////////////////////////
//
//  v 1.6 post type for CFA Authors
//
//////////////////////////////////////


// Register Custom Post Type
function CFA_custom_post_type() {

	$labels = array(
		'name'                => _x( 'CFA Authors', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'CFA Author', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'CFA Authors', 'text_domain' ),
		'name_admin_bar'      => __( 'CFA Authors', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'CFA Author', 'text_domain' ),
		'description'         => __( 'CFA Authors', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-businessman',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);



	$labels2 = array(
		'name'                  => _x( 'translations', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'translation', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Translations', 'text_domain' ),
		'name_admin_bar'        => __( 'Translations', 'text_domain' ),
		'archives'              => __( 'Translations Archives', 'text_domain' ),
		'attributes'            => __( 'Translations Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Translations:', 'text_domain' ),
		'all_items'             => __( 'All Translations', 'text_domain' ),
		'add_new_item'          => __( 'Add New Translation', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Translation', 'text_domain' ),
		'edit_item'             => __( 'Edit Translation', 'text_domain' ),
		'update_item'           => __( 'Update Translation', 'text_domain' ),
		'view_item'             => __( 'View Translation', 'text_domain' ),
		'view_items'            => __( 'View Translations', 'text_domain' ),
		'search_items'          => __( 'Search Translation', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Translation', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Translation', 'text_domain' ),
		'items_list'            => __( 'Translations list', 'text_domain' ),
		'items_list_navigation' => __( 'Translations list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Translations list', 'text_domain' ),
	);
	$rewrite2 = array(
		'slug'                  => 'it',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args2 = array(
		'label'                 => __( 'translation', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels2,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-translation',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'ita',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite2,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);


	register_post_type( 'cfa_authors', $args );
	register_post_type( 'cfa_translations', $args2 );

}
add_action( 'init', 'CFA_custom_post_type', 0 );



?>