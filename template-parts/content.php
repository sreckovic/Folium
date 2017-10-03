<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package folium
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php folium_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
			<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>

		<?php
			//if ( $post->post_excerpt && !is_single() ) {
			if ( has_excerpt() && !is_single() ) {

				the_excerpt();
				echo sprintf( '<div class="continue_btn"><a href="%s" class="more-link" rel="bookmark">' . wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'folium' ) ) . the_title( '<span class="screen-reader-text">"', '"</span>', false ).'</a></div>', esc_url( get_permalink() ) );

			} else {

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'folium' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			}
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'folium' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php folium_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
