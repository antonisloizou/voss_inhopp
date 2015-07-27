<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme. 
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spots to sleep
 * @subpackage spotstosleep
 * @since Spots to sleep 1.0 
*/

get_header(); ?>

<div id="main-content" class="main-content">

		<div id="primary" class="content-area">
                	<video muted loop autoplay preload="auto" poster="<?php echo get_template_directory_uri(); ?>/images/poster.png">
                        	<source src="<?php echo get_template_directory_uri(); ?>/videos/header.mp4" type="video/mp4">
                        	<source src="<?php echo get_template_directory_uri(); ?>/videos/header.mp4" type="video/ogg">
                        	<source src="<?php echo get_template_directory_uri(); ?>/videos/header.webm" type="video/webm">
                	</video>
			<div id="content" class="site-content" role="main">
				<div id="video-overlay">
                		        <div id="welcome-text">
                                		<div id="tagline">
                                       			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                               			</div>
                               			<div id="subtitle">
                                        		Rent a personal space anywhere on planet earth.
                                		</div>
						<div id="more-info">
							<a href="#" class="btn btn-contrast btn-large how-it-works">Find out more</a>
						</div>
					</div>

                        		<div id="front-page-search" class="search-box-wrapper hide">
                                		<div class="search-box">
                                        		<?php get_search_form( 'front-page' ); ?>
                               			</div>
                        		</div>
                		</div>
				<?php
						if ( have_posts() ) :
								// Start the Loop.
								while ( have_posts() ) : the_post();

										/*
										* Include the post format-specific template for the content. If you want to
										* use this in a child theme, then include a file called called content-___.php
										* (where ___ is the post format) and that will be used instead.
										*/
										get_template_part( 'content', get_post_format() );

								endwhile;
								// Previous/next post navigation.
								// TODO - twentyfourteen_paging_nav();

						else :
								// If no content, include the "No posts found" template.
								get_template_part( 'content', 'none' );

						endif;
				?>

				</div><!-- #content -->
		</div><!-- #primary -->
		<?php 
		get_sidebar( 'content' ); 
		?>
</div><!-- #main-content -->

<?php
get_footer();
