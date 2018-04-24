<?php
/**
 * Template Name: Отзывы
 *
 * @package WordPress
 * @subpackage dream-loft
 */

get_header(); ?>
<?php 
$catID = get_cat_ID( 'Отзывы' );
$testimonialsPage = get_post(88);
$testimonials = get_posts(['category' => $catID]); 

?>


<div class="testimonials-content">
    <h2 class="testimonials-content__heading"><?php echo $testimonialsPage->post_title ?></h2>
    <div class="testimonials-content__list">
    <?php

    foreach ($testimonials as $testimonial) {
        $post_thumbnail = get_the_post_thumbnail( $testimonial );
    ?>
        <div class="testimonials-content__item">
            <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url( $testimonial, 'full' ); ?>" class="testimonials-content__link">
                <img src="<?php echo get_the_post_thumbnail_url( $testimonial, 'large' ); ?>" class="testimonials-content__image" alt="" role="presentation"/>
            </a>
            <div class="testimonials-content__label"> 
                <span><?php echo $testimonial->post_content ?></span>
            </div>
        </div>
 
    <?php } ?>
    </div>
</div>

<?php get_footer(); ?>

