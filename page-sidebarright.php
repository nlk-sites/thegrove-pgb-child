<?php
/**
 * Template Name: Right Sidebar
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
    <?php // <!--The Loop   ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post();
            ?>


            <div class="theme-vertical-border"></div>
            <article class="main-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 left">
                            <div class="main-content-area-inner theme-bg" id="leftDiv">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <!-- Aside starts -->
                        <div class="col-md-3">
					<div id="rightDiv">
                            <?php dynamic_sidebar('footer-copyright-left'); ?>
                        </div>
						</div>
                        <!-- Aside Ends --> 
                    </div>
                </div>	
            </article>

        <?php endwhile; // end of the loop.   ?>

    <?php endif; ?>

    <?php // The Loop-->  ?>


    <!-- Upcomming Events starts -->

    <?php get_footer(); ?>
