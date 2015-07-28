<?php
/**
 * The template used for displaying front page content
 * 
 *@package Blue Sky IT
 * @subpackage Voss_Inhopp
 * @since Voss Inhopp 1.0
 */
?>
<script src="//unslider.com/unslider.min.js"></script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			$args = array(
				'category_name' => 'inhopp',
 				'orderby' => 'date',
				'order' => 'ASC',
				'post_parent' => null ); 
			$inhopps = get_posts( $args );
			if($inhopps){ ?>
				<div class="banner">
				<ul><?php
				foreach ($inhopps as $inhopp) {
					echo '<li>'.get_the_post_thumbnail($inhopp->ID, 'large').'</li>'; 
				}?>
				</ul>
				</div>
			<?php } ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'inhopp' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
