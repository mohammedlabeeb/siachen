
<?php if ( is_active_sidebar( 'sidebar-right' ) ) { ?>
<div id="sidebar-right" class="<?php simple_boostrap_sidebar_right_classes(); ?> col-right cols" role="complementary">
    
    <?php dynamic_sidebar( 'sidebar-right' ); ?>
    
</div>
<?php } ?>