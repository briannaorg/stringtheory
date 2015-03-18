<?php get_header(); ?>
			<main id="blog-content">

			  <h2 class="center"><?php _e( 'That page was not found!' );</h2>
			  
			  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-home"></i> Return Home </a>
			  			  
			</main>	
			<?php get_sidebar(); ?>
					
<?php get_footer(); ?>
		