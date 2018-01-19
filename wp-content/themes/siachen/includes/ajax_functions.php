<?php
add_action('wp_ajax_get_citites', 'get_citites');
add_action('wp_ajax_nopriv_get_citites', 'get_citites');

function get_citites() {
	$CountryState = new siachen_сountries;
	echo $_REQUEST['country'];
	echo $CountryState->states_dropdown_list($_REQUEST['country']);
	die();
}


add_action('wp_ajax_emailcheck', 'emailcheck');
add_action('wp_ajax_nopriv_emailcheck', 'emailcheck');


function emailcheck() {
	$email = $_REQUEST['email'];
	echo $exists = email_exists($email);
	die();
}

add_action('wp_ajax_usernamecheck', 'usernamecheck');
add_action('wp_ajax_nopriv_usernamecheck', 'usernamecheck');


function usernamecheck() {
	$username = $_REQUEST['username'];
	echo $exists = username_exists($username);
	die();
}

add_action('wp_ajax_get_ajax_subtype', 'get_ajax_subtype');
add_action('wp_ajax_nopriv_get_ajax_subtype', 'get_ajax_subtype');

function get_ajax_subtype() {
	$type = $_REQUEST['type'];
	?>
	
											
												<option>Select Category</option>
												<?php get_category_options($type); ?>
											
	<?php 
	die();
}

add_action('wp_ajax_update_account_data', 'update_account_data');
add_action('wp_ajax_nopriv_update_account_data', 'update_account_data');

function update_account_data() {

	$userdata = $out = array();
	if(isset($_REQUEST['fname']) && $_REQUEST['fname']!="") {
		$userdata['first_name'] = $_REQUEST['fname'];
	}
	if(isset($_REQUEST['lname']) && $_REQUEST['lname']!="") {
		$userdata['last_name'] = $_REQUEST['lname'];
	}	
	if(isset($_REQUEST['pswd']) && $_REQUEST['pswd']!="") {
		$userdata['user_pass'] = $_REQUEST['pswd'];
	}
	
	$userdata['ID'] = get_current_user_id();
	wp_update_user($userdata);
	$userdata = get_userdata(get_current_user_id());
	
	$out['first_name'] = $userdata->first_name;
	$out['last_name'] = $userdata->last_name;
	//$out['user_pass'] = $userdata->user_pass;
	echo json_encode($out);die();
}

add_action('wp_ajax_delete_logo', 'delete_logo');
add_action('wp_ajax_nopriv_delete_logo', 'delete_logo');

function delete_logo() {
	$post_id = get_user_meta(get_current_user_id(), 'business_post', true); 
	return delete_post_thumbnail($post_id);die();
}

add_action('wp_ajax_update_logo', 'update_logo');
add_action('wp_ajax_nopriv_update_logo', 'update_logo');

function update_logo() {
	$post_id = get_user_meta(get_current_user_id(), 'business_post', true); 
	// These files need to be included as dependencies when on the front end.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	
	// Let WordPress handle the upload.
	// Remember, 'my_image_upload' is the name of our file input in our form above.
	$attachment_id = media_handle_upload( 'userImage', $_POST['post_id'] );
	
	if ( is_wp_error( $attachment_id ) ) {
		echo "Error in Upload";die();
	} else {
		set_post_thumbnail($post_id , $attachment_id);
		$thumb = wp_get_attachment_image_src( $thumb_id, 'medium' );
		echo '<img src="'.$thumb[0].'" />';die();
	}
 
}

add_action('wp_ajax_update_banner', 'update_banner');
add_action('wp_ajax_nopriv_update_banner', 'update_banner');

function update_banner() {
	$post_id = get_user_meta(get_current_user_id(), 'business_post', true); 
	// These files need to be included as dependencies when on the front end.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	
	// Let WordPress handle the upload.
	// Remember, 'my_image_upload' is the name of our file input in our form above.
	$attachment_id = media_handle_upload( 'userImage', $_POST['post_id'] );
	
	if ( is_wp_error( $attachment_id ) ) {
		echo "Error in Upload";die();
	} else {
		update_post_meta($post_id, 'banner_image',$attachment_id); 
		
		$thumb = wp_get_attachment_image_src( $thumb_id, 'medium' );
		echo '<img src="'.$thumb[0].'" />';die();
	}
 
}


add_action('wp_ajax_delete_banner', 'delete_banner');
add_action('wp_ajax_nopriv_delete_banner', 'delete_banner');

function delete_banner() {
	$post_id = get_user_meta(get_current_user_id(), 'business_post', true); 
	$aid = get_post_meta($post_id,'banner_image',true);
	wp_delete_attachment( $aid );
	update_post_meta($post_id, 'banner_image',''); 
	
}
?>