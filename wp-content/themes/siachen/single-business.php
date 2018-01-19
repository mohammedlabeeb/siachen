<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
global $post; 
$title = str_replace("Private:","" ,get_the_title());
$description = get_the_content();

$slug = $post->post_name;
$status = $post->post_status;

$banner_id =  get_post_meta(get_the_ID(),'banner_image',true);
$type = get_curr_business_type_name(get_the_ID());
$sub_type = get_curr_business_type_name(get_the_ID(),get_curr_business_type(get_the_ID()));

$bg_style="";
if($banner_id!="") {
$thumb = wp_get_attachment_image_src( $banner_id, 'sia_banner' );
$bg_style="background-image:url($thumb[0])";
}

$summary = get_post_meta(get_the_ID(),'summary',true);
$address = get_post_meta(get_the_ID(),'address',true);
$land_line =  get_post_meta(get_the_ID(),'land_line',true);
$mobile =  get_post_meta(get_the_ID(),'mobile',true);
$alternate_number =  get_post_meta(get_the_ID(),'alternate_number',true);
$fax =  get_post_meta(get_the_ID(),'fax',true);
$email =  get_post_meta(get_the_ID(),'email',true);
$web_site_address =  get_post_meta(get_the_ID(),'web_site_address',true);
$twitter_id =  get_post_meta(get_the_ID(),'twitter_id',true);
$facebook_page =  get_post_meta(get_the_ID(),'facebook_page',true);
$whatsapp =  get_post_meta(get_the_ID(),'whatsapp',true);
$skype_id =  get_post_meta(get_the_ID(),'skype_id',true);
$preferred_method_of_contact =  get_post_meta(get_the_ID(),'preferred_method_of_contact',true);


$prestigious_projects =  get_post_meta(get_the_ID(),'prestigious_projects',true);
$why_choose_you =  get_post_meta(get_the_ID(),'why_choose_you',true);
$awards =  get_post_meta(get_the_ID(),'awards',true);
$refferals =  get_post_meta(get_the_ID(),'refferals',true);
$future_plans =  get_post_meta(get_the_ID(),'future_plans',true);
$leveraging_technology =  get_post_meta(get_the_ID(),'leveraging_technology',true);
$financial_strengths =  get_post_meta(get_the_ID(),'financial_strengths',true);
$corporate =  get_post_meta(get_the_ID(),'corporate',true);

$map =  get_post_meta(get_the_ID(),'map',true);




$established_year =  get_post_meta(get_the_ID(),'established_year',true);
$position_in =  get_post_meta(get_the_ID(),'position_in',true);
$number_of_employess =  get_post_meta(get_the_ID(),'number_of_employess',true);
$country =  get_post_meta(get_the_ID(),'country',true);
$state =  get_post_meta(get_the_ID(),'state',true);
$city =  get_post_meta(get_the_ID(),'city',true);
$nearest_major_city =  get_post_meta(get_the_ID(),'nearest_major_city',true);
$branch_locations =  get_post_meta(get_the_ID(),'branch_locations',true);

$products =  get_post_meta(get_the_ID(),'products',true);
$services =  get_post_meta(get_the_ID(),'services',true);
$customers =  get_post_meta(get_the_ID(),'customers',true);
$current_vacancies =  get_post_meta(get_the_ID(),'current_vacancies',true);
$advise_employee =  get_post_meta(get_the_ID(),'advise_employee',true);


