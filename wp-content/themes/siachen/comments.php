<?php

	if ( post_password_required() ) { ?>
		<div id="comments" class="block">
			<?php _e("This post is password protected. Enter the password to view comments.", "simple-bootstrap"); ?>
		</div>
		<?php
		return;
	}
?>

<?php if ( have_comments() || comments_open() ) : ?>

<div id="comments" class="block">

<?php if ( have_comments() ) : ?>
	<h3><?php echo __("Customer Review", "simple-bootstrap")?></h3>
	
	<ol class="commentlist">
		<?php wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			) ); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<ul id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<ul class="pager">
			<li class="previous"><?php previous_comments_link( __("&laquo; Older Comments", "simple-bootstrap") ); ?></li>
			<li class="next"><?php next_comments_link( __("Newer Comments &raquo;", "simple-bootstrap") ); ?></li>
		</ul>
	</ul>
	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

	
 
<div id="respond">
 
<h3><?php comment_form_title( 'Rate This Business', 'Leave a Reply to %s' ); ?></h3>
 
<div class="cancel-comment-reply">
    <small><?php cancel_comment_reply_link(); ?></small>
</div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/login/">logged in</a> to post a comment.</p>
<div class="wp-social-login-widget">
 
    <div class="wp-social-login-connect-with">Connect With Social Profile</div>
 
    <div class="wp-social-login-provider-list">
    
        <a class="wp-social-login-provider wp-social-login-provider-facebook btn btn-social-icon btn-facebook">
           <i class="fa fa-facebook"></i> Facebook
        </a>
 
        <a class="wp-social-login-provider wp-social-login-provider-google">
            <img src="{provider_icon_google}" />
        </a>
 
        <a class="wp-social-login-provider wp-social-login-provider-twitter">
            <img src="{provider_icon_twitter}" />
        </a>
 
    </div> <!-- / div.wp-social-login-connect-options -->
 
    <div class="wp-social-login-widget-clearing"></div>
 
</div> <!-- / div.wp-social-login-widget -->
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
<?php if ( $user_ID ) : ?>
 
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
 
<?php else : ?>
 
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
 
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
 
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>
 
<?php endif; ?>
 
<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
 <p> Your Rate : <input type="hidden" class="rating" name="rating"/>
							<script>
								$('.rating').rating();
							</script> </p>
<p><textarea name="comment" class="form-control" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
 
<p><input name="submit" type="submit" class="btn btn-primary" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
 
</form>
 
<?php endif; // If registration required and not logged in ?>
</div>

	

<?php endif; // if you delete this the sky will fall on your head ?>

</div>

<?php endif; ?>
