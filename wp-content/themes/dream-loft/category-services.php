<?php get_header();

if (empty($_GET['status'])) {
    $_GET['status'] = 'active';
}

?>

<div class="objects">
    <h2 class="objects__heading">Объекты \ 
        <a href="?status=finished" class="objects__link <?= ($_GET['status'] === 'finished') ? 'active' : ''?> ">Завершенные </a><span>\ </span>
        <a href="?status=active" class="objects__link <?= ($_GET['status'] === 'active') ? 'active' : ''?> ">В работе</a>
    </h2>
    <div class="objects__inner">
        <?php get_sidebar(); ?>
    
        <main class="objects-list">
<?php 

$args = array(
    'post_type' => 'object',
    'category' => 7,
    'meta_key' => 'object-active',
    'meta_value' => 'active'
);

$my_query = new WP_Query( $args );


if ( $my_query->have_posts() ) :  
    while ( $my_query->have_posts() ) : $my_query->the_post();
    global $post;

    $images = get_post_meta($post->ID, 'object_gallery_images');

    $thumbnail = get_field( 'object_thumb');
    var_dump($thumbnail);
    $atid = $thumbnail['id'];
    $result = wp_get_attachment_image_url($atid, 'avkstroy-custom-thumb');
    var_dump($result);

    ?>


	<div class="objects-list__item">
        <div style="background-image: url(<?php echo $result ?>)" class="objects-list__image">
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
    
<?php endif; ?>

<?php wp_reset_postdata(); ?>

    </main>
</div></div>


<? get_footer(); ?>