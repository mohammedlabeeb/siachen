<?php if(!is_user_logged_in()) {
	wp_redirect( get_permalink(26));exit;
}
if(isset($_REQUEST['submit'])) {
	$id = get_user_meta(get_current_user_id(), 'business_post', true);
					$my_post = array(
						  'ID' => $id,
						  'post_title'    => $_POST['title'],
						  'post_content'    => $_POST['content'],
						  'post_status'   => 'private',
						  'post_type' => 'business'
						);
					wp_update_post($my_post);
					
					/* Taxonomy */
					$terms = array();
					if(isset($_REQUEST['type']) && $_REQUEST['type']!="") {
						$terms[] = $_REQUEST['type'];
					}
					if(isset($_REQUEST['sub-type']) && $_REQUEST['sub-type']!="") {
						$terms[] = $_REQUEST['sub-type'];
					}
					wp_set_post_terms($id,$terms,'business_type',false);
					
					/* Custom Fields */
					
					/* Basic Details */
					
					$summary = (isset($_REQUEST['summary']) && $_REQUEST['summary']!="" ? $_REQUEST['summary'] : "");
					
					$established_year = (isset($_REQUEST['established_year']) && $_REQUEST['established_year']!="" ? $_REQUEST['established_year'] : "");
					
					$position_in = (isset($_REQUEST['position_in']) && $_REQUEST['position_in']!="" ? $_REQUEST['position_in'] : "");
					
					$number_of_employess = (isset($_REQUEST['number_of_employess']) && $_REQUEST['number_of_employess']!="" ? $_REQUEST['number_of_employess'] : "");
					
					$country = (isset($_REQUEST['country']) && $_REQUEST['country']!="" ? $_REQUEST['country'] : "");
					
					$state = (isset($_REQUEST['state']) && $_REQUEST['state']!="" ? $_REQUEST['state'] : "");
					
					$city = (isset($_REQUEST['city']) && $_REQUEST['city']!="" ? $_REQUEST['city'] : "");
					
					$nearest_major_city = (isset($_REQUEST['nearest_major_city']) && $_REQUEST['nearest_major_city']!="" ? $_REQUEST['nearest_major_city'] : "");
					
					$branch_locations = (isset($_REQUEST['branch_locations']) && $_REQUEST['branch_locations']!="" ? $_REQUEST['branch_locations'] : "");
					
					
					
					update_post_meta($id,'summary',$summary);
					update_post_meta($id,'established_year',$established_year);
					update_post_meta($id,'position_in',$position_in);
					update_post_meta($id,'number_of_employess',$number_of_employess);
					update_post_meta($id,'country',$country);
					update_post_meta($id,'state',$state);
					update_post_meta($id,'city',$city);
					update_post_meta($id,'nearest_major_city',$nearest_major_city);
					update_post_meta($id,'branch_locations',$branch_locations);
					
					
					/* Communication */
					
					$address = (isset($_REQUEST['address']) && $_REQUEST['address']!="" ? $_REQUEST['address'] : "");
					$land_line = (isset($_REQUEST['land_line']) && $_REQUEST['land_line']!="" ? $_REQUEST['land_line'] : "");
					$mobile = (isset($_REQUEST['mobile']) && $_REQUEST['mobile']!="" ? $_REQUEST['mobile'] : "");
					$alternate_number = (isset($_REQUEST['alternate_number']) && $_REQUEST['alternate_number']!="" ? $_REQUEST['alternate_number'] : "");
					$fax = (isset($_REQUEST['fax']) && $_REQUEST['fax']!="" ? $_REQUEST['fax'] : "");
					$email = (isset($_REQUEST['email']) && $_REQUEST['email']!="" ? $_REQUEST['email'] : "");
					$web_site_address = (isset($_REQUEST['web_site_address']) && $_REQUEST['web_site_address']!="" ? $_REQUEST['web_site_address'] : "");
					$twitter_id = (isset($_REQUEST['twitter_id']) && $_REQUEST['twitter_id']!="" ? $_REQUEST['twitter_id'] : "");
					$facebook_page = (isset($_REQUEST['facebook_page']) && $_REQUEST['facebook_page']!="" ? $_REQUEST['facebook_page'] : "");
					$whatsapp = (isset($_REQUEST['whatsapp']) && $_REQUEST['whatsapp']!="" ? $_REQUEST['whatsapp'] : "");
					$skype_id = (isset($_REQUEST['skype_id']) && $_REQUEST['skype_id']!="" ? $_REQUEST['skype_id'] : "");
					$preferred_method_of_contact = (isset($_REQUEST['preferred_method_of_contact']) && $_REQUEST['preferred_method_of_contact']!="" ? $_REQUEST['preferred_method_of_contact'] : "");
					
					
					update_post_meta($id,'address',$address);
					update_post_meta($id,'land_line',$land_line);
					update_post_meta($id,'mobile',$mobile);
					update_post_meta($id,'alternate_number',$alternate_number);
					update_post_meta($id,'fax',$fax);
					update_post_meta($id,'email',$email);
					update_post_meta($id,'web_site_address',$web_site_address);
					update_post_meta($id,'twitter_id',$twitter_id);
					update_post_meta($id,'facebook_page',$facebook_page);
					update_post_meta($id,'whatsapp',$whatsapp);
					update_post_meta($id,'skype_id',$skype_id);
					update_post_meta($id,'preferred_method_of_contact',$preferred_method_of_contact);
					
					/*  Customer Impression */
					
					$prestigious_projects = (isset($_REQUEST['prestigious_projects']) && $_REQUEST['prestigious_projects']!="" ? $_REQUEST['prestigious_projects'] : "");
					$why_choose_you = (isset($_REQUEST['why_choose_you']) && $_REQUEST['why_choose_you']!="" ? $_REQUEST['why_choose_you'] : "");
					$awards = (isset($_REQUEST['awards']) && $_REQUEST['awards']!="" ? $_REQUEST['awards'] : "");
					$refferals = (isset($_REQUEST['refferals']) && $_REQUEST['refferals']!="" ? $_REQUEST['refferals'] : "");
					$future_plans = (isset($_REQUEST['future_plans']) && $_REQUEST['future_plans']!="" ? $_REQUEST['future_plans'] : "");
					$leveraging_technology = (isset($_REQUEST['leveraging_technology']) && $_REQUEST['leveraging_technology']!="" ? $_REQUEST['leveraging_technology'] : "");
					$financial_strengths = (isset($_REQUEST['financial_strengths']) && $_REQUEST['financial_strengths']!="" ? $_REQUEST['financial_strengths'] : "");
					$corporate = (isset($_REQUEST['corporate']) && $_REQUEST['corporate']!="" ? $_REQUEST['corporate'] : "");
					
					update_post_meta($id,'prestigious_projects',$prestigious_projects);
					update_post_meta($id,'why_choose_you',$why_choose_you);
					update_post_meta($id,'awards',$awards);
					update_post_meta($id,'refferals',$refferals);
					update_post_meta($id,'future_plans',$future_plans);
					update_post_meta($id,'leveraging_technology',$leveraging_technology);
					update_post_meta($id,'financial_strengths',$financial_strengths);
					update_post_meta($id,'corporate',$corporate);
					
					/* Location Details */
					
					$lat = (isset($_REQUEST['lat']) && $_REQUEST['lat']!="" ? $_REQUEST['lat'] : "");
					$lng = (isset($_REQUEST['lng']) && $_REQUEST['lng']!="" ? $_REQUEST['lng'] : "");
					$map = array('lat' => $lat , 'lng' => $lng);
					
					update_post_meta($id,'map',$map);
					
					
					
					/* Products / Services */
					
					$products = (isset($_REQUEST['products']) && $_REQUEST['products']!="" ? $_REQUEST['products'] : "");
					$services = (isset($_REQUEST['services']) && $_REQUEST['services']!="" ? $_REQUEST['services'] : "");
					$customers = (isset($_REQUEST['customers']) && $_REQUEST['customers']!="" ? $_REQUEST['customers'] : "");
	
					update_post_meta($id,'products',$products);
					update_post_meta($id,'services',$services);
					update_post_meta($id,'customers',$customers);
					
					/* Careers */
					
					$current_vacancies = (isset($_REQUEST['current_vacancies']) && $_REQUEST['current_vacancies']!="" ? $_REQUEST['current_vacancies'] : "");
					$advise_employee = (isset($_REQUEST['advise_employee']) && $_REQUEST['advise_employee']!="" ? $_REQUEST['advise_employee'] : "");
					$article = (isset($_REQUEST['article']) && $_REQUEST['article']!="" ? $_REQUEST['article'] : "");
					
	
					update_post_meta($id,'current_vacancies',$current_vacancies);
					update_post_meta($id,'advise_employee',$advise_employee);
					
	
}
?>
<?php get_header(); ?>

