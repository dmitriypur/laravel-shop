<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Заказ №<?=$order['id']?></h1>

                <?php if(!$order['status']): ?>
                    <a href="<?=ADMIN?>/order/change?id=<?=$order['id']?>&status=1" class="btn btn-success mt-4">Одобрить</a>
                <?php else: ?>
                    <a href="<?=ADMIN?>/order/change?id=<?=$order['id']?>&status=0" class="btn btn-default mt-4">Вернуть в доработку</a>
                <?php endif; ?>
                <a href="<?=ADMIN?>/order/delete?id=<?=$order['id']?>" class="btn btn-danger mt-4 delete">Удалить</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/order">Заказы</a></li>
                    <li class="breadcrumb-item active">Заказ №<?=$order['id']?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td><?=$order['id']?></td>
                                    </tr>
                                    <tr>
                                        <td>Дата заказа</td>
                                        <td><?=$order['date']?></td>
                                    </tr>
                                    <tr>
                                        <td>Дата изменения</td>
                                        <td><?=$order['update_at']?></td>
                                    </tr>
                                    <tr>
                                        <td>Статус заказа</td>
                                        <td><?=$order['status'] ? 'Завершен' : 'Новый'?></td>
                                    </tr>
                                    <tr>
                                        <td>Заказчик</td>
                                        <td><?=$order['name']?></td>
                                    </tr>
                                    <tr>
                                        <td>Тип оплаты</td>
                                        <td><?=$order['payment']?></td>
                                    </tr>
                                    <tr>
                                        <td>Тип доставки</td>
                                        <td><?=$order['shipping']?></td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td><?=$order['sum']?> р.</td>
                                    </tr>
                                    <tr>
                                        <td>Коментарий</td>
                                        <td><?=$order['note']?></td>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Детали заказа</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                </tr>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
