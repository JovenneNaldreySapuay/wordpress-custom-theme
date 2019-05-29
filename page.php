<?php 
/**
 * The template for displaying pages 
 */ ?> 

<?php get_header(); ?>		
<main>
	<div class="container">
		<!--Signup-->
		<section id="signup">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			
			<?php 
			if( get_field('contact_form_shortcode', 'option') ) { ?>
			
			<div class="signup-form-wrap">
    			<h3><?php the_field('email_header', 'option'); ?></h3>
			<?php 
				the_field('contact_form_shortcode', 'option'); 
			?>
			</div><!--/.signup-form-->

			<div id="undecided">
				<h4><?php the_field('email_sub_text', 'option'); ?></h4>
				<p><a href="<?php the_field('browse_link', 'option'); ?>" title="Browse newsletters archive"><?php the_field('browse_text', 'option'); ?></a></p>
			</div>
			<?php } ?>
		</section><!--#signup-->
	</div><!--/.container-->
	
	<!--Crosslinks-->
	<section id="crosslinks">
	<div class="container">
	<div class="crosslinks-text">
	<h3><?php the_field('header', 'option'); ?></h3> 
	<div id="crosslinks-logos-wrap">
	<?php if( have_rows('sponsor_images', 'option') ) : ?>
	    <?php while( have_rows('sponsor_images', 'option') ): the_row(); ?>
	        <div class="crosslinks-logo">
	        	<?php $image = get_sub_field('image'); ?>
				<a href="<?php the_sub_field('link'); ?>" target="_blank" title="<?php echo $image['title']; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
				</a>
			</div>
	    <?php endwhile; ?>
	<?php endif; ?>
	</div>
	<p><a href="<?php the_field('sub_text_link', 'option'); ?>" title="About The Gmail Genius"><?php the_field('sub_text', 'option'); ?></a></p>

	</div><!--/.crosslinks-text-->
	</div><!--/.container-->
	</section><!--#crosslinks-->
</main>

<?php get_footer(); ?>

