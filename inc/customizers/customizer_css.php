<?php
	
function cyclingclublite_customize_css()
{
    ?>
         <style type="text/css">
	         .accent-background-colour {
		         background: <?php echo get_theme_mod( 'header_background' ); ?>
	         }
	         
         </style>
    <?php
}
add_action( 'wp_head', 'cyclingclublite_customize_css');
