<?php 
/**
 * The template for displaying all blog posts
 */ ?>

<?php get_header(); ?>

<main class="inner-page">
<div class="container">
<div id="about-body-wrap" class="clearfix">
		
<div id="main-wrapper">
	<div id="main-wrapper-padding">
	<h2 class="page-title"><?php wp_title(''); ?></h2>
	<?php while( have_posts() ) : the_post(); ?>
	<div id="single-page-main">
		<div id="single-page-header">
			<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<ul class="blog-meta">
				<li class="author-date">
					<i class="fa fa-clock-o" aria-hidden="true"></i> 
					<?php the_time( 'F j, Y' ); ?>
				</li>
				<li class="issue-taglist">
					<?php if ( has_tag() ) { ?>
						<i class="fa fa-tags" aria-hidden="true"></i> 
					<?php } ?> 	
						<?php the_tags(''); ?>
				</li>
			</ul><!--/.issue-meta-->
		</div><!--#single-page-header-->
		<div class="single-post-content">
			<?php the_excerpt(); ?>
		</div>
	</div><!--/#single-page-main-->
	
	<?php endwhile; ?>
	
	</div><!--#main-wrapper-padding-->
	
	<?php the_posts_navigation(); ?>

</div><!--#main-wrapper-->
	
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div> 

		</div><!--#about-body-wrap-->
	</div> <!-- .container -->
</main>






<?php get_footer(); ?>