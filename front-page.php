<?php
/**
 * Home Page Template
 *
 * @package pgb
 */
get_header();
global $post;
?>
<span id="homepage-flag" style="display: none" ></span>
<section>
    <div class="top-banner">
        <div class="container hidden-xs hidden-sm">
            <div class="row">
                <div class="col-md-12"> 
                    <!--<img src="<?php the_field("hero_image", $post->ID); ?>" />--> 
                    <?php echo do_shortcode("[masterslider id='2']"); ?>
                </div>
            </div>
        </div>
        <div class="container hidden-md hidden-lg">
            <div class="row">
                <div class="col-md-12"> 
                    <?php echo do_shortcode("[masterslider id='3']"); ?>
                    <!--<img src="<?php the_field("hero_image_mobile", $post->ID); ?>" />-->
                </div>
            </div>
        </div>
    </div>
    <div class="theme-vertical-border"></div>
    <article class="hm-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="theme-bg">
                        <p><?php echo bloginfo('description'); ?>  </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <div class="theme-vertical-border"></div>
    <article class="hm-locationimage-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left"> 
                    <div class="hm-locater-img">
                       
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/location-1.jpg" />

                        <h2>Dispensing Soon</h2>
                       <p>Any State MMJ Card Accepted</p>
                    </div>
                    <div class="hm-locationtext-block-inner">
                        <h3>Las Vegas Location</h3>
                        <p><a target="_blank" href="http://maps.google.com/?q=<?php echo ot_get_option("las_vegas_address"); ?> Las Vegas"><?php echo ot_get_option("las_vegas_address"); ?></a> : <?php echo ot_get_option("las_vegas_number"); ?><br />
                            <br />
                            <?php echo ot_get_option("las_vegas_timing"); ?></p>
                        <span><?php echo ot_get_option("las_vegas_description"); ?></span> </div>

                </div>
                <div class="col-md-6 right">
                    <div class="hm-locater-img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/location-2.jpg" />
                         <h2>Dispensing Soon</h2>
                       <p>Any State MMJ Card Accepted</p>
                    </div>
                    <div class="hm-locationtext-block-inner">
                        <h3>Pahrump Location</h3>

                        <p><a target="_blank" href="http://maps.google.com/?q=<?php echo str_replace(" - Dispensing Soon","",ot_get_option("pahrump_address")); ?> Pahrump"><?php echo ot_get_option("pahrump_address"); ?></a> : <?php echo ot_get_option("pahrump_number"); ?><br />
                            <br />
                            <?php echo ot_get_option("pahrump_timing"); ?>
                        </p>
                        <span><?php echo ot_get_option("pahrump_description"); ?></span> </div>

                </div>
            </div>
        </div>
    </article>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div id="leftDiv">
                        <div class="main-banner">
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_stylesheet_directory_uri() . '/images/home-content-main-banner.jpg" />';
                                }
                            ?>
                        </div>
                        <div class="theme-vertical-border"></div>
                        <div class="main-content-area-inner theme-bg">
                            <?php echo $post->post_content; ?>
                        </div>
                    </div>
                </div>
                <!-- Aside starts -->
                <div class="col-md-3">
                    <div id="rightDiv">
                        <aside class="aside-img hidden-sm">
                            <div class="aside-block-one">
                                <?php
                                    if (get_field('home_sidebar_image')) : ?>
                                        <img src="<?php the_field('home_sidebar_image'); ?>" />
                                    <?php else : ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hm-aside-1.jpg" />
                                    <?php endif;
                                ?>
                            </div>
                        </aside>
                        <?php get_sidebar('slider-1'); ?>
                    </div>
                </div>
                <!-- Aside Ends --> 
            </div>
        </div>	
    </article>



    <?php get_footer(); ?>