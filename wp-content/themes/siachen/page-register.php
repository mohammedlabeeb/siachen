<?php if(is_user_logged_in()) {
	wp_redirect( get_permalink(30));exit;
}
if(isset($_REQUEST['submit'])) {
	$check = check_ajax_referer( 'register-nonce', 'security' );
	
					$userdata['user_login'] = sanitize_user($_POST['username']);
					$userdata['first_name'] = $_POST['firstname'];
					$userdata['last_name']	= $_POST['lastname'];
					$userdata['user_email']	= sanitize_email($_POST['email']);
					$userdata['user_pass']	= $_POST['passwd'];
					$userdata['role']		= 'business_user';
				
					$user_id = wp_insert_user( $userdata );
					
					if(!is_wp_error($user_id)) {
						$my_post = array(
						  'post_title'    => $_POST['businessname'],
						  'post_name'  => wp_unique_post_slug( sanitize_title( $_POST['username'] ) ),
						  'post_status'   => 'private',
						  'post_author'   => $user_id,
						  'post_type' => 'business'
						);

						// Insert the post into the database
						$post_id = wp_insert_post( $my_post );
						
						update_usermeta( $user_id, 'business_post', $post_id);
						update_usermeta( $user_id, 'email_activation', 0);
						
						$info = array();
	
						$info['user_login'] = $_POST['username'];
						$info['user_password'] = $_POST['passwd'];
						$info['remember'] = true;
						$user_signon = wp_signon( $info, false );
						if ( is_wp_error($user_signon) ){
							echo $msg = "Wrong username or password.";
						} else {
							wp_redirect( get_permalink(30));exit;
						}
					}

}
?>
<?php get_header(); ?>

