<?php
add_action( 'init', 'register_class_new' );
function register_class_new() {
	$class_new_label = array(
			'name' => _x('Lớp mới', 'Lớp mới'),
			'singular_name' => _x('Lớp mới', 'Lớp mới'),
			'add_new' => _x('Add New', 'Add New'),
			'add_new_item' => __('Thêm mới'),
			'edit_item' => __('Sửa '),
			'new_item' => __('Thêm mới'),
			'all_items' => __('Xem tất cả'),
			'view_item' => __('Xem'),
			'search_items' => __('Search'),
			'not_found' =>  __('Not Find'),
			'not_found_in_trash' => __('Not Find in Trash'),
			'parent_item_colon' => '',
		    'menu_name' => 'Lớp mới'
	);
	$class_new= array(
			'labels' => $class_new_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus'=>true,
			'query_var' => true,
			'rewrite' =>  array('slug'=>'lop-moi'),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'taxonomy'		=>array(''),
			'supports' => array('title')
	);
	register_post_type('lop-moi',$class_new);
}


add_action( 'init', 'register_tim_giasu' );
function register_tim_giasu() {
	$tim_giasu_label = array(
			'name' => _x('Tìm gia sư', 'Tìm gia sư'),
			'singular_name' => _x('Tìm gia sư', 'Tìm gia sư'),
			'add_new' => _x('Add New', 'Add New'),
			'add_new_item' => __('Thêm mới'),
			'edit_item' => __('Sửa '),
			'new_item' => __('Thêm mới'),
			'all_items' => __('Xem tất cả'),
			'view_item' => __('Xem'),
			'search_items' => __('Search'),
			'not_found' =>  __('Not Find'),
			'not_found_in_trash' => __('Not Find in Trash'),
			'parent_item_colon' => '',
		    'menu_name' => 'Tìm gia sư'
	);
	$tim_giasu= array(
			'labels' => $tim_giasu_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus'=>true,
			'query_var' => true,
			'rewrite' =>  array('slug'=>'tim-gia-su'),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'taxonomy'		=>array(''),
			'supports' => array('title')
	);
	register_post_type('tim-gia-su',$tim_giasu);
}

add_action( 'init', 'register_giasu' );
function register_giasu() {
	$giasu_label = array(
			'name' => _x('Gia sư online', 'Gia sư online'),
			'singular_name' => _x('Gia sư online', 'Gia sư online'),
			'add_new' => _x('Add New', 'Add New'),
			'add_new_item' => __('Thêm mới'),
			'edit_item' => __('Sửa '),
			'new_item' => __('Thêm mới'),
			'all_items' => __('Xem tất cả'),
			'view_item' => __('Xem'),
			'search_items' => __('Search'),
			'not_found' =>  __('Not Find'),
			'not_found_in_trash' => __('Not Find in Trash'),
			'parent_item_colon' => '',
		    'menu_name' => 'Gia sư online'
	);
	$giasu= array(
			'labels' => $giasu_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus'=>true,
			'query_var' => true,
			'rewrite' =>  array('slug'=>'gia-su-online'),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => 5,
			'taxonomy'		=>array(''),
			'supports' => array('title')
	);
	register_post_type('gia-su-online',$giasu);
}


