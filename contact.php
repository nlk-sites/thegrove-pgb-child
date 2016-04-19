<?php
/**
 * Template Name: Contact
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


    <div class="theme-vertical-border"></div>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div class="main-content-area-inner theme-bg contact-page" id="leftDiv">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                        <!-- <h3>Contact</h3>
                        <p>We are not just about providing medicine. We want to know how we can work together to extend the benefits of medical marijuana to more people, so we can create more wellness. Talk to us and let us know your thoughts.</p> -->
                        <div class="form-list">
                            <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-sm-12 padding-fix">
                          <?php the_field('below_contact_form'); ?>
                        </div>

					<?php 
					$contact_child = array('post_parent'=>$post->ID,
											'post_type' => 'page',
											'post_status' => 'publish',
											'orderby'=> 'menu_order',
											'order' =>'ASC'); 
					$contact_child_query = null;
					$contact_child_query = new WP_Query($contact_child);
					
					$count = 1; // Used to align the contact-map-blog div to left and right.
					
					if( $contact_child_query->have_posts() ) { 
					
					 while ($contact_child_query->have_posts()) :
						$contact_child_query->the_post();
						
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
                        <div class="col-md-6 contact-map <?php echo ($count % 2 == 0?'align-right':' '); ?>">
                            <div class="contact-map-blog">
                                <iframe src="<?php  echo $map_link; ?>" width="293px" height="190px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <h3><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                <p><a target="_blank" href="http://maps.google.com/?q=<?php echo $address; echo $city; ?>"><?php echo $address; ?></a><br> <?php echo $number; ?>
                                    <br>
                                    <div class="time"><?php  echo $timing; ?></p></div>
                                <span><?php echo get_teaser_text($description,110); ?></span>
                            </div>
                        </div>
					<?php
						$count++;
							endwhile;
						}
					?>					
                      
                        <div class="clearfix"></div>
                        <!-- End Col -->
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
