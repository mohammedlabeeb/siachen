<div class="banner">
				<div class="container">
					<h3><?php echo ot_get_option('search_caption'); ?></h3>
					<form class="form-inline" action= "<?php bloginfo('home'); ?>/business/" method="get">
						<?php wp_nonce_field( 'search-nonce', 'filter' ); ?>
					  <div class="form-group">
						<div class="input-group-lg">
						  <input type="text" class="form-control" name="keyword" title="Lorem Ipsum is simply dummy text of the printing and typesetting industry." placeholder="Enter search keyword ..." required>
						</div>
						
					  </div>
					  <button type="submit" class="btn btn-primary btn-lg"><i class="ion-search"></i> &nbsp; Search</button>
					</form>
					
				</div>
			</div>