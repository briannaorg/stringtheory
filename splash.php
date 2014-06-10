<?php
/*
Template Name: splash
*/
?>
<?php get_header(); ?>

			<main id="splash-content">
			  <?php if(have_posts()) : ?> 
			    <?php while(have_posts()) : the_post(); ?> 
			        <?php the_content(); ?> 
			    <?php endwhile; ?> 
			    <nav class="navigation"> 
			      <?php posts_nav_link(); ?> 
			    </nav> 
			    <?php else : ?> 
			    <article class="post" id="post-<?php the_ID(); ?>"> 
			      <h2> 
			        <?php _e('Not Found'); ?> 
			      </h2> 
			    </article> 
			    <?php endif; ?> 
			</main>	
									
<?php get_footer(); ?>