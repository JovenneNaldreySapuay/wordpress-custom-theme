<?php 
/**
 * The template for displaying single post
 */ ?>

<?php get_header(); ?>

<main class="inner-page">
<div class="container">

<div id="about-body-wrap" class="clearfix">

<?php while( have_posts() ) : the_post(); ?>
<div id="main-wrapper">
<div id="main-wrapper-padding">

<div id="single-page-main">

<div id="single-page-header">
<h2><?php the_title(); ?></h2>
<ul class="issue-meta">
	<li class="author-date">By <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo ucwords(get_the_author()); ?></a>, <?php the_time('F j Y'); ?></li>
	<li class="issue-taglist">
		<?php if ( has_tag() ) { ?>
			<i class="fa fa-tags" aria-hidden="true"></i> 
		<?php } ?> 	
			<?php the_tags(''); ?>
	</li>
</ul><!--/.issue-meta-->
</div><!--#single-page-header-->

<div class="single-post-content">
	<?php the_content(); ?>
</div>

<!--Comments-->
<?php if ( comments_open() || get_comments_number() ) { ?>
<div id="comments-section">

<?php comments_template(); ?>

</div><!--/#comments-section-->
<?php } ?>

</div><!--/#single-page-main-->

</div><!--#main-wrapper-padding-->
</div><!--#main-wrapper-->

<?php endwhile; ?>

<div id="sidebar">

	<?php get_sidebar(); ?>

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
	</div>
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

