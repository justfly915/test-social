<?get_header()?>
<div class="page-single">
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6">
        <div id="carouselExampleControls" class="carousel slide page-single__gallery" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $slides = carbon_get_post_meta(get_the_ID(), 'test_social_products_gallery');?>
                <?foreach ($slides as $slide):?>
                    <div class="carousel-item<? if ($slides[0] == $slide){ echo ' active';} ?>">
                        <img src="<?php echo wp_get_attachment_image_url($slide, 'full'); ?>"  class="d-block w-100" alt="Image">
                    </div>
                <? endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
            </div>
		</div>
		<div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <h1  class="page-single__h1"><?echo carbon_get_the_post_meta('test_social_products_header')?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p  class="page-single__caption">Комплектация:</p>
                    <?$data_complext_field = carbon_get_post_meta( get_the_ID(), 'test_social_products__complect' );?>
                    <ul  class="page-single__complectation">
                        <? if ($data_complext_field) {
                            foreach ($data_complext_field as $item): ?>
                        <li><? echo $item['test_social_products_item_name']; ?></li>
                        <?endforeach;
                        }?>
                    </ul>
                </div>
                <div class="col-12 page-single__text">
                    <?echo carbon_get_the_post_meta('test_social_products_text')?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="page-single__price product__item__price">Цена: <?echo carbon_get_the_post_meta('test_social_products_price')?> руб.</p>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="/" class="btn btn-secondary">На главную</a>
                    <a href="/produkcija" class="btn btn-primary">К продукции</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?get_footer();?>
