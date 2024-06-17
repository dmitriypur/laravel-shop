<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area product-header__title" data-bg-img="">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Корзина</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="<?= PATH ?>">Главная</a></li>
                                <li class="breadcrumb-sep">/</li>
                                <li>Корзина</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->
    <!--== Start Blog Area Wrapper ==-->
    <section class="shopping-cart-area">
        <div class="container cart__wrap">
            <?php if (!empty($_SESSION['cart'])): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart-form table-responsive">
                            <form action="#" method="post">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumb">&nbsp;</th>
                                        <th class="product-name">Товары</th>
                                        <th class="product-price">Цена</th>
                                        <th class="product-quantity">Кол-во</th>
                                        <th class="product-subtotal">Сумма</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                                        <tr class="cart-product-item">
                                            <td class="product-remove">
                                                <a href="#" data-id="<?= $product_id; ?>" data-cart="cart"
                                                   class="remove"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product-thumb">
                                                <a href="product/<?= $product['alias']; ?>">
                                                    <img src="<?= PATH ?>/<?= $product['img']; ?>"
                                                         width="90" height="110" alt="<?= $product['title']; ?>">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <h4 class="title"><a
                                                            href="product/<?= $product['alias']; ?>"><?= upper($product['title']); ?></a>
                                                </h4>
                                            </td>
                                            <td class="product-price">
                                                <span class="price"
                                                      data-price="<?= $product['price']; ?>"><?= $product['price']; ?>р.</span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity"
                                                           data-id="<?= $product_id; ?>"
                                                           value="<?= $product['qty']; ?>">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="price"><?= $product['price'] * $product['qty']; ?>р.</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr class="actions">
                                        <td class="border-0" colspan="5"></td>
                                        <td class="border-0" colspan="1" style="text-align: right;">
                                            <p>Кол-во: <span id="final__qty"><?= $_SESSION['cart.qty']; ?></span></p>
                                            <p>Сумма: <span id="final__sum"><?= $_SESSION['cart.sum']; ?>р.</span></p>
                                        </td>
                                    </tr>
                                    <tr class="actions">
                                        <td class="border-0" colspan="6">
                                            <a href="<?= $_SERVER['HTTP_REFERER'] ?? PATH . '/category'; ?>"
                                               class="btn-theme btn-flat">Продолжить покупки</a>
                                            <a href="<?= PATH ?>/cart/delete" class="btn-theme clear-cart-page"
                                               data-cart="page-cart">Очистить корзину</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="<?= PATH; ?>/cart/checkout" method="post" id="register-form">
                    <div class="row row-gutter-50">
                        <div class="col-md-6 col-lg-6">
                            <div class="register-form-content">
                                <div class="row">
                                    <?php if (!isset($_SESSION['user'])): ?>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Имя <span class="required">*</span></label>
                                                <input id="name" name="name" class="form-control" type="text" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone">Телефон <span class="required">*</span></label>
                                                <input id="phone" name="phone" class="form-control" type="tel" value="<?= isset($_SESSION['form_data']['phone']) ? h($_SESSION['form_data']['phone']) : '';?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input id="email" name="email" class="form-control" type="email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password">Password <span class="required">*</span></label>
                                                <input id="password" name="password" class="form-control" type="password" value="<?= isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <label for="address" class="form-label">Адрес</label>
                                                <textarea class="form-control" name="address" id="address" rows="3"><?= isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <label for="note" class="form-label">Сообщение</label>
                                                <textarea class="form-control" name="note" id="note"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <label for="note" class="form-label">Сообщение</label>
                                                <textarea class="form-control" name="note" id="note"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="shipping-form-cart-totals">
                                <div class="cart-total-table">
                                    <table class="table">
                                        <tbody>
                                        <tr class="shipping">
                                            <td>
                                                <p class="value">Оплата</p>
                                            </td>
                                            <td>
                                                <ul class="shipping-list">
                                                    <li class="radio">
                                                        <input type="radio" name="payment" id="payment1" value="nal" checked>
                                                        <label for="payment1"><span></span> Наличными при получении</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>
                                                <p class="value">Доставка</p>
                                            </td>
                                            <td>
                                                <ul class="shipping-list">
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio1" value="sdek" checked>
                                                        <label for="radio1"><span></span> СДЭК</label>
                                                    </li>
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio2" value="pochta">
                                                        <label for="radio2"><span></span> Почта России</label>
                                                    </li>
                                                    <li class="radio">
                                                        <input type="radio" name="shipping" id="radio3" value="samovyvoz">
                                                        <label for="radio3"><span></span> Самовывоз</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>
                                                <p class="value">Итоговая сумма</p>
                                            </td>
                                            <td>
                                                <p class="price"><?= $_SESSION['cart.sum']; ?>р.</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb--0">
                                        <button class="btn-theme btn-flat" type="submit">Отправить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Корзина пуста</h3>
                        <a href="<?= PATH; ?>" class="btn-theme btn-flat">Продолжить
                            покупки</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
</main>