<article>
			<?php get_template_part('content','banner'); ?>
			
			
			<div class="content">
				<div class="container">
					<div id="signupbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">Signup</div>
								<div style="float:right; font-size: 85%; position: relative; top:-20px"><a href="<?php echo get_permalink(26); ?>">Already have an account?</a></div>
							</div>  
							<div class="panel-body" >
								<form id="signupform" data-toggle="validator" action="" method="POST" class="form-horizontal" role="form">
									
									<div id="signupalert" style="display:none" class="alert alert-success">
										<p><i class="glyphicon glyphicon-ok-sign"></i>Success</p>
									</div>
									
									<div id="signupalert" style="display:none" class="alert alert-danger">
										<p><i class="glyphicon glyphicon-remove-sign"></i>Error</p>
									</div>
										
									
									<div class="form-group">
										<label for="businessname" class="col-md-3 control-label">Business Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="businessname" name="businessname" placeholder="Business Name" >
											<span class="help-inline"></span>
										</div>
									</div>  
									<div class="form-group">
										<label for="username" class="col-md-3 control-label">Business Unique ID</label>
										<div class="col-md-9">
											<input type="text" id="username" class="form-control" name="username" placeholder="Business Unique ID" >
											<span class="help-inline"></span>
										</div>
									</div>  
									<div class="form-group">
										<label for="email" class="col-md-3 control-label">Email</label>
										<div class="col-md-9">
											<input type="email" id="email" class="form-control" name="email" placeholder="Email Address" >
											<span class="help-inline"></span>
										</div>
									</div>
										
									<div class="form-group">
										<label for="firstname" class="col-md-3 control-label">First Name</label>
										<div class="col-md-9">
											<input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" >
											<span class="help-inline"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="lastname" class="col-md-3 control-label">Last Name</label>
										<div class="col-md-9">
											<input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name" >
											<span class="help-inline"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-md-3 control-label">Password</label>
										<div class="col-md-9">
											<input type="password" id="password" class="form-control" name="passwd" placeholder="Password" >
											<span class="help-inline"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="cpassword" class="col-md-3 control-label">Confirm Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" id="cpasswd" name="cpasswd" data-match="#password" placeholder="Confirm Password" >
											<span class="help-inline"></span>
										</div>
									</div>
								
									<div class="form-group">
										<!-- Button -->                                        
										<div class="col-md-offset-3 col-md-9">
											<input id="btn-signup" name="submit" type="submit" class="btn btn-default" value="Sign Up" />  
										</div>
									</div>
									<?php wp_nonce_field( 'register-nonce', 'security' ); ?>
								</form>
							 </div>
						</div>						
					</div> 
				</div>
			</div>
		</article>
		<style>
			.form-group.error input{
			    border-color: #b94a48;
			}
			.form-group.error .help-inline{
			color: #b94a48;
			}
		</style>
		<script>
			jQuery(document).ready(function($){
				$('form#signupform .form-control').focus(function() {
			//$(this).val()=="";
			$(this).parent('div').parent('.form-group').removeClass('error');
			$(this).parent('div').find('.help-inline').html('');
	   });
	   $('form#signupform #businessname').blur(function(){
			var str = $(this).val();
			var newString = str.replace(/[^A-Z0-9]/ig, "");
			$('form#signupform #username').val(newString.toLowerCase());
		});
		
		$('form#signupform #username').blur(function(){
			var str = $(this).val();
			var newString = str.replace(/[^A-Z0-9]/ig, "");
			$(this).val(newString.toLowerCase());
			
			var username = $('form#signupform #username').val();
			
			
			
				 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=usernamecheck&username=' + username,

					success:function(results)
							 {
							  
							  if(results == 1) {
							  
								$("#username").parent('div').parent('.form-group').addClass('error');
								$("#username").parent('div').find('.help-inline').html('Unique ID Already Exist');
								f = 1;
							  }
			
									}
					});
			
		});
		
		$('form#signupform #email').blur(function(){
			var email = $('form#signupform #email').val();
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if(re.test(email) == false) {
				$("#email").parent('div').parent('.form-group').addClass('error');
				$("#email").parent('div').find('.help-inline').html('Not Valid Email');
				
			}
			
				 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=emailcheck&email=' + email,

					success:function(results)
							 {
							  
							  if(results == 1) {
							  
								$("#email").parent('div').parent('.form-group').addClass('error');
								$("#email").parent('div').find('.help-inline').html('Email Already Exist');
								f = 1;
							  }
			
									}
					});
			
			
		});
					 // for user registration form
    $("form#signupform").submit(function(e){
		
      
	   var f=0;
	   
	   $('form#signupform .form-control').each(function() {
			if($(this).val()=="") {
			$(this).parent('div').parent('.form-group').addClass('error');
			$(this).parent('div').find('.help-inline').html('Required');
			f=1;
			}
	   }); 
	   
	   if(f == 0 ) {
			var username = $('form#signupform #username').val();
			
			
			
				 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=usernamecheck&username=' + username,

					success:function(results)
							 {
							  
							  if(results == 1) {
							  
								$("#username").parent('div').parent('.form-group').addClass('error');
								$("#username").parent('div').find('.help-inline').html('Unique ID Already Exist');
								f = 1;
							  }
			
									}
					});
			
			
		}
		
		
	    if(f == 0 ) {
			var email = $('form#signupform #email').val();
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if(re.test(email) == false) {
				$("#email").parent('div').parent('.form-group').addClass('error');
				$("#email").parent('div').find('.help-inline').html('Not Valid Email');
				f = 1;
			}
			if(f == 0 ) {
				 $.ajax({
						url:"<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php",
						type:'POST',
						data:'action=emailcheck&email=' + email,

					success:function(results)
							 {
							  
							  if(results == 1) {
							  
								$("#email").parent('div').parent('.form-group').addClass('error');
								$("#email").parent('div').find('.help-inline').html('Email Already Exist');
								f = 1;
							  }
			
									}
					});
			}
			
		}
		
	   if(f == 0 ) {
			if($('form#signupform #password').val() != $('form#signupform #cpasswd').val()) {
				$("#cpasswd").parent('div').parent('.form-group').addClass('error');
				$("#cpasswd").parent('div').find('.help-inline').html('Password Not Matching');
				f = 1;
				}
	   }
	   //console.log(f);
	   if(f == 0) {
			return true;
		} else {
			 e.preventDefault();
		}
	   
	   
    });
				});
		</script>

<?php get_footer(); ?>