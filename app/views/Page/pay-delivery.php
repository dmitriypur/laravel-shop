<?php

use ishop\App;

?>
<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Новинки товаров</h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <li><a href="/">Главная</a></li>
                            <li class="breadcrumb-sep">/</li>
                            <li>Контакты</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="product-area product-default-area">
    <div class="container">
        <div class="row flex-xl-row-reverse justify-content-between">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                 aria-labelledby="nav-grid-tab">
                                <div class="row product__list">

                                    <?php if ($content): ?>
                                        <?=$content?>
                                    <?php else: ?>
                                        <h3 class="text-center text-danger">Пустая страница...</h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>