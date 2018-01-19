
<?php 
global $wpdb;
$is_filter = (isset($_REQUEST['filter']) && $_REQUEST['filter']!="" ? 1 : 0 );
$is_glossary = (isset($_REQUEST['glossary']) && $_REQUEST['glossary']!="" ? 1 : 0 );
$is_filter_search = (isset($_REQUEST['filter_search']) && $_REQUEST['filter_search']!="" ? 1 : 0 );
$keyword = (isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : "");
$glossary = (isset($_REQUEST['glossary']) ? $_REQUEST['glossary'] : "");


 if(!$is_filter) {
	$result_text = '<span>All Business';
 } else {
	$result_text = '<span>Search result for :</span> "'.$keyword.'"';
 }
 
 	$args = array('post_type' => 'business');
	
if($is_glossary) {
	$_SESSION['sids'] = array();
	$meta_query = "SELECT `ID` FROM `siawp_posts` WHERE `post_status` = 'publish' AND `post_type` = 'business' AND `post_title` LIKE '$glossary%'";
	$metaresults = $wpdb->get_results( $meta_query, OBJECT );
	$sids = array();
	foreach($metaresults as $row) $sids[] = $row->ID;
	if(!empty($sids)) {
		$args['post__in'] = $sids;
		
	}else {
	$args['p'] = 1;
	}
}	
 if($is_filter) {
	
	$meta_query = "SELECT Distinct `post_id` FROM `siawp_postmeta` WHERE `meta_value`LIKE '%$keyword%' AND `post_id`=ANY(SELECT `ID` FROM `siawp_posts` WHERE `post_status` = 'publish' AND `post_type` = 'business')";
	$metaresults = $wpdb->get_results( $meta_query, OBJECT );
	$metaid = array();
	foreach($metaresults as $row) $metaid[] = $row->post_id;
	
	$args2 = array('post_type' => 'business', 's'=>$keyword , 'post_per_page' => -1);
	$args2['exact'] = true;
	$args2['sentence'] = false;
	$my_query2 = new WP_Query($args2);
	$sids = array();
	if ($my_query2->have_posts()) :
		while($my_query2->have_posts()): $my_query2->the_post();
			$sids[] = get_the_ID();
		endwhile;
	endif;wp_reset_postdata();wp_reset_query();
	
	$sids = array_unique(array_merge($sids,$metaid));
	$_SESSION['sids'] =array();
	if(!empty($sids)) {
		$args['post__in'] = $sids;
		$_SESSION['sids'] = $sids;
	} else {
		$args['p'] = 1;
	}
	
 }
 
 if($is_filter_search) {
	
	if(!empty($_SESSION['sids'])) $args['post__in'] = $_SESSION['sids'];
	$meta_query = array();
	if($_REQUEST['country']!="" && isset($_REQUEST['country'])) {
		$meta_query[] = array(
		'key'     => 'country',
		'value'   => $_REQUEST['country'],
		'compare' => '='
		);		
	}
	
	if($_REQUEST['state']!="" && isset($_REQUEST['state'])) {
		$meta_query[] = array(
		'key'     => 'state',
		'value'   => $_REQUEST['state'],
		'compare' => '='
		);		
	}
	
	if($_REQUEST['city']!="" && isset($_REQUEST['city'])) {
		$meta_query[] = array(
		'key'     => 'city',
		'value'   => $_REQUEST['city'],
		'compare' => '='
		);		
	}
	
	$args['meta_query'] = $meta_query;
	
 }
 
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


$args['paged'] = $paged;
//var_dump($args);
 $my_query = new WP_Query($args);
 
 

$count =  $my_query->found_posts;



