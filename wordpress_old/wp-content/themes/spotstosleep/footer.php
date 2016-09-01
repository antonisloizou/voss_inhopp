<?php
/**
 * The template for displaying the footer for the Spots to sleep theme
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Spots to sleep
 * @subpackage spotstosleep
 * @since Spots to sleep 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://some.url', 'spotstosleep' ) ); ?>"><?php printf( __( 'Rapidly developed by %s', 'spotstosleep' ), 'Antonis Loizou' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
