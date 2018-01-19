<?php 
add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {
	// add 'class-name' to the $classes array
	if(!is_home() && !is_front_page()) {
		$classes[] = 'inner';
		}
	// return the $classes array
	return $classes;
}
//associating a function to login hook
 add_action('wp_login', 'set_last_login');
 //function for setting the last login 
 function set_last_login($login) { 
	$user = get_userdatabylogin($login);
	//add or update the last login value for logged in user 
	update_usermeta( $user->ID, 'last_login', current_time('mysql') );
} 
	//function for getting the last login 
	function get_last_login($user_id) 
	{ 
		$last_login = get_user_meta($user_id, 'last_login', true); 
		//picking up wordpress date time format 
		$date_format = get_option('date_format') . ' ' . get_option('time_format');
		//converting the login time to wordpress format 
		$the_last_login = mysql2date($date_format, $last_login, false); 
		//finally return the value 
		return $the_last_login;
		}
		
function get_profile_completeness($user_id) {
		$post = get_user_meta($user_id, 'business_post', true); 
		$metadata = get_metadata('post',$post);
		//var_dump($metadata);
}	
function get_profile_views($user_id) {
	$post = get_user_meta($user_id, 'business_post', true); 
	$views = get_post_meta($post,'views',true);
	
	return ($views!="" ? $views : 0);
	
}	
function get_category_options($parent = 0 , $selected = "") {
	$taxonomies = array( 
								'business_type'
								
							);

							$args = array(
								'orderby'           => 'name', 
								'order'             => 'ASC',
								'hide_empty'        => false, 
								'exclude'           => array(), 
								'exclude_tree'      => array(), 
								'include'           => array(),
								'number'            => '', 
								'fields'            => 'all', 
								'slug'              => '',
								'parent'            => $parent,
								'hierarchical'      => true, 
								'child_of'          => 0,
								'childless'         => false,
								'get'               => '', 
								'name__like'        => '',
								'description__like' => '',
								'pad_counts'        => false, 
								'offset'            => '', 
								'search'            => '', 
								'cache_domain'      => 'core'
							); 

							$terms = get_terms($taxonomies, $args);
							if(!empty($terms)) {
								 foreach($terms as $term) { 
									$sel = ($term->term_id == $selected ? "Selected" : "");
								 ?>
									<option value="<?php echo $term->term_id; ?>" <?php echo $sel; ?>><?php echo $term->name; ?></option>
								<?php }
							}

}
function get_curr_business_type($id,$parent = 0) {
			
			
			$curr_prop_status = wp_get_post_terms($id, 'business_type', array('orderby' => 'name', 'hide_empty' => true) );	
			$curr_val = null;
			
			if (!empty($curr_prop_status)) {
				foreach ($curr_prop_status as $status) {
					if($status->parent == $parent) {
					$curr_val = $status->term_id;
					break;
					}
					
				}
			}
			
			return $curr_val;
		}
function get_curr_business_type_name($id,$parent = 0) {
			
			
			$curr_prop_status = wp_get_post_terms($id, 'business_type', array('orderby' => 'name', 'hide_empty' => true) );	
			$curr_val = null;
			
			if (!empty($curr_prop_status)) {
				foreach ($curr_prop_status as $status) {
					if($status->parent == $parent) {
					$curr_val = $status->name;
					break;
					}
					
				}
			}
			
			return $curr_val;
		}
add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {
  global $post;

  if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '') )
  $rating = wp_filter_nohtml_kses($_POST['rating']);
  add_comment_meta( $comment_id, 'rating', $rating );
  update_business_rating($post->ID , $rating);
}

add_filter( 'preprocess_comment', 'verify_comment_meta_data' );
function verify_comment_meta_data( $commentdata ) {
  if ( ! isset( $_POST['rating'] ) )
  wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
  return $commentdata;
}

add_filter( 'comment_text', 'modify_comment');
function modify_comment( $text ){

  

   

  if( $commentrating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
    $commentrating = '<p class="comment-rating">  <input type="hidden" class="rating" readonly="true" value="'. $commentrating .'"/>
							<script>								$(".rating").rating();
							</script> </p>';
    $text = $text . $commentrating;
    return $text;
  } else {
    return $text;
  }
}


// Add an edit option to comment editing screen  

add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box() {
    add_meta_box( 'title', __( 'Comment Rating ' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

function extend_comment_meta_box ( $comment ) {
   
    $rating = get_comment_meta( $comment->comment_ID, 'rating', true );
    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?>
    
    <p>
        <label for="rating"><?php _e( 'Rating: ' ); ?></label>
      <span class="commentratingbox">
      <?php echo $rating; ?>
      </span>
    </p>
    <?php
}

function update_business_rating($post_id , $rating) {
	$totalrates = (get_post_meta($post_id , 'totalrates' , true)!="" ? get_post_meta($post_id , 'totalrates' , true) : 0);
	$totalvotes = (get_post_meta($post_id , 'totalvotes' , true)!="" ? get_post_meta($post_id , 'totalvotes' , true) : 0);
	
	$totalrates+=$rating;
	$totalvotes+=1;
	
	$rating = $totalrates / $totalvotes;
	
	update_post_meta($post_id , 'totalrates',$totalrates);
	update_post_meta($post_id , 'totalvotes',$totalvotes);
	update_post_meta($post_id , 'rating',$rating);
	
}