<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый слайд</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/slide">Список слайдов</a></li>
                    <li class="breadcrumb-item active">Новый слайд</li>
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
                        <form action="<?= ADMIN; ?>/slide/add" method="post" id="add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Фото</label>
                                <input type="file" name="image" class="form-control" id="image"
                                       value="<?= isset($_SESSION['form_data']['image']) ? h($_SESSION['form_data']['image']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="mobile_image">Фото для мобильного</label>
                                <input type="file" name="mobile_image" class="form-control" id="mobile_image"
                                       value="<?= isset($_SESSION['form_data']['mobile_image']) ? h($_SESSION['form_data']['mobile_image']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="<?= isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="text">Описание</label>
                                <textarea class="form-control" rows="5" name="text"
                                          id="text"><?= isset($_SESSION['form_data']['text']) ? h($_SESSION['form_data']['text']) : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                <input type="text" name="link" class="form-control" id="link"
                                       value="<?= isset($_SESSION['form_data']['link']) ? h($_SESSION['form_data']['link']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="button">Текст кнопки</label>
                                <input type="text" name="button" class="form-control" id="button"
                                       value="<?= isset($_SESSION['form_data']['button']) ? h($_SESSION['form_data']['button']) : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="is_active" type="checkbox" id="is_active">
                                    <label for="is_active" class="custom-control-label">Активен</label>
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
