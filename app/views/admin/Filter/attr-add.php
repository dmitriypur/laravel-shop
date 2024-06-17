<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый атрибут</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?=ADMIN;?>/filter/attribute">Фильтры</a></li>
                    <li class="breadcrumb-item active">Новый атрибут</li>
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
                        <form action="<?=ADMIN?>/filter/attr-add" method="post" id="add">
                            <div class="form-group">
                                <label for="value">Название</label>
                                <input type="text" name="value" class="form-control" id="value" placeholder="Название" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Группа</label>
                                <select name="attr_group_id" class="form-control" id="category_id">
                                    <option disabled selected>Выберите категорию</option>
                                    <?php foreach($attrs_group as $item): ?>
                                        <option value="<?=$item->id?>"><?=$item->title?></option>
                                    <?php endforeach; ?>
                                </select>
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
