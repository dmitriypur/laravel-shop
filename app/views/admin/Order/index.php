<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список заказов</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список заказов</li>
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
                        <?php if($orders):?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 15px">ID</th>
                                        <th>Покупатель</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $item):?>
                                <?php $class = $item['status'] ? 'table-success' : ''; ?>
                                    <tr class="<?=$class?>">
                                        <td><?=$item['id']?></td>
                                        <td><?=$item['name']?></td>
                                        <td><?=$item['status'] ? 'Завершен' : 'Новый'?></td>
                                        <td><?=$item['sum']?></td>
                                        <td><?=$item['date']?></td>
                                        <td><?=$item['update_at']?></td>
                                        <td class="text-center">
                                            <a href="<?=ADMIN?>/order/view?id=<?=$item['id']?>"><i class="fas fa-eye"></i></a>
                                            <a href="<?=ADMIN?>/order/delete?id=<?=$item['id']?>" class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-cente">
                            <p>Заказы: <?=count($orders);?> из <?=$count;?></p>
                            <?php if($pagination->countPages > 1):?>
                            <?=$pagination;?>
                            <?php endif;?>
                        </div>
                        <?php else: ?>
                        <h3>Заказов пока нет...</h3>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
