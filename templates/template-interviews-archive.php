<?php 
/**
 * Template Name: Interviews Archive
 */ ?>

<?php get_header(); ?>

<main class="inner-page">
<div class="container">

<div id="about-body-wrap" class="clearfix">

<!--Main content-->

<div id="main-wrapper">
<div id="main-wrapper-padding">

<div id="archive-links-stack">

	<?php

		$args = array(
			'post_type'       => 'post',
			'category_name'   => 'featured-posts',
			'posts_per_page'  => 5,
			'paged'           => get_query_var('paged'),
		); 
	?>

	<?php

		$q = new WP_Query( $args ); 
	
		if ( $q->have_posts() ) : 
	?> 

	<h2><?php echo esc_html( get_the_title() ); ?></h2>


<!--Interview-->

	<?php while ( $q->have_posts() ) : $q->the_post(); ?>

<div class="interview-preview-wrap clearfix">

<!--Link and publication date-->

<div class="interview-preview-link">
<div class="interview-links">
<ul class="archive-link">
<li class="archive-link-title">
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</li>
<li class="archive-link-date"><?php the_time('F j Y'); ?></li>
</ul><!--/.archive-link-->
</div><!--/.interview-links-->
</div><!--/.interview-preview-link-->

<!--Thumbnail-->
<?php 
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
$thumb_url = $thumb_url_array[0];
?>
<div class="interview-preview-img">
<a href="<?php the_permalink(); ?>">
	<img src="<?php echo $thumb_url; ?>" alt="">
</a>
</div><!--/.interview-preview-img-->

</div><!--/.interview-preview-wrap-->

	<?php endwhile; ?>

	<?php wp_pagenavi( array( 'query' => $q ) ); ?>

	<?php wp_reset_postdata(); ?>

	<?php endif; ?>

</div><!--/#archive-links-stack-->





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

