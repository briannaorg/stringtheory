<?php get_header(); ?>
			<main id="page-content">

  				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php $attachment_link = wp_get_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
				<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<section class="entry">
						<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>
		
						<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
						<p class="postmetadata alt">
							<small>
								This entry was posted
								<?php /* This is commented, because it requires a little adjusting sometimes.
									You'll need to download this plugin, and follow the instructions:
									http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
									/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
								on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
								and is filed under <?php the_category(', ') ?>.
							</small>
						</p>
		
					</section>
				</article>
				<nav class="navigation"> 
			      <?php posts_nav_link(); ?> 
			    </nav> 
				<?php endwhile; else: ?>
 				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e( 'Not Found', '{%= prefix %}' ); ?>  
			      </h2> 
			    </article> 
			  <?php endif; ?> 
			  
			</main>	
			<?php get_sidebar(); ?>
					
<?php get_footer(); ?>
		