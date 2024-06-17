<?php

use ishop\App;

?>
<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000"><?= $page->title ?></h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <li><a href="/">Главная</a></li>
                            <li class="breadcrumb-sep">/</li>
                            <li><?= $page->title ?></li>
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
                    <div class="col-md-6">
                        <?php if ($page->content): ?>
                            <?= $page->content ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="register-form-content">
                            <form id="mail-form" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Имя <span class="required">*</span></label>
                                            <input id="name" name="name" class="form-control" type="text">
                                            <div class="error-name errors-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phone">Телефон <span class="required">*</span></label>
                                            <input id="phone" name="phone" class="form-control" type="tel">
                                            <div class="error-phone errors-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <label for="text" class="form-label">Сообщение</label>
                                            <textarea class="form-control" name="text" id="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb--0">
                                            <button class="btn-register" type="submit">Отправить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>