<article>
			<div class="banner dashboard-banner">
				<div class="container">
					
					<!-- header -->
					<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
					
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Dashboard</a>
						</div>
						<ul class="nav navbar-nav navbar-right">
							
							<li class="no-mobile"><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
							<li class="dropdown admin-btn">
								<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Manage Profile <span class="caret"></span></a>
								<ul id="g-account-menu" class="dropdown-menu" role="menu">
									<li><a href="#">View Profile</a></li>
									<li><a href="#">Edit Profile</a></li>
								</ul>
							</li>
							<li class="logout-btn"><a href="<?php echo wp_logout_url(get_permalink(ot_get_option('login'))); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
						</ul>
						
					</div>
					<!-- /Header -->
					
				</div>
			</div>
			<?php $post_id = get_user_meta(get_current_user_id(), 'business_post', true);
									$post = get_post($post_id,'ARRAY_A','edit');
									
									$time_line = get_metadata('post',$post['ID']);
									//var_dump($time_line);
									?>
			<div class="content dashboard-content">
				<div class="container">
					<!--Dashboard-->
					
						<?php get_template_part('dashboard','left'); ?>
						<div class="col-right">
						
						<form action="" method="POST" id="editform" >
							<div class="tab-pane" id="basic-details">
									<h4>Basic Details</h4>
																			
									 <div class="form-group">
										<label for="title">Business Name</label>
										<input type="text" class="form-control" name="title" id="title" value="<?php echo $post['post_title']; ?>" placeholder="Business Name">
									 </div>	
									 <div class="col-md-4" style="padding-left:0">
										 <div class="form-group">
											<?php $parent_cat = get_curr_business_type($post['ID']); ?>
											<label for="type">Business Type</label>
											<select class="" name="type" id="type">
												<option option="">Select Your Business Type</option>
												<?php get_category_options(0,$parent_cat); ?>
											</select>
											
										 </div>	
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										 <div class="form-group" id="subtype-outer">
											<?php $child_cat = get_curr_business_type($post['ID'] ,$parent_cat); ?>
											<label for="sub-type">Business Category</label>
											<select class="" name="sub-type" id="sub-type">
												<option>Select Business Category</option>
												<?php if($parent_cat!="" || !empty($parent_cat)) get_category_options($parent_cat,$child_cat); ?>
											</select>
										 </div>	
									</div>
									
									<div class="col-md-4" style="padding-right:0">
										 <div class="form-group" id="subtype2-outer">
											<?php $child_cat2 = get_curr_business_type($post['ID'] ,$child_cat); ?>
											<label for="sub-type2">Business Sub Category</label>
											<select class="" name="sub-type2" id="sub-type2">
												<option>Select Business SubType</option>
												<?php if($child_cat!="" || !empty($child_cat)) get_category_options($child_cat,$child_cat2); ?>
											</select>
										 </div>	
									</div>
									 
									 <div class="form-group">
										<label for="summary">Business Summary</label>
										<textarea id="summary" class="form-control" rows="5" name="summary" placeholder="Explain in 70 - 100 characters what you do. "><?php echo get_post_meta($post['ID'],'business_summary',true); ?></textarea>
									 </div>
									 <div class="col-md-4" style="padding-left:0">
										  <div class="form-group">
											<label for="established_year">Established Year</label>
											<input type="text" name="established_year" class="form-control" id="established_year" value="<?php echo get_post_meta($post['ID'],'established_year',true); ?>" placeholder="Established Year">
										 </div>	
									 </div>	
									 <div class="col-md-4">
										 <div class="form-group">
											<label for="position_in">Your Position in Company</label>
											<input type="text" name="position_in" class="form-control" id="position_in" value="<?php echo get_post_meta($post['ID'],'position_in',true); ?>" placeholder="Your Position in Company">
										 </div>
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										  <div class="form-group">
											<label for="number_of_employess">Number Of employees</label>
											<input type="text" name="number_of_employess" class="form-control" id="number_of_employess" value="<?php echo get_post_meta($post['ID'],'number_of_employess',true); ?>" placeholder="Number Of employees">
										 </div>
									 </div>
									 <?php $CountryState = new siachen_сountries; 
									 $country = get_post_meta($post['ID'],'country',true);
									 $state = get_post_meta($post['ID'],'state',true);
									
									 ?>
									 <div class="col-md-4" style="padding-left:0">
										 <div class="form-group">
											<label for="country">Country</label>
											<select class="" name="country" id="country">
												<option value="">Select a Country</option>
												<?php echo $CountryState->country_dropdown_list($country);
												?>
											</select>
										 </div>
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										 <div class="form-group">
											<label for="state">State</label>
											<select style="width:100%;" class="" name="state" id="state">
												<option>Option</option>
												
												<?php
												if($country!="") echo $CountryState->states_dropdown_list($country,$state);
												?>
											</select>
										 </div>
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										 <div class="form-group">
											<label for="city">City</label>
											<input type="text" name="city" class="form-control" id="city" value="<?php echo get_post_meta($post['ID'],'city',true); ?>" placeholder="City">
										 </div>
									 </div>
									 <div class="col-md-6" style="padding-left:0">
										 <div class="form-group">
											<label for="nearest_major_city">Nearest major city</label>
											<input type="text" name="nearest_major_city" class="form-control" id="nearest_major_city" value="<?php echo get_post_meta($post['ID'],'nearest_major_city',true); ?>" placeholder="Nearest major city">
										 </div>
									 </div>
									 
									 <div class="col-md-6" style="padding-right:0">
										 <div class="form-group">
											<label for="branch_locations">Branch locations</label>
											<textarea id="branch_locations" class="form-control" rows="5" name="branch_locations" placeholder="Branch locations"><?php echo get_post_meta($post['ID'],'branch_locations',true); ?></textarea>
										 </div>
									 </div>
									 <div class="col-md-2" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
										
										
										
										
									  
									
								</div>
								<div class="tab-pane" id="communication-details">
									<h4>Communication</h4>
									
										 <div class="form-group">
											<label for="address">Postal Address</label>
											<textarea id="address" class="form-control" rows="5" name="address" placeholder="Postal Address"><?php echo get_post_meta($post['ID'],'address',true); ?></textarea>
										 </div>
									 
									 
									 <div class="col-md-4" style="padding-left:0">
										 <div class="form-group">
											<label for="land_line">Land Line</label>
											
											<input type="text" name="land_line" class="form-control" id="land_line" value="<?php echo get_post_meta($post['ID'],'land_line',true); ?>" placeholder="Land Line">
										 </div>
									 </div>
									 <div class="col-md-4">
										 <div class="form-group">
											<label for="mobile">Mobile</label>
											<input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo get_post_meta($post['ID'],'mobile',true); ?>" placeholder="Mobile">
										 </div>
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										 <div class="form-group">
											<label for="alternate_number">Alternate Number </label>
											<input type="text" name="alternate_number" class="form-control" id="alternate_number" value="<?php echo get_post_meta($post['ID'],'alternate_number',true); ?>" placeholder="Alternate Number ">
										 </div>
									 </div>
									 
									 <div class="col-md-4" style="padding-left:0">
										 <div class="form-group">
											<label for="fax">Fax</label>
											
											<input type="text" name="fax" class="form-control" id="fax" value="<?php echo get_post_meta($post['ID'],'fax',true); ?>" placeholder="Fax">
										 </div>
									 </div>
									 <div class="col-md-4">
										 <div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" class="form-control" id="email" value="<?php echo get_post_meta($post['ID'],'email',true); ?>" placeholder="Email">
										 </div>
									 </div>
									 <div class="col-md-4" style="padding-right:0">
										 <div class="form-group">
											<label for="web_site_address">Website </label>
											<input type="url" name="web_site_address" class="form-control" id="web_site_address" value="<?php echo get_post_meta($post['ID'],'web_site_address',true); ?>" placeholder="Website ">
										 </div>
									 </div>
									 <div class="clear" style="clear:both"></div>
										 <div class="col-md-3" style="padding-left:0">
											 <div class="form-group">
												<label for="twitter_id">Twitter</label>
												
												<input type="text" name="twitter_id" class="form-control" id="twitter_id" value="<?php echo get_post_meta($post['ID'],'twitter_id',true); ?>" placeholder="Twitter">
											 </div>
										 </div>
										 <div class="col-md-3" >
											 <div class="form-group">
												<label for="fax">Facebook</label>
												
												<input type="text" name="facebook_page" class="form-control" id="facebook_page" value="<?php echo get_post_meta($post['ID'],'facebook_page',true); ?>" placeholder="Facebook">
											 </div>
										 </div>
										 <div class="col-md-3">
											 <div class="form-group">
												<label for="whatsapp">Whatsapp</label>
												<input type="text" name="whatsapp" class="form-control" id="whatsapp" value="<?php echo get_post_meta($post['ID'],'whatsapp',true); ?>" placeholder="Whatsapp">
											 </div>
										 </div>
										 <div class="col-md-3" style="padding-right:0">
											 <div class="form-group">
												<label for="skype_id">Skype </label>
												<input type="text" name="skype_id" class="form-control" id="skype_id" value="<?php echo get_post_meta($post['ID'],'skype_id',true); ?>" placeholder="Skype ">
											 </div>
										 </div>
									 
									 <div class="col-md-6" style="padding-left:0">
										 <div class="form-group">
											<label for="preferred_method_of_contact">Preferred Method of contact </label>
											<input type="text" name="preferred_method_of_contact" class="form-control" id="preferred_method_of_contact" value="<?php echo get_post_meta($post['ID'],'preferred_method_of_contact',true); ?>" placeholder="Preferred Method of contact ">
										 </div>
									 </div>
									 
									 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
									
								</div>	
								
								<div class="tab-pane" id="Business-description">
									<h4>Business Description</h4>
									
										 <div class="form-group">
											<?php
											$settings = array(
												'wpautop' => true, // use wpautop?
												'media_buttons' => false, // show insert/upload button(s)
												'textarea_name' => 'content', // set the textarea name to something different, square brackets [] can be used here
												'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
												'tabindex' => '',
												'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the <style> tags, can use "scoped".
												'editor_class' => '', // add extra class(es) to the editor textarea
												'teeny' => false, // output the minimal editor config used in Press This
												'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
												'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
												'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
												);
												$content = $post['post_content'];
												 ?>
											<?php wp_editor( $content, 'content', $settings ); ?> 
											 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
										 </div>
									 
								</div>
								<div class="tab-pane" id="location">
									<h4>Location Details</h4>
									<?php
									$map = get_post_meta($post['ID'],'map',true);
									
									$lat = $map['lat'];
									$lng = $map['lng']; ?>
									<div style="clear:both">
										<div class="col-md-6" style="padding-left:0"><div class="form-group">
										<input id="searchTextField" class="form-control" type="text" value="">
										</div>
										</div>
										<div class="col-md-3" style="">
											 <div class="form-group"><input type="text"  class="form-control" value="<?php echo $lat; ?>" id="cityLat1" name="lat1" disabled />
											 <input type="hidden"  class="form-control" value="<?php echo $lat; ?>" id="cityLat" name="lat"  />
											 </div>
										</div>
										<div class="col-md-3" style="padding-right:0">
											 <div class="form-group"><input type="text" class="form-control" value="<?php echo $lng; ?>" id="cityLng1" name="lng1" disabled />
											 <input type="hidden" class="form-control" value="<?php echo $lng; ?>" id="cityLng" name="lng"  />
											 </div>
										</div>
									</div>
