<?php
/**
 * The Template for displaying all single posts.
 *
 * @package pgb
 */
get_header();
?>
<section>
    <?php // <!--The Loop  ?>
    <div class="top-banner">
        <div class="container hidden-xs hidden-sm">
            <div class="row">
                <div class="col-md-12"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blog-single.jpg" /> </div>
            </div>
        </div>
        <div class="container hidden-md hidden-lg">
            <div class="row">
                <div class="col-md-12"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mobile-blog-single.jpg" /> </div>
            </div>
        </div>
    </div>
    <div class="theme-vertical-border"></div>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div class="main-content-area-inner theme-bg" id="leftDiv">
                        <?php while (have_posts()) : the_post(); ?>

                            <?php tha_entry_before(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

                                <?php tha_entry_top(); ?>

                                <?php get_template_part('content', get_post_format()); ?>

                                <?php //get_template_part('posts', 'footer'); ?>

                                <?php tha_entry_bottom(); ?>

                            </article><!-- #post-## -->

                            <?php tha_entry_after(); ?>


                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number())
                                comments_template();
                            ?>

                        <?php endwhile; // end of the loop. ?>

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


    <?php // The Loop-->   ?>


    <!-- Upcomming Events starts -->

    <?php get_footer(); ?>
