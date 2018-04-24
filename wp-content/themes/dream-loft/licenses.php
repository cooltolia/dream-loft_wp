<?php
/**
 * Template Name: Лицензии
 *
 * @package WordPress
 * @subpackage dream-loft
 */

get_header(); ?>
<?php 
$catID = get_cat_ID( 'Лицензии' );
$licensesPage = get_post(72);
$licenses = get_posts(['category' => $catID]); ?>

<div class="licenses-content">
    <h2 class="licenses-content__heading"><?php echo $licensesPage->post_title ?></h2>
    <div class="licenses-content__list">
    <?php

    foreach ($licenses as $license) {
        $post_thumbnail = get_the_post_thumbnail( $license );
    ?>
        <div class="licenses-content__item">
            <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url( $license, 'full' ); ?>" class="licenses-content__link">
                <img src="<?php echo get_the_post_thumbnail_url( $license, 'large' ); ?>" class="licenses-content__image" alt="" role="presentation"/>
            </a>
            <div class="licenses-content__label"> 
                <span><?php echo $license->post_content ?></span>
            </div>
        </div>
 
    <?php } ?>
    </div>
</div>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>

