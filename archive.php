<?php get_header(); ?>
			<main id="page-content" class="archive">
			 <?php 
				query_posts($query_string.'&showposts=20');?>
				<?php if (have_posts()) :
		
				if (is_month()) { // daily archive listing ?>
				<h2 class="pagetitle"><?php the_time('F Y'); ?></h2>
				<br />		
					<?php while (have_posts()) : the_post(); ?>
					<h2 class="post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>		
				<div class="archpost">
					<span class="emph"><?php the_date(); ?></span><br />
					<?php the_excerpt(); ?> 
					<br /><br />
				</div>
					<?php endwhile; ?>
				<?php  } elseif (function_exists('clean_archives_reloaded')) { clean_archives_reloaded(); } ?>		<br /><br />
		      <?php else : ?>
			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			      <h2> 
			        <?php _e('Not Found'); ?> 
			      </h2> 
			    </article
			    <?php endif; ?> 
			</main>	
			<?php get_sidebar(); ?>
<?php get_footer(); ?>
		