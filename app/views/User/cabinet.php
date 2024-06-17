<?php

use ishop\App;

?>
<section class="product-area product-default-area">
    <div class="container">
        <div class="row flex-xl-row-reverse justify-content-between">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <?php if (!isset($_GET['orders'])): ?>
                            <div class="register-form-content">
                                <form action="<?= PATH ?>/user/edit" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Имя <span class="required">*</span></label>
                                                <input id="name" name="name" class="form-control" type="text"
                                                       value="<?= isset($_SESSION['user']['name']) ? h($_SESSION['user']['name']) : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone">Телефон <span class="required">*</span></label>
                                                <input id="phone" name="phone" class="form-control" type="tel"
                                                       value="<?= isset($_SESSION['user']['phone']) ? h($_SESSION['user']['phone']) : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input id="email" name="email" class="form-control" type="email"
                                                       value="<?= isset($_SESSION['user']['email']) ? h($_SESSION['user']['email']) : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" class="form-control" type="text"
                                                       placeholder="Введите пароль если хотите поменять">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <label for="address" class="form-label">Адрес</label>
                                                <textarea class="form-control" name="address" id="address"
                                                          rows="3"><?= isset($_SESSION['user']['address']) ? h($_SESSION['user']['address']) : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                                                <button class="btn-register" type="submit">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="myaccount-content">
                                <h3>Заказы</h3>
                                <div class="myaccount-table table-responsive text-center">
                                    <?php if ($orders): ?>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Дата</th>
                                                <th>Обновлен</th>
                                                <th>Статус</th>
                                                <th>Сумма</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($orders as $item): ?>
                                                <?php $class = $item['status'] ? 'table-success' : ''; ?>
                                                <tr class="<?=$class?>">
                                                    <td><?=$item['id']?></td>
                                                    <td><?=$item['date']?></td>
                                                    <td><?=$item['update_at']?></td>
                                                    <td><?=$item['status'] ? 'Завершен' : 'В обработке'?></td>
                                                    <td><?=$item['sum']?></td>
                                                    <td class="text-center">
                                                        <a href="<?=PATH?>/user/order-products?id=<?=$item['id']?>" style="color: red;"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <h3>Заказов пока нет...</h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
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