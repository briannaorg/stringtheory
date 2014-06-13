<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>


				<?php if(have_posts()) : ?> 
			    <?php while(have_posts()) : the_post(); ?> 
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			     <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
			        <?php the_title(); ?></a></h2>
				<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>"> <?php echo get_the_time(get_option('date_format'))  /* Use get_the_time() to avoid the_date() output bug in this context. */ ?></abbr>
			      <section class="entry"> 
			     	 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			    	 <?php 
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							  the_post_thumbnail('photostream-thumbnail', array('class' => 'alignleft')); 
							} else {
							  echo st_get_post_image('thumbnail');
							}
					 ?>
			   		 </a>
			        <?php the_content(); ?> 
			        <?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>
			      </section> 
			      <section>
			     		<?php get_template_part('content','meta'); ?>
			      </section>
			    </article> 
			    <?php endwhile; ?> 
			    <nav class="navigation"> 
			      <?php posts_nav_link(); ?> 
			    </nav> 
			    <?php else : ?> 
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e( 'Not Found', 'stringtheory' ); ?>  
			      </h2> 
			    </article> 
			    <?php endif; ?> 
