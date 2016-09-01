<?php
/**
 * Template part for displaying single posts.
 *
 * @package voss_innhopp
 */

?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/unslider.min.js"></script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'voss_innhopp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
</article><!-- #post-## -->

