<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список товаров</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список товаров</li>
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
                        <?php if($products):?>
                            <div class="text-cente">
                                <p>Товары: <?=count($products);?> из <?=$count;?></p>
                                <?php if($pagination->countPages > 1):?>
                                    <?=$pagination;?>
                                <?php endif;?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered products-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 15px">ID</th>
                                        <th>Наименование</th>
                                        <th>Категория</th>
                                        <th style="width: 100px">Цена</th>
                                        <th style="width: 100px">Старая цена</th>
                                        <th style="width: 150px">Фото</th>
                                        <th style="width: 30px">Статус</th>
                                        <th style="width: 30px">Хит</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $item):?>
                                        <tr>
                                            <td><?=$item['id']?></td>
                                            <td><?=$item['title']?></td>
                                            <td><?php debug(\app\models\admin\Product::getCats($item['id']));?></td>
                                            <td><?=$item['price']?></td>
                                            <td><?=$item['old_price']?></td>
                                            <td><img src="<?= PATH ?>/<?= $item['img'] ?>" width="150" height="150"></td>

                                            <td>
                                                <input class="status-list" data-id="<?=$item['id']?>" name="status" type="checkbox"<?= $item['status'] ? ' checked' : '' ?>>
                                            <td>
                                                <input class="status-list" data-id="<?=$item['id']?>" name="hit" type="checkbox"<?= $item['hit'] ? ' checked' : '' ?>>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/product/edit?id=<?=$item['id']?>"><i class="fas fa-eye"></i></a>
                                                <a href="<?=ADMIN?>/product/delete?id=<?=$item['id']?>" class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-cente">
                                <p>Товары: <?=count($products);?> из <?=$count;?></p>
                                <?php if($pagination->countPages > 1):?>
                                    <?=$pagination;?>
                                <?php endif;?>
                            </div>
                        <?php else: ?>
                            <h3>Товаров пока нет...</h3>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
