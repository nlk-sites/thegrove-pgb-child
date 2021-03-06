<?php
/**
 * Template Name: Products Page
 *
 * @package pgb
 */
get_header();
global $post;

?>

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
	
	<div class="container">
		
	 <div class="row">
	 
			<?php
			
					$i = 1;
					 //added before to ensure it gets opened
					echo '<div class="group-row">';
				
					// Get the all product categories here

					$args = array(
						'number'     => 7,
						'orderby' => 'name',
						'order'      => 'ASC',
						'hide_empty' => 1
					);
					
					$product_categories = get_terms( 'product_cat', $args );
					
					$count = count($product_categories);
					if ( $count > 0 ){
						foreach ( $product_categories as $product_category ) {
			?>		
            
			
            <div class="col-xs-12 col-md-6 col-lg-4">
					<div class="vapes-services nopadding vapes-services-img">
					<div class="vapes-img">
					<?php 
					$thumbnail_id = get_woocommerce_term_meta( $product_category->term_id, 'thumbnail_id', true );
						$image = wp_get_attachment_url( $thumbnail_id );
						
						 if ( $image ) {
								echo '<img src="' . $image . '" alt="" />';
						}
					
					?>
					</div>
					</div>
					<div class="vapes-services color">
						<div class="heading"><?php echo $product_category->name; ?></div>
						<p><?php echo get_teaser_text($product_category->description,225); ?></p>
						<a class="btn btn-default comman_button" href="<?php echo get_term_link( $product_category ) ?>">See Product</a>
					</div>
			</div>
	
			
		<?php 
		
		 if($i % 3 == 0) {echo '</div><div class="group-row">';}
    $i++;
			}
			
		echo '</div>';
	}
?>    

			<div class="col-xs-12 col-md-6 col-lg-8 pull-right">
            <div class="vapes-services loyalty">
                    <div class="heading">Lorem</div>
                    <p>The Grove is a place to gather, to learn, and to get the medicine you need. We want you to know more about the products you’re buying, so we make it comfortable to do that. The Grove is a place to gather, to learn, and to get the medicine you need. We want you to know more about the products you’re buying, so we make it comfortable to do that.</p>
               
                </div>
			</div>

                <!-- Aside starts -->
                
                <!-- Aside Ends --> 
       </div>
</div>


<?php get_footer(); ?>