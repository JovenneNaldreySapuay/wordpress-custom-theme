<?php 
/**
 * The template for displaying all archive posts
 */ ?> 

<?php get_header(); ?>		
<main>
	<div class="container">
		
		<div class="content-wrapper">
		
		<h2 class="archive-header">
			<?php
            if ( is_category() ) {
                single_cat_title();

            } else if ( is_author() ) {
                the_post();
                echo 'Archives By Author: ' . get_the_author();
                rewind_posts();

            } else if ( is_tag() ) {
            	single_tag_title('Tag By Name: ');

            } else if ( is_day() ) {
                echo 'Archives By Day: ' . get_the_date();

            } else if ( is_month() ) {
                echo 'Archives By Month: ' . get_the_date('F Y');

            } else if ( is_year() ) {
                echo 'Archives By Month: ' . get_the_date('Y');

            } else {
                echo 'Archives';
            }
        ?>
		</h2>
		
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="archive-content">

			<h2 class="archive-title">
			    <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
			    </a>
			</h2>

			<div class="meta">
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			<?php the_time( 'F j, Y'); ?>
			<?php
			if ( $categories ) {
			foreach ($categories as $category) {
			$output .= '<a href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>'. $sep;
			}
			}
			echo trim( $output, $sep );
			?> 
			</div>
			
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>

		</div> <!-- .archive-content -->
		<?php endwhile; ?>
	
		<div class="pagination">
		    <div class="previous"><?php previous_posts_link( 'Older Posts' ); ?></div>
		    <div class="next"><?php next_posts_link( 'Newer Posts' ); ?></div>
	    </div>
		
	</div> <!-- .content-wrapper -->

	<section id="signup">		
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

	</div><!--/.crosslinks-text-->
	</div><!--/.container-->
	</section><!--#crosslinks-->
</main>

<?php get_footer(); ?>

