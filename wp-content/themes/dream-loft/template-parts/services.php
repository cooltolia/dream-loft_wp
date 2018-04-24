
<?php 


$args = array(
	'numberposts' => -1,
	'post_type' => 'service',
	
);

$posts = get_posts( $args ) ?>;
<div class="services">
	<div class="services__inner">
        <div class="services__list">

        <?php foreach($posts as $post) { 
            $image = get_field('service-image');
        ?>
            <a href="<?php the_permalink(); ?>" class="services__item">
                <span style="background-image: url(<?php echo $image['url']; ?>)" class="services__image"></span>
                <span class="services__text"><?php the_title() ?></span>
            </a>

        <?php } ?>

<?php wp_reset_postdata(); ?>

        </div>
    </div>
</div>