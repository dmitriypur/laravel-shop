<?php

use ishop\App;

$settings = $this->getSettings();
$prices = App::$app->getProperty('prices');
$uri = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$uri = explode('?', $uri)[0];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="yandex-verification" content="749163587c64092a" />
    <link rel="canonical" href="<?=$uri?>"/>

    <?php
    if(strpos($_SERVER['REQUEST_URI'], 'product')){
        echo '<meta property="og:image" content="'. $_GLOBAL['img'] .'">';
    }else{
        echo '<meta property="og:image" content="'. PATH .'/assets/img/logo.png">';
    }
    ?>
    

    <?= $this->getMeta(); ?>
    <!--== Favicon ==-->
    <link rel="icon" href="<?= PATH ?>/favicon.svg" type="image/svg+xml">

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,500&display=swap"
          rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="<?= PATH ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--== Font Awesome Min Icon CSS ==-->
    <link href="<?= PATH ?>/assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!--== Pe7 Stroke Icon CSS ==-->
    <link href="<?= PATH ?>/assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="<?= PATH ?>/assets/css/swiper.min.css" rel="stylesheet"/>
    <!--== Fancybox Min CSS ==-->
    <link href="<?= PATH ?>/assets/css/fancybox.min.css" rel="stylesheet"/>
    <!--== Aos Min CSS ==-->
    <link href="<?= PATH ?>/assets/css/aos.min.css" rel="stylesheet"/>

    <!--== Main Style CSS ==-->
    <link href="<?= PATH ?>/assets/css/style.css" rel="stylesheet"/>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        :root {
            --color-primary: <?=$settings['base_color']?>;
            --color-old: #eb3e32;
        }
    </style>
    <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(97229591, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                ecommerce:"dataLayer"
        });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/97229591" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body>

