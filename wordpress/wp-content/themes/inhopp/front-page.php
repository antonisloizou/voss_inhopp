<?php
/**
 * The template for displaying the front page
 *
 * Template Name: Front Page
 *
 *@package Blue Sky IT 
 * @subpackage Voss_Inhopp
 * @since Voss Inhopp 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'front-page' );

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
