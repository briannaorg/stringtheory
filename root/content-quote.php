<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail('photostream-thumbnail', array('class' => 'alignleft')); 
			} else {
			  echo st_get_post_image('thumbnail');
			}
	 	?>
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'quote' ) ); ?>"><?php echo get_post_format_string( 'quote' ); ?></a>
			</span>


			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'stringtheory' ), __( '1 Comment', 'stringtheory' ), __( '% Comments', 'stringtheory' ) ); ?></span>
			<?php endif; ?>

		</div><!-- .entry-meta -->

		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'stringtheory' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'stringtheory' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>


</article><!-- #post-## -->
