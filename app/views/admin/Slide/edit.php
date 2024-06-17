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
                        <form action="<?= ADMIN; ?>/slide/edit" method="post" id="add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Фото</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <?php if($slide['image']): ?>
                                    <img src="<?= PATH ?>/<?= $slide['image'] ?>" width="270" height="274" style="max-height: 150px;width: auto;">
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="mobile_image">Фото для мобильного</label>
                                <input type="file" name="mobile_image" class="form-control" id="mobile_image">
                                <?php if($slide['mobile_image']): ?>
                                    <img src="<?= PATH ?>/<?= $slide['mobile_image'] ?>" width="270" height="274" style="max-height: 150px;width: auto;">
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="<?= h($slide['title']); ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="text">Описание</label>
                                <textarea class="form-control" rows="5" name="text"
                                          id="text"><?= h($slide['text']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                <input type="text" name="link" class="form-control" id="link"
                                       value="<?= h($slide['link']); ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="button">Текст кнопки</label>
                                <input type="text" name="button" class="form-control" id="button"
                                       value="<?= h($slide['button']); ?>"
                                       required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="is_active" type="checkbox" id="is_active" <?= $slide['is_active'] ? ' checked' : '' ?>>
                                    <label for="is_active" class="custom-control-label">Активен</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $slide['id']; ?>">
                                <input type="hidden" name="img" value="<?= $slide['image'] ?>">
                                <input type="hidden" name="img_m" value="<?= $slide['mobile_image'] ?>">
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
