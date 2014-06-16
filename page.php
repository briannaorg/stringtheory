<?php get_header(); ?>
		
			 <main id="page-content">

			  <?php if(have_posts()) : ?> 
			    <?php while(have_posts()) : the_post(); ?> 
			    
			    	<?php get_template_part( 'content', 'page' );?>

			      <section>
			     		<?php get_template_part('content','meta'); ?>
			      </section>

				<?php endwhile; ?> 
				
			    <nav class="navigation"> 
			      <?php posts_nav_link(); ?> 
			    </nav> 
				
				<?php if (!is_page('archive')) { ?>

			    <?php comments_template(); ?>

				<? } ?>			    
			    
			    <?php else : ?> 
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e( 'Not Found', 'stringtheory' ); ?>  
			      </h2> 
			    </article> 
			  <?php endif; ?> 
			  
			</main>	
			<?php get_sidebar(); ?>
					
<?php get_footer(); ?>
		