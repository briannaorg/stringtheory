<?php get_header(); ?>
			<div id="sidebarone" class="alignleft">
				<?php get_sidebar(); ?>
			</div>
			<div id="mainbody" class="alignleft">
			        <h2 class="center">Error 404 - Not Found</h2>
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