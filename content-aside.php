<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && stringtheory_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'stringtheory' ) ); ?></span>
		</div><!-- .entry-meta -->
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>"><?php echo get_post_format_string( 'aside' ); ?></a>
			</span>

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'stringtheory' ), __( '1 Comment', 'stringtheory' ), __( '% Comments', 'stringtheory' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'stringtheory' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->

	<section class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'stringtheory' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'stringtheory' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</section>
	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article>