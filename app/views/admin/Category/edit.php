<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование категории "<?=$category->title?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?=ADMIN;?>/category">Список категорий</a></li>
                    <li class="breadcrumb-item active"><?=$category->title?></li>
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
                        <form action="<?=ADMIN?>/category/edit" method="post">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название" value="<?=h($category->title);?>" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'add_cat',
                                    'class' => 'form-control',
                                    'attrs' => [
                                            'name' => 'parent_id',
                                            'id' => 'parent_id',
                                    ],
                                    'prepend' => '<option value="0">Без категории</option>'
                                ]);?>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias"
                                       placeholder="Алиас" value="<?=h($category->alias);?>">
                            </div>
                            <div class="form-group">
                                <label for="keywords">Сео заголовок</label>
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                       placeholder="Ключевые слова" value="<?=h($category->keywords);?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       placeholder="Описание" value="<?=h($category->description);?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$category->id;?>">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
