<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список страниц</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список страниц</li>
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
                        <?php if($pages):?>
                            <div class="table-responsive">
                                <table class="table table-bordered products-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 15px">ID</th>
                                        <th>Наименование</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pages as $item):?>
                                        <tr>
                                            <td><?=$item['id']?></td>
                                            <td><?=$item['title']?></td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/page/edit?id=<?=$item['id']?>"><i class="fas fa-eye"></i></a>
                                                <a href="<?=ADMIN?>/page/delete?id=<?=$item['id']?>" class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-cente">
                                <p>Страницы: <?=count($pages);?> из <?=$count;?></p>
                                <?php if($pagination->countPages > 1):?>
                                    <?=$pagination;?>
                                <?php endif;?>
                            </div>
                        <?php else: ?>
                            <h3>Страниц пока нет...</h3>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
