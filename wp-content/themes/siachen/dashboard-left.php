<div class="col-left">
							<div class="well">
								<ul class="nav nav-list"> 
								  <li class="nav-header">Manage Profile</li>        
								  <li><a href="<?php echo get_permalink(30); ?>"><i class="icon-home"></i> Edit Profile</a></li>
								  <li><a href="<?php echo get_permalink($post['ID']); ?>"><i class="icon-envelope"></i> View Profile</a></li>
								  <li class="divider"></li>
								  <li><a href="<?php echo get_permalink(76); ?>"><i class="icon-comment"></i> Settings</a></li>
								  <li><a href="<?php echo wp_logout_url(get_permalink(ot_get_option('login'))); ?>"><i class="icon-share"></i> Logout</a></li>
								</ul>
							</div>
							<div class="panel panel-default">
							  <div class="panel-heading">Profile Completeness</div>
							  <div class="panel-body">
								40% Percentage Completed
								
								
								
							  </div>
							</div>
							<table class="dashboard-boxs" width="100%">
								<tr>
									<td>
										<div class="panel panel-default">
										  <div class="panel-heading">Profile Rating</div>
										  <div class="panel-body">
											Average Rating : <?php echo get_post_meta($post['ID'],'rating',true); ?><br/>
											Total Votes : <?php echo get_post_meta($post['ID'],'totalvotes',true); ?>
										  </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="panel panel-default">
										  <div class="panel-heading">Profile Views</div>
										  <div class="panel-body">
											<?php echo get_profile_views(get_current_user_id()); ?>
										  </div>
										</div>
									</td>
								<tr/>
								<tr>
									<td>
										<div class="panel panel-default">
										  <div class="panel-heading">Last Login</div>
										  <div class="panel-body">
											<?php echo get_last_login(get_current_user_id()); ?>
										  </div>
										</div>
									</td>
								</tr>
							</table>
						</div>