<?php 
/**
 * The main template file
 */ ?>

<?php get_header(); ?>

<main class="inner-page">
<div class="container">
<div id="about-body-wrap" class="clearfix">
		
<div id="main-wrapper">
	<div id="main-wrapper-padding">
	
	<?php if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>

			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php endif; ?>	

	<?php while( have_posts() ) : the_post(); ?>
	
	<div id="single-page-main">
		<div id="single-page-header">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<ul class="issue-meta">
				<li class="author-date">By <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo ucwords(get_the_author()); ?></a>, <?php the_time('F j Y'); ?></li>
				<li class="issue-taglist">
					<?php if ( has_tag() ) { ?>
						<i class="fa fa-tags" aria-hidden="true"></i> 
					<?php } ?> 	
						<?php the_tags(''); ?>
				</li>
			</ul> <!--/.issue-meta-->
		</div> <!--#single-page-header-->
		<div class="single-post-content">
			<?php the_excerpt(); ?>
		</div>
	</div> <!--/#single-page-main-->
	
	<?php endwhile; endif; ?>
	
	</div><!--#main-wrapper-padding-->
	
	<?php the_posts_navigation(); ?>
	
</div>
	
<div id="sidebar">
	<?php get_sidebar(); ?>
</div> 

</div>
</div> <!-- .container -->
</main>

<?php get_footer(); ?>