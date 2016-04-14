<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$page_for_posts = get_option('page_for_posts');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

get_header( 'shop' ); ?>
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
	
	<div class="container">
<div class="theme-vertical-border"></div>
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<div class="bd-example" data-example-id="">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active"><?php echo get_the_title();  ?></li>
			</ol>
		</div>
		<?php endif; ?>
		
				<?php if ( have_posts() ) : ?>


			<?php //woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>
<div class="row ">
<div class="container">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="color clearfix product-details">
					
						<div class="col-xs-12 col-md-6 col-lg-6 product-details-img">
							    <?php  the_post_thumbnail('large'); ?>
						</div>
					
						<div class="col-xs-12 col-md-6 col-lg-6">
					 <div class="details-heading"><?php echo get_the_title();  ?></div>
					 <div class="details-text"><?php echo get_the_content();  ?></div>
					 <div class="">         
					 
					 <div class="col-xs-12 col-md-6 col-lg-5">
					 
					 		  <div class="details-button" data-example-id="">
									<select class="details-drop">
									  <option selected="">Open this select menu</option>
									  <option value="1">One</option>
									  <option value="2">Two</option>
									  <option value="3">Three</option>
									</select>
								</div>
					</div>
	
		  </div>
		  

						</div>
					</div>
				<?php endwhile; // end of the loop. ?>
</div>
</div>
		
		<?php endif; ?>
		</div>
	<div class="theme-vertical-border"></div>

<?php get_footer( 'shop' ); ?>
