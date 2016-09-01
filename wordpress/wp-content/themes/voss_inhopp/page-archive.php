<?php
/**
 * Template Name: Archives
 * @package voss_innhopp
 */

get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/featherlight.min.js"></script>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
			<?php 
                $query = new WP_Query( array( 'category_name' => 'innhopps' ) );
                $i=0;
                $now=strtotime('now');
                while ( $query->have_posts() ) : $query->the_post(); 
                    $lat[$i]= get_post_meta(get_the_ID(), 'Lat', true);
                    $long[$i]= get_post_meta(get_the_ID(), 'Long', true);
                    $start_date[$i]= strtotime(get_post_meta(get_the_ID(), 'StartDate', true));
                    $end_date[$i]= strtotime(get_post_meta(get_the_ID(), 'EndDate', true));
                    if(isset($showcase)){
                        if ($now - $start_date[$showcase] > 0 && 
                                $now - date[$i] < 0 ){
                            $showcase = $i;
                        }
                        elseif ($now - $start_date[$showcase] < 0 && 
                                $now - date[$i] < 0 &&
                                $now - $start_date[$i] > $now - $start_date[$showcase]){
                            $showcase = $i;
                        }
                        elseif ($now - $start_date[$showcase] > 0 && 
                                $now - date[$i] > 0 &&
                                $now - $start_date[$i] < $now - $start_date[$showcase]){
                            $showcase = $i;
                        }
                    }
                    else {
                        $showcase = $i;
                    }
                    $title[$i] = get_the_title(get_the_ID());
                    $thumbnail[$i] = get_the_post_thumbnail(get_the_ID(),'thumbnail');
                    $link[$i] = get_the_permalink(get_the_ID());
                    $i = $i+1;
                endwhile; // End of the loop. 
            ?>
            <div id="innhopp-nav">
                <ul>
                    <li id='prev-innhopp' class='prev tooltip'>&nbsp;<span class='tooltiptext'>Previous innhopp</span></li>
                    <li id='current-innhopp' class='next tooltip'>&nbsp;<span class='tooltiptext'>Most current innhopp</span></li>
                    <li id='next-innhopp' class='next tooltip'>&nbsp;<span class='tooltiptext'>Next innhopp</span></li>
                </ul>
            </div>
            <div id="map"></div>

            <script>
            var marker=[];
            var infowindow=[];
            var start_date=[];
            var current = <?php echo $showcase ?>;
            function initMap() {
                var mapDiv = document.getElementById('map');
                var map = new google.maps.Map(mapDiv, {
                    center: {lat: <?php echo $lat[$showcase] ?>, lng: <?php echo $long[$showcase] ?>},
                    zoom: 5,
                    mapTypeId: 'hybrid',
                    mapTypeControl: false,
                    streetViewControl: false
                });
                <?php for ($j=0; $j<$i; $j++) { ?> 
                    marker[<?php echo $j ?>] = new google.maps.Marker({
                        position: {lat: <?php echo $lat[$j]; ?>, lng: <?php echo $long[$j]; ?>},
                        map: map
                    });
                    google.maps.event.addListener(marker[<?php echo $j ?>], 'click', function() {
                        for (i=0; i < infowindow.length; i++) {
                            infowindow[i].close();
                        }
                        current = <?php echo $j ?>;
                        infowindow[<?php echo $j ?>] =  new google.maps.InfoWindow({
                            position: {lat: <?php echo $lat[$j]; ?>, lng: <?php echo $long[$j]; ?>},
                            content: '<h3><a href="#" data-featherlight-type=ajax data-featherlight-variant="lightbox" data-featherlight="<?php echo $link[$j] . "  article\">" . $title[$j]; ?></a></h3><p><?php if ($start_date[$j] != $end_date[$j]) echo date('d M Y', $start_date[$j]) . " - " . date('d M Y', $end_date[$j]); else echo date('d M Y', $start_date[$j]); echo "<div> " . $thumbnail[$j] . "</div>"; ?></p>',
                            map: map
                        });
                    });
                <?php } ?>
                start_date = [<?php
                        for ($j=0; $j<$i; $j++) {
                            echo '"' . $start_date[$j] . '",';
                        }?>];
                google.maps.event.trigger(marker[<?php echo $showcase ?>], 'click');
                document.getElementById('prev-innhopp').onclick = function () {
                    var prev = -1;
                    for (i=0; i<start_date.length; i++){
                        if (prev == -1 && start_date[current] - start_date[i] > 0) {
                            prev=i;
                        }
                        else if (start_date[current] - start_date[i] > 0 &&
                               start_date[i] - start_date[prev] > 0 ) {
                            prev=i;
                        }
                    }
                    google.maps.event.trigger(marker[prev], 'click');
                }
                document.getElementById('next-innhopp').onclick = function () {
                    var next = -1;
                    for (i=0; i<start_date.length; i++){
                        if (next == -1 && start_date[i] - start_date[current] > 0) {
                            next=i;
                        }
                        else if (start_date[i] - start_date[current] > 0 &&
                               start_date[next] - start_date[i] > 0 ) {
                            next=i;
                        }
                    }
                    google.maps.event.trigger(marker[next], 'click');
                }
                document.getElementById('current-innhopp').onclick = function () {
                    google.maps.event.trigger(marker[<?php echo $showcase ?>], 'click');
                }
            }
            </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhjmbtUSvN7TqEqgVV3RpFTwGMzsJc6pw&callback=initMap">
        </script>
            
		</main><!-- #main -->
	</div><!-- #primary -->
