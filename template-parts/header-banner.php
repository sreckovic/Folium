<?php if ( !get_theme_mod( 'banner-display' ) == '' ) : ?>

<div class="site-banner">
<div class="container">

  <div class="banner-content">

    <?php
    if ( get_theme_mod( 'banner-title' ) !== '' ) {
      echo '<h2 class="banner-title">' . esc_html( get_theme_mod( 'banner-title' ) ) . '</h2>';
    }

    if ( get_theme_mod( 'banner-subtitle' ) !== '' ) {
      echo '<p class="banner-subtitle">' . esc_html( get_theme_mod( 'banner-subtitle' ) ) . '</p>';
    }

    if ( get_theme_mod( 'banner-page' ) !== '' && get_theme_mod( 'banner-page' ) !== '0' ) {
      echo '<p><a href="' . esc_url( get_permalink ( get_theme_mod( 'banner-page' ) ) ) . '">' . esc_html( get_theme_mod( 'banner-text', __( 'View Case Study', 'folium' ) ) )  . '</a></p>';
    } ?>
  </div><!-- .banner-content -->

  <div class="header-image">
    <?php the_header_image_tag(); ?>
  </div>

</div><!-- .container -->
</div><!-- .site-banner -->

<?php endif; ?>
