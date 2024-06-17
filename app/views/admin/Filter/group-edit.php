<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование группы <?=$group->title?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?=ADMIN;?>/filter/attribute-group">Группы фильтров</a></li>
                    <li class="breadcrumb-item active">Редактирование группы <?=$group->title?></li>
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
                        <form action="<?=ADMIN?>/filter/group-edit" method="post">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?=$group->title?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias" value="<?=$group->alias?>" required>
                            </div>
                            <div class="form-group">
                                <label for="type_inp">Группа</label>
                                <select name="type_inp" class="form-control" id="type_inp">
                                    <option disabled selected>Выберите тип</option>
                                    <option value="1"<?= $group->type_inp == '1' ? ' selected' : '' ?>>Единичный выбор</option>
                                    <option value="2"<?= $group->type_inp == '2' ? ' selected' : '' ?>>Множественный выбор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="active" type="checkbox" id="active"<?= $group->active ? ' checked' : '' ?>>
                                    <label for="active" class="custom-control-label">Активен</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$group->id?>">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
