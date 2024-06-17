<?php if ($slides):?>
    <section class="home-slider-area">
        <div class="swiper-container home-slider-container default-slider-container">
            <div class="swiper-wrapper home-slider-wrapper slider-default">
                <?php foreach ($slides as $item): ?>
                    <?php if ($item['is_active']): ?>
                        <?php
                            $slide = isMobile() ? $item['mobile_image'] : $item['image'];
                        ?>
                        <div class="swiper-slide ">
                            <div class="slider-content-area slider-content-area-two"
                                 data-bg-img="<?= $slide ?>">
                                <div class="container">
                                    <div class="slider-container">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-lg-7">
                                                <div class="slider-content">
                                                    <div class="content">
                                                        <div class="desc-box">
                                                            <p class="desc"><?= $item['text'] ?></p>
                                                        </div>
                                                        <div class="title-box">
                                                            <h2 class="title"><span
                                                                        class="font-weight-400"><?= $item['title'] ?>
                                                            </h2>
                                                        </div>
                                                        <div class="btn-box">
                                                            <a class="btn-slider"
                                                               href="<?= $item['link'] ?>"><?= $item['button'] ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!--== Add Swiper Arrows ==-->
            <?php if (count($slides) > 1): ?>
                <div class="swiper-btn-wrap">
                    <div class="swiper-btn-prev">
                        <i class="pe-7s-angle-left"></i>
                    </div>
                    <div class="swiper-btn-next">
                        <i class="pe-7s-angle-right"></i>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php if ($brands): ?>
    <section class="product-area product-category-area">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($brands as $brand): ?>
                    <div class="col-sm-6 col-lg-4">
                        <!--== Start Product Category Item ==-->
                        <div class="product-category">
                            <div class="inner-content">
                                <div class="product-category-content">
                                    <div class="content">
                                        <h3 class="title text-white"><?= $brand->title ?></h3>
                                    </div>
                                </div>
                                <div class="product-category-thumb"
                                     data-bg-img="assets/img/brands/<?= $brand->img ?>"></div>
                                <!--                                <a class="banner-link-overlay" href="brand/-->
                                <?php //= $brand->alias ?><!--"></a>-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($hits): ?>
    <section class="product-area product-default-area product-featured-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Популярные товары</h3>
                        <div class="desc">
                            <p>Эти товары чаще всего покупают наши посетители</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($hits as $hit): ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="product-item">
                            <div class="inner-content">
                                <div class="product-thumb">
                                    <a href="<?= PATH ?>/product/<?= $hit->alias ?>">
                                        <?php if ($hit->img): ?>
                                            <picture>
                                                <source srcset="<?= PATH ?>/<?= toWebp($hit->img) ?>" type="image/webp">
                                                <img src="<?= PATH ?>/<?= $hit->img ?>" width="270" height="274" alt="<?= $hit->title ?>-<?= $hit->id ?>">
                                            </picture>
                                        <?php else: ?>
                                            <img src="<?= PATH ?>/img/noimage.jpg" width="270" height="274"
                                                 alt="<?= $hit->title ?>-<?= $hit->id ?>">
                                        <?php endif; ?>
                                    </a>
                                    <?php if ($hit->old_price): ?>
                                        <div class="product-flag">
                                            <ul>
                                                <li class="discount">-<?= sale_percent($hit->old_price, $hit->price) ?>
                                                    %
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <noindex>
                                    <div class="product-action">
                                        <?php
                                        if(in_array($hit->id, \ishop\App::$app->getProperty('wishlist'))){
                                            $class = 'del-wishlist';
                                        } else{
                                            $class = 'add-wishlist';
                                        }
                                        ?>
                                        <a rel="nofollow" class="btn-product-wishlist <?=$class?>"
                                           data-id="<?= $hit->id; ?>"
                                           href="<?= PATH ?>/wishlist/add?id=<?= $hit->id; ?>"><i
                                                    class="fa fa-heart"></i></a>
                                        <a rel="nofollow" class="btn-product-cart add-cart" data-id="<?= $hit->id; ?>"
                                           href="<?= PATH ?>/cart/add?id=<?= $hit->id; ?>"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                    </div>
                                    </noindex>
                                </div>
                                <div class="product-info">
                                    <?php
                                    $art = '<span>(YS-' . $hit->id . ')</span>';
                                    ?>
                                    <h4 class="title">
                                        <a href="<?= PATH ?>/product/<?= $hit->alias ?>"><?= upper($hit->title) ?> <?=$art?></a>
                                    </h4>
                                    <div class="prices">
                                        <?php if ($hit->old_price): ?>
                                            <span class="price-old"><?= $hit->old_price ?> Р.</span>
                                            <span class="sep">-</span>
                                        <?php endif; ?>
                                        <span class="price"><?= $hit->price ?> Р.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

    <section class="parallax" data-speed="1.08" data-bg-img="assets/img/brand-shoes.jpeg">
        <div class="container pt--0 pb--0">
            <div class="row divider-wrap divider-style3">
                <div class="col-lg-6">
                    <div class="divider-thumb mousemove">
                        <div class="shape-one scene">
                <span class="scene-layer" data-depth=".5">
                  <img src="assets/img/adiki.png" width="377" height="243" alt="Image-HasTech">
                </span>
                        </div>
                        <div class="shape-two mousemove-layer" data-speed="1"><img src="assets/img/shape/4.webp"
                                                                                   width="532"
                                                                                   height="326" alt="Image-HasTech">
                        </div>
                        <div class="shape-three"><img src="assets/img/shape/5.webp" width="280" height="339"
                                                      alt="Image-HasTech"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="divider-content">
                        <h4 class="sub-title">Только для Вас!</h4>
                        <h2 class="title">Скидка 10%</h2>
                        <p class="desc">От покупки на сумму более 10 000 Р</p>
                        <a class="btn-theme" href="<?= PATH ?>/category/">Вперед</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="feature-area">
        <div class="container pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="feature-content-box">
                        <div class="feature-box-wrap">
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/1.webp" width="55" height="41"
                                                 alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Бесплатная доставка</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/2.webp" width="35" height="41"
                                                 alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Безопасная оплата</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/3.webp" width="33" height="41"
                                                 alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Скидки в заказе</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/4.webp" width="43" height="41"
                                                 alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Все время на связи</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shape-group-style1">
                            <div class="shape-group-one"><img src="assets/img/shape/6.webp" width="214" height="58"
                                                              alt="Image-HasTech"></div>
                            <div class="shape-group-two"><img src="assets/img/shape/7.webp" width="136" height="88"
                                                              alt="Image-HasTech"></div>
                            <div class="shape-group-three"><img src="assets/img/shape/8.webp" width="108" height="74"
                                                                alt="Image-HasTech"></div>
                            <div class="shape-group-four"><img src="assets/img/shape/9.webp" width="239" height="69"
                                                               alt="Image-HasTech"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if ($sale): ?>
    <section class="product-area product-best-seller-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Акционные предложения</h3>
                        <div class="desc">
                            <p>Успей купить товары со скидками!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-wrap">
                        <div class="swiper-container product-slider-col4-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($sale as $item): ?>
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <div class="inner-content">
                                                <div class="product-thumb">
                                                    <a href="<?= PATH ?>/product/<?= $item->alias ?>">
                                                        <?php if ($item->img): ?>
                                                            <picture>
                                                                <source srcset="<?= PATH ?>/<?= toWebp($item->img) ?>" type="image/webp">
                                                                <img src="<?= PATH ?>/<?= $item->img ?>" width="270" height="274" alt="<?= $item->title ?>-<?= $item->id ?>">
                                                            </picture>
                                                        <?php else: ?>
                                                            <img src="<?= PATH ?>/img/noimage.jpg" width="270"
                                                                 height="274" alt="<?= $item->title ?>-<?= $item->id ?>">
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php if ($item->old_price): ?>
                                                        <div class="product-flag">
                                                            <ul>
                                                                <li class="discount">
                                                                    -<?= sale_percent($item->old_price, $item->price) ?>
                                                                    %
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                    <noindex>
                                                    <div class="product-action">
                                                        <?php
                                                        if(in_array($item->id, \ishop\App::$app->getProperty('wishlist'))){
                                                            $class = 'del-wishlist';
                                                        } else{
                                                            $class = 'add-wishlist';
                                                        }
                                                        ?>
                                                        <a rel="nofollow" class="btn-product-wishlist <?=$class?>"
                                                           data-id="<?= $item->id; ?>"
                                                           href="<?= PATH ?>/wishlist/add?id=<?= $item->id; ?>"><i
                                                                    class="fa fa-heart"></i></a>
                                                        <a rel="nofollow" class="btn-product-cart add-cart" data-id="<?= $item->id; ?>"
                                                           href="<?= PATH ?>/cart/add?id=<?= $item->id; ?>"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                    </noindex>
                                                </div>
                                                <div class="product-info">
                                                    <?php
                                                    $art = '<span>(YS-' . $item->id . ')</span>';
                                                    ?>
                                                    <h4 class="title">
                                                        <a href="<?= PATH ?>/product/<?= $item->alias ?>"><?= upper($item->title) ?> <?=$art?></a>
                                                    </h4>
                                                    <div class="prices">
                                                        <?php if ($item->old_price): ?>
                                                            <span class="price-old"><?= $item->old_price ?> Р.</span>
                                                            <span class="sep">-</span>
                                                        <?php endif; ?>
                                                        <span class="price"><?= $item->price ?> Р.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--== Add Swiper Arrows ==-->
                        <?php if(count($sale) > 4): ?>
                            <div class="product-swiper-btn-wrap">
                                <div class="product-swiper-btn-prev">
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                                <div class="product-swiper-btn-next">
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!--<section class="product-area product-collection-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="product-collection">
                        <div class="inner-content">
                            <div class="product-collection-content">
                                <div class="content">
                                    <h3 class="title"><a href="shop.html">Спортивная</a></h3>
                                    <h4 class="price">От 2500 Р</h4>
                                </div>
                            </div>
                            <div class="product-collection-thumb" data-bg-img="assets/img/shop/collection/1.webp"></div>
                            <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="product-collection">
                        <div class="inner-content">
                            <div class="product-collection-content">
                                <div class="content">
                                    <h3 class="title"><a href="shop.html">Повседневная</a></h3>
                                    <h4 class="price">От 2200 Р</h4>
                                </div>
                            </div>
                            <div class="product-collection-thumb" data-bg-img="assets/img/shop/collection/2.webp"></div>
                            <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="product-collection">
                        <div class="inner-content">
                            <div class="product-collection-content">
                                <div class="content">
                                    <h3 class="title"><a href="shop.html">Для походов</a></h3>
                                    <h4 class="price">От 3000 Р</h4>
                                </div>
                            </div>
                            <div class="product-collection-thumb" data-bg-img="assets/img/shop/collection/3.webp"></div>
                            <a class="banner-link-overlay" href="shop.html"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   <section class="testimonial-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Отзывы покупателей</h3>
                        <div class="desc">
                            <p>Последние отзывы о товаре от наших покупателей</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container testimonial-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-thumb">
                                            <img src="assets/img/testimonial/1.webp" width="90" height="90"
                                                 alt="Image-HasTech">
                                        </div>
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor
                                                incididunt
                                                ut laborj et dolore magna.</p>
                                            <div class="testi-author">
                                                <div class="testi-info">
                                                    <span class="name"><a href="about-us.html">Jaren Hammer</a></span>
                                                </div>
                                            </div>
                                            <div class="testi-quote"><img src="assets/img/icons/quote1.webp" width="62"
                                                                          height="44" alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-thumb">
                                            <img src="assets/img/testimonial/2.webp" width="90" height="90"
                                                 alt="Image-HasTech">
                                        </div>
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor
                                                incididunt
                                                ut laborj et dolore magna.</p>
                                            <div class="testi-author">
                                                <div class="testi-info">
                                                    <span class="name"><a href="about-us.html">Dorian Cordova</a></span>
                                                </div>
                                            </div>
                                            <div class="testi-quote"><img src="assets/img/icons/quote1.webp" width="62"
                                                                          height="44" alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<?php
$settings = $this->getSettings();
if ($settings['seo_text']) {
    ?>
    <section class="seo-text">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?= $settings['seo_text'] ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}