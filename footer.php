<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyclingclublite
 */

?>

	</div><!-- #content -->
	
	<div class="wrap trim-background-color">
		<div class="row">
			<?php get_sidebar('footer'); ?>
		</div>
	</div>

	<footer id="colophon" class="site-footer wrap accent-background-colour">
		
		<div class="site-info row">
			
			<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu', ) ); ?>
			
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cyclingclublite' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'cyclingclublite' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'cyclingclublite' ), 'Cycling Club', '<a href="https://cyclingclublitepro.com">Elliott Richmond</a>' );
			?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
