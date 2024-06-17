<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый пользователь</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/user">Пользователи</a></li>
                    <li class="breadcrumb-item active">Новый пользователь</li>
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
                        <form action="<?=PATH;?>/user/signup" method="post">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="text" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="<?= isset($_SESSION['form_data']['phone']) ? h($_SESSION['form_data']['phone']) : '';?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" class="form-control" id="address" value="<?= isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Адрес</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="user"<?= isset($_SESSION['form_data']['role']) && $_SESSION['form_data']['role'] == 'user' ? ' selected' : '';?>>Пользователь</option>
                                    <option value="admin"<?= isset($_SESSION['form_data']['role']) && $_SESSION['form_data']['role'] == 'admin' ? ' selected' : '';?>>Администратор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add-user" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
