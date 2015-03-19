<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 */
?>

<main id="page-content">
<h1 class="page-title"><?php _e( 'Nothing Found', '{%= prefix %}' ); ?></h1>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '{%= prefix %}' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '{%= prefix %}' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '{%= prefix %}' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</main><!-- #page-content -->
