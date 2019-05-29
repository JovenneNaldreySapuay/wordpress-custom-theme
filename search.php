<?php 
/**
 * The template for displaying search results 
 */ ?>

<?php get_header(); ?>
	
<main class="inner-page">
<div class="container">

<div id="about-body-wrap" class="clearfix">

<div id="main-wrapper">
<div id="main-wrapper-padding">

<div id="single-page-main">

<div class="heading">
	<?php if( have_posts() ) : ?>
		<h2 class="content-title">
		<?php printf( __( 'Search Results for: %s', 'gmail-genius' ), '<span>' . 
		get_search_query() . '</span>' ); ?> </h2>
	<?php else : ?>
		<h2 class="content-title"><?php _e( 'Nothing Found!', 'gmail-genius' ); ?></h2>
	<?php endif; ?>
</div>

<?php if( have_posts() ) : 
	while ( have_posts() ) : the_post(); ?>
	
	<div class="content-area">

		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div>

	<?php endwhile; ?>

<?php else : ?>

	<div class="post-not-found">
		<p>
			<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gmail-genius' ); ?>
		</p>
		<?php get_search_form(); ?>	
	</div>

<?php endif; ?>


</div>

</div>
</div>

<div id="sidebar">

	<?php get_sidebar(); ?>

</div>

</div>

</div><!--/.container-->

</main>

<div id="innerpage-footer">

<section id="signup" class="signup-footer">
<div class="container">

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
	</div><!--#undecided-->
	<?php } ?>

</div><!--/.container-->
</section><!--#signup-->

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
	
	</div><!--/.crosslinks-text-->
	</div><!--/.container-->
	</section><!--#crosslinks-->

</div><!--#innerpage-footer-->

<?php get_footer(); ?>

