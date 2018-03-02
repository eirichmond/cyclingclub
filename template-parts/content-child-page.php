<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyclingclublite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('child-pages'); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<?php cyclingclublite_post_thumbnail(); ?>

	<div class="entry-content">
		
		<p><?php echo esc_html(get_child_page_content()) ;?></p>
		
		<p>
			<a class="button" href="<?php echo esc_url( get_permalink() ) ;?>">Read more...</a>
		</p>
		
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'cyclingclublite' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
