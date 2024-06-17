<?php

use ishop\App;

?>
<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Результаты поиска</h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <li><a href="<?= PATH ?>">Главная</a></li>
                            <li class="breadcrumb-sep">/</li>
                            <li>Поиск по запросу: "<?= h($query); ?>"</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!--== Start Product Area Wrapper ==-->
<section class="product-area product-default-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                        <div class="row">
                            <?php if ($products): ?>
                                <?php foreach ($products as $product): ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="product-item">
                                            <div class="inner-content">
                                                <div class="product-thumb">
                                                    <a href="<?= PATH ?>/product/<?= $product->alias ?>">
                                                        <?php if ($product->img): ?>
                                                            <picture>
                                                                <source srcset="<?= PATH ?>/<?= toWebp($product->img) ?>" type="image/webp">
                                                                <img src="<?= PATH ?>/<?= $product->img ?>" width="270" height="274" alt="<?= $product->title ?>-<?= $product->id ?>">
                                                            </picture>
                                                        <?php else: ?>
                                                            <img src="<?= PATH ?>/img/noimage.jpg" width="270"
                                                                    height="274" alt="<?= $product->title ?>-<?= $product->id ?>">
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php if ($product->old_price): ?>
                                                        <div class="product-flag">
                                                            <ul>
                                                                <li class="discount">
                                                                    -<?= sale_percent($product->old_price, $product->price) ?>
                                                                    %
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                    <noindex>
                                                    <div class="product-action">
                                                        <?php
                                                        if(in_array($product->id, \ishop\App::$app->getProperty('wishlist'))){
                                                            $class = 'del-wishlist';
                                                        } else{
                                                            $class = 'add-wishlist';
                                                        }
                                                        ?>

                                                        <a rel="nofollow" class="btn-product-wishlist <?=$class?>"
                                                            data-id="<?= $product->id; ?>"
                                                            href="<?= PATH ?>/wishlist/add?id=<?= $product->id; ?>"><i
                                                                    class="fa fa-heart"></i></a>
                                                        <a rel="nofollow" class="btn-product-cart add-cart"
                                                            data-id="<?= $product->id; ?>"
                                                            href="<?= PATH ?>/cart/add?id=<?= $product->id; ?>"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                    </noindex>
                                                </div>
                                                <div class="product-info">
                                                        <?php
                                                        $art = '<span>(YS-' . $product->id . ')</span>';
                                                        ?>
                                                        <h4 class="title">
                                                            <a href="<?= PATH ?>/product/<?= $product->alias ?>"><?= upper($product->title) ?> <?=$art?></a>
                                                        </h4>
                                                    <div class="prices">
                                                        <?php if ($product->old_price): ?>
                                                            <span class="price-old"><?= $product->old_price ?> Р.</span>
                                                            <span class="sep">-</span>
                                                        <?php endif; ?>
                                                        <span class="price"><?= $product->price ?> Р.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                            <div class="pagination-items">
                                                <p><?= count($products) ?> товара(ов) из <?= $total ?></p>
                                                <?php if ($pagination->countPages > 1): ?>
                                                    <?= $pagination; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                            <?php else:?>
                            <h3 class="text-center text-danger">Ничего не нашли...</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>