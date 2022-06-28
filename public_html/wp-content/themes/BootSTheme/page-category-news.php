<?php
/*
Template Name: Страница всех новостей
*/
?>

<?get_header();?>
<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <h1>Все новости</h1>
        </div>

<?
// вывод новостей
$my_posts = get_posts( array(
	'category'    => 0,
	'orderby'     => 'date_field', // сортировка по кастомному полю
	'order'       => 'DESC',
    'meta_query' => [ // параметры для кастомного поля
        'date_field' => [
            'key' => 'crb_event_start_date'
        ]
    ],
	'post_type'   => 'news',
	'suppress_filters' => true
) );

foreach( $my_posts as $post ){
    $thumbnail_id = carbon_get_the_post_meta('test_social_news_img'); // получим ID картинки из опции темы
    $thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'thumbnail' );  // ссылка на полный размер картинки по ID вложения
?>
<div class="col-sm-12 col-md-3 mb-3">
<div class="card">
  <img src="<?echo $thumbnail_url;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?echo carbon_get_the_post_meta('test_social_news_header')?></h5>
    <p class="card-text"><?echo  mbCutString(carbon_get_the_post_meta('test_social_news_text'), 100)?></p>
    <a href="<?the_permalink();?>" class="btn btn-primary">К новости</a>
  </div>
</div>
</div>
<?
}
wp_reset_postdata();?>
</div>
</div>

<?get_footer();
