<?php
/**
 * The template used for displaying front page content
 * 
 *@package Blue Sky IT
 * @subpackage Voss_Inhopp
 * @since Voss Inhopp 1.0
 */
?>

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
		//		'post_type' => 'attachment',
		//		'posts_per_page' => -1,
		//		'post_status' => 'any',
		//		'post_mime_type' => 'image',
				'post_parent' => null ); 
			$images = get_posts( $args );
			print_r($images);
			if($images){ ?>
				<div id="slider">
				    <?php foreach($images as $image){ ?>
					    <img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />
				    <?php    } ?>
				</div>
			<?php }
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'inhopp' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
