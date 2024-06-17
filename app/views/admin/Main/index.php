<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Панель управления</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$orders;?></h3>

                        <p>Новые заказы</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <a href="<?=ADMIN?>/order" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?=$products?></h3>

                        <p>Товары</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <a href="<?=ADMIN?>/product" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$users?></h3>
                        <p>Пользователи</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?=ADMIN?>/user" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=$categories?></h3>

                        <p>Категории</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <a href="<?=ADMIN?>/category" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Настройки сайта</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="<?=ADMIN?>/main/index" method="post">
                            <div class="row">
                                <div class="col-md-5 mr-5">
                                    <h3>Общие настройки</h3>
                                    <div class="form-group">
                                        <label for="phone">Телефон</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?= h($settings['phone']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" class="form-control" id="email" value="<?= h($settings['email']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="base_color">Базовый цвет</label>
                                        <input type="color" name="base_color" class="form-control" id="base_color" value="<?= h($settings['base_color']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Адрес</label>
                                        <textarea class="form-control" rows="5" name="address"
                                                  id="address"><?= h($settings['address']); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Главная страница</h3>
                                    <div class="form-group">
                                        <label for="editor1">Сео описание внизу страницы</label>
                                        <textarea class="form-control" rows="5" name="seo_text"
                                                  id="editor1"><?= $settings['seo_text']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