query_posts($args);
?>
<?php get_header(); ?>
<article>
			<div class="banner">
				<div class="container">
					<h3><?php echo ot_get_option('search_caption'); ?></h3>
					<form class="form-inline" action= "<?php bloginfo('home'); ?>/business/" method="get">
					  <div class="form-group">
						<div class="input-group-lg">
						  <input type="text" value="<?php echo $keyword; ?>" name="keyword" class="form-control" placeholder="Enter search keyword ...">
						</div>
					  </div>
					  <?php $fvalue = (($is_filter) ?  $_REQUEST['filter'] : mt_rand(1000,100000000)); ?>
					  <input type="hidden" name="filter" value="<?php echo $fvalue; ?>">
					  <button type="submit" class="btn btn-primary btn-lg"><i class="ion-search"></i> &nbsp; Search</button>
					</form>
				</div>
			</div>
			
			<div class="content">
				<div class="container">
					<div class="col-left cols">
					<?php if ($my_query->have_posts()) : ?>
						<h4 class="result"><?php echo $result_text; ?></h4>
						<p class="result"><?php echo $count;?> Result Found</p>
					
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Find Result by Location</h3>
							</div>
							<div class="panel-body">
							
							<form action="" method="get" >
								<?php $fsearch = (($is_filter_search) ?  $_REQUEST['filter_search'] : mt_rand(1000,100000000)); ?>
								<?php if($is_filter): ?>
									<input type="hidden" name="filter" value="<?php echo $fvalue; ?>">
									<input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
								<?php endif; ?>
								<input type="hidden" name="filter_search" value="<?php echo $fsearch; ?>">
								<?php if($is_glossary): ?>
									<input type="hidden" name="glossary" value="<?php echo $glossary; ?>">
								<?php endif; ?>
								<table width="100%" class="refine-search">
									<tr>
										<td>
											<?php $CountryState = new siachen_сountries; ?>
											
											<select id="country" name="country" style="min-width:150px">
												<option value="">Select a Country</option>
												<?php echo $CountryState->country_dropdown_list();
												?>
												</select>
											
											<script>
											  $(function() {
												
												$( "#country" ).select2({
												   placeholder: "Select a Country",
													
													
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
										</td>
										<td class="divider" width="10"></td>
										<td>
											<select id="state" name="state" style="min-width:150px">
												<option value="">Select a State</option>
												
												</select>
												
											<script>
											  $(function() {
												
												$( "#state" ).select2({
												   placeholder: "Select a State",
													allowClear: true,
													
												});
											  });
											  </script>
										</td>
										<td class="divider" width="10"></td>
										<td>
											<input type="text" class="form-control" name="city" placeholder="Enter City">
										</td>
										<td class="divider" width="10"></td>
										<td>
											<button style="float:right;" type="submit" class="btn btn-default">Refine Search</button>
										</td>
									</tr>
								</table>	
								</form>
							</div>
						</div>
						
						<ul class="result-list">
							<?php while($my_query->have_posts()): $my_query->the_post(); 
												$address = get_post_meta(get_the_ID(),'address',true);
												$email = get_post_meta(get_the_ID(),'e-mail',true);
												$land_line = get_post_meta(get_the_ID(),'land_line',true);
												$mobile = get_post_meta(get_the_ID(),'mobile',true);
							?>
							<li>
								<a href="<?php the_permalink(); ?>">
									 <?php if(has_post_thumbnail()) : the_post_thumbnail('sia_thumb'); else : ?>
										
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-thumb.jpg" />
										<?php endif; ?>
									</a>
								<div class="rit-box">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									
									<p><?php the_excerpt(); ?></p>
									<div class="right-sub-left">
										<?php global $post; ?>
												<h4>siachen.com/<?php echo $post->post_name; ?></h4>
										<address>
										<?php if($address!="") { echo $address;} ?>
										<?php if($email!="") { echo "Email : $email";} ?>
										</address>
										<input type="hidden" class="rating" readonly="true" value="<?php echo get_post_meta(get_the_ID() , 'rating' , true); ?>"/>
										<script>
											$('.rating').rating();
										</script>
									</div>
									<div class="right-sub-right">
										<?php if($land_line!="") { ?>
										<h4><i class="ion-android-call"></i> <?php echo $land_line; ?></h4>
										<?php } else if($mobile!="") { ?>
										<h4><i class="ion-android-call"></i>  <?php echo $mobile; ?></h4>
										<?php } ?>
										
										<a href="#inline_content" class="callbacks btn btn-default" email="<?php echo $email; ?>">Send Enquiry</a>
									</div>
								</div>
							</li>
							<?php endwhile; ?>
							
						</ul>
						
						<?php wp_pagenavi(); ?>
						<?php wp_reset_postdata(); ?>
						<div class="ad">
							<img src="assets/images/ad2.png"/>
						</div>
					<?php else : ?>
					
					<h4 class="result"><?php echo "No Results Found"; ?></h4>
					<?php endif; ?>
					
					</div>
					<div class="divide cols"></div>
					<?php get_sidebar("right"); ?>
				</div>
			</div>
			
		</article>
<div style="display:none;">
	<div id="inline_content">
		<?php echo do_shortcode('[contact-form-7 id="104" title="Enquiry Form"]'); ?>
	</div>
</div>	

<?php get_footer(); ?>