?>
<article>
			<div class="banner custom-banner" style="background-color:#222;">
				<div class="container" style="background-size:100% auto;  border-left-color:#000; border-right-color:#000;<?php echo $bg_style; ?>">
					<div class="detail-profile-banner">
						<?php if(has_post_thumbnail()) : the_post_thumbnail('sia_thumb'); else : ?>
										
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-thumb.jpg" />
										<?php endif; ?>
						<div class="profile-head">
							<h3><?php echo $title; ?></h3>
							<?php if($address!="") { ?>	<p><?php echo $address; ?></p> <?php } ?>
							<br/>
							<input type="hidden" class="rating" readonly="true" value="<?php echo get_post_meta(get_the_ID() , 'rating' , true); ?>"/>
							<script>
								$('.rating').rating();
							</script>
							<?php echo get_post_meta(get_the_ID() , 'totalrates' , true); ?>
							<?php echo get_post_meta(get_the_ID() , 'totalvotes' , true); ?>
							<span class="url">siachen.com/<?php echo $slug; ?></span>
							<?php if($status =="published") { ?><h5><i class="glyphicon glyphicon-ok-sign"></i> Verified Profile</h5><?php } ?>
						</div>
						<div class="right-pageheader">
							
							<a href="#inline_content" class="wp-colorbox-inline cboxElement btn btn-default">Send Enquiry</a><br/>
							<?php if($land_line!="") { ?>	<h3>Call Us: <?php echo $land_line; ?></h3> <?php } else if($mobile!="") { ?>
							<h3>Call Us: <?php echo $mobile; ?></h3> <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="container">
					<div class="detail-profile">
						<div class="page-header">
							
							<div id="breadCrumb3" class="breadCrumbCustom module">
								<ul>
									<li>
										<a href="#">Home</a>
									</li>
									<li>
										<a href="#">Biocompare Home</a>
									</li>
									<li>
										Mutation Generation System&trade;
									</li>
								</ul>
							</div>
							
						</div>
						<div class="page-content">
							<div class="col-left cols">
								<div class="block">
									<h4>Basic Details</h4>
									<table class="table table-striped">
										<tr>
											<td><label>Organization</label></td><td><?php echo $title; ?></td>
										</tr>
										<tr>
											<td><label>Unique URL</label></td><td>siachen.com/<?php echo $slug; ?></td>
										</tr>
										<?php if($type!="") { ?>
										<tr>
											<td><label>Primary Type of Business</label></td><td><?php echo $type; ?></td>
										</tr>
										<?php } ?>
										<?php if($sub_type!="") { ?>
										<tr>
											<td><label>Sub type of business </label></td><td><?php echo $sub_type; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($established_year!="") { ?>
										<tr>
											<td><label>Established </label></td><td><?php echo $established_year; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($position_in!="") { ?>
										<tr>
											<td><label>Position in the company </label></td><td><?php echo $position_in; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($number_of_employess!="") { ?>
										<tr>
											<td><label>Number of Employees</label></td><td><?php echo $number_of_employess; ?> Employees</td>
										</tr>
										<?php } ?>
										
										<?php if($country!="") { ?>
										<tr>
											<td><label>Country of Head Quarters</label></td><td><?php echo $country; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($state!="") { ?>
										<tr>
											<td><label>State / Province </label></td><td><?php echo $state; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($city!="") { ?>
										<tr>
											<td><label>City </label></td><td><?php echo $city; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($nearest_major_city!="") { ?>
										<tr>
											<td><label>Nearest major city </label></td><td><?php echo $nearest_major_city; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($branch_locations!="") { ?>
										<tr>
											<td><label>Branch locations </label></td><td><?php echo $branch_locations; ?></td>
										</tr>
										<?php } ?>
									</table>
								</div>
								<div class="block">
									<h4>Communication</h4>
									<table class="table table-striped">
										<?php if($address!="") { ?>
										<tr>
											<td><label>Postal Address</label></td><td><?php echo $address; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($land_line!="") { ?>
										<tr>
											<td><label>Land Line</label></td><td><?php echo $land_line; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($mobile!="") { ?>
										<tr>
											<td><label>Mobile</label></td><td><?php echo $mobile; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($alternate_number!="") { ?>
										<tr>
											<td><label>Alternate Number </label></td><td><?php echo $alternate_number; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($fax!="") { ?>
										<tr>
											<td><label>FAX</label></td><td><?php echo $fax; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($email!="") { ?>
										<tr>
											<td><label>E-mail</label></td><td><?php echo $email; ?></td>
										</tr>
										<?php } ?>
										<?php if($web_site_address!="") { ?>
										<tr>
											<td><label>Web Site Address</label></td><td><?php echo $web_site_address; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($twitter_id!="") { ?>
										<tr>
											<td><label>Twitter ID</label></td><td><?php echo $twitter_id; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($facebook_page!="") { ?>
										<tr>
											<td><label>Facebook Page</label></td><td><?php echo $facebook_page; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($whatsapp!="") { ?>
										<tr>
											<td><label>Whatsapp Activated Number</label></td><td><?php echo $whatsapp; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($skype_id!="") { ?>
										<tr>
											<td><label>Skype ID</label></td><td><?php echo $skype_id; ?></td>
										</tr>
										<?php } ?>
										
										<?php if($preferred_method_of_contact!="") { ?>
										<tr>
											<td><label>Preferrmed Method of contact</label></td><td><?php echo $preferred_method_of_contact; ?></td>
										</tr>
										<?php } ?>
									</table>
								</div>
								<div class="ad" style="margin-top:0px; margin-bottom:15px;">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/ad2.png"/>
								</div>
								<div class="block freedata">
									<h4>About Business</h4>
									<h3>Business Summary </h3>
									<p><?php echo $summary; ?></p>
									<h3>
									Business Description </h3>
									<p><?php echo $description; ?></p>
									
								</div>
								<?php if($products!="" || $services!="" || $customers!="") { ?>
								<div class="block freedata">
									<h4>Products / Services</h4>
									<?php if($products!="" ) { ?>
									<h3>Products </h3>
									<p><?php echo $products; ?></p>
									<?php } ?>
									<?php if($services!="" ) { ?>
									<h3>Services </h3>
									<p><?php echo $services; ?></p>
									<?php } ?>
									<?php if($customers!="" ) { ?>
									<h3>Major Customers </h3>
									<p><?php echo $customers; ?></p>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="block freedata">
									<h4>Customer Impression</h4>
									<?php if($prestigious_projects!="" ) { ?>
									<h3>Prestigious Projects </h3>
									<p><?php echo $prestigious_projects; ?></p>
									<?php } ?>
									
									<?php if($why_choose_you!="" ) { ?>
									<h3>Why Choose Us </h3>
									<p><?php echo $why_choose_you; ?></p>
									<?php } ?>
									
									<?php if($awards!="" ) { ?>
									<h3>Awards & Recognitions </h3>
									<p><?php echo $awards; ?></p>
									<?php } ?>
									
									<?php if($refferals!="" ) { ?>
									<h3>Refferals </h3>
									<p><?php echo $refferals; ?></p>
									<?php } ?>
									
									<?php if($future_plans!="" ) { ?>
									<h3>Future Plans </h3>
									<p><?php echo $future_plans; ?></p>
									<?php } ?>
									
									<?php if($financial_strengths!="" ) { ?>
									<h3>Financial Strengths </h3>
									<p><?php echo $financial_strengths; ?></p>
									<?php } ?>
									
									<?php if($corporate!="" ) { ?>
									<h3>Corporate Responsibility </h3>
									<p><?php echo $corporate; ?></p>
									<?php } ?>
								</div>
								<div class="ad" style="margin-top:0px; margin-bottom:15px;">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/ad2.png" />
								</div>
								<div class="block freedata">
									<h4>Careers</h4>
									<?php if($current_vacancies!="" ) { ?>
									<h3>Current Vacancies </h3>
									<p><?php echo $current_vacancies; ?></p>
									<?php } ?>
									<?php if($advise_employee!="" ) { ?>
									<h3>Advise to Employees </h3>
									<p><?php echo $advise_employee; ?></p>
									<?php } ?>
								</div>
								
								<div class="ad" style="margin-top:0px; margin-bottom:0px;">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/ad2.png"/>
								</div>
								
								<?php 	comments_template('',true); ?>
							</div>
							<div class="divide cols"></div>
							<div class="col-right cols">
								<div class="block">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/ad1.png" />
								</div>
								<div class="block contact" style="margin-bottom:0px;">
									<div class="well">
										<?php 
										if(!empty($map)) {
										$lat = $map['lat'];
									$lng = $map['lng']; ?>
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
       
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
    
</script>

										<hr/>
										<?php } ?>
										<?php if($address!="") { ?>
										<h4>Address</h4>
										<address>
										<?php echo $address; ?>
										</address>
										
										<hr/>
										<?php } ?>
										<?php if($email!="") { ?>
										<h5>Mail ID : <?php echo $email; ?></h5>
										<?php } ?>
										<?php if($land_line!="") { ?>
										<h5>Land Line : <?php echo $land_line; ?></h5>
										<?php } ?>
										<?php if($mobile!="") { ?>
										<h5>Mobile : <?php echo $mobile; ?></h5>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
						</div>
					</div>
				</div>
			</div>
		</article>
<div style="display:none;">
	<div id="inline_content">
		<?php echo do_shortcode('[contact-form-7 id="104" title="Enquiry Form"]'); ?>
	</div>
</div>	
<?php endwhile; ?>			
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No posts found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>
<?php get_footer(); ?>