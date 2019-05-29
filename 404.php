<?php 
/**
 * The 404 page of our theme
 */ ?>
 
<?php get_header(); ?>

<main class="inner-page">
<div class="container">

<div id="about-body-wrap" class="clearfix">

<div id="main-wrapper">
<div id="main-wrapper-padding">

<div id="single-page-main">

<h2 class="content-title">
<?php _e( 'Oops! That page can&rsquo;t be found.', 'gmail-genius' ); ?>
</h2>

<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search or browse our recent posts below?', 'gmail-genius' ); ?></p>

<?php get_search_form(); ?>

<div class="popular-contents">
<h3>Recent Posts:</h3>
<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'custom', 'before' => '', 'after' => '<br />' ) ); ?>
</div>


</div><!--/#single-page-main-->

</div><!--#main-wrapper-padding-->
</div><!--#main-wrapper-->

<div id="sidebar">

	<?php //get_sidebar(); ?>

</div><!--#sidebar-->

</div><!--#about-body-wrap-->


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

