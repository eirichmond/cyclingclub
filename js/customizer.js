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
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Accent color.
	wp.customize( 'accent_color', function( value ) {
		
		value.bind( function( to ) {
			$( '.trim-border-bottom:after, .button:hover, .main-navigation li:hover > a, .main-navigation li.focus > a, .trim-background-color,.trim-border-bottom:after, .home .secondary-background-colour' ).css( {
				'background': to,
			} );
			$('article a, .site-info > a, #footer-menu li a:hover').css({
				'color': to,
			});
			$('#footer-menu').css({
				'border-bottom-color': to,
			});
			$('article').css({
				'border-left-color': to,
			});
		} );
	} );
} )( jQuery );
