<?php
function aecode_register_custom_post_type() {

	//Post Types
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => 'Портфолио',
			'singular_name' => 'Портфолио',
			'add_new' => 'Добавить новую работу'
		),
		'description' => __('Description.', 'your-plugin-textdomain'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-images-alt',
		'supports' => array('title', 'editor', 'thumbnail')
	));

	register_post_type('services', array(
		'labels' => array(
			'name' => 'Услуги',
			'singular_name' => 'услуга',
			'add_new' => 'Добавить новую'
		),
		'description' => __('Description.', 'your-plugin-textdomain'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'services'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-nametag',
		'supports' => array('title', 'editor', 'thumbnail')
	));

	register_post_type('news', array(
		'labels' => array(
			'name' => 'Новости',
			'singular_name' => 'новость',
			'add_new' => 'Добавить новую'
		),
		'description' => __('Description.', 'your-plugin-textdomain'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'news'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-index-card',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	));

//  Register taxonomy
	register_taxonomy('portfolio-type', 'portfolio', [
		'label' => 'Категория работы',
		'rewrite' => [
			'slug' => 'portfolio-type'
		],
		'hierarchical' => true
	]);
	register_taxonomy('news-type', 'news', [
		'label' => 'Категория новостей',
		'rewrite' => [
			'slug' => 'news-type'
		],
		'hierarchical' => true
	]);

	// Register tags
	register_taxonomy_for_object_type( 'post_tag', 'news');

}
add_action('init', 'aecode_register_custom_post_type');
