<?php get_header(); ?>
			<main id="blog-content">

			  <?php if(have_posts()) : ?> 
			    <?php while(have_posts()) : the_post(); ?> 
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
			        <?php the_title(); ?> 
			        </a></h2>
					<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>"> <?php echo get_the_time(get_option('date_format'))  /* Use get_the_time() to avoid the_date() output bug in this context. */ ?></abbr>
			      <section class="entry"> 
			        <?php the_content(); ?> 
			        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			      </section>
				<?php comments_template(); ?>
			    </article> 		
		    <?php endwhile; ?> 
			
			    <nav class="navigation"> 
					<div class="prevlink"><?php previous_post_link('&laquo; %link') ?></div>
					<div class="nextlink"><?php next_post_link('%link &raquo;') ?></div>
			    </nav> 
			    <?php else : ?> 
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e( 'Not Found', '{%= prefix %}' ); ?>  
			      </h2> 
			    </article> 
			  <?php endif; ?> 
			  
			</main>	
			<?php get_sidebar(); ?>
					
<?php get_footer(); ?>