<?get_header()?>

<?
 $thumbnail_id = carbon_get_the_post_meta('test_social_news_img'); // получим ID картинки из опции темы
 $thumbnail_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );  // ссылка на полный размер картинки по ID вложения
?>

<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-12 d-flex justify-content-center">
			<img src="<?echo $thumbnail_url;?>" alt="">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h1><?echo carbon_get_the_post_meta('test_social_news_header')?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?echo carbon_get_the_post_meta('test_social_news_text')?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 d-flex justify-content-around">
		<a href="/" class="btn btn-secondary">На главную</a>
		<a href="/novosti" class="btn btn-primary">К новостям</a>
		</div>
	</div>
</div>

<?get_footer();?>
