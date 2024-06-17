<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактировать товар <?= $product['title'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Редактировать товар <?= $product['title'] ?></li>
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
                        <form action="<?= ADMIN; ?>/product/edit" method="post">
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="<?= h($product['title']); ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias"
                                       value="<?= h($product['alias']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="editor1">Описание товара</label>
                                <textarea class="form-control" rows="20" name="content"
                                          id="editor1"><?= $product['content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" pattern="^[0-9]{1,}$" name="price" class="form-control" id="price"
                                       value="<?= h($product['price']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" pattern="^[0-9]{1,}$" class="form-control"
                                       id="old_price"
                                       value="<?= h($product['old_price']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Сео заголовок</label>
                                <textarea class="form-control" rows="5" name="keyword"
                                          id="keyword"><?= h($product['keyword']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Сео описание товара</label>
                                <textarea class="form-control" rows="5" name="description"
                                          id="description"><?= h($product['description']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="status" type="checkbox"
                                           id="status"<?= $product['status'] ? ' checked' : '' ?>>
                                    <label for="status" class="custom-control-label">Активен</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="hit" type="checkbox"
                                           id="hit"<?= $product['hit'] ? ' checked' : '' ?>>
                                    <label for="hit" class="custom-control-label">Хит</label>
                                </div>
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
                                    'prepend' => '<option value="0">Выбрать категорию</option>'
                                ]); ?>
                            </div>
                            <?php new \app\widgets\filter\Filter($filter, WWW . '/filter/admin_filter_tpl.php'); ?>
                            <div class="form-group">
                                <label>Связанные товары</label>
                                <select class="select2" multiple="multiple" name="related[]"
                                        data-placeholder="Выбрать товары" style="width: 100%;">
                                    <?php if (!empty($related_product)): ?>
                                        <?php foreach ($related_product as $item): ?>
                                            <option value="<?= $item['related_id'] ?>"
                                                    selected><?= $item['title'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Основное фото товара</h3>
                                        </div>
                                        <div class="card-body">

                                            <?php if ($product['img']): ?>
                                            <div class="dropzone" id="dropzone111">
                                                <input type="hidden" name="img" value="<?= $product['img']; ?>">
                                                <div class="img-block">
                                                    <div class="image">
                                                        <img data-dz-thumbnail="<?= PATH . '/' . $product['img']; ?>"
                                                             alt="" src="<?= PATH . '/' . $product['img']; ?>">
                                                    </div>
                                                    <a class="del-img" data-src="<?= $product['img']; ?>" data-id="<?= $product['id']; ?>" href="javascript:undefined;">Удалить
                                                        файл</a>
                                                </div>
                                            </div>
                                            <?php else:?>
                                                <div class="dropzone" id="dropzone"></div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Галлерея</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="dropzone" id="dropzone2">
                                            <?php if ($gallery): ?>
                                                <div class="gallery-wrap">
                                                    <?php foreach($gallery as $k => $item): ?>
                                                        <div class="img-block">
                                                            <div class="image">
                                                                <img alt="" src="<?= PATH . '/' . $item['img']; ?>">
                                                            </div>
                                                            <a class="del-item" data-src="<?= $item['img']; ?>" data-id="<?= $product['id']; ?>" href="javascript:undefined;">Удалить
                                                                файл</a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
