<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новая страница</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/page">Список страниц</a></li>
                    <li class="breadcrumb-item active">Новая страница</li>
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
                        <form action="<?= ADMIN; ?>/page/add" method="post" id="add">
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
                                <label for="editor1">Текст страницы</label>
                                <textarea class="form-control" rows="20" name="content"
                                          id="editor1"><?= isset($_SESSION['form_data']['content']) ? h($_SESSION['form_data']['content']) : ''; ?></textarea>
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
