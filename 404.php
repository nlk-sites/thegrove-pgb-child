<?php
/**
 * The Template for displaying all single posts.
 *
 * @package pgb
 */
get_header();
?>
<section>
    <div class="top-banner"></div>
    <div class="theme-vertical-border"></div>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div class="main-content-area-inner" id="leftDiv">
                            <h1 style="font-size: 68px; text-align: center;">404</h1>
                            <p style="text-align: center; font-size: 18px;">The page you're looking for does not exist.</p>
                    </div>
                </div>

                <!-- Aside starts -->
                <div class="col-md-3">
          				<div id="rightDiv">
                      <div class="blog-recent-post">
                              <?php dynamic_sidebar('footer-widget'); ?>
          					  </div>
          				</div>
                </div>
                <!-- Aside Ends -->

            </div>
        </div>
    </article>

    <?php get_footer(); ?>