<div id="map-canvas"></div>
<style>#map-canvas{height:350px;width:100%;}</style>									
											  									
										
										<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>

<script type="text/javascript">
var geocoder;
var map;
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
		
		var lat = <?php echo ($lat!="" ? $lat : '20.593684'); ?>;
		var lng = <?php echo ($lng!="" ? $lng : '78.96288000000004'); ?>;
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(lat,lng );
		var mapOptions = {
    zoom: 14,
    center: latlng
	}
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
          map: map,
          position: latlng
      });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
			
            var place = autocomplete.getPlace();
			console.log(place);
            //document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLat1').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
            document.getElementById('cityLng1').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);
		   
			var latlng = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
			var mapOptions = {
    zoom: 14,
    center: latlng
	}
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
          map: map,
          position: latlng
      });

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
    
</script>
	 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
									</div>
									<div style="clear:both"></div>
									<div class="tab-pane" id="products-services">
									<h4>Products / Services</h4>
										 <div class="form-group">
											<label for="products">Products </label>
											<?php $content = get_post_meta($post['ID'],'products',true);
												wp_editor( $content, 'products', $settings['textarea_name'] = 'products' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="services">Services </label>
											<?php $content = get_post_meta($post['ID'],'services',true);
												wp_editor( $content, 'services', $settings['textarea_name'] = 'services' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="customers">Major Customers </label>
											<?php $content = get_post_meta($post['ID'],'customers',true);
												wp_editor( $content, 'customers', $settings['textarea_name'] = 'customers' ); 
											?>
										 </div>
										 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
									</div>
									
									
									<div class="tab-pane" id="customer-description">
									<h4>Customer Impression</h4>
										 <div class="form-group">
											<label for="prestigious_projects">Prestigious Projects </label>
											<?php $content = get_post_meta($post['ID'],'prestigious_projects',true);
												wp_editor( $content, 'prestigious_projects', $settings['textarea_name'] = 'prestigious_projects' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="why_choose_you">Why Customer Choose you ? </label>
											<?php $content = get_post_meta($post['ID'],'why_choose_you',true);
												wp_editor( $content, 'why_choose_you', $settings['textarea_name'] = 'why_choose_you' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="awards">Awards and Recognitions </label>
											<?php $content = get_post_meta($post['ID'],'awards',true);
												wp_editor( $content, 'awards', $settings['textarea_name'] = 'awards' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="refferals">Refferals</label>
											<?php $content = get_post_meta($post['ID'],'refferals',true);
												wp_editor( $content, 'refferals', $settings['textarea_name'] = 'refferals' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="future_plans">Future Plans</label>
											<?php $content = get_post_meta($post['ID'],'future_plans',true);
												wp_editor( $content, 'future_plans', $settings['textarea_name'] = 'future_plans' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="leveraging_technology">Leverage Technology</label>
											<?php $content = get_post_meta($post['ID'],'leveraging_technology',true);
												wp_editor( $content, 'leveraging_technology', $settings['textarea_name'] = 'leveraging_technology' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="financial_strengths">Financial Strengths</label>
											<?php $content = get_post_meta($post['ID'],'financial_strengths',true);
												wp_editor( $content, 'financial_strengths', $settings['textarea_name'] = 'financial_strengths' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="corporate">Corporate Responsibility</label>
											<?php $content = get_post_meta($post['ID'],'corporate',true);
												wp_editor( $content, 'corporate', $settings['textarea_name'] = 'corporate' ); 
											?>
										 </div>
										 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
									
									</div>
									<div class="tab-pane" id="careers">
									<h4>Careers</h4>
										<div class="form-group">
											<label for="current_vacancies">Current Vacancies </label>
											<?php $content = get_post_meta($post['ID'],'current_vacancies',true);
												wp_editor( $content, 'current_vacancies', $settings['textarea_name'] = 'current_vacancies' ); 
											?>
										 </div>
										 <div class="form-group">
											<label for="advise_employee">Advise Employee </label>
											<?php $content = get_post_meta($post['ID'],'advise_employee',true);
												wp_editor( $content, 'advise_employee', $settings['textarea_name'] = 'advise_employee' ); 
											?>
										 </div>
										 
										 <div class="form-group">
											<label for="advise_employee">Article About business </label>
											<?php $content = get_post_meta($post['ID'],'article',true);
												wp_editor( $content, 'article', $settings['textarea_name'] = 'article' ); 
											?>
										 </div>
										 
										
										 <div class="col-md-12" style="float:right;text-align:right;padding-right:0" >
										<input type="submit" name="submit" class="btn btn-default btn-lg" value="Save Changes" />
									 </div>
									</div>
									<div style="clear:both"></div>
									
									<div class="tab-pane" id="timeline" style="display:none">
									<?php $timelines = get_post_meta($post['ID'],'timelines',true); ?>
										<h4>TimeLines</h4>
										<?php if(!empty($timelines) && is_array($timelines)) { 
											foreach($timelines as $timeline) {
										?>
											<div class="timeline-outer" id="timeline-outer-1">
											<h5><strong>TimeLine 1</strong><span id="ttrash-1" class="ttrash"><span class="glyphicon glyphicon-trash"></span></span></h5>
											<div class="col-md-6" style="padding-left:0">
											
												<div class="form-group">
													<label for="tyear">Year </label>
													<input type="text" name="tyear" class="form-control" id="tyear" value="" placeholder="Year " />
												</div>
												<div class="form-group">
													<label for="ttitle">Title </label>
													<input type="text" name="ttitle" class="form-control" id="ttitle" value="" placeholder="Title " />
												</div>
											
											</div>
											<div class="col-md-6" >
												<div class="form-group">
													<label for="ttext">Description </label>
													<textarea name="ttext" rows="4" class="form-control" id="ttext"></textarea>
												</div>
											</div>
											
										</div>
										<?php } } ?>
										 <div class="timeline-outer" id="timeline-outer-1">
											<h5><strong>TimeLine 1</strong><span id="ttrash-1" class="ttrash"><span class="glyphicon glyphicon-trash"></span></span></h5>
											<div class="col-md-6" style="padding-left:0">
											
												<div class="form-group">
													<label for="tyear">Year </label>
													<input type="text" name="tyear" class="form-control" id="tyear" value="" placeholder="Year " />
												</div>
												<div class="form-group">
													<label for="ttitle">Title </label>
													<input type="text" name="ttitle" class="form-control" id="ttitle" value="" placeholder="Title " />
												</div>
											
											</div>
											<div class="col-md-6" >
												<div class="form-group">
													<label for="ttext">Description </label>
													<textarea name="ttext" rows="4" class="form-control" id="ttext"></textarea>
												</div>
											</div>
											
										</div>
									</div>
								</form>
								
							
							
							
							
							
							
						</div>
						
					<!--Dashboard-->
				</div>
			</div>
		</article>
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/circle.css" rel="stylesheet">
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/progress-circle.js"></script>
<script>
	jQuery(document).ready(function($) {
		$('#type').change(function() {
				
					var type = $(this).val();

					 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=get_ajax_subtype&type=' + type,

					success:function(results)
							 {
							  console.log(results);
							$('#sub-type').html(results);
							
																	
			
									}
					});
					});
					
		$('#sub-type').on('change',function() {
				
					var type = $(this).val();

					 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=get_ajax_subtype&type=' + type,

					success:function(results)
							 {
							  console.log(results);
							$('#sub-type2').html(results);
							
																	
			
									}
					});
					});
					
		
		$( "#country" ).select2({
		   placeholder: "Select a Country",
		});
		$( "#state" ).select2({
		   placeholder: "Select a State",
		});
		$('#country').change(function() {
		
			var cnt = $(this).val();

			 $.ajax({
				url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=get_citites&country=' + cnt,

			success:function(results)
					 {
					  console.log(results);
					$('#state').html(results);
						$( "#state" ).select2({
		   placeholder: "Select a State",
			
			
				});
	
							}
			});
			}
		);
	});
								</script>
<?php get_footer(); ?>