<?php
$args = [
    'taxonomy'     => 'category', // название таксономии с WP 4.5
    'hide_empty'   => FALSE,
    'orderby'      => 'ID',
	'order'        => 'ASC',
    'object_ids'   => NULL, //
    'fields'       => 'all',
    'count'        => FALSE,
    'parent'       => '',
    'hierarchical' => TRUE,
    'child_of'     => 10,
];
// Получаем категории из раздела Услуги (id=10)
$categories = get_categories( $args );


?>

<aside class="aside">
	<ul class="aside__nav">
        <?php 
            $cur_id = get_queried_object()->term_id;
            if ($cur_id === 10) $cur_id = 7;
			foreach ($categories as $category) {
                $category_id = $category->cat_ID; ?>
                <li class="aside__service">
                    <a class="aside__link <?php echo ( $cur_id === $category_id ) ? "active" : '' ?>" href="<?php echo get_category_link($category); ?>"> <?php echo $category->name ?> </a>
                </li>
			<?php } ?>
		
	</ul>
</aside><!--/ aside --> 