<!--wrapper start-->
<div class="wrapper">
    <!--== Start Header Wrapper ==-->
    <header class="main-header-wrapper position-relative">
        <div class="header-top">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-12">
                        <div class="header-top-align">
                            <div class="header-top-align-start">
                                <div class="desc">
                                    <p>Бесплатная доставка по России</p>
                                </div>
                            </div>
                            <div class="header-top-align-end">
                                <div class="header-info-items">
                                    <div class="info-items">
                                        <ul>
                                            <li class="number"><i class="fa fa-phone"></i><a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['phone'])?>"><?=$settings['phone']?></a></li>
                                            <li class="email"><i class="fa fa-envelope"></i><a
                                                        href="mailto:<?=$settings['email']?>"><?=$settings['email']?></a></li>
                                            <li class="account">
                                                <div class="dropdown">
                                                    <i class="fa fa-user"></i>
                                                    <a href="#" class="dropdown-toggle" id="account"
                                                       data-bs-toggle="dropdown" aria-expanded="false">Аккаунт</a>
                                                    <ul class="dropdown-menu my-dropdown-menu"
                                                        aria-labelledby="account">
                                                        <?php if (!empty($_SESSION['user'])): ?>
                                                            <li><p>Приветствую, <b><?= $_SESSION['user']['name']; ?></b>
                                                                </p></li>
                                                            <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                                                                <li><a href="<?= ADMIN; ?>">Управление</a></li>
                                                            <?php endif; ?>
                                                            <li><a href="<?= PATH ?>/user/cabinet">Кабинет</a></li>
                                                            <li><a href="<?= PATH ?>/user/logout">Выход</a></li>
                                                        <?php else: ?>
                                                            <li><a class="dropdown-item" href="<?= PATH ?>/user/login">Вход</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="<?= PATH ?>/user/signup">Регистрация</a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container pt--0 pb--0">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="header-middle-align">
                            <div class="header-middle-align-start">
                                <div class="header-logo-area">
                                    <?php if($_SERVER['REQUEST_URI'] == '/'):?>
                                    
                                        <img class="logo-main" src="<?= PATH ?>/assets/img/sneakers-logo.svg" width="131"
                                             height="34" alt="Logo"/>
                                        <img class="logo-light" src="<?= PATH ?>/assets/img/sneakers-logo.svg" width="131"
                                             height="34" alt="Logo"/>
                                    
                                    <?php else: ?>
                                        <a href="<?= PATH ?>/">
                                            <img class="logo-main" src="<?= PATH ?>/assets/img/sneakers-logo.svg" width="131"
                                                height="34" alt="Logo"/>
                                            <img class="logo-light" src="<?= PATH ?>/assets/img/sneakers-logo.svg" width="131"
                                                height="34" alt="Logo"/>
                                        </a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="header-middle-align-center">
                                <div class="header-search-area">
                                    <form class="header-searchbox" action="<?= PATH ?>/search">
                                        <input type="search" class="form-control search-form" placeholder="Поиск"
                                               name="s">
                                        <button class="btn-submit" type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                    <div class="search-result">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="header-middle-align-end">
                                <div class="header-action-area">
                                    <div class="shopping-search">
                                        <button class="shopping-search-btn" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#AsideOffcanvasSearch"
                                                aria-controls="AsideOffcanvasSearch"><i class="pe-7s-search icon"></i>
                                        </button>
                                    </div>
                                    <div class="shopping-wishlist">
                                        <a class="shopping-wishlist-btn" href="<?= PATH ?>/wishlist">
                                            <i class="pe-7s-like icon"></i>
                                        </a>
                                    </div>
                                    <?php if (strpos($_SERVER['QUERY_STRING'], 'cart') === false): ?>
                                        <div class="shopping-cart">
                                            <button class="shopping-cart-btn show-mini-cart" type="button">
                                                <i class="pe-7s-shopbag icon"></i>
                                                <sup class="shop-count"><?= (!empty($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : 0; ?></sup>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                        <i class="pe-7s-menu"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-area header-default">
            <div class="container">
                <div class="row no-gutter align-items-center position-relative">
                    <div class="col-12">
                        <div class="header-align">
                            <div class="header-navigation-area position-relative">
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/menu.php',
                                    'append' => "<li><a href='". PATH ."/sale'>Акции</a></li><li><a href='". PATH ."/contacts'>Контакты</a></li>",
                                ]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--== End Header Wrapper ==-->
    <div class="alert-wrap">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger dpur-alert">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success dpur-alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
    </div>
    <main class="main-content">
        <?= $content; ?>
    </main>

    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-area">
        <!--== Start Footer Main ==-->
        <div class="footer-main">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item">
                            <div class="about-widget-wrap">
                                <div class="widget-logo-area">
                                    <?php if($_SERVER['REQUEST_URI'] == '/'):?>
                                        <img class="logo-main" src="<?= PATH ?>/assets/img/sneakers-logo-w.svg" width="131"
                                             height="34" alt="Logo"/>
                                    <?php else:?>
                                        <a href="<?= PATH ?>/">
                                            <img class="logo-main" src="<?= PATH ?>/assets/img/sneakers-logo-w.svg" width="131"
                                                height="34" alt="Logo"/>
                                        </a>
                                    <?php endif;?>
                                </div>
                                <p class="desc">Интернет магазин качественной обуви известных мировых производителей</p>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item widget-services-item">
                            <h4 class="widget-title">Меню</h4>
                            <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#widgetId-1">Меню</h4>
                            <div id="widgetId-1" class="collapse widget-collapse-body">
                                <div class="collapse-body">
                                    <div class="widget-menu-wrap">
                                        <ul class="nav-menu">
                                            <li><a href='<?=PATH?>/category'>Каталог</a></li>
                                            <li><a href='<?=PATH?>/sale'>Акции</a></li>
                                            <li><a href='<?=PATH?>/contacts'>Контакты</a></li>
                                            <!-- <li><a href='<?=PATH?>/page/oplata-i-dostavka'>Оплата и доставка</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item widget-account-item">
                            <h4 class="widget-title">Аккаунт</h4>
                            <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#widgetId-2">Аккаунт</h4>
                            <div id="widgetId-2" class="collapse widget-collapse-body">
                                <div class="collapse-body">
                                    <div class="widget-menu-wrap">
                                        <ul class="nav-menu">
                                            <?php if (!empty($_SESSION['user'])): ?>
                                                <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                                                    <li><a href="<?= ADMIN; ?>">Управление</a></li>
                                                <?php endif; ?>
                                                <li><a href="<?= PATH ?>/user/cabinet">Кабинет</a></li>
                                                <li><a href="<?= PATH ?>/user/logout">Выход</a></li>
                                            <?php else: ?>
                                                <li><a class="dropdown-item" href="<?= PATH ?>/user/login">Вход</a>
                                                </li>
                                                <li><a class="dropdown-item" href="<?= PATH ?>/user/signup">Регистрация</a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End widget Item ==-->

                    </div>
                    <div class="col-md-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item">
                            <h4 class="widget-title">Контакты</h4>
                            <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#widgetId-3">Контакты</h4>
                            <div id="widgetId-3" class="collapse widget-collapse-body">
                                <div class="collapse-body">
                                    <div class="widget-contact-wrap">
                                        <ul>
                                            <?php if($settings['address']): ?>
                                                <li><span>Адрес:</span> <?=$settings['address']?></li>
                                            <?php endif; ?>
                                            <?php if($settings['phone']): ?>
                                                <li><span>Телефон:</span> <a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['phone'])?>"><?=$settings['phone']?></a></li>
                                            <?php endif; ?>
                                            <?php if($settings['email']): ?>
                                                <li><span>Email:</span> <a
                                                            href="mailto:<?=$settings['email']?>"><?=$settings['email']?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                </div>
            </div>
        </div>
        <!--== End Footer Main ==-->
        <!--== Start Footer Bottom ==-->
        <div class="footer-bottom">
            <div class="container pt--0 pb--0">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <p class="copyright">© <?=date('Y')?> Твои кроссовки <i class="fa fa-heart"></i>
                        </p>
                    </div>
                    <div class="col-md-5 col-lg-6">

                    </div>
                </div>
            </div>
        </div>
        <!--== End Footer Bottom ==-->
    </footer>
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

    <!--== Start Quick View Menu ==-->
    <aside class="product-quick-view-modal">
        <div class="product-quick-view-inner">
            <div class="product-quick-view-content">
                <button type="button" class="btn-close">
                    <span class="close-icon"><i class="fa fa-close"></i></span>
                </button>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="thumb">
                            <img src="<?= PATH ?>/assets/img/shop/product-single/1.webp" width="570" height="541"
                                 alt="Alan-Shop">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="content">
                            <h4 class="title">Space X Bag For Office</h4>
                            <div class="prices">
                                <del class="price-old">$85.00</del>
                                <span class="price">$70.00</span>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
                            <div class="quick-view-select">
                                <div class="quick-view-select-item">
                                    <label for="forSize" class="form-label">Size:</label>
                                    <select class="form-select" id="forSize" required>
                                        <option selected value="">s</option>
                                        <option>m</option>
                                        <option>l</option>
                                        <option>xl</option>
                                    </select>
                                </div>
                                <div class="quick-view-select-item">
                                    <label for="forColor" class="form-label">Color:</label>
                                    <select class="form-select" id="forColor" required>
                                        <option selected value="">red</option>
                                        <option>green</option>
                                        <option>blue</option>
                                        <option>yellow</option>
                                        <option>white</option>
                                    </select>
                                </div>
                            </div>
                            <div class="action-top">
                                <div class="pro-qty">
                                    <input type="text" id="quantity20" title="Quantity" value="1"/>
                                </div>
                                <button class="btn btn-black">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-overlay"></div>
    </aside>
    <!--== End Quick View Menu ==-->

    <!--== Start Aside Cart Menu ==-->
    <div class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart"
         aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h1 id="offcanvasRightLabel"></h1>
            <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Корзина <i
                        class="fa fa-chevron-right"></i></button>
        </div>
        <div class="offcanvas-body">
            <div id="mini-cart-body">
                <?php require APP . '/views/Cart/cart_modal.php'; ?>
            </div>
            <div id="mini-cart-btns">
                <a class="btn-theme" data-margin-bottom="10" href="<?= PATH ?>/cart">В корзину</a>
                <a href="<?= PATH ?>/cart/delete" type="button" class="btn btn-theme mt-3 clear-cart">Очистить
                    корзину</a>
            </div>
        </div>
    </div>
    <!--== End Aside Cart Menu ==-->

    <!--== Start Aside Search Menu ==-->
    <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch"
           aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="pe-7s-close"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="container pt--0 pb--0">
                <div class="search-box-form-wrap">
                    <!-- <div class="search-note">
                        <p>Start typing and press Enter to search</p>
                    </div> -->
                    <form action="<?= PATH ?>/search" method="post">
                        <div class="search-form position-relative">
                            <label for="search-input" class="visually-hidden">Search</label>
                            <input id="search-input" type="search" class="form-control search-form"
                                   placeholder="Поиск" name="s">
                            <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <div class="search-result">
                        <ul></ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!--== End Aside Search Menu ==-->

    <!--== Start Side Menu ==-->
    <div class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
         aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h1 id="offcanvasExampleLabel"></h1>
            <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">Меню <i
                        class="fa fa-chevron-left"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="info-items">
                <ul>
                    <?php if($settings['phone']): ?>
                    <li class="number"><a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['phone'])?>"><i class="fa fa-phone"></i><?=$settings['phone']?></a></li>
                    <?php endif; ?>
                    <?php if($settings['email']): ?>
                    <li class="email"><a href="mailto:<?=$settings['email']?>"><i class="fa fa-envelope"></i><?=$settings['email']?></a>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['user'])): ?>
                        <li class="account"><a href="<?= PATH ?>/user/cabinet"><i class="fa fa-user"></i>Кабинет</a></li>
                        <li><a href="<?= PATH ?>/user/logout"><i class="fa fa-sign-out"></i>Выход</a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="<?= PATH ?>/user/login"><i class="fa fa-sign-in"></i>Вход</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= PATH ?>/user/signup"><i class="fa fa-registered"></i>Регистрация</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <!-- Mobile Menu Start -->

            <div class="mobile-menu-items">
                <?php new \app\widgets\menu\Menu([
                    'tpl' => WWW . '/menu/mobile.php',
                    'class' => 'nav-menu',
                    'cacheKey' => 'mobile-menu',
                    'prepend' => '<li><a href="'.PATH.'">Главная</a></li>',
                    'append' => '<li><a href="'.PATH.'/sale">Акции</a></li><li><a href="'.PATH.'/contacts">Контакты</a></li>',
                ]); ?>
            </div>
            <!-- Mobile Menu End -->
        </div>
    </div>
    <!--== End Side Menu ==-->
