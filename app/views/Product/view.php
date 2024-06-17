<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000"><?= $product->title; ?></h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <?= $breadcrumbs; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_GLOBAL['img'] = PATH . '/' . $product->img;?>
<section class="product-area product-single-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-single-item">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--== Start Product Thumbnail Area ==-->
                            <?php if ($gallery): ?>
                                <div class="product-single-thumb">
                                    <div class="swiper-container single-product-thumb single-product-thumb-slider">
                                        <div class="swiper-wrapper">
                                            <?php $i = 0; foreach ($gallery as $img): $i++;?>
                                                <div class="swiper-slide">
                                                    <a class="lightbox-image" data-fancybox="gallery"
                                                       href="<?= PATH ?>/<?= $img['img']; ?>">
                                                        <picture>
                                                            <source srcset="<?= PATH ?>/<?= toWebp($img['img']) ?>" type="image/webp">
                                                            <img src="<?= PATH ?>/<?= $img['img'] ?>" width="570" height="541" alt="<?= $product->title?>-<?= $product->id ?> Фото - <?=$i?>">
                                                        </picture>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="swiper-container single-product-nav single-product-nav-slider">
                                        <div class="swiper-wrapper">
                                            <?php $i = 0;  foreach ($gallery as $img): $i++;?>
                                                <div class="swiper-slide">
                                                    <picture>
                                                        <source srcset="<?= PATH ?>/<?= toWebp($img['img']) ?>" type="image/webp">
                                                        <img src="<?= PATH ?>/<?= $img['img'] ?>" width="127" height="127" alt="<?= $product->title?>-<?= $product->id ?> Фото - <?=$i?>">
                                                    </picture>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a class="lightbox-image" data-fancybox="gallery"
                                   href="<?= PATH ?>/<?= $product->img ?>">
                                   <picture>
                                        <source srcset="<?= PATH ?>/<?= toWebp($product->img) ?>" type="image/webp">
                                        <img src="<?= PATH ?>/<?= $product->img ?>" width="570" height="541" alt="<?= $product->title?>-<?= $product->id ?>">
                                    </picture>
                                </a>
                            <?php endif; ?>
                            <!--== End Product Thumbnail Area ==-->
                        </div>
                        <div class="col-xl-6">
                            <!--== Start Product Info Area ==-->
                            <div class="product-single-info">
                                <?php
                                $art = '<span>(Арт: YS-' . $product->id . ')</span>';
                                ?>
                                <h3 class="main-title"><?= upper($product->title); ?> <?=$art?></h3>
                                <div class="prices">
                                    <span class="price base__price">Цена: <span><?= $product->price; ?></span>р</span>
                                    <?php if ($product->old_price): ?>
                                        <span class="price old_price"><del><?= $product->old_price; ?></del>р</span>
                                        <p class="sale__product">
                                            Скидка:
                                            <span><?= sale_percent($product->old_price, $product->price); ?></span>%</p>
                                    <?php endif; ?>
                                </div>
                                <p><span>Производитель :</span>
                                    <?= $brand->title; ?>
                                </p>
                                <?php if($attrs): ?>
                                    <div class="product-size">
                                        <h6 class="title">Размер</h6>
                                        <ul class="size-list">
                                            <?php foreach ($attrs as $item): ?>
                                                <li class="size-item" data-title="<?= $item['value'] ?>"
                                                    data-id="<?= $item['id'] ?>"><?= $item['value'] ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <input type="hidden" name="mod-size" id="mod-size" value>
                                    </div>
                                <?php endif; ?>

                                <div class="product-quick-action">
                                    <div class="qty-wrap">
                                        <div class="pro-qty">
                                            <input type="text" title="Quantity" name="qty" value="1">
                                        </div>
                                    </div>
                                    <a rel="nofollow" class="btn-theme add-cart" data-id="<?= $product->id; ?>"
                                       href="<?= PATH ?>/cart/add?id=<?= $product->id; ?>">В корзину</a>
                                </div>
                                <div class="product-wishlist-compare">
                                    <!--<a rel="nofollow" href="<?= PATH ?>/wishlist/add?id=<?= $product->id; ?>" class="add-wishlist"
                                       data-id="<?= $product->id; ?>"><i class="pe-7s-like"></i>В избранное</a>
                                    <a rel="nofollow" href="<?= PATH ?>/compare/add?id=<?= $product->id; ?>" class="add-compare"
                                       data-id="<?= $product->id; ?>"><i class="pe-7s-shuffle"></i>В сравнение</a>-->
                                </div>
                                <div class="product-info-footer">
                                    <p class="code"><span>Категория :</span>
                                        <?= \app\models\admin\Product::getCats($product->id);?>
                                    </p>
                                    <!--<div class="social-icons">
                                        <span>Share</span>
                                        <a href="#/"><i class="fa fa-facebook"></i></a>
                                        <a href="#/"><i class="fa fa-dribbble"></i></a>
                                        <a href="#/"><i class="fa fa-pinterest-p"></i></a>
                                    </div>-->
                                </div>
                            </div>
                            <!--== End Product Info Area ==-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($product->content): ?>
            <div class="row">
                <div class="col-12">
                    <div class="product-review-tabs-content">
                        <div class="tab-content product-tab-content">
                            <div class="product-description">
                                <p class="product-description__title">Описание товара
                                    <span><?= upper($product->title); ?></span></p>
                                <?= $product->content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if ($related): ?>
    <section class="product-area product-best-seller-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">С этим продуктом так же смотрят</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-wrap">
                        <div class="swiper-container product-slider-col4-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($related as $item): ?>
                                    <div class="swiper-slide">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item">
                                            <div class="inner-content">
                                                <div class="product-thumb">
                                                    <a href="<?= PATH ?>/product/<?= $item['alias'] ?>">
                                                        <?php if($item['img']): ?>
                                                            <img src="<?= PATH ?>/<?= $item['img'] ?>" width="270" height="274" alt="<?= $item['title']?>">
                                                        <?php else:?>
                                                            <img src="<?= PATH ?>/img/noimage.jpg" width="270" height="274" alt="<?= $item['title']?>">
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php if ($item['old_price']): ?>
                                                        <div class="product-flag">
                                                            <ul>
                                                                <li class="discount">
                                                                    -<?= sale_percent($item['old_price'], $item['price']) ?>
                                                                    %
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                    <noindex>
                                                    <div class="product-action">
                                                        <?php
                                                        if(in_array($item['id'], \ishop\App::$app->getProperty('wishlist'))){
                                                            $class = 'del-wishlist';
                                                        } else{
                                                            $class = 'add-wishlist';
                                                        }
                                                        ?>

                                                        <a rel="nofollow" class="btn-product-wishlist <?=$class?>"
                                                           data-id="<?= $item['id']; ?>"
                                                           href="<?= PATH ?>/wishlist/add?id=<?= $item['id']; ?>"><i
                                                                    class="fa fa-heart"></i></a>
                                                        <a rel="nofollow" class="btn-product-cart add-cart"
                                                           data-id="<?= $item['id']; ?>"
                                                           href="<?= PATH ?>/cart/add?id=<?= $item['id']; ?>"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                    </noindex>
                                                </div>
                                                <div class="product-info">
                                                    <h4 class="title"><a
                                                                href="<?= PATH ?>/product/<?= $item['alias'] ?>"><?= upper($item['title']) ?></a>
                                                    </h4>
                                                    <div class="prices">
                                                        <?php if ($item['old_price']): ?>
                                                            <span class="price-old"><?= $item['old_price'] ?> Р</span>
                                                            <span class="sep">-</span>
                                                        <?php endif; ?>
                                                        <span class="price"><?= $item['price'] ?> Р</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--== Add Swiper Arrows ==-->
                        <?php if (count($related) > 4): ?>
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
<?php if ($recentlyViewed): ?>
    <section class="product-area product-best-seller-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Последние просмотренные товары</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($recentlyViewed as $item): ?>
                    <?php if ($item->id != $product->id): ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item">
                                <div class="inner-content">
                                    <div class="product-thumb">
                                        <a href="<?= PATH ?>/product/<?= $item->alias ?>">
                                            <?php if($item->img): ?>
                                                <picture>
                                                    <source srcset="<?= PATH ?>/<?= toWebp($item->img) ?>" type="image/webp">
                                                    <img src="<?= PATH ?>/<?= $item->img ?>" width="270" height="274" alt="<?= $item->title ?>-<?= $item->id ?>">
                                                </picture>
                                            <?php else:?>
                                                <img src="<?= PATH ?>/img/noimage.jpg" width="270" height="274" alt="<?= $item->title?>">
                                            <?php endif; ?>
                                        </a>
                                        <?php if ($item->old_price): ?>
                                            <div class="product-flag">
                                                <ul>
                                                    <li class="discount">
                                                        -<?= sale_percent($item->old_price, $item->price) ?>%
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
                                        <h4 class="title"><a
                                                    href="<?= PATH ?>/product/<?= $item->alias ?>"><?= upper($item->title) ?></a>
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<script>
    let basePrice = <?=$product->price; ?>;
    let oldPrice = <?=$product->old_price; ?>;
    let percentSale = <?= $product->old_price ? sale_percent($product->old_price, $product->price) : 0; ?>;
</script>
