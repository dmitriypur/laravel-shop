<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список слайдов</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список слайдов</li>
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
                        <?php if($slides):?>
                            <div class="table-responsive">
                                <table class="table table-bordered products-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 15px">ID</th>
                                        <th>Наименование</th>
                                        <th style="width: 150px;">Фото</th>
                                        <th>Статус</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($slides as $item):?>
                                        <tr>
                                            <td><?=$item['id']?></td>
                                            <td><?=$item['title']?></td>
                                            <td>
                                                <?php if($item['image']): ?>
                                                    <img src="<?= PATH ?>/<?= $item['image'] ?>" width="270" height="274" style="max-height: 50px;width: auto;">
                                                <?php endif; ?>
                                            </td>
                                            <td class="<?=$item['is_active'] ? 'success' : 'danger';?>"></td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/slide/edit?id=<?=$item['id']?>"><i class="fas fa-eye"></i></a>
                                                <a href="<?=ADMIN?>/slide/delete?id=<?=$item['id']?>" class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>Слайдов пока нет...</p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
