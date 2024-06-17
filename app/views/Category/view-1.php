<?php

use ishop\App;

?>
<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000"><?=$category->title?></h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <?=$breadcrumbs?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                                        <img src="<?= PATH ?>/assets/img/products/<?= $product->img ?>"
                                                             width="270" height="274"
                                                             alt="<?= $product->title ?>">
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
                                                    <div class="product-action">
                                                        <a class="btn-product-wishlist add-wishlist"
                                                           data-id="<?= $product->id; ?>"
                                                           href="<?= PATH ?>/wishlist/add?id=<?= $product->id; ?>"><i
                                                                class="fa fa-heart"></i></a>
                                                        <a class="btn-product-cart add-cart"
                                                           data-id="<?= $product->id; ?>"
                                                           href="<?= PATH ?>/cart/add?id=<?= $product->id; ?>"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                        <button type="button" class="btn-product-quick-view-open">
                                                            <i class="fa fa-arrows"></i>
                                                        </button>
                                                        <a class="btn-product-compare add-compare"
                                                           data-id="<?= $product->id; ?>"
                                                           href="<?= PATH ?>/compare/add?id=<?= $product->id; ?>"><i
                                                                class="fa fa-random"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <div class="category">
                                                        <ul>
                                                            <li>
                                                                <a href="<?= PATH ?>/category/<?= App::$app->getProperty('cats')[$product->category_id]['alias'] ?>">Категория: <?= App::$app->getProperty('cats')[$product->category_id]['title'] ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="title"><a
                                                            href="product/<?= $product->alias ?>"><?= $product->title ?></a>
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
                            <?php else:?>
                                <h3 class="text-center text-danger">В этой категории товаров пока нет...</h3>
                            <?php endif; ?>

                            <div class="col-12">
                                <div class="pagination-items">
                                    <p><?=count($products)?> товара(ов) из <?=$total?></p>
                                    <?php if($pagination->countPages > 1):?>
                                    <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-1.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-flag">
                                                <ul>
                                                    <li class="discount">-10%</li>
                                                </ul>
                                            </div>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Leather Mens Slipper</a>
                                            </h4>
                                            <div class="prices">
                                                <span class="price-old">$300</span>
                                                <span class="sep">-</span>
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-2.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Quickiin Mens shoes</a></h4>
                                            <div class="prices">
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-3.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-flag">
                                                <ul>
                                                    <li class="discount">-10%</li>
                                                </ul>
                                            </div>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Rexpo Womens shoes</a></h4>
                                            <div class="prices">
                                                <span class="price-old">$300</span>
                                                <span class="sep">-</span>
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-4.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Modern Smart Shoes</a></h4>
                                            <div class="prices">
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-5.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-flag">
                                                <ul>
                                                    <li class="discount">-10%</li>
                                                </ul>
                                            </div>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Primitive Mens shoes</a>
                                            </h4>
                                            <div class="prices">
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-md-12">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-list-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/list-6.webp" width="322" height="360"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-action">
                                                <a class="btn-product-wishlist" href="shop-wishlist.html"><i
                                                        class="fa fa-heart"></i></a>
                                                <a class="btn-product-cart" href="shop-cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <button type="button" class="btn-product-quick-view-open">
                                                    <i class="fa fa-arrows"></i>
                                                </button>
                                                <a class="btn-product-compare" href="shop-compare.html"><i
                                                        class="fa fa-random"></i></a>
                                            </div>
                                            <a class="banner-link-overlay" href="shop.html"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="category">
                                                <ul>
                                                    <li><a href="shop.html">Men</a></li>
                                                    <li class="sep">/</li>
                                                    <li><a href="shop.html">Women</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title"><a href="single-product.html">Leather Mens Slipper</a>
                                            </h4>
                                            <div class="prices">
                                                <span class="price-old">$300</span>
                                                <span class="sep">-</span>
                                                <span class="price">$240.00</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo,
                                                rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis
                                                provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                                            <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-12">
                                <div class="pagination-items">
                                    <?=$pagination->getHtml()?>
<!--                                    <ul class="pagination justify-content-center mb--0">-->
<!--                                        <li><a class="active" href="shop.html">1</a></li>-->
<!--                                        <li><a href="shop-four-columns.html">2</a></li>-->
<!--                                        <li><a href="shop-three-columns.html">3</a></li>-->
<!--                                    </ul>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>