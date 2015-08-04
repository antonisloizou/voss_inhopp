<?php
/**
 * The template used for displaying the front page content in front-page.php
 *
 * @package voss_inhopp
 */

?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/unslider.min.js"></script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); 
		$args = array(
			'category_name' => 'inhopp',
			'orderby' => 'date',
			'order' => 'ASC',
			'post_parent' => null ); 
		$inhopps = get_posts( $args );
		if($inhopps){ ?>
			<div id="main-panel" >
				<div id="unslider" class="banner">
					<ul><?php
						foreach ($inhopps as $inhopp) {?>
							<li>
								<div class="image-menu">
									<a href="<?php echo get_permalink($inhopp->ID); ?>">
										<?php echo get_the_post_thumbnail($inhopp->ID, 'slider-thumb'); ?>
										<h2>
											<span>
												<?php echo get_the_title($inhopp->ID); ?>
											</span>
										</h2>
									</a>
								</div>
							</li> 
						<?php }?>
					</ul>
					<a class="unslider-arrow prev">&nbsp;</a>
					<a class="unslider-arrow next">&nbsp; </a>
				</div>
                                <div id="inhopp-map">
					<div class="image-menu">
						<img id="map-pic" src="<?php bloginfo('template_url'); ?>/images/map.jpg"/>
						<h2>
							<span>
								<?php echo 'Inhopp map'; ?>
							</span>
						</h2>
					</div>
                                </div>
				<div id="people">
					<div class="image-menu">
						<img id="people-pic" src="<?php bloginfo('template_url'); ?>/images/people.jpg"/>
						<h2>
							<span>                                  
								<?php echo 'People'; ?>
							</span>
						</h2>
					</div>
				</div>
			</div>
		<?php }?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

<script>
(function($){
var unslide = function() {
    var unslider = $('.banner').unslider({
        speed: 500,
        delay: 10000,
        fluid: true 
    });
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        unslider.data('unslider')[fn]();
    });
    $('#main-panel').css('visibility', 'visible');
    $('.unslider-arrow').css('width', $('.unslider-arrow').height());
    $('#people').css('height', $('.banner').height()/2);
    $('#people').css('margin-left', $('.banner').width());
    $('#people-pic').css('max-height', $('.banner').height()/2 - 7);
    $('#people-pic').css('width', $('.banner').width()*0.4);
    $('#people').fadeIn();
    $('#inhopp-map').css('height', $('.banner').height()/2);
    $('#inhopp-map').css('margin-left', $('.banner').width());
    $('#map-pic').css('min-height', $('.banner').height()/2 - 7);
    $('#map-pic').css('width', $('.banner').width()*0.4);
    $('#inhopp-map').fadeIn();
}

$('.banner ul li img').first().load(function(){unslide()});

$(window).resize(function(){unslide()});

$(window).load(function(){unslide()});

})(jQuery);
</script>
