<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новая группа фильтров</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?=ADMIN;?>/filter/attribute-group">Группы фильтров</a></li>
                    <li class="breadcrumb-item active">Новая группа фильтров</li>
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
                        <form action="<?=ADMIN?>/filter/group-add" method="post">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название" required>
                            </div>
                            <div class="form-group">
                                <label for="alias">Алиас</label>
                                <input type="text" name="alias" class="form-control" id="alias" placeholder="Алиас" required>
                            </div>
                            <div class="form-group">
                                <label for="type_inp">Группа</label>
                                <select name="type_inp" class="form-control" id="type_inp">
                                    <option disabled selected>Выберите тип</option>
                                    <option value="1">Единичный выбор</option>
                                    <option value="2">Множественный выбор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="active" type="checkbox" id="active">
                                    <label for="active" class="custom-control-label">Активен</label>
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
    </div>
</section>
