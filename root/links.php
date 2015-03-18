<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

			<main id="blog-content">
			  <?php wp_list_bookmarks('between=<br /><div class="archspacer">&nbsp;</div>&show_images=1&orderby=id&show_rating=0&show_description=1'); ?>
			</main>	
			<?php get_sidebar(); ?>
		
<?php get_footer(); ?>