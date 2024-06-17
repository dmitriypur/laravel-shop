<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактировать страницу <?= $page['title'] ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/page">Список страниц</a></li>
                    <li class="breadcrumb-item active">Редактировать страницу <?= $page['title'] ?></li>
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
                        <form action="<?= ADMIN; ?>/page/edit" method="post">
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="<?= h($page['title']); ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias"
                                       value="<?= h($page['alias']); ?>">
                            </div>

                            <div class="form-group">
                                <label for="editor1">Описание товара</label>
                                <textarea class="form-control" rows="20" name="content"
                                          id="editor1"><?= $page['content']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $page['id']; ?>">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
