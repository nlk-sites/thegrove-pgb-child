<?php
/**
 * Template Name: Contact-las-vegas-details
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
                    <div class="main-content-area-inner theme-bg" id="leftDiv">
					
						<div class="col-md-6">
                            <div class="contact-map-blog">
                                <h3><?php the_title(); ?></h3>
								 <p><a target="_blank" href="http://maps.google.com/?q=<?php echo ot_get_option("las_vegas_address"); ?> Las Vegas"><?php echo ot_get_option("las_vegas_address"); ?></a><br> <?php echo ot_get_option("las_vegas_number"); ?>
                                    <br>
                                    <div class="time"><p><?php echo ot_get_option("las_vegas_timing"); ?></p></div></p>
                                <span><?php echo get_teaser_text(ot_get_option("las_vegas_description"),65); ?></span>
							
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6 align-right map-view">
                            <div class="contact-map-blog">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.6690254136015!2d-115.15193463699872!3d36.1015553604611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c5aef154d6b5%3A0x33d3a47105af0acb!2s4640+Paradise+Rd%2C+Paradise%2C+NV%2C+USA!5e0!3m2!1sen!2sin!4v1447333155885" width="100%" height="256" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
							<a target="_blank" href="http://maps.google.com/?q=<?php echo str_replace(" - Dispensing Soon", "", ot_get_option("pahrump_address")); ?> Pahrump">Get Directions</a>
                        </div>
					<div class="clearfix"></div>
                        <!-- End Col -->
						
							<?php  echo do_shortcode('[espro-slider id=271]'); ?>
					
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                        <!-- <h3>Contact</h3>
                        <p>We are not just about providing medicine. We want to know how we can work together to extend the benefits of medical marijuana to more people, so we can create more wellness. Talk to us and let us know your thoughts.</p> -->
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
