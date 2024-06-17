<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Очистка кэша</h1>
                <a href="<?=ADMIN?>/cache/delete?key=all" class="btn btn-success mt-4">Удалить весь кэш</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Очистка кэша</li>
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
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Кэш категорий</td>
                                            <td>Меню категорий на сайте. Кэшируется на 1 час</td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/cache/delete?key=category" class="text-danger delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Кэш фильтров</td>
                                            <td>Кэш фильтров и групп фильтров. Кэшируется на 1 час</td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/cache/delete?key=filter" class="text-danger delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
