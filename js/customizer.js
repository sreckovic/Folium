/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Banner title.
	wp.customize( 'banner-title', function( value ) {
		value.bind( function( to ) {
			$( '.banner-title' ).text( to );
		} );
	} );

	// Banner subtitle.
	wp.customize( 'banner-subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.banner-subtitle' ).text( to );
		} );
	} );

	// Banner select page link text.
	wp.customize( 'banner-text', function( value ) {
		value.bind( function( to ) {
			$( '.banner-content a' ).text( to );
		} );
	} );

	// Footer copyright text.
	wp.customize( 'copyright', function( value ) {
		value.bind( function( to ) {
			$( '.footer-copyright' ).text( to );
		} );
	} );

} )( jQuery );
