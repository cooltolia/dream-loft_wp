<?php
/**
 * Template Name: Контакты
 *
 * @package WordPress
 * @subpackage dream-loft
 */

get_header(); ?>

<div class="contacts-data">
    <div class="contacts-data__name"><?php echo get_option('company_name')?>
    </div>
    <div class="contacts-data__address"><?php echo get_option('company_address')?>
    </div>
    <div class="contacts-data__tel">Телефон: <?php echo get_option('company_phone')?>
    </div>
</div><!--/ contacts-data --> <!-- map --> 
<div class="map">
    <div id="map" class="map__inner">
    </div>
</div><!--/ map --> 
   

<?php get_footer(); ?>