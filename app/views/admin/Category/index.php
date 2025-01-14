<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список категорий</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список категорий</li>
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
                        <?php
                        new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/admin_cat.php',
                            'container' => 'div',
                            'cache' => 0,
                            'cacheKey' => 'admin_cat',
                            'class' => 'list-group',
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
