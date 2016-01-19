<?php
/**
 * The default content display page
 *
 * @package pgb
 */
?>

<?php if (is_search() || is_archive()) : // Only display Excerpts for Search and Archive Pages ?>

    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="italic">Posted on <?php the_date("F j, Y"); ?> , updated on <?php the_modified_date("F j, Y"); ?>  by  <?php the_author(); ?></p>
    <?php get_template_part('posts', 'images'); ?>

    <?php the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>

<?php elseif (pgb_is_blog_page()) : ?>


    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="italic">Posted on <?php the_date("F j, Y"); ?> , updated on <?php the_modified_date("F j, Y"); ?>  by  <?php the_author(); ?></p>
    <?php get_template_part('posts', 'images'); ?>

    <?php the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>


<?php else : ?>

    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="italic">Posted on <?php the_date("F j, Y"); ?> , updated on <?php the_modified_date("F j, Y"); ?>  by  <?php the_author(); ?></p>
    <?php get_template_part('posts', 'images'); ?>

    <?php the_content(); ?>


<?php endif; ?>