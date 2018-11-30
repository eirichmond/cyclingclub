<?php
	
function cyclingclub_dashboard_widgets() {
 	wp_add_dashboard_widget( 'cyclingclub_dashboard_widget', 'Cycling Club Theme and Extensions', 'cyclingclub_dashboard_widget_function' );
 	
 	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 
 	global $wp_meta_boxes;
 	
 	// Get the regular dashboard widgets array 
 	// (which has our new widget already but at the end)
 
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
 	
 	// Backup and delete our new dashboard widget from the end of the array
 
 	$example_widget_backup = array( 'cyclingclub_dashboard_widget' => $normal_dashboard['cyclingclub_dashboard_widget'] );
 	unset( $normal_dashboard['cyclingclub_dashboard_widget'] );
 
 	// Merge the two arrays together so our widget is at the beginning
 
 	$sorted_dashboard = array_merge( $example_widget_backup, $normal_dashboard );
 
 	// Save the sorted array back into the original metaboxes 
 
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
} 

add_action( 'wp_dashboard_setup', 'cyclingclub_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function cyclingclub_dashboard_widget_function() {

	echo '<p>For theme news and updates please see the <a href="https://cyclingclubpro.com/">Cycling Club</a> website.</p>';
	echo '<p><span class="dashicons dashicons-groups"></span> <a href="https://squareone.software/downloads/cycling-club-pro-members/">Cycling Club Pro Members</a> Turns theme into a functional membership website.</p>';
}
