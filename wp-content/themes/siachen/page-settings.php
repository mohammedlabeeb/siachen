<?php if(!is_user_logged_in()) {
	wp_redirect( get_permalink(26));exit;
}
if(isset($_REQUEST['submit'])) {
	
					
	
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
			<div class="content dashboard-content">
				<div class="container">
					<!--Dashboard-->
					<?php $post_id = get_user_meta(get_current_user_id(), 'business_post', true);
									$post = get_post($post_id,'ARRAY_A','edit');
									
									$userdata = get_userdata(get_current_user_id());
									?>
						<?php get_template_part('dashboard','left'); ?>
						<div class="col-right">
						
						<form action="" method="POST" id="account" >
							<div class="tab-pane" id="basic-details">
									<h4>Account Settings</h4>
									<div class="col-sm-6" style="padding-left:0">										
									 <div class="form-group">
										<label for="firstname">First Name</label>
										<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $userdata->first_name; ?>" placeholder="First Name">
									 </div>	
									</div> 
									<div class="col-sm-6" style="padding-right:0">
									 <div class="form-group">
										<label for="lastname">Last Name</label>
										<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $userdata->last_name; ?>" placeholder="First Name">
									 </div>	
									</div>
									 <div class="form-group">
										<label for="password">New Password</label>
										<input type="password" class="form-control" name="password" id="password" value="" placeholder="New Password">
									 </div>
									</div>
									<div class="col-md-2" style="float:right;text-align:right;padding-right:0" >
										<input type="button" name="accountsubmit" id="accountsubmit" class="btn btn-default btn-lg" value="Update" />
									 </div>
								</form>
								<div class="tab-pane" id="basic-details">
									<h4>Logo</h4>
									<?php $post_id = get_user_meta(get_current_user_id(), 'business_post', true); ?>
									
									
											
												
											
											
										<form id="uploadForm" action="" method="post">
										<?php if(has_post_thumbnail($post_id)) { 
											$thumb_id = get_post_thumbnail_id($post_id);
											$thumb = wp_get_attachment_image_src( $thumb_id, 'medium' );
											?>
											<div id="targetLayer"><span><img src="<?php echo $thumb[0]; ?>" /></span><input type="button" style="margin-left: 60px;" id="logodelete" value="Delete" class="btnDelete btn btn-default" /></div>
											<div id="uploadFormLayer" style="display:none">
											<label>Upload Image File:</label><br/>
											<input name="userImage" type="file" class="inputFile" />
											<input type="submit" value="Submit" class="btnSubmit btn btn-default btn-lg" />
											</div>
											<?php } else { ?>
												<div id="targetLayer"></div>
											<div id="uploadFormLayer">
											<label>Upload Image File:</label><br/>
											<input name="userImage" type="file" class="inputFile" />
											<input type="submit" id="logosubmit" value="Submit" class="btnSubmit btn btn-default btn-lg" />
											</div>
											
											<?php } ?>
										</form>
									
						</div>
						
						<div class="tab-pane" id="basic-details">
									<h4>Banner</h4>
									<?php $post_id = get_user_meta(get_current_user_id(), 'business_post', true); ?>
									
									
											
												
											
											
										<form id="uploadForm1" action="" method="post">
										<?php
										$banner_id = get_post_meta($post_id,'banner_image',true); 
										if($banner_id!="") { 
											
											$thumb = wp_get_attachment_image_src( $banner_id, 'medium' );
											?>
											<div id="targetLayer1"><span><img src="<?php echo $thumb[0]; ?>" /></span><input type="button" style="margin-left: 60px;" id="bannerdelete" value="Delete" class="btnDelete btn btn-default" /></div>
											<div id="uploadFormLayer1" style="display:none">
											<label>Upload Image File:</label><br/>
											<input name="userImage" type="file" class="inputFile" />
											<input type="submit" value="Submit" class="btnSubmit btn btn-default btn-lg" />
											</div>
											<?php } else { ?>
												<div id="targetLayer1"></div>
											<div id="uploadFormLayer1">
											<label>Upload Image File:</label><br/>
											<input name="userImage" type="file" class="inputFile" />
											<input type="submit" id="bannerupdate" value="Submit" class="btnSubmit btn btn-default btn-lg" />
											</div>
											
											<?php } ?>
										</form>
									
						</div>
						
					<!--Dashboard-->
				</div>
			</div>
		</article>
		
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/filescript.js"></script>
<script>
	jQuery(document).ready(function($) {
		$('#accountsubmit').click(function() {
				
					var fname = $("#firstname").val();
					var lname = $("#lastname").val();
					var pswd = $("#password").val();
					$('#accountsubmit').val('Updating...');
					$('#accountsubmit').addClass('disabled');
					
					 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=update_account_data&fname=' + fname + '&lname='+lname+ '&pswd='+pswd,

					success:function(results)
							 {
							 
							  var obj = JSON.parse(results);
							  
								$("#firstname").val(obj.first_name);
								$("#lastname").val(obj.last_name);
								
								$('#accountsubmit').val('Update');
								$('#accountsubmit').removeClass('disabled');
			
									}
					});
					});
					
					$('#logodelete').click(function() {
						$('#logodelete').val('Deleting...');
					$('#logodelete').addClass('disabled');
						$.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=delete_logo',

					success:function(results)
							 {
							 
							  document.location.reload(true);
			
									}
					});
					});
					
					$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$('#logoupdate').val('Updating...');
					$('#logoupdate').addClass('disabled');
		$.ajax({
        	url: "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=update_logo",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(results)
		    {
			document.location.reload(true);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
	
	$("#uploadForm1").on('submit',(function(e) {
		e.preventDefault();
		$('#bannerupdate').val('Updating...');
					$('#bannerupdate').addClass('disabled');
		$.ajax({
        	url: "<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=update_banner",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(results)
		    {
			document.location.reload(true);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
	
	$('#bannerdelete').click(function() {
						$('#bannerdelete').val('Deleting...');
					$('#bannerdelete').addClass('disabled');
						$.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=delete_banner',

					success:function(results)
							 {
							 
							  document.location.reload(true);
			
									}
					});
					});
					
		
		
	});
								</script>
<?php get_footer(); ?>