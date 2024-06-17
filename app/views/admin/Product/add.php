<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый товар</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Новый товар</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php $brands = \ishop\App::$app->getProperty('brands');?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= ADMIN; ?>/product/add" method="post" id="add">
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="<?= isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias"
                                       value="<?= isset($_SESSION['form_data']['alias']) ? h($_SESSION['form_data']['alias']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Брэнд</label>
                                <select class="form-control" name="brand_id">
                                    <option value="0">Выбрать брэнд</option>
                                    <?php foreach($brands as $key => $item): ?>
                                        <option value="<?=$key?>"><?=$item['title']?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select_p.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'add_cat',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'cats[]',
                                        'id' => 'category_id',
                                        'multiple' => '',
                                    ],
                                    'prepend' => '<option value="0" disabled>Выбрать категорию</option>'
                                ]); ?>
                            </div>
                            <div class="form-group">
                                <label for="editor1">Описание товара</label>
                                <textarea class="form-control" rows="20" name="content"
                                          id="editor1"><?= isset($_SESSION['form_data']['content']) ? h($_SESSION['form_data']['content']) : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       value="<?= isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price"
                                       value="<?= isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Сео заголовок</label>
                                <textarea class="form-control" rows="5" name="keyword"
                                          id="keyword"><?= isset($_SESSION['form_data']['keyword']) ? h($_SESSION['form_data']['keyword']) : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Сео описание товара</label>
                                <textarea class="form-control" rows="5" name="description"
                                          id="description"><?= isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="status" type="checkbox" id="status">
                                    <label for="status" class="custom-control-label">Активен</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="hit" type="checkbox" id="hit">
                                    <label for="hit" class="custom-control-label">Хит</label>
                                </div>
                            </div>
                            <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php'); ?>
                            <div class="form-group">
                                <label>Связанные товары</label>
                                <select class="select2" multiple="multiple" name="related[]"
                                        data-placeholder="Выбрать товары" style="width: 100%;"></select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Основное фото товара</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="dropzone" id="dropzone"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Галлерея</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="dropzone" id="dropzone2"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
