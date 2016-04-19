<?php
/**
 * Template Name: Contact-details
 *
 * @package pgb
 */
get_header();
global $post;
?>

<section>
    <div class="top-banner">
        <div class="container hidden-xs hidden-sm">
            <div class="row">
                <div class="col-md-12"> <img src="<?php the_field("hero_image", $post->ID); ?>" /> </div>
            </div>
        </div>
        <div class="container hidden-md hidden-lg">
            <div class="row">
                <div class="col-md-12"> <img src="<?php the_field("hero_image_mobile", $post->ID); ?>" /> </div>
            </div>
        </div>
    </div>
	
	<?php 
	// Retriving the values of custom field of current page
	
	$address = '';
	$city = '';
	$number = '';
	$timing = '';
	$description = '';
	$map_link = '';
		
	if ( function_exists( 'get_field' ) )
	{
		$address = get_field("address");
		$city = get_field('city');
		$number = get_field("number");
		$timing = get_field("timing");
		$description = get_field("description");
		$map_link = get_field("map_link");
	}
	
	?>

    <div class="theme-vertical-border"></div>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div class="main-content-area-inner theme-bg" id="leftDiv">
					
						<div class="col-md-6">
                            <div class="contact-map-blog">
                                <h3><?php the_title(); ?></h3>
								 <p><a target="_blank" href="http://maps.google.com/?q=<?php echo $address; echo $city; ?>"><?php echo $address; ?></a><br> <?php echo $number; ?>
                                    <br>
                                    <div class="time"><p><?php echo $timing; ?></p></div></p>
                                <span><?php echo get_teaser_text($description,65); ?></span>
							
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6 align-right map-view">
                            <div class="contact-map-blog">
                                <iframe src="<?php echo $map_link; ?>" width="100%" height="256" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
							<a target="_blank" href="http://maps.google.com/?q=<?php echo str_replace(" - Dispensing Soon", "", $address); echo $city;  ?> ">Get Directions</a>
                        </div>
					<div class="clearfix"></div>
                        <!-- End Col -->
					
					
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                     
                        <div class="form-list contact-det-list">
                            <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-sm-12 padding-fix">
                          <?php the_field('below_contact_form'); ?>
                        </div>

                    </div>
                </div>
                <!-- Aside starts -->
                <div class="col-md-3">
                    <div id="rightDiv">
                        <?php get_sidebar('slider-1'); ?>
                    </div>
                </div>
                <!-- Aside Ends -->
            </div>
        </div>
    </article>


    <script>
        jQuery(document).ready(function ($) {
            $(".faq-active-box").hide();
            $(".faq-link").click(function () {
                $(this).next(".faq-active-box").slideToggle("slow");
            });
        });
    </script>

    <!-- Upcomming Events starts -->

    <?php get_footer(); ?>
