<?php

use ishop\App;

?>
<section class="product-area product-default-area">
    <div class="container">
        <div class="row flex-xl-row-reverse justify-content-between">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="myaccount-content">
                            <h3>Заказы</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <?php if ($order): ?>
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <td>Номер заказа</td>
                                            <td><?= $order['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Дата заказа</td>
                                            <td><?= $order['date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Дата изменения</td>
                                            <td><?= $order['update_at'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Статус заказа</td>
                                            <td><?= $order['status'] ? 'Завершен' : 'Новый' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Заказчик</td>
                                            <td><?= $order['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Тип оплаты</td>
                                            <td><?= $order['payment'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Тип доставки</td>
                                            <td><?= $order['shipping'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Сумма заказа</td>
                                            <td><?= $order['sum'] ?> р.</td>
                                        </tr>
                                        <tr>
                                            <td>Коментарий</td>
                                            <td><?= $order['note'] ?></td>
                                        </tr>

                                        </thead>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="myaccount-content">
                            <h3>Заказы</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <?php if ($order_products): ?>
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Кол-во</th>
                                            <th>Цена</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $qty = 0; foreach($order_products as $product): ?>
                                            <tr>
                                                <td><?=$product['product_id']?></td>
                                                <td><a href="<?=PATH?>/product/<?=$product['alias']?>"><?=$product['title']?></a></td>
                                                <td><?=$product['qty']; $qty += $product['qty']?></td>
                                                <td><?=$product['price']?> р.</td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th colspan="2">Итого:</th>
                                            <th><?=$qty?></th>
                                            <th><?=$order['sum']?> р.</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <nav>
                    <div class="myaccount-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                        <a href="<?= PATH ?>/user/cabinet" class="nav-link active">Личные данные</a>
                        <a href="<?= PATH ?>/user/cabinet/?orders" class="nav-link">Заказы</a>
                        <a href="<?= PATH ?>/user/logout" class="nav-link">
                            Выход
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>