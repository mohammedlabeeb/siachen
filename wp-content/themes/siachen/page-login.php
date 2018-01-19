<?php if(is_user_logged_in()) {
	wp_redirect( get_permalink(30));exit;
}
if(isset($_REQUEST['act_email']) && isset($_REQUEST['act_user']) && $_REQUEST['act_user'] >0 && is_numeric($_REQUEST['act_user'])) {
	$user = get_user_by('id',$_REQUEST['act_user']);
	
	if($user->user_email == $_REQUEST['act_email']) {
		update_user_meta($user->ID ,'email_activation',1);
		$msg1 = "Your account Activated";
	} else {
		$msg = "Email Verification Failed";
	}
}
if(isset($_REQUEST['submit'])) {
	$check = check_ajax_referer( 'ajax-login-nonce', 'security' );
	
	$info = array();
	if(is_email($_POST['username'])) {
		 $user = get_user_by('email',$_POST['username']);
		 $info['user_login'] = $user->user_login;
	} else {
		 $info['user_login'] = $_POST['username'];
	}	
   
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;
	
	$user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        $msg = "Wrong username or password.";
    } else {
		if( get_user_meta($user_signon->ID ,'email_activation',true) == 1) {
			wp_redirect(get_permalink(30));exit;
			} else {
			wp_logout();
			$msg = "Email is Not Activated";
			}
    }
}
?>
<?php get_header(); ?>

<article>
			<?php get_template_part('content','banner'); ?>
			<div class="content">
				<div class="container">
					<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
						<div class="panel panel-default" >
							<div class="panel-heading">
								<div class="panel-title">Login</div>
								<div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="<?php echo get_permalink(61); ?>">Forgot password?</a></div>
							</div>     

							<div style="padding-top:30px" class="panel-body" >
								<?php if(isset($msg)) { ?>
								<div  id="login-alert" class="alert alert-danger col-sm-12"> <?php echo $msg; ?></div>
								<?php } ?>	
								<?php if(isset($msg1)) { ?>
								<div  id="login-alert" class="alert alert-success col-sm-12"> <?php echo $msg1; ?></div>
								<?php } ?>
								<form id="login" action="" method="post" class="form-horizontal" role="form">
											
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="username" type="text" class="form-control" name="username" value="" placeholder="Username or Email">                                        
									</div>
									
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="password" type="password" class="form-control" name="password" placeholder="Password">
									</div>
									
									<div style="margin-top:10px" class="form-group">
										<div class="col-sm-12 controls">
											<input type="submit" class="btn btn-default" value="Login" name="submit" />
											
										</div>
									</div>
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
									<div class="form-group">
										<div class="col-md-12 control">
											<div style="border-top: 1px solid #ccc; padding-top:15px; font-size:85%" >
												Don't have an account!
												<a href="<?php echo get_permalink(28); ?>">
													Create an account
												</a>
											</div>
										</div>
									</div>  
									
								</form>     
							</div>                     
						</div>  
					</div>
				</div>
			</div>
		</article>

<?php get_footer(); ?>