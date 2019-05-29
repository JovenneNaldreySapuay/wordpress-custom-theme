<?php
/**
 * Template Name: About Page 
 */ ?>

<?php get_header(); ?>

<main class="inner-page">
<div class="container">

<div id="about-body-wrap" class="clearfix">

<div id="main-wrapper">
<div id="main-wrapper-padding">

<div id="about-intro">
<?php while( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
</div>

<div class="smedia-links-wrapper">

<h4><?php the_field( 'header_text', 'option' ); ?></h4>
<ul class="team-profile-smedia social-links">
<?php if( get_field( 'fb_url', 'option' ) ) : ?>
<li class="facebook">
<a href="<?php the_field( 'fb_url', 'option' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
<?php if( get_field( 'twitter_url', 'option' ) ) : ?>
<li class="twitter">
<a href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
<?php if( get_field( 'linkedin_url', 'option' ) ) : ?>
<li class="linkedin">
<a href="<?php the_field( 'linkedin_url', 'option' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
</ul>
</div>

<div id="about-team">

<h2><?php the_field( 'team_heading', 'option' ); ?></h2>

<?php if( have_rows('our_team', 'option') ) : ?>

<div id="team-grid">

<?php while( have_rows('our_team', 'option') ): the_row(); ?>

<?php $image = get_sub_field('image'); ?>

<div class="team-profile">
<div class="team-profile-align">

<div class="team-img-wrap img-shadowed">
<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
</div>

<h3><?php the_sub_field( 'name' ); ?></h3>
<h4><?php the_sub_field( 'position' ); ?></h4>

<ul class="team-profile-smedia">
<?php if( get_sub_field( 'fb_link' ) ) : ?>
<li class="facebook">
<a href="<?php the_sub_field( 'fb_link' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
<?php if( get_sub_field( 'twitter_link' ) ) : ?>
<li class="twitter">
<a href="<?php the_sub_field( 'twitter_link' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
<?php if( get_sub_field( 'linkedin_link' ) ) : ?>
<li class="linkedin">
<a href="<?php the_sub_field( 'linkedin_link' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
<?php if( get_sub_field( 'instagram_link' ) ) : ?>
<li class="instagram">
<a href="<?php the_sub_field( 'instagram_link' ); ?>" target="_blank">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
</span>
</a>
</li>
<?php endif; ?>
</ul>

<?php the_sub_field( 'description' ); ?>

</div>
</div>

<?php endwhile; ?>
</div><!--#team-grid-->
<?php endif; ?>

</div><!--#about-team-->

</div><!--#main-wrapper-padding-->
</div><!--#main-wrapper-->


<!--Sidebar-->

<div id="sidebar">

	<?php get_sidebar(); ?>

</div><!--#sidebar-->

</div><!--#about-body-wrap-->


</div><!--/.container-->

</main>

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