</div>

<!--=======================Javascript============================-->
<script>
    let path = '<?=PATH;?>';
    let primaryColor = '<?=$settings['base_color']?>';
    let minPrice = <?= $prices[0]['min_price']; ?>;
    let maxPrice = <?= $prices[0]['max_price']; ?>;
</script>

<!--=== jQuery Modernizr Min Js ===-->
<script src="<?= PATH ?>/assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="<?= PATH ?>/assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="<?= PATH ?>/assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="<?= PATH ?>/assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="<?= PATH ?>/assets/js/bootstrap.min.js"></script>
<!--=== jQuery Ui Min Js ===-->
<script src="<?= PATH ?>/assets/js/jquery-ui.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="<?= PATH ?>/assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="<?= PATH ?>/assets/js/fancybox.min.js"></script>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

<!--=== jQuery Waypoint Js ===-->
<script src="<?= PATH ?>/assets/js/waypoint.js"></script>
<!--=== jQuery Parallax Min Js ===-->
<script src="<?= PATH ?>/assets/js/parallax.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="<?= PATH ?>/assets/js/aos.min.js"></script>
<script src="<?= PATH ?>/assets/js/sweetalert.js"></script>
<!--=== jQuery Custom Js ===-->
<script src="<?= PATH ?>/assets/js/custom.js"></script>

<div class="loading_block">
    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="164px" height="164px" viewBox="0 0 128 128"
         xml:space="preserve"><g>
            <circle cx="16" cy="64" r="16" fill="#000000"/>
            <circle cx="16" cy="64" r="16" fill="#555555" transform="rotate(45,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#949494" transform="rotate(90,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#cccccc" transform="rotate(135,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#e1e1e1" transform="rotate(180,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#e1e1e1" transform="rotate(225,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#e1e1e1" transform="rotate(270,64,64)"/>
            <circle cx="16" cy="64" r="16" fill="#e1e1e1" transform="rotate(315,64,64)"/>
            <animateTransform attributeName="transform" type="rotate"
                              values="0 64 64;315 64 64;270 64 64;225 64 64;180 64 64;135 64 64;90 64 64;45 64 64"
                              calcMode="discrete" dur="960ms" repeatCount="indefinite"></animateTransform>
        </g></svg>
</div>
</body>

</html>