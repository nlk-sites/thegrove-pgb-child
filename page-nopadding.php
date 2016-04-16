<?php
/**
 * Template Name: Main Left No Padding
 *
 * @package pgb
 */
get_header();
global $post;

?>

<section>

    <?php // <!--The Loop   ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post();
            ?>


            <div class="theme-vertical-border"></div>
            <article class="main-content-area no-padding">
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
