<?php 
/**
 * Template Name: Single Post Fullwidth
 * Template Post Type: post
 */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main class="inner-page interview-page">

<div id="interview-page-header">
	<div class="container">
		
		<h2><?php the_title(); ?></h2>

		<?php if( get_field( 'article_name' ) && get_field( 'article_link' ) ) : ?>
		<ul class="issue-meta">
		<li class="author-date"><i class="fa fa-map-marker" aria-hidden="true"></i> Featured in <a href="<?php the_field( 'article_link' ); ?>"><?php the_field( 'article_name' ); ?></a>, <?php the_field( 'article_date' ); ?></li>
		</ul>
		<?php endif; ?>
	</div>
</div>

<?php if ( get_field( 'additional_info' ) ) : ?>
<div id="interview-single-intro">	
	<div class="container">
		<div id="inbox-exposed-preview">
			<?php the_field( 'additional_info' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="container">
	<div id="about-body-wrap" class="clearfix">
		<div id="main-wrapper">
			<div id="main-wrapper-padding">
				<div id="single-page-main" class="single-interview">
					<div id="inbox-exposed-interview" class="clearfix">

						<?php the_content(); ?>

					</div>
				</div> <!-- .single-interview -->
				
				<div id="interview-pager">
					<ul class="clearfix">
					<li class="previous-interview">
						<i class="fa fa-arrow-circle-o-left fa-fw" aria-hidden="true"></i>
						<?php next_post_link('%link', '%title', TRUE); ?>
					</li>
					<li class="next-interview">
						<?php previous_post_link('%link', '%title', TRUE); ?>   
						<i class="fa fa-arrow-circle-o-right fa-fw" aria-hidden="true"></i>
					</li>
					</ul>
				</div> 

				<?php if ( comments_open() || get_comments_number() ) : ?>
				<div id="comments-section">

					<?php comments_template(); ?>

				</div>
				<?php endif; ?>
			</div>
		</div> <!-- #main-wrapper -->
	</div> <!-- #about-body-wrap -->
</div> <!-- .container -->

</main>
<?php endwhile; ?>

<!--Sign up footer for inner pages-->
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