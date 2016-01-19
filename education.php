<?php
/**
 * Template Name: Education
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
                                <?php
                                $args = array(
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'ASC',
                                    'post_type' => 'educationpart',
                                    'post_status' => 'publish',
                                    'suppress_filters' => true
                                );
                                $posts_array = get_posts($args);
                                foreach ($posts_array as $post) :
                                    setup_postdata($post);
                                    ?>
                                    <h1><?php the_title(); ?></h1>
                                    <div class="edu-content">
                                        <?php the_content(); ?>
                                    </div>
                                    <?php
                                endforeach;
                                wp_reset_postdata();
                                ?>
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

        <?php endwhile; // end of the loop.    ?>

    <?php endif; ?>

    <?php // The Loop-->     ?>


    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".edu-content").each(function () {
                var firstP = $(this).find("p:first").html();
                $(this).find("p:first").remove();
                var htmlData = $(this).html();
                $(this).html("");
                $(this).append("<p>" + firstP + "</p>");
                $(this).append("<div class='edu-content-inside' style='display:none;'>" + htmlData + "</div>");
                $(this).append("<a class='edu-content-inside-readmore'><u>Read More...</u></a>");
            }).promise().done(function () {
                $('#leftDiv').css("min-height", "");
                $('#rightDiv').css("min-height", "");
            });

            $(".edu-content-inside-readmore").click(function () {
                $(this).prev("div.edu-content-inside").toggle("slow", function () {
                    if ($(this).is(':hidden')) {
                        $(this).next("a").html("<u>Read More...</u>");
                    } else {
                        $(this).next("a").html("<u>Close</u>");
                    }
                });
            });
        })
    </script>
    <!-- Upcomming Events starts -->

    <?php get_footer(); ?>
