<?php

/**
 * @package WordPress
 * @subpackage asw_template
 */

// Thumbnails
add_theme_support('post-thumbnails');



//menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'nav1' => __( 'Main Menu' )
		)
	);
}



// make sure quotes and single quotes dont end up in the url
add_action( 'title_save_pre', 'do_replace_dashes' );
function do_replace_dashes($string_to_clean) {
    $string_to_clean = str_replace( array('&#8212;', '—', '&#8211;', '–', '‚', '„', '“', '”', '’', '‘', '…'), array(' -- ',' -- ', '--','--', ',', ',,', '"', '"', "'", "'", '...'), $string_to_clean );
    return $string_to_clean;
}

//remove wp version from head
remove_action('wp_head', 'wp_generator');


// Custom Taxonomies (Should be above Custom Post Types)
function asw_register_taxonomies() {
	register_taxonomy("image_category", array("headers"), 
	array(
		"hierarchical" => true, 
		"label" => __('Image Categories', 'headers'), 
		"singular_label" => "Image Category", 
		"rewrite" => true));
	register_taxonomy("feature", array("post","page"), 
	array(
		"hierarchical" => true, 
		"label" => __('Featured On...', ''), 
		"singular_label" => "Featured On...", 
		"rewrite" => true));
}


// Custom Post Types

function js_init() {
  asw_register_custom_types(); // Register Custom Post Types
  asw_register_taxonomies(); // Register Custom Taxonomies
}

add_action('init', 'js_init');

function asw_register_custom_types() {
	

	// FRONT PAGE HEADER/BANNER
	register_post_type(
		  'headers', array(
			  'labels' => array(
				  'name' => 'Headers', 
				  'singular_name' => 'Header', 
				  'add_new' => 'Add new header', 
				  'add_new_item' => 'Add new header', 
				  'new_item' => 'New header', 
				  'view_item' => 'View headers',
				  'edit_item' => 'Edit header',
				  'not_found' =>  __('No headers found'),
				  'not_found_in_trash' => __('No headers found in Trash')
			  ), 
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => true,
			  'capability_type' => 'post',
			  'exclude_from_search' => false, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => false,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail'),
			  'taxonomies' => array('image_category')
		 )
	  );
	
	
	// MEDIA GALLERY
	register_post_type(
		  'gallery', array(
			  'labels' => array(
				  'name' => 'Galleries', 
				  'singular_name' => 'Gallery', 
				  'add_new' => 'Add new Gallery', 
				  'add_new_item' => 'Add new Gallery', 
				  'new_item' => 'New Gallery', 
				  'view_item' => 'View Galleries',
				  'edit_item' => 'Edit Galleries',
				  'not_found' =>  __('No Galleries found'),
				  'not_found_in_trash' => __('No Galleries found in Trash')
			  ), 
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => array( 'slug' => 'gallery','with_front' => FALSE), // Make single items visible via permalink
			  'capability_type' => 'post',
			  'exclude_from_search' => false, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => false,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail', 'editor'),
			  'has_archive' => true
		 )
	  );
	
 
 	add_action('add_meta_boxes', 'asw_add_meta');
	add_action('save_post', 'asw_save_meta');
 
}

function asw_add_meta($postType) {
	$types = array('post','page');
	if (in_array ($postType, $types) ) { add_meta_box('content_summary', 'Content Summary', 'summary', $postType, 'side', 'high'); }
}

function summary($post) {
    echo '<div id="summary">';
    echo '<input style="width:95%;" type="text" id="summary" name="summary" value="' . get_post_meta($post->ID, 'summary', true) . '" placeholder="Content Summary:" />';
    echo '</div>';
}


// Save the Custom Field Data
function asw_save_meta($post_id) {

    if (wp_is_post_revision($post_id)) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
       return $post_id;
    }

    if (isset($_POST['summary'])) {
       update_post_meta($post_id, 'summary', $_POST['summary']);
    }
	
}

// Show the Slug
function the_slug() {
global $post;
$title = sanitize_title($post->post_title);
echo $title;
}

// Add Page Excerpts
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

?>