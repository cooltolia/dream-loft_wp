<?php get_header(); 

$currentCategory = get_queried_object()->term_id;

if (empty($_GET['status'])) {
    $_GET['status'] = 'active';
}


?>
<div class="objects">
    <h2 class="objects__heading">Объекты \ 
        <a href="?status=finished" class="objects__link <?= ($_GET['status'] === 'finished') ? 'active' : ''?> ">Завершенные </a><span>\ </span>
        <a href="?status=active" class="objects__link <?= ($_GET['status'] === 'active') ? 'active' : ''?> ">В работе</a>
    </h2>
    <div class="objects__inner"><!-- aside --> 
        <?php get_sidebar(); ?>
    
        <main class="objects-list">
<?php 
    $args = array(
        'post_type' => 'object',
        'cat' => $currentCategory,
        'meta_key' => 'object-active',
        'meta_value' => 'active'
    );
    
    $my_query = new WP_Query( $args );

        while ( $my_query->have_posts() ) : $my_query->the_post();
            global $post;
			$images = get_post_meta($post->ID, 'object_gallery_images');

            $thumbnail = get_field( 'object_thumb');
            $thumbnail = $thumbnail["url"];

            ?>

            <div class="objects-list__item">
                <div style="background-image: url(<?php echo $thumbnail ?>;)" class="objects-list__image">
                <?php if ($images[0] !== false) { ?>
                    <a href="#" class="objects-list__more">+
                    <?php foreach($images as $image) { ?>
                        <div style="display: none" class="all-images">
                            <a data-fancybox="images" href="<?php echo $image['guid'] ?>" class="fancybox"></a>
                        </div>
                    <?php } ?>
                    </a>
                <?php } ?>
                </div>
                <div class="objects-list__description">
                    <div class="objects-list__customer"><span class='bold'>Заказчик:</span> <?php echo get_field( 'object-client' ) ?></div>
                    <div class="objects-list__location"><span class='bold'>Объект:</span> <?php echo get_field( 'object-data' ) ?></div>
                    <div class="objects-list__done-title"><span class='bold'>Описание работ:</span></div>
                    <div class="objects-list__done-list">
                        <?php echo get_field( 'object-description' ) ?>
                    </div>
                    <div class="objects-list__done-year"><?php echo get_field( 'object-year' ) ?></div>
                </div>
            </div>

		<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

</main>
</div></div>

<? get_footer(); ?>