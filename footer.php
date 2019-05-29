<?php 
/**
 * The footer of our theme 
 */ ?>

<footer>
	<?php the_field('footer_text', 'option'); ?>
</footer>

<div id="ggSidenav" class="sidenav">
	<div id="sidebar-menu-wrap">
		<div id="sidebar-menu">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php 
	          if ( has_nav_menu('primary') ) {
	              wp_nav_menu(array(
	                  'theme_location' => 'primary',
	                  'menu_class'     => '',
	              ));
	          }
	        ?> 
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>