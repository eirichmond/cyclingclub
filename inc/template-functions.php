<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cyclingclublite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cyclingclublite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cyclingclublite_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cyclingclublite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cyclingclublite_pingback_header' );

/**
 * Modifies the more tag when dropped into the post content.
 */
function modify_read_more_link() {
    return '<a class="button" href="' . get_permalink() . '">Read more...</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );