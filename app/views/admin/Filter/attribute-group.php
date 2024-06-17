<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Группы фильтров</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active">Группы фильтров</li>
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
                        <a href="<?= ADMIN?>/filter/group-add" class="btn btn-primary mb-3">Добавить группу</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Статус</th>
                                    <th style="width: 15px">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($attrs_group as $item): ?>
                                <?php
                                    $type = $item->type_inp == 1 ? 'Единичный выбор' : 'Множественный выбор';
                                    ?>
                                    <tr>
                                        <td><?=$item->title?></td>
                                        <td><?=$type ?></td>
                                        <td class="<?=$item->active ? 'success' : 'danger';?>"></td>
                                        <td class="text-center">
                                            <a href="<?= ADMIN ?>/filter/group-edit?id=<?= $item->id ?>"><i
                                                        class="fas fa-eye"></i></a>
                                            <a href="<?= ADMIN ?>/filter/group-delete?id=<?= $item->id ?>"
                                               class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-cente">
                    <p>Товары: <?=count($attrs_group);?> из <?=$count;?></p>
                    <?php if($pagination->countPages > 1):?>
                        <?=$pagination;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
