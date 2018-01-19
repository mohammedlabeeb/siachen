<?php
/*
Template Name: Home page
*/
?>

<?php get_header(); ?>
<article>
		
			<?php get_template_part('content','banner'); ?>
<div class="content">
				<div class="container">
					<div class="col-left cols">
						<div class="well">
							<h3><?php echo ot_get_option('welcome_head'); ?></h3>
							<p><?php echo ot_get_option('welcome_text'); ?></p>
							<?php if(!is_user_logged_in()) { ?><a href="<?php echo get_permalink(ot_get_option('register')); ?>" class="btn btn-default"><i class="ion-android-social-user"></i> &nbsp; Create Your Free Account</a>
							<?php } ?>
							<br/>&nbsp;
						</div>
						<h4>Top Categories</h4>
						<?php 
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
								'parent'            => 0,
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
							$i=0;
							$count = count($terms);
 ?>
						<ul class="category-list">
						<?php foreach($terms as $term) { 
								$i++;
								if($i > ot_get_option('cat_count')) break;
							?>
							<li>
								<a href="<?php echo get_term_link($term); ?>">
									<span><i class="<?php the_field('icon_class', $term); ?>"></i></span>
									<h3><?php echo $term->name; ?></h3>
									<?php 
									$args['parent'] = $term->term_id;
									$child = get_terms($taxonomies, $args); ?>
									<p>Sub Categories (<?php echo count($child); ?>)</p>
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php if($count > ot_get_option('cat_count')) { ?>
						<a href="<?php bloginfo('home'); ?>/business-type/" class="btn-loadmore">
							Load More <i class="ion-arrow-right-b"></i>
						</a>
						<?php } ?>
						<?php } ?>
						<div class="colsrow">
							<div class="cols-left">
								<h4>Profile of the month</h4>
								<ul class="result-list">
									<li>
									<?php 
									$pom = ot_get_option('profile_of_month');
									$args = array('post_type' => 'business' , 'p'=> $pom ); 
									query_posts($args);
									if(have_posts()) : while(have_posts()) : the_post();
									?>
									<a href="<?php the_permalink(); ?>">
									 <?php if(has_post_thumbnail()) : the_post_thumbnail('sia_thumb'); else : ?>
										
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-thumb.jpg" />
										<?php endif; ?>
									</a>
										<div class="rit-box">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="right-sub-left">
												<?php global $post; ?>
												<h4>siachen.com/<?php echo $post->post_name; ?></h4>
												<address>
												<?php if($address = get_post_meta(get_the_ID(),'address',true) != "") { echo get_post_meta(get_the_ID(),'address',true); }
												$email = get_post_meta(get_the_ID(),'e-mail',true);
												$land_line = get_post_meta(get_the_ID(),'land_line',true);
												$mobile = get_post_meta(get_the_ID(),'mobile',true);
													?>
												<?php if($email != "") { echo "Email : $email"; } ?>
												<?php if( $land_line != "") { echo "Phone : $land_line"; } else if( $mobile != "") { echo "land_line : $mobile"; } ?>
												</address>
												<input type="hidden" class="rating" value="3"/>
												<script>
													$('.rating').rating();
												</script>
											</div>
											<div class="right-sub-right">
												<a href="<?php the_permalink(); ?>" class="btn btn-default">View Profile</a>
											</div>
										</div>
										<?php endwhile; endif; wp_reset_query(); ?>
									</li>
								</ul>
							</div>
							<div class="cols-right">
							<?php 
									$pom = ot_get_option('best_blog_post');
									$args = array('post_type' => 'post' , 'p'=> $pom ); 
									query_posts($args);
									if(have_posts()) : while(have_posts()) : the_post();
									?>
								<h4>Best blog post</h4>
								<ul class="result-list">
									<li>
										<a href="<?php the_permalink(); ?>">
									 <?php if(has_post_thumbnail()) : the_post_thumbnail('sia_thumb'); else : ?>
										
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-thumb.jpg" />
										<?php endif; ?>
									</a>
										<div class="rit-box">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<span class="author">Author : <a href="#"><?php the_author(); ?></a></span>
											<p><?php the_excerpt(); ?></p>
											<a href="<?php the_permalink(); ?>" class="btn btn-default">Read More</a>
										</div>
									</li>
								</ul>
								<?php endwhile; endif; wp_reset_query(); ?>
							</div>
						</div>
						<div class="ad">
							<img src="assets/images/ad2.png"/>
						</div>
					</div>
					<div class="divide cols"></div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</article>

<?php get_footer(); ?>