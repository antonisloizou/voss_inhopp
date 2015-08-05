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
								Inhopp map
							</span>
						</h2>
					</div>
                                </div>
				<div id="about">
					<div class="image-menu">
						<img id="about-pic" src="<?php bloginfo('template_url'); ?>/images/people.jpg"/>
						<h2>
							<span>                                  
								About us
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
    $('#page').css('min-height', $(window).height());
    $('#page').fadeIn(200);

    $('#main-panel').fadeIn(800);

    var unslider = $('.banner').unslider({
        speed: 500,
        delay: false,
        fluid: true 
    });

    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        unslider.data('unslider')[fn]();
    });

    $('.unslider-arrow').css('width', $('.unslider-arrow').height());
}

var setupPage = function() {
    setTimeout(function(){ 
	$('#inhopp-map').fadeIn(400);
    }, 50);
    setTimeout(function(){ 
        $('#about').fadeIn(400);
    }, 150);

    if ($(window).width() <= 800) {
	$('.banner').css('float', 'none');
	$('.banner').css('width', $('#page').width()-50);
	$('#inhopp-map').css('margin-left', 0);
        $('#inhopp-map').css('height', $('.banner').height());
        $('#inhopp-map').css('margin-top', -7);
	$('#inhopp-map').css('margin-bottom', 10);
        $('#map-pic').css('height', $('.banner').height());
	$('#map-pic').css('width', $('.banner').width());
        $('#inhopp-map .image-menu h2 span').css('margin-left', 0);
	$('#about').css('margin-left', 0);
        $('#about').css('height', $('.banner').height());
        $('#about-pic').css('height', $('.banner').height());
        $('#about-pic').css('width', $('.banner').width());
	$('#about .image-menu h2 span').css('margin-left', 0);
    }
    else {
	$('.banner').css('float', 'left');
        $('.banner').css('width', '70%');
	$('#inhopp-map').css('height', $('.banner').height()/2);
	$('#inhopp-map').css('margin-left', $('.banner').width());
        $('#inhopp-map').css('margin-bottom', 0);
	$('#map-pic').css('height', $('.banner').height()/2 - 7);
	$('#map-pic').css('width', $('.banner').width()*0.4);
	$('#about').css('height', $('.banner').height()/2);
	$('#about').css('margin-left', $('.banner').width());
	$('#about-pic').css('height', $('.banner').height()/2 - 7);
	$('#about-pic').css('width', $('.banner').width()*0.4);
    }

    $('#page').css('margin-left', ($(window).width() - $('#page').width())/2);
    unslide();
}

$('.banner ul li img').first().load(function(){setupPage()});

$(window).resize(function(){setupPage()});

$(window).load(function(){setupPage()});

})(jQuery);
</script>
