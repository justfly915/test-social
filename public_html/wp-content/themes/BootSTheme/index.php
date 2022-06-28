<?get_header();?>
<div class="container">
<h1>Добро пожаловать на сайт-задание для M-Сошал!</h1>

    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-12">
            <h2>Новости</h2>
        </div>

<?
// вывод новостей
$my_posts = get_posts( array(
	'numberposts' => 3,
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
<div class="col-sm col-md-3 mb-3">
<div class="card">
  <img src="<?echo $thumbnail_url;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?echo carbon_get_the_post_meta('test_social_news_header')?></h5>
    <p class="card-text"><?echo carbon_get_the_post_meta('test_social_news_text')?></p>
    <a href="<?the_permalink();?>" class="btn btn-primary">К новости</a>
  </div>
</div>
</div>
<?
}
wp_reset_postdata();?>
</div>
<div class="row d-flex justify-content-center">
<div class="col-12">
            <h2>Продукция</h2>
        </div>
<?
// вывод продукции
$my_posts = get_posts( array(
	'numberposts' => 3,
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
<div class="col-sm col-md-3 mb-3">
<div class="card">
  <img src="<?echo $thumbnail_url;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?echo carbon_get_the_post_meta('test_social_products_header')?></h5>
    <p class="card-text"><?echo carbon_get_the_post_meta('test_social_products_text')?></p>
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
