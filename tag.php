<?php get_header(); ?>

			<main id="blog-content">

			  <?php if(have_posts()) : ?> 
			    <?php while(have_posts()) : the_post(); ?> 
			     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
			      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
			        <p>Tag: <?php single_tag_title(); ?></p>
			        </a></h2> 
			      	<section class="entry"> 
			        <?php the_content(); ?> 
					</section>
				</article>
				<nav class="navigation"> 
			      <?php posts_nav_link(); ?> 
			    </nav> 
				<?php endwhile; else: ?>
 				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e( 'Not Found', 'stringtheory' ); ?> 
			      </h2> 
			    </article> 
			  <?php endif; ?> 
			  
			</main>	
			<?php get_sidebar(); ?>
					
<?php get_footer(); ?>
