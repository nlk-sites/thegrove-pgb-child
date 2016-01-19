<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package pgb
 */
get_header();

$page_for_posts = get_option('page_for_posts');
?>

<section>
    <?php // <!--The Loop  ?>
    <div class="top-banner">
        <div class="container hidden-xs hidden-sm">
            <div class="row">
                <div class="col-md-12"> <img src="<?php the_field("hero_image", $page_for_posts); ?>" /> </div>
            </div>
        </div>
        <div class="container hidden-md hidden-lg">
            <div class="row">
                <div class="col-md-12"> <img src="<?php the_field("hero_image_mobile", $page_for_posts); ?>" /> </div>
            </div>
        </div>
    </div>
    <div class="theme-vertical-border"></div>
    <article class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 left">
                    <div class="main-content-area-inner theme-bg" id="leftDiv">
                        <?php if (have_posts()) : ?>

                            <?php while (have_posts()) : the_post(); ?>

                                <?php tha_entry_before(); ?>

                                <div id="post-<?php the_ID(); ?>" class="blog-list">

                                    <?php tha_entry_top(); ?>

                                    <div class="col-md-12">

                                        <div class="row">

                                            <?php get_post_format() . get_template_part('content', get_post_format()); ?>

                                        </div>

                                    </div>

                                    <?php get_template_part('posts', 'footer'); ?>

                                    <?php tha_entry_bottom(); ?>
                                    <div class="clearfix"></div>
                                </div><!-- #post-## -->

                                <?php tha_entry_after(); ?>

                            <?php endwhile; ?>

                            <?php pgb_content_nav('nav-below'); ?>

                        <?php else : ?>

                            <?php get_template_part('no-results', 'index'); ?>

                        <?php endif; ?>

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
