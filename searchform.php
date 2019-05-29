<?php
/**
 * The template for displaying the search form
 */ ?>

<form role="search" method="get" class="search-form searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter keyword&hellip;', 'placeholder', 'gmail-genius' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="search-text"><?php echo _x( 'Search This Site', 'submit button', 'gmail-genius' ); ?></span></button>
</form>
