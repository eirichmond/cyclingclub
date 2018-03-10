<?php

// buttons	
add_shortcode( 'button', 'cyclingclublite_button_shortcode' );

function cyclingclublite_button_shortcode($atts) {
	// Attributes
	$a = shortcode_atts( 
	        array(
		        'class' => 'default',
		        'link' => '#',
		        'label' => 'I am a button'
	        ), 
	        $atts 
	);
	
	// Output Code
    return '<a class="btn btn--primary '. esc_attr($a['class']).'" href="'.esc_attr($a['link']).'">'.$a['label'].'</a>';

}
