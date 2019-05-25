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
			'header_nav' => __( 'Header Menu' ),
			'footer_nav' => __( 'Footer Menu' )
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


// Register custom post types and taxonomies
function js_init() {
  asw_register_custom_types(); // Register Custom Post Types
  asw_register_taxonomies(); // Register Custom Taxonomies
}

add_action('init', 'js_init');

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
			  'menu_icon' => 'dashicons-camera',
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => true,
			  'capability_type' => 'post',
			  'exclude_from_search' => false, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => false,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail', 'header_caption'),
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
			  'menu_icon' => 'dashicons-format-gallery',
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
	
 	flush_rewrite_rules();
 
 	add_action('add_meta_boxes', 'asw_add_meta');
	add_action('save_post', 'asw_save_meta');
 
}

function asw_add_meta($postType) {
	add_meta_box('content_summary', 'Content Summary', 'summary', array('post', 'page'), 'side', 'high');
	add_meta_box('meta_feature_title', 'Feature Title', 'feature_title',  array('post', 'page'), 'side', 'high');
	add_meta_box('meta_header_caption', 'Caption (Optional)', 'header_caption',  array('headers'), 'normal', 'high');

}


function summary($post) {
    echo '<div id="summary">';
    echo '<input style="width:95%;" type="text" id="summary" name="summary" value="' . get_post_meta($post->ID, 'summary', true) . '" placeholder="Content Summary:" />';
    echo '</div>';
}

function feature_title($post) {
    echo '<div id="feature-title">';
    echo '<input style="width:95%;" type="text" id="feature_title" name="feature_title" value="' . get_post_meta($post->ID, 'feature_title', true) . '" placeholder="Alternate title for featured content" />';
    echo '</div>';
}

function header_caption($post) {
    echo '<div id="header-caption">';
    echo '<input style="width:95%;" type="text" id="header_caption" name="header_caption" value="' . get_post_meta($post->ID, 'header_caption', true) . '" placeholder="Short Caption" />';
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

    if (isset($_POST['feature_title'])) {
       update_post_meta($post_id, 'feature_title', $_POST['feature_title']);
    }

    if (isset($_POST['header_caption'])) {
       update_post_meta($post_id, 'header_caption', $_POST['header_caption']);
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


// Add Descriptions to Menu Items
class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		// Only show the title if a description is entered:
		if ( $item->description !='' ) {
			$item_output .= '<span class="title">' . $item->title . '</span>';
		}
		$item_output .= '<span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>