<?php get_header(); ?>
			<div id="sidebarone" class="alignleft">
				<?php get_sidebar(); ?>
			</div>
			<div id="mainbody" class="alignleft">
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
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">Read more >></a>
					<br /><br />
				</div>
					<?php endwhile; ?>
				<?php  } elseif (function_exists('clean_archives_reloaded')) { clean_archives_reloaded(); } ?>		<br /><br />
		      <?php else : ?>
				<span class="title"><b>Not Found</b></span>	
			    <?php endif; ?> 
			</div>	
			<div id="sidebartwo" class="alignleft">
			<ul>
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Right') ) : else : ?>
			
				<?php endif; /* END FOR WIDGETS CALL */ ?>
			</ul>			
			</div>
		</div>						
		<div id="footer" class="spacer"><?php get_footer(); ?> </div>	
	</body>
</html>