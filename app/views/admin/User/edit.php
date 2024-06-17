<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование пользователя "<?=$user->name?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/user">Пользователи</a></li>
                    <li class="breadcrumb-item active"><?=$user->name?></li>
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
                        <form action="<?=ADMIN?>/user/edit" method="post">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?=h($user->name);?>" required>
                            </div>
                            <div class="form-group">
                                <label for="login">Логин</label>
                                <input type="text" name="login" class="form-control" id="login" value="<?=h($user->login);?>">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?=h($user->email);?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="text" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="<?=h($user->phone);?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" class="form-control" id="address" value="<?=h($user->address);?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Адрес</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="user"<?= $user->role == 'user' ? ' selected' : ''?>>Пользователь</option>
                                    <option value="admin"<?= $user->role == 'admin' ? ' selected' : ''?>>Администратор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$user->id;?>">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <h3>Заказы пользователя</h3>
                <div class="card">
                    <div class="card-body">
                        <?php if($orders):?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 15px">ID</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th style="width: 15px">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($orders as $item):?>
                                        <?php $class = $item['status'] ? 'table-success' : ''; ?>
                                        <tr class="<?=$class?>">
                                            <td><?=$item['id']?></td>
                                            <td><?=$item['status'] ? 'Завершен' : 'Новый'?></td>
                                            <td><?=$item['sum']?></td>
                                            <td><?=$item['date']?></td>
                                            <td><?=$item['update_at']?></td>
                                            <td class="text-center">
                                                <a href="<?=ADMIN?>/order/view?id=<?=$item['id']?>"><i class="fas fa-eye"></i></a>
                                                <a href="<?=ADMIN?>/order/delete?id=<?=$item['id']?>" class="text-danger ml-3 delete"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <h3>Заказов пока нет...</h3>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
