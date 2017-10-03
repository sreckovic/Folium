<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package folium
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer <?php if ( has_custom_logo() ) echo 'footer-branding' ?>" role="contentinfo">
		<div class="container">

			<nav id="footer-navigation" class="footer-navigation" role="navigation">
				<?php folium_the_custom_logo(); ?>
				<?php if( has_nav_menu( 'menu-2' ) ): ?>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu', 'depth' => 1 ) ); ?>
				<?php endif; ?>
			</nav><!-- #footer-navigation -->

			<div class="site-info">
				<div class="footer-copyright">

					<?php

					$copyright = get_theme_mod( 'copyright' ); // 'Only variables can be passed to empty() prior to PHP 5.5.' - NS Theme Check

					if ( get_theme_mod( 'copyright' ) !== '' && !empty( $copyright ) ) {
						echo esc_html( get_theme_mod( 'copyright' ) );
					} else { ?>

					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'folium' ) ); ?>">
						<?php /* translators: WordPress as default value for 'Powered by' */
						printf( esc_html__( 'Powered by %s', 'folium' ), 'WordPress' ); ?>
					</a>
					<span class="sep"> | </span>
					<?php /* translators: folium is default value for 'theme by' */
					printf( esc_html__( '%1$s theme by %2$s.', 'folium' ), 'folium', '<a href="' . esc_url( __( 'https://igloothemes.com/', 'folium' ) ) . '" rel="designer">Igloo themes</a>' ); ?>

					<?php } ?>

				</div><!-- .footer-copyright -->

				<div class="social-media">
					<?php
					if ( is_dynamic_sidebar('footer-1') ) {
						dynamic_sidebar('footer-1');
					}
					?><!-- Widget location to hold social icons or other site info -->
				</div><!-- .social-media -->
			</div><!-- .site-info -->

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
