<?php
/**
 * Template Name: FAQ
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
                        <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'post_type' => 'faq',
                            'post_status' => 'publish',
                            'suppress_filters' => true,
                            'post_parent' => 0,
                        );
                        $posts_array = get_posts($args);
                        ?>
                        <h1>You ask. We answer. It's that easy.</h1>
                        <?php
                        foreach ($posts_array as $post) : setup_postdata($post);
                            ?>
                            <div class="faq-active-container">
                                <a href="javascript:void(0);" class="faq-link"><?php the_title(); ?></a>
                                <div class="faq-active-box" style="display:none;">
                                    <?php the_content(); ?>
                                    <div class="faq-active-container-inside">
                                        <?php
                                        $args = array(
                                            'post_parent' => get_the_id(),
                                            'post_type' => 'faq',
                                            'numberposts' => -1,
                                            'post_status' => 'publish',
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                        );
                                        $children_array = get_children($args);
                                        ?> 
                                        <?php
                                        if ($children_array) {
                                            foreach ($children_array as $children) {
                                                ?>
                                                <div class="faq-container-inside">
                                                    <a href="javascript:void(0);" class="faq-link-inner"><?php echo $children->post_title; ?></a>
                                                    <div class="faq-active-container-box" style="display:none;">
                                                        <?php echo $children->post_content; ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                        <!-- End faq -->
                        <div class="clearfix"></div>
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


    <script>
        jQuery(document).ready(function ($) {
            $(".faq-link").click(function () {
                if (!$(this).hasClass("active")) {
                    $(".faq-active-box").slideUp("slow", function () {
                        $(this).prev("a").removeClass("active");
                    });
                }
                $(this).next(".faq-active-box").slideToggle("slow", function ()
                {
                    $('html,body').animate({
                        scrollTop: $(this).offset().top - 80},
                    'slow');
                    $(".faq-link.active").removeClass("active");
                    if ($(this).is(':hidden')) {
                        $(this).prev("a").removeClass("active");
                    } else {
                        $(this).prev("a").addClass("active");
                    }
                });

            });
            $(".faq-link-inner").click(function () {
                if (!$(this).hasClass("active")) {
                    $(".faq-active-container-box").slideUp("slow", function () {
                        $(this).prev("a").removeClass("active");
                    });
                }

                $(this).next(".faq-active-container-box").slideToggle("slow", function ()
                {
                    $('html,body').animate({
                        scrollTop: $(this).offset().top - 80},
                    'slow');
                    $(".faq-active-container-box.active").removeClass("active");
                    if ($(this).is(':hidden')) {
                        $(this).prev("a").removeClass("active");
                    } else {
                        $(this).prev("a").addClass("active");
                    }
                });
            });
        });
    </script>

    <!-- Upcomming Events starts -->

    <?php get_footer(); ?>
