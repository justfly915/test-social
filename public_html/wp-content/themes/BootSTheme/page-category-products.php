<?php
/*
Template Name: Страница всей продукции
*/
?>

<?get_header();?>
<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <h1>Вся продукция</h1>
        </div>
        <?
        // вывод продукции
        $my_posts = get_posts( array(
            'category'    => 0,
            'orderby'     => 'price_field', // сортировка по кастомному полю
            'order'       => 'ASC',
            'meta_query' => [ // параметры для кастомного поля
                'price_field' => [
                    'key' => 'test_social_products_price'
                ]
            ],
            'post_type'   => 'products',
            'suppress_filters' => true
        ) );

        foreach( $my_posts as $post ){
            $slides = carbon_get_post_meta(get_the_ID(), 'test_social_products_gallery');
            $thumbnail_url = wp_get_attachment_image_url( $slides[0], 'thumbnail' );  // ссылка на полный размер картинки по ID вложения
        ?>
        <div class="col-sm-12 col-md-3 mb-3">
            <div class="card">
                <img src="<?echo $thumbnail_url;?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><?echo carbon_get_the_post_meta('test_social_products_header')?></h5>
                <p class="card-text"><?echo mbCutString(carbon_get_the_post_meta('test_social_products_text'), 100);?></p>
                <p class="card-text"><?echo carbon_get_the_post_meta('test_social_products_price')?> руб.</p>
                <a href="<?the_permalink();?>" class="btn btn-primary">Подробнее</a>
            </div>
        </div>
    </div>
    <?}
    wp_reset_postdata();?>
    </div>
</div>

<?get_footer();
