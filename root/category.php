<?php 
get_header();
query_posts($query_string.'&showposts=10');
?>
			<main id="category-content">
			
			  <?php if (have_posts()) : ?>
				<h1><?php echo single_cat_title(); ?></h1>
				<?php while (have_posts()) : the_post(); ?>
				<article class="post">	
				<h2 class="post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<section class="entry">
						<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>"> <?php echo get_the_time(get_option('date_format'))  /* Use get_the_time() to avoid the_date() output bug in this context. */ ?></abbr><br />
						<?php the_excerpt(); ?> 
						<br /><br />
					</section>
				</article>
				<?php endwhile; ?>
					<nav class="navigation">
						<div class="previous"><?php next_posts_link('&laquo; Previous Category Listings') ?></div>
						<div class="next"><?php previous_posts_link('More Category Listings &raquo;') ?></div>
					</nav>			
				<?php else : ?>
					<h2 class="pagetitle"><?php _e('The Category Does Not Exist', '{%= prefix %}'); ?></h2>
					<p><?php _e("Sorry, but the category you're looking for doesn't exist. Please try selecting a category from the menu.", "{%= prefix %}"); ?></p>
			 <?php endif; ?>		
			</main>
			<?php get_sidebar(); ?>
						
<?php get_footer(); ?>
		