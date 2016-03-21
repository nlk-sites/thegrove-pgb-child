<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pgb
 */
?><!DOCTYPE html>
<?php tha_html_before(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="format-detection" content="telephone=no">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="keywords" content="" />
                <meta name="description" content="" />
                <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" type="text/css" rel="stylesheet" />
                <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet" />
                <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.css" type="text/css" rel="stylesheet"  />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.ba-resize.min.js"></script>
                <title>The Grove</title>

                <?php tha_head_bottom(); ?>

                <?php wp_head(); ?>
                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        sameHeight();
                        var $element = $("#leftDiv");
                        var lastHeight = $("#leftDiv").height();
                        var $rElement = $("#rightDiv");
                        var lastRHeight = $("#rightDiv").height();
                        function checkForChanges()
                        {
                            if ($element.height() != lastHeight)
                            {
                                lastHeight = $element.height();
                                sameHeight();
                            }

                            setTimeout(checkForChanges, 1000);
                        }
                        checkForChanges();

                        function checkForRChanges()
                        {
                            if ($rElement.height() != lastRHeight)
                            {
                                lastRHeight = $rElement.height();
                                sameHeight();
                            }

                            setTimeout(checkForRChanges, 1000);
                        }
                        checkForRChanges();
                    });


                    function sameHeight() {
                        if ($(document).width() > 800) {
                            if ($("#homepage-flag").length == 0) {
                                var right = $("#rightDiv").height(); //document.getElementById('rightDiv').style.height;
                                var left = $("#leftDiv").height(); //document.getElementById('leftDiv').style.height;
                                if (left > right)
                                {
                                    $("#rightDiv").css('min-height', ((left + 100) + "px"));
                                }
                                else
                                {
                                    $("#leftDiv").css('min-height', ((right) + "px"));
                                }
                            } else {
                                var right = $("#rightDiv").height(); //document.getElementById('rightDiv').style.height;
                                var left = $("#leftDiv").height(); //document.getElementById('leftDiv').style.height;
                                if (left > right)
                                {
                                    $("#rightDiv").css('min-height', ((left) + "px"));
                                }
                                else
                                {
                                    $("#leftDiv").css('min-height', ((right) + "px"));
                                }
                            }
                        }
                    }
                </script>
                </head>

                <body>
                    <!-- Top Bar Starts -->
                    <header>
                        <!-- Top Bar Starts -->
                        <div class="top-bar hidden-xs hidden-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="top-bar-inner">
                                        <div class="col-md-12 left">
                                            <p><strong>Las Vegas</strong> • <a target="_blank" href="http://maps.google.com/?q=<?php echo ot_get_option("las_vegas_address"); ?> Las Vegas"><?php echo ot_get_option("las_vegas_address"); ?></a> • <?php echo ot_get_option("las_vegas_number"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pahrump</strong> • <a target="_blank" href="http://maps.google.com/?q=<?php echo str_replace(" - Dispensing Soon", "", ot_get_option("pahrump_address")); ?> Pahrump"><?php echo ot_get_option("pahrump_address"); ?></a> • <?php echo ot_get_option("pahrump_number"); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Top Bar End -->
						<div class="mid-top-bar hidden-xs hidden-sm">
                            <div class="container">
                                <div class="row">
                                    <div class="top-bar-inner">
                                        <div class="col-md-6 left">
                                            <ul class="top-bar-socialmedia">
                                                <?php
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
                                                <?php if(!empty($youtube_link)){ ?>
                                                <li><a href="<?php echo $youtube_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm7.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($google_plus_link)){ ?>
                                                <li><a href="<?php echo $google_plus_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm8.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($pinterest_link)){ ?>
                                                <li><a href="<?php echo $pinterest_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm9.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($facebook_link)){ ?>
                                                <li><a href="<?php echo $facebook_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-fa.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($twitter_link)){ ?>
                                                <li><a href="<?php echo $twitter_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-tw.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($instagram_link)){ ?>
                                                <li><a href="<?php echo $instagram_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm3.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($weedmaps_link)){ ?>
                                                <li><a href="<?php echo $weedmaps_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm4.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($yelp_link)){ ?>
                                                <li><a href="<?php echo $yelp_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm5.png" /></a></li>
                                                <?php } ?>
                                                <?php if(!empty($leafly_link)){ ?>
                                                <li><a href="<?php echo $leafly_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grove-sm6.png" /></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 right">
                                            <ul class="loyalty_program">
                                            	<li>Loyalty Program:</li>
                                            	<li><a href="http://www.thegrovenv.com/the-grove-society/" class="btn btn-primary btn-hollow">The Grove Society</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- mid top bar -->

                        <div class="mobile-top-bar">
                            <div class="container">
                                <div class="row">
                                    <div class=" col-sm-12 col-xs-12 hidden-lg hidden-md">
                                        <div class="mobile-top-bar-inner">
                                            <h4>Las Vegas & Pahrump Locations <span><a href="#" class="locations-mobile-drop-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-address-open.png" /></a></span></h4>
                                        </div>
                                        <div class="mobile-location-block">
                                            <div class="top-bar-address">
                                                <h3>Las Vegas Location</h3>
                                                <p><?php echo ot_get_option("las_vegas_address"); ?><br />
                                                    <?php echo ot_get_option("las_vegas_number"); ?><br />
                                                </p>
                                                <span><?php echo ot_get_option("las_vegas_timing"); ?><br />
                                                </span> <a href="http://maps.apple.com/?saddr=My+Location&daddr=<?php echo ot_get_option("las_vegas_address"); ?>" class="btn top-address-btn">GET DIRECTIONS</a> <a href="tel:<?php echo str_replace(".", "", ot_get_option("las_vegas_number")); ?>" class="btn top-address-btn">CALL</a> </div>

                                            <div class="top-bar-address">
                                                <h3>Pahrump Location</h3>
                                                <p><?php echo ot_get_option("pahrump_address"); ?><br />
                                                    <?php echo ot_get_option("pahrump_number"); ?><br />
                                                </p>
                                                <span><?php echo ot_get_option("pahrump_timing"); ?><br />
                                                </span> <a href="http://maps.apple.com/?saddr=My+Location&daddr=<?php echo ot_get_option("pahrump_address"); ?>" class="btn top-address-btn">GET DIRECTIONS</a> <a href="tel:<?php echo str_replace(".", "", ot_get_option("pahrump_number")); ?>" class="btn top-address-btn">CALL</a> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Top Bar Starts -->

                        <div class="grove-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 left">
                                        <div class="logo"> <a href="<?php echo home_url(); ?>"> <img src="<?php echo ot_get_option("site_logo"); ?>" title="The Grove" alt="The Grove" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12 right">
                                        <!-- Menu Starts -->
                                        <div class="menu-area">
                                            <nav class="navbar navbar-default navbar-right" id="menubar">
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                                </div>
                                                <?php
                                                $defaults = array(
                                                    'container' => 'div',
                                                    'container_class' => 'navbar-collapse collapse',
                                                    'container_id' => 'navbar',
                                                    'menu_class' => 'menu',
                                                    'echo' => true,
                                                    'fallback_cb' => 'wp_page_menu',
                                                    'items_wrap' => '<ul id="main-menu" class="nav navbar-nav">%3$s</ul>',
                                                    'menu' => 'Top Menu'
                                                );
                                                wp_nav_menu($defaults);
                                                ?>
                                            </nav>
                                        </div>
                                        <!-- Menu Ends -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
