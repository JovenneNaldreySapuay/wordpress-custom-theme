<?php
/**
 * The sidebar of our theme
 */ ?>

<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-single-post' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-single-post' ); ?>
<?php endif; ?>


