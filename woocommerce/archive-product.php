<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$page_for_posts = get_option('page_for_posts');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
get_header(); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
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
	
		
			<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
			<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
		</div>
		

		<?php endif; ?>

		<?php if ( have_posts() ) : ?>


			<?php //woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>
<div class="row">

				<?php 
				$i = 1;
					//added before to ensure it gets opened
				echo '<div class="group-row">';
				
				while ( have_posts() ) : the_post(); ?>
				
				<div class="col-xs-12 col-md-6 col-lg-4">
					 <div class="vapes-services nopadding vapes-services-img">
						 <div class="vapes-img">
						 <?php the_post_thumbnail(); ?>
						 </div>
					 </div>
					 <div class="vapes-services color">
						  <div class="heading"><?php echo get_the_title();  ?></div>
						  <p><?php the_excerpt(); ?></p>
						  <a class="btn btn-default comman_button" href="<?php echo get_permalink(); ?>">See Product</a>
					 </div>
				</div>
				
				<?php 
				
				if($i % 3 == 0) {echo '</div><div class="group-row">';}
				$i++;
				endwhile; // end of the loop. ?>
</div>
		
		<?php endif;
              echo '</div>';
		?>

</div>

<?php get_footer();  ?>
