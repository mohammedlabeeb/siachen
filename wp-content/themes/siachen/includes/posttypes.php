<?php 
include_once('afcustom.php');
add_action('init', 'siachen_register_cp');
function siachen_register_cp() {
	$labels = array(
		'name'               => __( 'Business'),
		'singular_name'      => __( 'Business'),
		'menu_name'          => __( 'Business %%SpecialString%%'),
		'name_admin_bar'     => __( 'Business'),
		'add_new'            => __( 'Add New'),
		'add_new_item'       => __( 'Add New Business'),
		'new_item'           => __( 'New Business'),
		'edit_item'          => __( 'Edit Business'),
		'view_item'          => __( 'View Business'),
		'all_items'          => __( 'All Business'),
		'search_items'       => __( 'Search Business'),
		'parent_item_colon'  => __( 'Parent Business:'),
		'not_found'          => __( 'No Business found.'),
		'not_found_in_trash' => __( 'No Business found in Trash.')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => '' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
	);

	register_post_type( 'business', $args );
}

function gp_remove_cpt_slug( $post_link, $post, $leavename ) {
 
    if ( 'business' != $post->post_type ) {
        return $post_link;
    }
 
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
 
    return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 3 );

function gp_parse_request_trick( $query ) {
 
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
 
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'business', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'gp_parse_request_trick' );
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_siachen_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_siachen_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Business Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Business Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Business Type' ),
		'all_items'         => __( 'All Business Type' ),
		'parent_item'       => __( 'Parent Business Type' ),
		'parent_item_colon' => __( 'Parent Business Type:' ),
		'edit_item'         => __( 'Edit Business Type' ),
		'update_item'       => __( 'Update Business Type' ),
		'add_new_item'      => __( 'Add New Business Type' ),
		'new_item_name'     => __( 'New Business Type Name' ),
		'menu_name'         => __( 'Business Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'business-type' ),
	);

	register_taxonomy( 'business_type', array( 'business' ), $args );

	
}

add_action('auth_redirect', 'add_cpt_pending_approval_count_filter');
function add_cpt_pending_approval_count_filter() {
   add_filter('attribute_escape', 'display_count_cpt_posts_pending_approval', 20, 2);
}

function display_count_cpt_posts_pending_approval( $safe_text = '', $text = '' ) {
   if ( substr_count($text, '%%SpecialString%%') ) {
   // this is the menu name we want to modify
   $text = trim( str_replace('%%SpecialString%%', '', $text) );

   // once you have found the string you want to modify, no need to use the filter
   remove_filter('attribute_escape', 'display_count_cpt_posts_pending_approval', 20, 2);

   $safe_text = esc_attr($text);

   $count = (int)wp_count_posts( 'business', 'readable' )->private;
   if ( $count > 0 ) {
      // if there are posts pending approval
      $text = esc_attr($text) . '<span class="update-plugins count-'. $count .'"><span class="plugin-count">' . $count . '</span></span>';
      return $text;
    }
   }
   return $safe_text;
}

function my_custom_post_status(){
	register_post_status( 'review', array(
		'label'                     => 'Review',
		'public'                    => true,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Review <span class="count">(%s)</span>', 'Review <span class="count">(%s)</span>' ),
	) );
}
add_action( 'init', 'my_custom_post_status' );
