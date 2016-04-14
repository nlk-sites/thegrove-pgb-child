<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package pgb
 */
?>
<article class="">
    <div class="container">
        <div class="row">
            
                <div class="upcomming-events">

                    <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'orderby' => 'rand',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'suppress_filters' => true,
                        'category_name'    => 'uncategorized',
                    );
                    $posts_array = get_posts($args);

                    foreach ($posts_array as $post) : setup_postdata($post);
                        ?>
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>

                    <?php ?>

                </div>
            
        </div>
    </div>
</article>
<!-- Upcomming Events  Ends -->
</section>

<footer>
    <div class="footer-social hidden-md hidden-lg">
        <div class=" container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="footer-social-inner">
                        <ul><?php
                            $facebook_link = ot_get_option("facebook_link");
                            $twitter_link = ot_get_option("twitter_link");
                            $instagram_link = ot_get_option("instagram_link");
                            $weedmaps_link = ot_get_option("weedmaps_link");
                            $yelp_link = ot_get_option("yelp_link");
                            $leafly_link = ot_get_option("leafly_link");
                            $youtube_link = ot_get_option("youtube_link");
                            $google_plus_link = ot_get_option("google_plus_link");
                            $pinterest_link = ot_get_option("pinterest_link");
                            ?>
                            <?php if (!empty($youtube_link)) { ?>
                                <li><a href="<?php echo $youtube_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-yt.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($google_plus_link)) { ?>
                                <li><a href="<?php echo $google_plus_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-gp.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($pinterest_link)) { ?>
                                <li><a href="<?php echo $pinterest_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-pin.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($facebook_link)) { ?>
                                <li><a href="<?php echo $facebook_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-fa.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($twitter_link)) { ?>
                                <li><a href="<?php echo $twitter_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-sm2.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($instagram_link)) { ?>
                                <li><a href="<?php echo $instagram_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-sm3.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($weedmaps_link)) { ?>
                                <li><a href="<?php echo $weedmaps_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-sm4.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($yelp_link)) { ?>
                                <li><a href="<?php echo $yelp_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-sm5.png" /></a></li>
                            <?php } ?>
                            <?php if (!empty($leafly_link)) { ?>
                                <li><a href="<?php echo $leafly_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-icon-sm6.png" /></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="foot-menu">
                    <img src="<?php echo ot_get_option("footer_logo"); ?>" class="footer-logo hidden-xs hidden-sm" />
                    <?php
                    $defaults = array(
                        'container' => 'div',
                        'container_class' => 'footer-link',
                        'container_id' => 'navbar-footer',
                        'menu_class' => 'menu',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="main-menu" class="footer-link-ul">%3$s</ul>',
                        'menu' => 'Footer Menu',
                    );
                    wp_nav_menu($defaults);
                    ?>
                    <img class="mobile-footer-logo hidden-md hidden-lg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mobile-footer-logo.png" />
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".mobile-location-block").slideToggle("fast");
        $('.locations-mobile-drop-btn').click(function () {
            $(".mobile-location-block").slideToggle("slow", function () {
                if ($(this).is(':hidden')) {
                    $('.locations-mobile-drop-btn img').attr("src", '<?php echo get_stylesheet_directory_uri(); ?>/images/top-address-open.png');

                } else {
                    $('.locations-mobile-drop-btn img').attr("src", '<?php echo get_stylesheet_directory_uri(); ?>/images/top-address-close.png');
                }
            });
        });
    });

    // next two blocks take care of the hiding and showing the Good Health section
    $('p.more').click(function() {
      $('#hidden-mobile-section, p.less').slideDown("slow");
      $('p.more').hide();
    });

    $('p.less').click(function() {
      $('#hidden-mobile-section, p.less').slideUp("slow");
      $('p.more').slideDown("slow");
      $('html, body').animate({
            scrollTop: $('.main-content-area-inner h1').offset().top
        }, 1000);
    });
</script>
<?php wp_footer(); ?>
</body>
</html>
