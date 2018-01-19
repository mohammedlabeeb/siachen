<?php get_header(); ?>
<article>
		
			<?php get_template_part('content','banner'); ?>
<div class="content" class="row">
<div class="container">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
		<div class="block block-title">
			<h1 class="archive_title">
				<?php echo get_the_archive_title() ?>
			</h1>
		</div>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<?php simple_boostrap_display_post(true); ?>
		
		<?php endwhile; ?>	
		
		<?php simple_boostrap_page_navi(); ?>	
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No items found.", "simple-bootstrap"); ?></p>
		</article>
		
		<?php endif; ?>

	</div>

	
	<?php get_sidebar("right"); ?>

</div>
</div>
</article>

<?php get_footer(); ?>