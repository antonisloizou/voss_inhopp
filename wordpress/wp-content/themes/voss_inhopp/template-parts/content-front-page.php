<?php
/**
 * The template used for displaying the front page content in front-page.php
 *
 * @package voss_innhopp
 */

?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/unslider.min.js"></script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); 
		$args = array(
			'category_name' => 'innhopps' ); 
		$innhopps = get_posts( $args );
		if($innhopps){ ?>
			<div id="main-panel" >
				<div id="unslider" class="banner">
					<ul><?php
						foreach ($innhopps as $innhopp) {?>
							<li>
								<div class="image-menu">
									<a href="<?php echo get_permalink($innhopp->ID); ?>">
										<?php echo get_the_post_thumbnail($innhopp->ID, 'slider-thumbnail'); ?>
										<h2>
											<span>
												<?php echo get_the_title($innhopp->ID); ?>
											</span>
										</h2>
									</a>
								</div>
							</li> 
						<?php }?>
					</ul>
					<a class="unslider-arrow prev">&nbsp;</a>
					<a class="unslider-arrow next">&nbsp;</a>
				</div>
                                <div id="innhopp-map">
					<div class="image-menu">
                        <a href="<?php bloginfo('url'); ?>/innhopp-map">
                            <img id="map-pic" src="<?php bloginfo('template_url'); ?>/images/map.jpg"/>
                            <h2>
                                <span>
                                    <?php echo 'Innhopp map'; ?>
                                </span>
                            </h2>
                        </a>
					</div>
                                </div>
				<div id="people">
					<div class="image-menu">
                        <a>
                            <img id="people-pic" src="<?php bloginfo('template_url'); ?>/images/people.jpg"/>
                            <h2>
                                <span>                                  
                                    <?php echo 'About us'; ?>
                                </span>
                            </h2>
                        </a>
					</div>
				</div>
			</div>
		<?php }?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

<script>
(function($){
    var unslider = $('.banner').unslider();
    
    var resize = function() {
        $('#innhopp-map').css('height', $('.banner').height()/2);
        $('#people').css('height', $('.banner').height()/2);
        $('.unslider-nav').css('top', $('.banner').height() - 50);
    }
    
    resize();
    
    $(window).resize(function(){resize()})
    
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        unslider.data('unslider')[fn]();
    });

})(jQuery);
</script>
